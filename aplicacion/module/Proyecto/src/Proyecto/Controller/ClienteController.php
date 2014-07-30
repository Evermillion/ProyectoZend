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
use Proyecto\Modelo\Entity\Cliente;
use Zend\Db\Adapter\Adapter;


class ClienteController extends AbstractActionController
{
    public $dbAdapter;
    public function indexAction()
    {
        $this->dbAdapter=$this->getServiceLocator()->get('Zend\Db\Adapter');
        $c=new Cliente($this->dbAdapter);
        $datos=$c->getCliente();

       return new ViewModel(array('datos'=>$datos));
    }
    public function agregarAction()
    {
        $this->dbAdapter=$this->getServiceLocator()->get('Zend\Db\Adapter');
        $c=new Cliente($this->dbAdapter);
        
        if($this->getRequest()->isPost())
        {
            $data=$this->request->getPost();
            $res=$c->getClientePorNitAux($data['nit']);
            if($res==0)//no existe
            {
            $c->addCliente($data);
            $form = new Formularios("form");
            $valores=array(
                'form'=>$form,
                'url'=>$this->getRequest()->getBaseUrl(),
                'datos'=>$c->getCliente(),//selct * from 
                'respuesta'=>'Cliente Registrado Exitosamente'
                );
                return new ViewModel($valores);exit;
            }elseif($res==1)
            {
                $form = new Formularios("form");
                $valores=array
                (
                    'form'=>$form,
                    'url'=>$this->getRequest()->getBaseUrl(),
                    'datos'=>$c->getCliente(),//selct * from 
                    'respuesta'=>'Ya exite un cliente con el nit '.$data['nit']
                ); 
                return new ViewModel($valores);exit;
            }
        }else
        {
            $datos=$c->getCliente();
            $form = new Formularios("form");
            $valores=array
            (
                'form'=>$form,
                'url'=>$this->getRequest()->getBaseUrl(), 
                'datos'=>$datos,    
            );
            return new ViewModel($valores); 
        }
    }

    public function modificarAction()
    {
        $this->dbAdapter=$this->getServiceLocator()->get('Zend\Db\Adapter');
        $c=new Cliente($this->dbAdapter);

        if($this->getRequest()->isPost())
        {
            $data=$this->request->getPost();
            $aux2=$data['busqueda'];
            $res=$c->getClientePorNitAux($aux2);//busca al cliente por identificacion
            if($res==0)//no existe el cliente
            {
                $mensaje="El cliente con el nit ".$aux2." no existe.";
                $form = new Formularios("form");
                $valores=array(
                'form'=>$form,
                'url'=>$this->getRequest()->getBaseUrl(),
                'mensaje'=>$mensaje
                );
                return new ViewModel($valores);
            }
            elseif($res==1)//existe el cliente
            {
                $datos=$c->getClientePorNit($aux2);
                //$this->redirect()->toRoute('cliente_modificar_id');
                $mensaje ="Si existe el cliente ";
                $form = new Formularios("form");
                $nativo='   
                        <form action="/Proyect/Dolly/aplicacion/public/cliente/modifica/id" method="post" name="form" id="form">
                            <div>
                            <label>Nit : </label><input name="nit" type="text" placeholder="Ingrese Nit" value="'.$datos["Nit_cliente"].'" readonly></div>

                            <div>
                            <label>Nombre : </label><input name="nombre" type="text" placeholder="Ingrese nombre" required="required" value="'.$datos["Nombre_cliente"].'"></div>

                            <div>
                            <label>Apellido : </label><input name="apellido" type="text" placeholder="Ingrese Apelldio" required="required" value="'.$datos["Apellido_cliente"].'"></div>

                            <div>
                            <label>Telefono : </label><input name="telefono" type="text" placeholder="Ingrese Telefono" required="required" value="'.$datos["Telefono_cliente"].'"></div>

                            <div>
                            <label>Direccion : </label><input name="direccion" type="text" placeholder="Ingrese Direccion" value="'.$datos["Direccion_cliente"].'"></div>

                            <div>
                            <input name="btnmodificaid" type="submit" id="btnSubmit" value="Enviar"></div>
                        </form>';
                $valores=array(
                    'form'=>$form,
                    'url'=>$this->getRequest()->getBaseUrl(),
                    'mensaje'=>$mensaje,
                    'bd' => $datos,
                    'nativo'=> $nativo,
                );
                return new ViewModel($valores);
            }
        }    
        else
        {
            $datos=$c->getCliente();
            $form = new Formularios("form");
            $valores=array(
                'form'=>$form,
                'url'=>$this->getRequest()->getBaseUrl(),
                'datos'=>$datos
            );
            return new ViewModel($valores);
        }
        
    }


    public function modificaidAction(){
        $this->dbAdapter=$this->getServiceLocator()->get('Zend\Db\Adapter');
        $c=new Cliente($this->dbAdapter);
        $data=$this->request->getPost();
        $datos_modif=array(
            'Nombre_cliente'=>$data['nombre'],
            'Apellido_cliente'=>$data['apellido'],
            'Telefono_cliente'=>$data['telefono'],
            'Direccion_cliente'=>$data['direccion'],
            );
        $c->updateCliente($data['nit'],$datos_modif);
        $datos=$c->getCliente();
        $valores=array(
                'clientes' => $datos,
                'url'=>$this->getRequest()->getBaseUrl(),
                'cliente_modificado' =>$datos_modif,
            );
        //$this->redirect()->toRoute('cliente_agrega');
        return new ViewModel($valores);

    }

    public function eliminarAction()
    {
        //encargarse de lo el recharge       
        $this->dbAdapter=$this->getServiceLocator()->get('Zend\Db\Adapter');
        $c=new Cliente($this->dbAdapter);

        if($this->getRequest()->isPost())
        {
            $tabla=$c->getCliente();
            $data=$this->request->getPost();
            $aux=$data['nit'];
            $aux2=$c->getClientePorNitAux($aux);
            $form = new Formularios("form");
            if($aux2==1)
            {
                $c->deleteCliente($aux);
                $mensaje='Se a eliminado el cliente con la identificacion '.$aux;
                    $valores=array(
                    'form'=>$form,
                    'url'=>$this->getRequest()->getBaseUrl(),
                    'mensaje'=>$mensaje, 
                    'datos'=>$tabla
                );
                return new ViewModel($valores);exit;     
            }
        elseif($aux2==0)
        {
            $tabla=$c->getCliente();
            $mensaje='No existe ningun cliente con la identificacion '.$aux;
            $valores=array(
            'form'=>$form,
            'url'=>$this->getRequest()->getBaseUrl(),
            'mensaje'=>$mensaje, 
            'datos'=>$tabla
            );
            return new ViewModel($valores);exit; 
        }
        }
        else
        {
            $tabla=$c->getCliente();
            $form = new Formularios("form");
            $valores=array(
            'form'=>$form,
            'url'=>$this->getRequest()->getBaseUrl(),
            'datos'=>$tabla
            );
            return new ViewModel($valores);
        }
        
    }
}