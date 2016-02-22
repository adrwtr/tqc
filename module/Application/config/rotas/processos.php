<?
return array(
    'type' => 'Zend\Mvc\Router\Http\Literal',
    'options' => array(
        'route'    => '/processos',
        'defaults' => array(
            'controller' => 'Application\Controller\Processo',
            'action'     => 'index',
        ),
    ),
    'may_terminate' => true,
    'child_routes' => array(
        'lista' => array(
            'type'    => 'Segment',
            'options' => array(
                'route'    => '/lista',
                'defaults' => array(
                    'controller' => 'Application\Controller\Processo',
                    'action'     => 'lista',
                ),
            ),
        ),
        'formulario' => array(
            'type'    => 'Segment',
            'options' => array(
                'route'    => '/formulario',
                'defaults' => array(
                    'controller' => 'Application\Controller\Processo',
                    'action'     => 'formulario',
                ),
            ),
        ),

        'persistir' => array(
            'type'    => 'Segment',
            'options' => array(
                'route'    => '/persistir',
                'defaults' => array(
                    'controller' => 'Application\Controller\Processo',
                    'action'     => 'persistir',
                ),
            ),
        ),

        'visualizar' => array(
            'type'    => 'Segment',
            'options' => array(
                'route'    => '/visualizar',
                'defaults' => array(
                    'controller' => 'Application\Controller\Processo',
                    'action'     => 'visualizar',
                ),
            ),
        ),

        'excluir' => array(
            'type'    => 'Segment',
            'options' => array(
                'route'    => '/excluir',
                'defaults' => array(
                    'controller' => 'Application\Controller\Processo',
                    'action'     => 'excluir',
                ),
            ),
        ),
    ),
);
?>