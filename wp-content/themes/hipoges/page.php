<?php
/**
 * Plantilla para mostrar el contenido de una página.
 */
 
// Cabecera
get_header();

if(have_posts()) {
	the_post();

	the_content();
}

// Footer
get_footer();
