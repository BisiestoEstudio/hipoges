<?php

include(plugin_dir_path( __FILE__) . 'includes/config.php');
include(plugin_dir_path( __FILE__) . 'includes/extras.php');
include(plugin_dir_path( __FILE__) . 'includes/blocks.php');


/********************************************************
CONSTANTES
 ********************************************************/
define('WORDPYCAT_PATH', plugin_dir_path( __FILE__ ));      //slash at the end
define('WORDPYCAT_URL', get_template_directory_uri() . '/');  //slash at the end

/*
 * Añade JS y CSS al tema
 */
add_action('wp_enqueue_scripts', 'registrar_jscss');
function registrar_jscss(){
	$version = '1.0.0';

	// Añadimos las hojas de estilos
	// wp_enqueue_style('simple', get_template_directory_uri() . '/recursos/css/simple.min.css', array(), $version);
	wp_enqueue_style('bloques', get_template_directory_uri() . '/recursos/css/bloques.css', array(), $version);
	wp_enqueue_style('style', get_stylesheet_uri(), array(), $version);

	// Añadimos los archivos JavaScript
	wp_enqueue_script('app', get_template_directory_uri() . '/recursos/js/app.js', array(), $version, true);

}

/*
 * Añade JS y CSS al editor de Gutenberg
 */
function enqueue_dynamic_styles() {
  $style_url = get_template_directory_uri() . '/style-vars.php';

  // Frontend
  wp_enqueue_style('dynamic-styles', $style_url, [], null);
}
add_action('wp_enqueue_scripts', 'enqueue_dynamic_styles', 1);

function enqueue_dynamic_styles_editor() {
  $style_url = get_template_directory_uri() . '/style-vars.php';

  // Gutenberg editor
  wp_enqueue_style('dynamic-styles-editor', $style_url, [], null);
}
add_action('enqueue_block_editor_assets', 'enqueue_dynamic_styles_editor');

function allow_custom_fonts($mimes) {
  $mimes['ttf']  = 'font/ttf';
  $mimes['woff'] = 'font/woff';
  $mimes['woff2'] = 'font/woff2';
  return $mimes;
}
add_filter('upload_mimes', 'allow_custom_fonts');

/*
 * Precarga los bloques por defecto en los post
 */
/*function hipoges_insertar_bloques_por_defecto($data, $postarr) {
    if ($data['post_type'] === 'post' && $data['post_status'] === 'auto-draft') {
        $blocks = array(
            // Bloque Hero
            array(
                'blockName' => 'hipoges/hero',
                'attrs' => array(
                    'data' => array(
                        'tipo_hero' => 'post',
                        'imagen_fondo' => 637,
                        'titulo' => 'Bienvenido al blog',
                        'subtitulo' => 'Explora las últimas noticias',
                    ),
                ),
                'innerBlocks' => array(),
                'innerHTML' => '',
                'innerContent' => array(),
            ),
            // Bloque Contenido del Post
            array(
                'blockName' => 'core/paragraph',
                'attrs' => array(
                    'placeholder' => 'Contenido del post aquí...',
                ),
                'innerBlocks' => array(),
                'innerHTML' => '',
                'innerContent' => array(),
            ),
            // Bloque CTA con redes sociales
			array(
                'blockName' => 'hipoges/cta-simple',
                'attrs' => array(
                    'data' => array(
                        'imagen_fondo' => 583,
                        'titular' => 'Síguenos en redes sociales para estar al día',
                        'redes_sociales' => array(
                            array(
                                'icono_red_social' => 659,
                                'nombre_red_social' => 'Instagram',
                                'enlace_red_social' => array(
                                    'url' => 'https://www.instagram.com',
                                    'title' => 'Instagram',
                                    'target' => '_blank'
                                )
                            ),
                            array(
                                'icono_red_social' => 660,
                                'nombre_red_social' => 'Linkedin',
                                'enlace_red_social' => array(
                                    'url' => 'https://www.linkedin.com',
                                    'title' => 'Linkedin',
                                    'target' => '_blank'
                                )
                            )
                        )
                    ),
                ),
                'innerBlocks' => array(),
                'innerHTML' => '',
                'innerContent' => array(),
            ),
            // Bloque Post Destacados
            array(
                'blockName' => 'hipoges/posts-destacados',
                'attrs' => array(
                    'data' => array(
                        'titular' => 'Artículos relacionados',
                        'descripcion' => 'Lorem ipsum dolor sit amet consectetur. Non diam nulla ut at. Morbi vestibulum urna phasellus pulvinar nisl est phasellus pellentesque.'
                    ),
                ),
                'innerBlocks' => array(),
                'innerHTML' => '',
                'innerContent' => array(),
            )
        );

        // Convertir los bloques a un formato serializado que WordPress pueda manejar
        $data['post_content'] = serialize_blocks($blocks);
    }

    return $data;
}
add_filter('wp_insert_post_data', 'hipoges_insertar_bloques_por_defecto', 10, 2);
*/

