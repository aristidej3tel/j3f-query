<?php
namespace J3tel\QueryBundle\ExceptionHandler;

use J3tel\CoreBundle\Controller\ControllerContextInterface;
use J3tel\CoreBundle\Cfg\FrameworkCfg;

class MissingEntityExceptionHandler extends ExceptionHandlerAbstract
{
    public function getSupportedExceptions()
    {
        return array(
            'Doctrine\ORM\EntityNotFoundException',
            'Doctrine\ORM\Mapping\MappingException'
        );
    }

    public function handle(\Exception $e, ControllerContextInterface $context = null)
    {
        $this->stopPropagation();
        if ($context !== null) {
            $this->handleEntityErrors($context);
        } else {
            $this->container->get('session')->getFlashBag()->add(
                FrameworkCfg::MESSAGE_TYPE_WARNING,
                $this->container->get('translator')->trans('form.flash.error.missing.element', array(), 'commun')
            );
        }
        try {
            return $this->getController()->redirect();
        } catch (\Exception $e) {

        }
    }
}
