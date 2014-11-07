<?php
namespace J3tel\QueryBundle\ExceptionHandler;

use J3tel\CoreBundle\Controller\ControllerContextInterface;
use J3tel\CoreBundle\Interfaces\EntityErrorHandlerInterface;
use J3tel\CoreBundle\Event\EntityEvent;

abstract class ExceptionHandlerAbstract implements ExceptionHandlerInterface
{
    protected $controller;
    protected $container;
    protected $extraparameters;
    protected $propagate;
    protected $manager;

    public function __construct($extraParameters = array())
    {
        $this->extraparameters = $extraParameters;
        $this->propagate = true;
        $this->manager = null;
    }

    public function setManager($manager)
    {
        $this->manager = $manager;

        return $this;
    }
    public function getContainer()
    {
        return $this->container;
    }

    public function setContainer($container)
    {
        $this->container = $container;

        return $this;
    }
    public function stopPropagation()
    {
        $this->propagate = false;
    }

    public function isPropagationStopped()
    {
        return !$this->propagate;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function setController($controller)
    {
        $this->controller = $controller;

        return $this;
    }
    public function handleEntityErrors(ControllerContextInterface &$context)
    {
        if (null === $context) {
            return false;
        }
        $context->getLogger()->error(sprintf('Handle Entity Error on "%s"', get_class($context->getObject())));
        $entity = $context->getObject();

        if ($entity instanceof EntityErrorHandlerInterface) {
            foreach ($entity->getActions() as $key => $value) {
                switch ($key) {
                    case EntityErrorHandlerInterface::ACTION_THROW_EVENT:
                        $this->container->get('event_dispatcher')->dispatch(
                            $value,
                            new EntityEvent($entity)
                        );
                        $this->manager->persist($entity);
                        break;
                    case EntityErrorHandlerInterface::ACTION_DELETE:
                        $this->manager->remove($entity);
                        break;
                    case EntityErrorHandlerInterface::ACTION_DISABLE:
                        if ($entity instanceof EnableInterface) {
                            $entity->disable();
                        }
                        $this->manager->persist($entity);
                        break;
                    case EntityErrorHandlerInterface::ACTION_CALL_FUNCTION:
                        if (true === method_exists($entity, $value)) {
                            $entity->{$value}();
                            $this->manager->persist($entity);
                        }
                        break;
                }
            }
            $this->manager->flush();

            $context->setObject($entity);
        }
    }
}
