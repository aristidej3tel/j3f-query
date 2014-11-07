<?php
namespace J3tel\QueryBundle\ExceptionHandler\System;

use J3tel\CoreBundle\ExceptionHandler\ExceptionHandlerAbstract;
use J3tel\CoreBundle\Controller\ControllerContextInterface;
use J3tel\CoreBundle\Cfg\FrameworkCfg;

class NotFoundExceptionHandler extends ExceptionHandlerAbstract
{
    public function getSupportedExceptions()
    {
        return array(
            'J3tel\CoreBundle\Exceptions\System\EntityNotFoundException',
            'J3tel\CoreBundle\Exceptions\System\ElementNotFoundException',
            'Doctrine\ORM\NoResultException'
        );
    }

    public function handle(\Exception $e, ControllerContextInterface $context = null)
    {
        $this->container->get('session')->getFlashBag()->add(
            FrameworkCfg::MESSAGE_TYPE_FAIL,
            $this->container->get('translator')->trans('form.flash.error.missing.ressource', array(), 'commun')
        );
        try {
            return $this->getController()->redirect();
        } catch (\Exception $e) {
            if ($context !== null and $context->getLogger() !== null) {
                $context->getLogger()->error('Exception in "%s" , message : "%s"', get_class($this), $e->getMessage());
            }
        }
    }
}
