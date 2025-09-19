<?php
/**
 * Template Name: Página Legales
 * Description: Plantilla personalizada para las páginas de contenido legal (aviso legal, política de privacidad, etc.)
 */

get_header(); // Cargar el encabezado del tema
?>
<section>
	<h1><?php the_title(); ?></h1>

				<?php
			   
	if(have_posts()) {
		the_post();

		the_content();
	}
				?>
<section>
<?php
get_footer(); // Cargar el pie de página del tema
?>
