<?php 

namespace Proyecto\Modelo\Entity;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;


class Producto extends TableGateway
{
	private $referencia;
    private $categoria;
    private $precioProducto;
    private $existencia;

    public function __construct(Adapter $adapter = null, $databaseSchema = null, ResultSet $selectResultPrototype = null)
    {
        return parent::__construct('producto', $adapter, $databaseSchema,$selectResultPrototype);
    }

    private function cargaAtributos($datos=array())
    {
        $this->referencia=$datos["referencia"];
        $this->categoria=$datos["categoria"];
        $this->precioProducto=$datos["precioProducto"];
        $this->existencia=$datos["existencia"];
    }

    public function getProducto()
    {
       $datos=$this->select();
       return $datos->ToArray();
    }

    //para modificar
    public function getProductoPorNit($ref)
    {
        $ref = (String) $ref;
        $rowset = $this->select(array('Referencia_producto' => $ref));
        $row = $rowset->current();
        if(!$row)
        {
            throw new \Exception("No hay registros asociados al valor $id");
        }
        
        return $row;
    }

    public function getProductoPorNitAux($ref)
    {
        $ref = (String) $ref;
        $rowset = $this->select(array('Referencia_producto' => $ref));
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

    public function addProducto($data=array())
    {
       self::cargaAtributos($data);
       $array=array
       (
            'Referencia_producto'=>$this->referencia,
            'Categoria_Id_Categoria'=>$this->categoria,
            'Precio_producto'=>$this->precioProducto,
            'Existencia_producto'=>$this->existencia,
        );
       $this->insert($array);
    }

    public function updateProducto($ref, $data=array())
    {
        $this->update($data, array('Referencia_producto' => $ref));
    }

    public function deleteProducto($ref)
    {
        $this->delete(array('Referencia_producto' => $ref));
    }

}