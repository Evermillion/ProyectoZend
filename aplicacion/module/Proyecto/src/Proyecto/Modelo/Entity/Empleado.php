<?php 

namespace Proyecto\Modelo\Entity;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;


class Empleado extends TableGateway
{

	public function __construct(Adapter $adapter = null, $databaseSchema = null, ResultSet $selectResultPrototype = null)
    {
        return parent::__construct('usuarios', $adapter, $databaseSchema,$selectResultPrototype);
    }

    public function getUsuarios()
    {
       $datos=$this->select();
       return $datos->ToArray();
    }

    //para modificar
    public function getUsuarioPorId($id)
    {
        $id = (int) $id;
        $rowset = $this->select(array('Id_Usuario' => $id));
        $row = $rowset->current();
        if(!$row)
        {
            throw new \Exception("No hay registros asociados al valor $id");
        }
        
        return $row;
    }

    public function addUsuarios($data=array())
    {
       $this->insert($data);
    }

    public function updateUsuarios($id, $data=array())
    {
        $this->update($data, array('nit' => $id));
    }

    public function deleteUsuarios($id)
    {
        $this->delete(array('nit' => $id));
    }

}