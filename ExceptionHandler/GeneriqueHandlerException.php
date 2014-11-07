<?php
namespace J3tel\QueryBundle\ExceptionHandler;

use J3tel\CoreBundle\Controller\ControllerContextInterface;
use J3tel\CoreBundle\Cfg\FrameworkCfg;

class GeneriqueHandlerException extends ExceptionHandlerAbstract
{
    const DEFAULT_SUPPORTED_EXCEPTION = 'DEFAULT_SUPPORTED_EXCEPTION';

    public function handle(\Exception $e, ControllerContextInterface $context = null)
    {
        switch (get_class($e))
        {
            case 'J3tel\CoreBundle\Exceptions\DeletableException';
                $this->container->get('session')->getFlashBag()->add(
                    FrameworkCfg::MESSAGE_TYPE_FAIL,
                    $this->container->get('translator')->trans('form.flash.error.deletable', array(), 'commun')
                );
                break;
            case 'J3tel\CoreBundle\Exceptions\EditableException';
                $this->container->get('session')->getFlashBag()->add(
                    FrameworkCfg::MESSAGE_TYPE_FAIL,
                    $this->container->get('translator')->trans('form.flash.error.editable', array(), 'commun')
                );
                break;
            default:
                $this->container->get('session')->getFlashBag()->add(
                    FrameworkCfg::MESSAGE_TYPE_WARNING,
                    $this->container->get('translator')->trans('form.flash.error.internal', array(), 'commun')
                );
                break;
        }
        
    }

    public function getSupportedExceptions()
    {
        return array(
            self::DEFAULT_SUPPORTED_EXCEPTION,
            'J3tel\CoreBundle\Exceptions\DeletableException'
        );
    }
}
