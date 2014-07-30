<?php 

namespace Proyecto\Modelo\Entity;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;


class Cliente extends TableGateway
{
    private $nit;
    private $nombre;
    private $apellido;
    private $telefono;
    private $direccion;

	public function __construct(Adapter $adapter = null, $databaseSchema = null, ResultSet $selectResultPrototype = null)
    {
        return parent::__construct('cliente', $adapter, $databaseSchema,$selectResultPrototype);
    }

    private function cargaAtributos($datos=array())
    {
        $this->nit=$datos["nit"];
        $this->nombre=$datos["nombre"];
        $this->apellido=$datos["apellido"];
        $this->telefono=$datos["telefono"];
        $this->direccion=$datos["direccion"];
    }

    public function getCliente()
    {
       $datos=$this->select();
       return $datos->ToArray();
    }

    //para modificar
    public function getClientePorNit($nit)
    {
        $nit = (int) $nit;
        $rowset = $this->select(array('Nit_cliente' => $nit));

        $row = $rowset->current();
        if(!$row)
        {
            throw new \Exception("No hay registros asociados al valor $id");
        }
        
        return $row;
    }


    public function getClientePorNitAux($nit)
    {
        $nit = (int) $nit;
        $rowset = $this->select(array('Nit_cliente' => $nit));
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

    public function getClientePorNombreAux($nombre)
    {
        $nombre = (String) $nombre;
        $rowset = $this->select(array('Nombre_cliente' => $nombre));
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

    public function addCliente($data=array())
    {
       self::cargaAtributos($data);
       $array=array
       (
            'Nit_cliente'=>$this->nit,
            'Nombre_cliente'=>$this->nombre,
            'Apellido_cliente'=>$this->apellido,
            'Telefono_cliente'=>$this->telefono,
            'Direccion_cliente'=>$this->direccion
        );
       $this->insert($array);
    }

    public function updateCliente($nit, $data)
    {
        $this->update($data, array('Nit_cliente' => $nit));
    }

    public function deleteCliente($nit)
    {
        $this->delete(array('Nit_cliente' => $nit));
    }

}