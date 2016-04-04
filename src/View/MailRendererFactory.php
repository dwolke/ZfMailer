<?php
/**
 * @Author: Daniel
 * @Date:   2016-03-31 19:48:49
 * @Last Modified by:   Daniel
 * @Last Modified time: 2016-03-31 19:59:25
 */

namespace ZfMailer\View;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\View\Renderer\PhpRenderer;

class MailRendererFactory implements FactoryInterface
{

  public function createService(ServiceLocatorInterface $serviceLocator)
  {

    $renderer = new PhpRenderer();
    
    $helperManager = $serviceLocator->get('ViewHelperManager');
    $resolver      = $serviceLocator->get('ViewResolver');

    $renderer->setHelperPluginManager($helperManager);
    $renderer->setResolver($resolver);

    $model = $serviceLocator->get('Application')->getMvcEvent()->getViewModel();

    $modelHelper = $renderer->plugin('view_model');
    $modelHelper->setRoot($model);

    return $renderer;

  }

}
