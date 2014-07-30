<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Inicio',
                'route' => 'inicio',
            ),
            array(
                'label' => 'Cliente',
                'route' => 'cliente',
                'pages' => array(
                    array(
                        'label' => 'Agregar Cliente',
                		'route' => 'cliente_agrega',
                    ),
                    array(
                        'label' => 'Modificar Cliente',
                 		'route' => 'cliente_modificar',
                    ),
                    array(
                        'label' => 'Eliminar Cliente',
                 		'route' => 'cliente_eliminar',
                    ),
                ),
            ),
            array(
                'label' => 'Productos',
                'route' => 'productos',
                'pages' => array(
                    array(
                        'label' => 'Agregar Producto',
                		'route' => 'producto_agrega',
                    ),
                    array(
                        'label' => 'Modificar Producto',
                 		'route' => 'producto_modificar',
                    ),
                    array(
                        'label' => 'Eliminar Producto',
                 		'route' => 'producto_eliminar',
                    ),
                    array(
                        'label' => 'Surtir Productos',
                        'route' => 'producto_surtir',
                    ),
                ),
            ),
            array(
                'label' => 'Proveedores',
                'route' => 'prooveedor',
                'pages' => array(
                    array(
                        'label' => 'Agregar prooveedor',
                		'route' => 'prooveedor_agrega',
                    ),
                    array(
                        'label' => 'Modificar prooveedor',
                 		'route' => 'prooveedor_modificar',
                    ),
                    array(
                        'label' => 'Eliminar prooveedor',
                 		'route' => 'prooveedor_eliminar',
                    ),
                ),
            ),
            array(
                'label' => 'Empleados',
                'route' => 'empleado',
                'pages' => array(
                    array(
                        'label' => 'Agregar Empleado',
                		'route' => 'empleado_agrega',
                    ),
                    array(
                        'label' => 'Modificar Empleado',
                 		'route' => 'empleado_modificar',
                    ),
                    array(
                        'label' => 'Eliminar Empleado',
                 		'route' => 'empleado_eliminar',
                    ),
                ),
            ),
            array(
                'label' => 'Facturacion',
                'route' => 'facturacion',
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
           'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
        ),
    ),
);
