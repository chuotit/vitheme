<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
define('HOME_URL', trailingslashit(home_url()));
define('VI_THEME_DIR', trailingslashit(get_template_directory()));
define('VI_THEME_URI', trailingslashit(get_template_directory_uri()));
define('VI_THEME_FRAMEWORK_DIR', VI_THEME_DIR . 'framework/');
define('VI_THEME_FRAMEWORK_LIBS_DIR', VI_THEME_FRAMEWORK_DIR . 'libs/');
define('VI_THEME_INC_DIR', VI_THEME_DIR . 'inc/');


//add redux theme option
if( !class_exists( 'ReduxFramewrk' ) ) {
	require_once( VI_THEME_FRAMEWORK_LIBS_DIR . 'reduxcore/framework.php');
}


if ( is_admin() ) {
	require VI_THEME_INC_DIR . 'admin/plugins-require.php';
}
?>