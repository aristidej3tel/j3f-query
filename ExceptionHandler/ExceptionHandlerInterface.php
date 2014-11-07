<?php
namespace J3tel\QueryBundle\ExceptionHandler;

use J3tel\CoreBundle\Controller\ControllerContextInterface;

interface ExceptionHandlerInterface
{
    public function __construct($extraParameters = array());
    public function setManager($manager);
    public function setContainer($container);
    public function handle(\Exception $e, ControllerContextInterface $context = null);
    public function handleEntityErrors(ControllerContextInterface &$context);
    public function getSupportedExceptions();
    public function stopPropagation();
    public function getController();
    public function setController($controller);
}
