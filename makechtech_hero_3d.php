<?php

/*

Plugin Name: Hero 3D Section

Plugin URI: https://makechtec.online

Description: simple hero 3D section

Author: Makech Technology

Version: 1.0.0

Author URI:https://makechtec.online

License: GPL-2.0+

License URI: http://www.gnu.org/licenses/gpl-2.0.txt

*/

use MakechTech\Software\Hero3DSection;

require_once 'vendor/autoload.php';

global $MAKECHTECH_HERO_3D_PLUGIN_DIR_PATH;

$MAKECHTECH_HERO_3D_PLUGIN_DIR_PATH = plugin_dir_path( __FILE__ );

global $MAKECHTECH_HERO_3D_PLUGIN_DIR_URL;

$MAKECHTECH_HERO_3D_PLUGIN_DIR_URL = plugin_dir_url( __FILE__ );


if(!function_exists("makechtech_hero_3d")){
    function makechtech_register_hero_3d($widgets_manager){

        global $MAKECHTECH_HERO_3D_PLUGIN_DIR_URL;

        $widgets_manager->register(new Hero3DSection());

        $stylesheet = $MAKECHTECH_HERO_3D_PLUGIN_DIR_URL."/assets/index.css";
        $script = $MAKECHTECH_HERO_3D_PLUGIN_DIR_URL."/assets/index.js";

        $poppinsFontUrl = "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap";
        wp_enqueue_style("font_poppins", $poppinsFontUrl, array(), false, false);
        wp_enqueue_style("makechtech_hero_3d", $stylesheet, ["font_poppins"], false, false);
        wp_enqueue_script("makechtech_hero_3d", $script, array(), false, true);
    }
}

add_action( 'elementor/widgets/register', 'makechtech_register_hero_3d' );