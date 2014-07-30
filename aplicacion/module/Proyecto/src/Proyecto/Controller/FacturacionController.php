<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Proyecto\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Proyecto\Form\Formularios;
use Proyecto\Modelo\Entity\Factura;
use Zend\Db\Adapter\Adapter;

class FacturacionController extends AbstractActionController
{
    public $dbAdapter;
    public function indexAction()
    {
        $this->dbAdapter=$this->getServiceLocator()->get('Zend\Db\Adapter');
        $f=new Factura($this->dbAdapter);
        $form = new Formularios("form");
            $valores=array
            (
                'form'=>$form,
                'url'=>$this->getRequest()->getBaseUrl(),     
            );
        return new ViewModel($valores);
    }
}
