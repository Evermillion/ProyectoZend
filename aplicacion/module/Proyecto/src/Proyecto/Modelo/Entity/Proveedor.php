<?php 

namespace Proyecto\Modelo\Entity;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;


class Proveedor extends TableGateway
{
	public function __construct(Adapter $adapter = null, $databaseSchema = null, ResultSet $selectResultPrototype = null)
    {
        return parent::__construct('proveedor', $adapter, $databaseSchema,$selectResultPrototype);
    }

    private function cargaAtributos($datos=array())
    {
        $this->nit=$datos["nit"];
        $this->nombre=$datos["nombre"];
        $this->apellido=$datos["apellido"];
        $this->telefono=$datos["telefono"];
        $this->direccion=$datos["direccion"];
    }

    public function getProveedor()
    {
       $datos=$this->select();
       return $datos->ToArray();
    }

    //para modificar
    public function getProveedorPorNit($nit)
    {
        $nit = (int) $nit;
        $rowset = $this->select(array('Id_Proveedor' => $nit));
        $row = $rowset->current();
        if(!$row)
        {
            throw new \Exception("No hay registros asociados al valor $id");
        }
        
        return $row;
    }

    public function getProveedorPorNitAux($nit)
    {
        $nit = (int) $nit;
        $rowset = $this->select(array('Id_Proveedor' => $nit));
        $row = $rowset->current();
        if(!$row)
        {
            //throw new \Exception("No hay registros asociados al valor $id");
            $respuesta=0;
        }
        else
        {
          $respuesta=1;  
        }
        return $respuesta;
    }

    public function addProveedor($data=array())
    {
       self::cargaAtributos($data);
       $array=array(
            'Id_Proveedor'=>$this->nit,
            'Nombre_Proveedor'=>$this->nombre,
            'Apellido_Proveedor'=>$this->apellido,
            'Direccion_Proveedor'=>$this->direccion,
            'Telefono_Proveedor'=>$this->telefono,
        );
       $this->insert($array);
    }

    public function updateProveedor($nit, $data=array())
    {
        $this->update($data, array('Id_Proveedor' => $nit));
    }

    public function deleteProveedor($nit)
    {
        $this->delete(array('Id_Proveedor' => $nit));
    }

}