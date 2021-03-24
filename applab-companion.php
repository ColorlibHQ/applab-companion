<?php
/*
 * Plugin Name:       Applab Companion
 * Plugin URI:        https://colorlib.com/wp/themes/applab/
 * Description:       Applab Companion is a companion for Applab theme.
 * Version:           1.0.1
 * Author:            Colorlib
 * Author URI:        https://colorlib.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       applab-companion
 * Domain Path:       /languages
 */


if( !defined( 'WPINC' ) ){
    die;
}

/*************************
    Define Constant
*************************/

// Define version constant
if( !defined( 'APPLAB_COMPANION_VERSION' ) ){
    define( 'APPLAB_COMPANION_VERSION', '1.1' );
}

// Define dir path constant
if( !defined( 'APPLAB_COMPANION_DIR_PATH' ) ){
    define( 'APPLAB_COMPANION_DIR_PATH', plugin_dir_path( __FILE__ ) );
}

// Define inc dir path constant
if( !defined( 'APPLAB_COMPANION_INC_DIR_PATH' ) ){
    define( 'APPLAB_COMPANION_INC_DIR_PATH', APPLAB_COMPANION_DIR_PATH.'inc/' );
}

// Define sidebar widgets dir path constant
if( !defined( 'APPLAB_COMPANION_SW_DIR_PATH' ) ){
    define( 'APPLAB_COMPANION_SW_DIR_PATH', APPLAB_COMPANION_INC_DIR_PATH.'sidebar-widgets/' );
}

// Define elementor widgets dir path constant
if( !defined( 'APPLAB_COMPANION_EW_DIR_PATH' ) ){
    define( 'APPLAB_COMPANION_EW_DIR_PATH', APPLAB_COMPANION_INC_DIR_PATH.'elementor-widgets/' );
}

// Define demo data dir path constant
if( !defined( 'APPLAB_COMPANION_DEMO_DIR_PATH' ) ){
    define( 'APPLAB_COMPANION_DEMO_DIR_PATH', APPLAB_COMPANION_INC_DIR_PATH.'demo-data/' );
}


$current_theme = wp_get_theme();

$is_parent = $current_theme->parent();



if( ( 'Applab' ==  $current_theme->get( 'Name' ) ) || ( $is_parent && 'Applab' == $is_parent->get( 'Name' ) ) ){
    require_once APPLAB_COMPANION_DIR_PATH . 'applab-init.php';
}else{

    add_action( 'admin_notices', 'applab_companion_admin_notice', 99 );
    function applab_companion_admin_notice() {
        $url = 'https://demo.colorlib.com/applab/';
    ?>
        <div class="notice-warning notice">
            <p><?php printf( __( 'In order to use the <strong>Applab Companion</strong> plugin you have to also install the %1$sApplab Theme%2$s', 'applab-companion' ), '<a href="'.esc_url( $url ).'" target="_blank">', '</a>' ); ?></p>
        </div>
        <?php
    }
}

?>