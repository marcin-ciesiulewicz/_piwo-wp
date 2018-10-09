<?php

/**
 *  Functions
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * 
 * @package Beer theme
 * 
 */

//walker
require_once get_template_directory() . '/inc/walker.php';

//customizer-sections

require_once get_template_directory() . '/inc/customizer-sections.php';

//theme_support
require_once get_template_directory() . '/inc/theme-support.php';

//enqueue
require_once get_template_directory() . '/inc/eqnqueue.php';
