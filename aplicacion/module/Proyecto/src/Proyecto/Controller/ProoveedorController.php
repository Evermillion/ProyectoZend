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
use Proyecto\Modelo\Entity\Proveedor;
use Zend\Db\Adapter\Adapter;

class ProoveedorController extends AbstractActionController
{
    public $dbAdapter;
    public function indexAction()
    {
        $this->dbAdapter=$this->getServiceLocator()->get('Zend\Db\Adapter');
        $pro=new Proveedor($this->dbAdapter);
        $datos=$pro->getProveedor();
        $valores=Array(
                'datos'=>$datos,
            );
        return new ViewModel($valores);
    }
    public function agregarAction()
    {
        $this->dbAdapter=$this->getServiceLocator()->get('Zend\Db\Adapter');
        $pro=new Proveedor($this->dbAdapter);
        
        if($this->getRequest()->isPost())
        {
           $data=$this->request->getPost();
           $res=$pro->getProveedorPorNitAux($data['nit']);
           if($res==0)
           {
                $pro->addProveedor($data);
                $form = new Formularios("form");
                $valores=array(
                    'form'=>$form,
                    'url'=>$this->getRequest()->getBaseUrl(),
                    'datos'=>$pro->getProveedor(),
                    'respuesta'=>'Proveedor Registrado Exitosamente'
                );
                return new ViewModel($valores);exit;

           }elseif($res==1)
           {
                $form = new Formularios("form");
                $datos=$pro->getProveedor();
                $valores=array
                (
                    'form'=>$form,
                    'url'=>$this->getRequest()->getBaseUrl(),
                    'datos'=>$datos,
                    'respuesta'=>'Ya exite un Proveedor con el nit '.$data['nit']
                ); 
                return new ViewModel($valores);exit;
           }
        }
        else
        {
            $datos=$pro->getProveedor();
            $form=new Formularios('form');
            $valores=array(
                    'form'=>$form,
                    'url'=>$this->getRequest()->getBaseUrl(),
                    'datos'=>$datos,
                );
            return new ViewModel($valores);
        }
        
    }

    public function modificarAction()
    {
        $form = new Formularios("form");
        return new ViewModel(array('form'=>$form,'url'=>$this->getRequest()->getBaseUrl()));
    }
    public function eliminarAction()
    {
        $form = new Formularios("form");
        return new ViewModel(array('form'=>$form,'url'=>$this->getRequest()->getBaseUrl()));
    }
}
