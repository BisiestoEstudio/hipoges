<?php
/**
 * Plantilla para mostrar el contenido del post.
 */

// Cabecera
get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post();

        $titular = get_the_title();
        $imagen_fondo_url = has_post_thumbnail() ? get_the_post_thumbnail_url() : '';
        $fecha_publicacion = get_the_date('j F Y'); // Formato de fecha

        // Solo mostrar el section si el post type es 'post'
        if ( get_post_type() === 'post' ) : ?>
            <section
                style="background-color: transparent;<?php if($imagen_fondo_url) : ?> background-image: url('<?php echo esc_url($imagen_fondo_url); ?>'); background-size: cover; background-position: center right;<?php endif; ?>"
                class="boxed-hero">
                <div class="hip-hero-post hip-module">
                    <div class="hip-hero-container hip-container">
                        <?php if ($titular) : ?>
                            <h1 class="hip-titular"><?php echo esc_html($titular); ?></h1>
                        <?php endif; ?>
                        <div class="hip-hero-fecha"><?php echo esc_html($fecha_publicacion); ?></div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <div class="hip-post-content">
            <?php the_content(); ?>
        </div>
        <?php

    endwhile;
endif;

// Footer
get_footer();
?>
