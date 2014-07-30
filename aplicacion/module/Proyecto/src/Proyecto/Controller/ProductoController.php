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
use Proyecto\Modelo\Entity\Producto;
use Zend\Db\Adapter\Adapter;


class ProductoController extends AbstractActionController
{
    public $dbAdapter;

    public function indexAction()
    {
        $this->dbAdapter=$this->getServiceLocator()->get('Zend\Db\Adapter');
        $p=new Producto($this->dbAdapter);
        $tabla=$p->getProducto();
        $valores=array(
            'datos'=>$tabla,
            );
        return new ViewModel($valores);
    }

    public function agregarAction()
    {
        $this->dbAdapter=$this->getServiceLocator()->get('Zend\Db\Adapter');
        $p=new Producto($this->dbAdapter);
        if($this->getRequest()->isPost())
        {
            $data=$this->request->getPost();
            $res=$p->getProductoPorNitAux($data['referencia']);
            if($res==0)//no existe
            {
            $p->addProducto($data);
            $form = new Formularios("form");
            $valores=array
                (
                'form'=>$form,
                'url'=>$this->getRequest()->getBaseUrl(),
                'datos'=>$p->getProducto(),//selct * from 
                'respuesta'=>'Producto registrado exitosamente'
                );
                return new ViewModel($valores);exit;
            }
            elseif($res==1)
            {
                $form = new Formularios("form");
                $valores=array
                    (
                    'form'=>$form,
                    'url'=>$this->getRequest()->getBaseUrl(),
                    'datos'=>$p->getProducto(),//selct * from 
                    'respuesta'=>'Ya exite un producto con la referencia '.$data['referencia']
                    ); 
                    return new ViewModel($valores);exit;
            }
        }
        else
        {
            $tabla=$p->getProducto();
            $form = new Formularios("form");
            $valores=array
                (
                'form'=>$form,
                'url'=>$this->getRequest()->getBaseUrl(),
                'datos'=>$tabla
                );
            return new ViewModel($valores);//exit;
        }
    }

    public function modificarAction()
    {
        $form = new Formularios("form");
        return new ViewModel(array('form'=>$form,'url'=>$this->getRequest()->getBaseUrl()));
    }

    public function eliminarAction()
    {
        $this->dbAdapter=$this->getServiceLocator()->get('Zend\Db\Adapter');
        $p=new Producto($this->dbAdapter);
        if($this->getRequest()->isPost())
        {
            $data=$this->request->getPost();
            $ref=$data['referencia'];
            $aux=$p->getProductoPorNitAux($ref);
            $form = new Formularios("form");
            if($aux==1)
            {
                $p->deleteProducto($ref);
                $mensaje='Se ha eliminado el producto con la referencia '.$ref;
                $valores=array(
                    'form'=>$form,
                    'url'=>$this->getRequest()->getBaseUrl(),
                    'mensaje'=>$mensaje,
                );
                return new ViewModel($valores);exit;
            }
            elseif($aux==0)
            {
                $mensaje='No existe el producto con la referencia '.$ref;
                $valores=array(
                        'form'=>$form,
                        'url'=>$this->getRequest()->getBaseUrl(),
                        'mensaje'=>$mensaje, 
                    );
                return new ViewModel($valores);exit;
            }
        }
        else
        {
            $form = new Formularios("form");
            $valores=array(
            'form'=>$form,
            'url'=>$this->getRequest()->getBaseUrl(),
            );
            return new ViewModel($valores);
        }

    }

    public function surtirAction()
    {
        $form = new Formularios("form");
        return new ViewModel(array('form'=>$form,'url'=>$this->getRequest()->getBaseUrl()));
    }
}

