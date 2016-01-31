<?php
/**
 * The template for displaying the events archive.
 *
 * Redirect to the homepage for now
 *
 * @package uxrennes-theme
 *
 * @todo Develop a real template for this page
 *
**/

$protocol = "HTTP/1.0";
header("$protocol 302 Moved Temporarily", true, 302 );
header("Location: ". get_bloginfo('url'));
exit();

?>