function hipoges_insertar_bloques_cpt($data, $postarr) {
    if (($data['post_type'] === 'teambuilding' || $data['post_type'] === 'evento') && $data['post_status'] === 'auto-draft') {
        $blocks = array(
            // Bloque Hero
            array(
                'blockName' => 'hipoges/hero',
                'attrs' => array(
                    'data' => array(
                        'tipo_hero' => 'post',
                        'imagen_fondo' => 637,
                        'titulo' => 'Bienvenido al evento',
                        'subtitulo' => 'Explora los detalles del evento',
                    ),
                ),
                'innerBlocks' => array(),
                'innerHTML' => '',
                'innerContent' => array(),
            ),
            // Bloque Contenido del Post
            array(
                'blockName' => 'core/paragraph',
                'attrs' => array(
                    'placeholder' => 'Contenido del evento o teambuilding aquí...',
                ),
                'innerBlocks' => array(),
                'innerHTML' => '',
                'innerContent' => array(),
            ),
            // Bloque CTA con redes sociales
            array(
                'blockName' => 'hipoges/cta-simple',
                'attrs' => array(
                    'data' => array(
                        'imagen_fondo' => 583,
                        'titular' => 'Síguenos en redes sociales para estar al día',
                    ),
                ),
                'innerBlocks' => array(),
                'innerHTML' => '',
                'innerContent' => array(),
            )
        );

        // Convertir los bloques a un formato serializado que WordPress pueda manejar
        $data['post_content'] = serialize_blocks($blocks);
    }

    return $data;
}
add_filter('wp_insert_post_data', 'hipoges_insertar_bloques_cpt', 10, 2);

/*
 * Obtiene el año actual
 */
function obtener_ano_actual() {
    return date('Y');
}

/*
 * Precargar la plantilla de post para eventos y teambuilding
 */
add_filter('template_include', function ($template) {
    if (is_singular('evento') || is_singular('teambuilding')) {
        return get_template_directory() . '/single.php';
    }
    return $template;
});

/*
 * Permite la subida de svg
 */
function permitir_svg_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'permitir_svg_mime_types');

/*
 * Registra bloques de menús
 */
function hipoges_register_menus() {
    register_nav_menus([
        'header_menu'   => __('Header Menu', 'hipoges'),
        'header_featured' => __('Header Featured', 'hipoges'),
        'footer_middle' => __('Footer Middle', 'hipoges'),
        'footer_right' => __('Footer Right', 'hipoges'),
        'footer_bottom' => __('Footer Bottom', 'hipoges'),
    ]);
}
add_action('after_setup_theme', 'hipoges_register_menus');

// wp_nav_menu([
//     'theme_location' => 'header_menu',
//     'menu_class'     => '',
//     'container'      => false, // No <div> wrapper
// ]);

add_filter('acf/options_page/settings', function($settings) {
    if (function_exists('pll_current_language')) {
        $lang = pll_current_language();

        $settings['menu_title'] .= ' (' . strtoupper($lang) . ')';
        $settings['page_title'] .= ' (' . strtoupper($lang) . ')';
        $settings['menu_slug'] .= '-' . $lang;
    }
    return $settings;
});



add_filter('acf/load_value', function ($value, $post_id, $field) {
    if (strpos($field['name'], 'polylang_') === 0)
        return $value[pll_current_language()] ?? '';

    return $value;
}, 10, 3);

add_filter('acf/update_value', function ($new_value, $post_id, $field) {
    if (strpos($field['name'], 'polylang_') === 0) {
        $data = get_option('options_' . $field['name']);
        if (!is_array($data))
            $data = [];
        $data[pll_current_language()] = $new_value;

        return $data;
    }

    return $new_value;
}, 10, 3);

function get_polylang_string($field_name, $default = '', $post_id = 'option') {
    $value = get_option('options_' . $field_name);
    if (!is_array($data))
        return $default;

    return $value[pll_current_language()] ?? $default;
}


add_action('wp_ajax_filtrar_posts', 'filtrar_posts_callback');
add_action('wp_ajax_nopriv_filtrar_posts', 'filtrar_posts_callback');

function filtrar_posts_callback() {
    $categoria_id = isset($_GET['categoria']) && $_GET['categoria'] !== 'all' ? intval($_GET['categoria']) : null;
    $paged = isset($_GET['paged']) ? intval($_GET['paged']) : 1;

    $args = [
        'post_type'      => 'post',
        'posts_per_page' => 6,
        'paged'          => $paged,
    ];

    if ($categoria_id) {
        $args['cat'] = $categoria_id;
    }

    $query = new WP_Query($args);
    ob_start();
    
    $block_name = 'blog-grid';
    ?>

    <div class="hip-<?= esc_attr($block_name) ?>-grid">
        <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <?php
                $template_path = locate_template('blocks/grid-blog/blog-card-template.php');
                if ($template_path) {
                    include $template_path;
                } else {
                    echo '<p>Error: no se encontró la plantilla de tarjeta.</p>';
                }
                ?>
            <?php endwhile; ?>
        <?php else : ?>
            <p>No hay artículos disponibles.</p>
        <?php endif; ?>
    </div>

    <div class="hip-<?= esc_attr($block_name) ?>-pagination">
        <?php
        echo paginate_links([
            'total'        => $query->max_num_pages,
            'current'      => $paged,
            'format'       => '?paged=%#%',
            'prev_text'    => '←',
            'next_text'    => '→',
            'mid_size'     => 2
        ]);
        ?>
    </div>

    <?php
    wp_reset_postdata();
    echo ob_get_clean();
    wp_die();
}