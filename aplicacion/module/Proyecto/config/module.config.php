<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'inicio' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Proyecto\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'cliente'   => array(
                'type'      => 'Segment',
                'options'   => array(
                    'route'     => '/cliente',
                    'defaults'  => array(
                        'controller'    => 'Proyecto\Controller\Cliente',
                        'action'        => 'index',
                    ),
                ),
            ),
            'cliente_agrega'   => array(
                'type'      => 'Segment',
                'options'   => array(
                    'route'     => '/cliente/agrega',
                    'defaults'  => array(
                        'controller'    => 'Proyecto\Controller\Cliente',
                        'action'        => 'agregar',
                    ),
                ),
            ),
            'cliente_modificar'   => array(
                'type'      => 'Segment',
                'options'   => array(
                    'route'     => '/cliente/modifica',
                    'defaults'  => array(
                        'controller'    => 'Proyecto\Controller\Cliente',
                        'action'        => 'modificar',
                    ),
                ),
            ),
            'cliente_modificar_id'   => array(
                'type'      => 'Segment',
                'options'   => array(
                    'route'     => '/cliente/modifica/id',
                    'defaults'  => array(
                        'controller'    => 'Proyecto\Controller\Cliente',
                        'action'        => 'modificaid',
                    ),
                ),
            ),
            'cliente_eliminar'   => array(
                'type'      => 'Segment',
                'options'   => array(
                    'route'     => '/cliente/elimina',
                    'defaults'  => array(
                        'controller'    => 'Proyecto\Controller\Cliente',
                        'action'        => 'eliminar',
                    ),
                ),
            ),
            'productos'   => array(
                'type'      => 'Segment',
                'options'   => array(
                    'route'     => '/producto',
                    'defaults'  => array(
                        'controller'    => 'Proyecto\Controller\Producto',
                        'action'        => 'index',
                    ),
                ),
            ),
            'producto_agrega'   => array(
                'type'      => 'Segment',
                'options'   => array(
                    'route'     => '/producto/agrega',
                    'defaults'  => array(
                        'controller'    => 'Proyecto\Controller\Producto',
                        'action'        => 'agregar',
                    ),
                ),
            ),
            'producto_modificar'   => array(
                'type'      => 'Segment',
                'options'   => array(
                    'route'     => '/producto/modifica',
                    'defaults'  => array(
                        'controller'    => 'Proyecto\Controller\Producto',
                        'action'        => 'modificar',
                    ),
                ),
            ),
            'producto_eliminar'   => array(
                'type'      => 'Segment',
                'options'   => array(
                    'route'     => '/producto/elimina',
                    'defaults'  => array(
                        'controller'    => 'Proyecto\Controller\Producto',
                        'action'        => 'eliminar',
                    ),
                ),
            ),
            'producto_surtir'   => array(
                'type'      => 'Segment',
                'options'   => array(
                    'route'     => '/producto/surtir',
                    'defaults'  => array(
                        'controller'    => 'Proyecto\Controller\Producto',
                        'action'        => 'surtir',
                    ),
                ),
            ),
            'prooveedor'   => array(
                'type'      => 'Segment',
                'options'   => array(
                    'route'     => '/prooveedor',
                    'defaults'  => array(
                        'controller'    => 'Proyecto\Controller\Prooveedor',
                        'action'        => 'index',
                    ),
                ),
            ),
            'prooveedor_agrega'   => array(
                'type'      => 'Segment',
                'options'   => array(
                    'route'     => '/proveedor/agrega',
                    'defaults'  => array(
                        'controller'    => 'Proyecto\Controller\Prooveedor',
                        'action'        => 'agregar',
                    ),
                ),
            ),
            'prooveedor_modificar'   => array(
                'type'      => 'Segment',
                'options'   => array(
                    'route'     => '/prooveedor/modifica',
                    'defaults'  => array(
                        'controller'    => 'Proyecto\Controller\Prooveedor',
                        'action'        => 'modificar',
                    ),
                ),
            ),
            'prooveedor_eliminar'   => array(
                'type'      => 'Segment',
                'options'   => array(
                    'route'     => '/prooveedor/elimina',
                    'defaults'  => array(
                        'controller'    => 'Proyecto\Controller\Prooveedor',
                        'action'        => 'eliminar',
                    ),
                ),
            ),
            'empleado'   => array(
                'type'      => 'Segment',
                'options'   => array(
                    'route'     => '/empleado',
                    'defaults'  => array(
                        'controller'    => 'Proyecto\Controller\Empleado',
                        'action'        => 'index',
                    ),
                ),
            ),
            'empleado_agrega'   => array(
                'type'      => 'Segment',
                'options'   => array(
                    'route'     => '/empleado/agrega',
                    'defaults'  => array(
                        'controller'    => 'Proyecto\Controller\Empleado',
                        'action'        => 'agregar',
                    ),
                ),
            ),
            'empleado_modificar'   => array(
                'type'      => 'Segment',
                'options'   => array(
                    'route'     => '/empleado/modifica',
                    'defaults'  => array(
                        'controller'    => 'Proyecto\Controller\Empleado',
                        'action'        => 'modificar',
                    ),
                ),
            ),
            'empleado_eliminar'   => array(
                'type'      => 'Segment',
                'options'   => array(
                    'route'     => '/empleado/elimina',
                    'defaults'  => array(
                        'controller'    => 'Proyecto\Controller\Empleado',
                        'action'        => 'eliminar',
                    ),
                ),
            ),
            'facturacion'   => array(
                'type'      => 'Segment',
                'options'   => array(
                    'route'     => '/facturacion',
                    'defaults'  => array(
                        'controller'    => 'Proyecto\Controller\Facturacion',
                        'action'        => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            /*'proyecto' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/proyecto',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Proyecto\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),*/
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Proyecto\Controller\Index' => 'Proyecto\Controller\IndexController',
            'Proyecto\Controller\Cliente' => 'Proyecto\Controller\ClienteController',
            'Proyecto\Controller\Producto' => 'Proyecto\Controller\ProductoController',
            'Proyecto\Controller\Prooveedor' => 'Proyecto\Controller\ProoveedorController',
            'Proyecto\Controller\Facturacion' => 'Proyecto\Controller\FacturacionController',
            'Proyecto\Controller\Empleado' => 'Proyecto\Controller\EmpleadoController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/principal.phtml',
            'proyecto/index/index' => __DIR__ . '/../view/proyecto/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
