<?php
require_once 'core/231018libreriaValidacion.php';
require_once 'model/Usuario.php';
require_once 'model/UsuarioDB.php';
require_once 'model/UsuarioPDO.php';
require_once 'model/DBPDO.php';
require_once 'model/ErrorApp.php';
require_once 'model/REST.php';
require_once 'model/FotoNasa.php';

$controller=[
    'inicioPublico' => 'controller/cInicioPublico.php',
    'inicioPrivado' => 'controller/cInicioPrivado.php',
    'login' => 'controller/cLogin.php',
    'detalle' => 'controller/cDetalle.php',
    'error' => 'controller/cError.php',
    'wip' => 'controller/cWip.php',
    'rest' => 'controller/cRest.php',
    'mantenimientoDepartamentos' => 'controller/cMantenimientoDepartamentos.php'
];
        
$view=[
    'layout' => 'view/layout.php',
    'inicioPublico' => 'view/vInicioPublico.php',
    'inicioPrivado' => 'view/vInicioPrivado.php',
    'login' => 'view/vLogin.php',
    'detalle' => 'view/vDetalle.php',
    'error' => 'view/vError.php',
    'wip' => 'view/vWip.php',
    'rest' => 'view/vRest.php',
    'mantenimientoDepartamentos' => 'view/vMantenimientoDepartamentos.php'
];

