<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;


$db['default'] = [
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'db_ventas',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => true,
    'db_debug'  => (ENVIRONMENT !== 'production'),
    'cache_on'  => TRUE,
    'cachedir'  => TRUE,
    'char_set'  => 'utf8',
    'dbcollat'  => 'utf8_general_ci',
    'swap_pre'  => '',
    'autoinit'  => TRUE,
    'stricton'  => FALSE
];

