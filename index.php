<?php
/*
Plugin Name: CVIP Framework
Description: Nueva versión del Framework
Version: 1.0
Author: Colombiavip.com
*/
require __DIR__ . '/vendor/autoload.php';

use Dbout\WpOrm\Orm\Database;

use Illuminate\Container\Container;
use Illuminate\Support\Facades\Facade;

$container = new Container();
$container->instance('db', Database::getInstance());
Facade::setFacadeApplication($container);

use \Illuminate\Support\Facades\DB;



if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}



class CVIP_Framework {
    

    public function __construct() {
        add_action('init', array($this, 'init'));
        add_action('admin_head', array($this, 'admin_head'));
        add_action('wp_head', array($this, 'head'));
    }

    public function init() {
        // Código de inicialización

        // console_log(DB::table('proyectos')->get());
        // console_log(DB::table('proyectos')->whereNombre("proyecto 3")->count());
        if(DB::table('proyectos')->whereNombre("proyecto 3")->count()==0)
        {
            DB::table('proyectos')->insert(
                [
                    'nombre' => "proyecto 1"
                ]
            );        
        }
    }

    public function admin_head() {
        // Código para la cabecera del admin
    }

    public function head() {
        // Código para la cabecera del frontend
    }
}

new CVIP_Framework();
?>