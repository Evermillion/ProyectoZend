<?php 
namespace Proyecto\Form;

use Zend\Captcha\AdapterInterface as CaptchaAdapter;
use Zend\Captcha;
use Zend\Form\Element;
use Zend\Form\Factory;
use Zend\Form\Form;

class Formularios extends Form
{
	protected $dbAdapter;
	function __construct($name = null) {
			parent::__construct($name);

		$this->add(array(
					'name'=>'nombre',
					'options'=>array(
							'label'=>'Nombre : '
						),
					'attributes'=>array(
							'type'=>'text',
							'placeholder'=>'Ingrese nombre',
							'required'=>'required'
						),
				));

		$this->add(array(
					'name'=>'apellido',
					'options'=>array(
							'label'=>'Apellido : '
						),
					'attributes'=>array(
							'type'=>'text',
							'placeholder'=>'Ingrese Apelldio',
							'required'=>'required'
						),
				));

		$this->add(array(
					'name'=>'direccion',
					'options'=>array(
							'label'=>'Direccion : '
						),
					'attributes'=>array(
							'type'=>'text',
							'placeholder'=>'Ingrese Direccion',
						),
				));

		$this->add(array(
					'name'=>'telefono',
					'options'=>array(
							'label'=>'Telefono : '
						),
					'attributes'=>array(
							'type'=>'number',
							'placeholder'=>'Ingrese Telefono',
							'required'=>'required',
							'Filter'=>'int'
						),
				));

		$this->add(array(
					'name'=>'nit',
					'options'=>array(
							'label'=>'Nit : '
						),
					'attributes'=>array(
							'type'=>'number',
							'placeholder'=>'Ingrese Nit',
							'required'=>'required',
							'Filter'=>'int'
						),
				));
		
		$this->add(array(
					'name'=>'referencia',
					'options'=>array(
							'label'=>'Referencia : '
						),
					'attributes'=>array(
							'type'=>'text',
							'placeholder'=>'Ingrese Referencia',
							'required'=>'required'
						),
				));

		$this->add(array(
					'name'=>'precioProducto',
					'options'=>array(
							'label'=>'Precio : '
						),
					'attributes'=>array(
							'type'=>'number',
							'placeholder'=>'Ingrese Precio',
							'required'=>'required'
						),
				));

		$this->add(array(
					'name'=>'existencia',
					'options'=>array(
							'label'=>'Existencia : '
						),
					'attributes'=>array(
							'type'=>'number',
							'placeholder'=>'Ingrese la Cantidad',
							'required'=>'required'
						),
				));

		$this->add(array(
					'name'=>'btnSubmit',
					
					'attributes'=>array(
							'type'=>'Submit',
							'value'=>'Enviar',
							'id'=>'btnSubmit',
						),
				));

		$select = new Element\Select('categoria');
	    $select->setLabel('Categoria : ');
	    $select->setEmptyOption('Seleccione...');
	    $select->setAttributes(array('required'=>'true'));
	    $select->setValueOptions(array(
	            '0' => 'Bolso Dama',
	            '1' => 'Billetera',
	            '2' => 'Peluche',
	            '3' => 'Carriel',
	    ));
	    $this->add($select);

	    $select2 = new Element\Select('buscarPor');
	    $select2->setLabel('Buscar por : ');
	    $select2->setEmptyOption('Seleccione...');
	    $select2->setAttributes(array('required'=>'true'));
	    $select2->setValueOptions(array(
	            '0' => 'Identificacion',
	            '1' => 'Nombre',
	    ));
	    $this->add($select2);

	    $this->add(array(
					'name'=>'busqueda',
					'options'=>array(
							'label'=>'Ingrese nit : '
						),
					'attributes'=>array(
							'type'=>'text',
							'placeholder'=>'Ingrese datos',
							'required'=>'required'
						),
				));


	}


}	
?>