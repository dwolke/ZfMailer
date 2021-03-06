<?php
/**
 * ZfMailer
 *
 * @author     Daniel Wolkenhauer <hello@dw-labs.de>
 * @copyright  Copyright (c) 1997-2019 Daniel Wolkenhauer
 * @link       http://dw-labs.de/zfmailer
 * @version    3.0.0
 */

namespace ZfMailer\View;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\View\Renderer\PhpRenderer;

/**
* Renderer Factory
* Initilisiert den Renderer
* 
* @package ZfMailer
* @subpackage View
*/
class MailRendererFactory implements FactoryInterface
{

  public function __invoke(ContainerInterface $serviceManager, $requestedName, array $options = null)
  {

    $renderer = new PhpRenderer();
    
    $helperManager = $serviceManager->get('ViewHelperManager');
    $resolver      = $serviceManager->get('ViewResolver');

    $renderer->setHelperPluginManager($helperManager);
    $renderer->setResolver($resolver);

    $model = $serviceManager->get('Application')->getMvcEvent()->getViewModel();

    $modelHelper = $renderer->plugin('view_model');
    $modelHelper->setRoot($model);

    return $renderer;

  }

  /**
   * Create Service Factory
   *
   * @param ServiceLocatorInterface $serviceLocator
   */
  public function createService(ServiceLocatorInterface $serviceLocator)
  {

    // $renderer = new PhpRenderer();
    
    // $helperManager = $serviceLocator->get('ViewHelperManager');
    // $resolver      = $serviceLocator->get('ViewResolver');

    // $renderer->setHelperPluginManager($helperManager);
    // $renderer->setResolver($resolver);

    // $model = $serviceLocator->get('Application')->getMvcEvent()->getViewModel();

    // $modelHelper = $renderer->plugin('view_model');
    // $modelHelper->setRoot($model);

    // return $renderer;
    return $this->__invoke($serviceLocator, null);

  }

}
