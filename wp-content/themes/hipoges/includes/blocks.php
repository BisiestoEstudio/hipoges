<?php

/**
 * Añadir categoría para los bloques creados.
 */
function agregar_categoria_bloques( $categories ) {
	array_unshift( $categories, array(
		'slug'	=> 'hipoges',
		'title' => __( 'Hipoges', 'hipoges' ),
		'icon'  => null,
	) );
	return $categories;
}

add_filter( 'block_categories_all', 'agregar_categoria_bloques', 1, 2 );


/**
 * Registrar todos los bloques de ACF
 */

function registrar_bloques() {
    error_log('Registrando bloques');
    if( function_exists('register_block_type') ){
        register_block_type( WORDPYCAT_PATH . 'blocks/hero' );
        register_block_type( WORDPYCAT_PATH . 'blocks/cards' );
        register_block_type( WORDPYCAT_PATH . 'blocks/cards-card-interior' );
        register_block_type( WORDPYCAT_PATH . 'blocks/cifras' );
        register_block_type( WORDPYCAT_PATH . 'blocks/cifras-card-interior' );
        register_block_type( WORDPYCAT_PATH . 'blocks/servicios' );
        register_block_type( WORDPYCAT_PATH . 'blocks/servicios-card-interior' );
        register_block_type( WORDPYCAT_PATH . 'blocks/faqs' );
        register_block_type( WORDPYCAT_PATH . 'blocks/faqs-pregunta' );
        register_block_type( WORDPYCAT_PATH . 'blocks/cta-simple' );
        register_block_type( WORDPYCAT_PATH . 'blocks/certificaciones' );
        register_block_type( WORDPYCAT_PATH . 'blocks/ventajas' );
        register_block_type( WORDPYCAT_PATH . 'blocks/ventajas-card-interior' );
        register_block_type( WORDPYCAT_PATH . 'blocks/eventos' );
        register_block_type( WORDPYCAT_PATH . 'blocks/posts-destacados' );
        register_block_type( WORDPYCAT_PATH . 'blocks/texto-imagen' );
        register_block_type( WORDPYCAT_PATH . 'blocks/texto-titular' );
        register_block_type( WORDPYCAT_PATH . 'blocks/timeline' );
        register_block_type( WORDPYCAT_PATH . 'blocks/timeline-fecha' );
        register_block_type( WORDPYCAT_PATH . 'blocks/equipo' );
        register_block_type( WORDPYCAT_PATH . 'blocks/equipo-card-interior' );
        register_block_type( WORDPYCAT_PATH . 'blocks/teambuilding' );
        register_block_type( WORDPYCAT_PATH . 'blocks/descargables' );
        register_block_type( WORDPYCAT_PATH . 'blocks/oficinas' );
        register_block_type( WORDPYCAT_PATH . 'blocks/oficinas-card-interior' );
        register_block_type( WORDPYCAT_PATH . 'blocks/empresas' );
        register_block_type( WORDPYCAT_PATH . 'blocks/empresas-card-interior' );
        register_block_type( WORDPYCAT_PATH . 'blocks/contacto' );
        register_block_type( WORDPYCAT_PATH . 'blocks/grid-blog' );
        register_block_type( WORDPYCAT_PATH . 'blocks/desplegables' );
        register_block_type( WORDPYCAT_PATH . 'blocks/desplegables-pregunta' );
    }
}

add_action( 'acf/init', 'registrar_bloques' );

/**
 * Registrar scripts de los bloques
 */

function registrar_estilo_bloques() {
    $version = '1.0.0';

    // Añadir aquí los scripts de todos los bloques
    /*wp_register_style( 'hero-block-style', get_template_directory_uri() . 'blocks/hero/estilos.css', array(), $version );
    wp_register_style( 'cards-block-style', get_template_directory_uri() . 'blocks/cards/estilos.css', array(), $version );
    wp_register_style( 'cards-card-interior-block-style', get_template_directory_uri() . 'blocks/cards-card-interior/estilos.css', array(), $version );
    wp_register_style( 'cifras-block-style', get_template_directory_uri() . 'blocks/cifras/estilos.css', array(), $version );
    wp_register_style( 'cifras-card-interior-block-style', get_template_directory_uri() . 'blocks/cifras-card-interior/estilos.css', array(), $version );
    wp_register_style( 'servicios-block-style', get_template_directory_uri() . 'blocks/servicios/estilos.css', array(), $version );
    wp_register_style( 'servicios-card-interior-block-style', get_template_directory_uri() . 'blocks/servicios-card-interior/estilos.css', array(), $version );
    wp_register_style( 'faqs-block-style', get_template_directory_uri() . 'blocks/faqs/estilos.css', array(), $version );
    wp_register_style( 'faqs-pregunta-block-style', get_template_directory_uri() . 'blocks/faqs-pregunta/estilos.css', array(), $version );
    wp_register_style( 'cta-simple-block-style', get_template_directory_uri() . 'blocks/cta-simple/estilos.css', array(), $version );
    wp_register_style( 'certificaciones-block-style', get_template_directory_uri() . 'blocks/certificaciones/estilos.css', array(), $version );
    wp_register_style( 'ventajas-block-style', get_template_directory_uri() . 'blocks/ventajas/estilos.css', array(), $version );
    wp_register_style( 'ventajas-card-interior-block-style', get_template_directory_uri() . 'blocks/ventajas-card-interior/estilos.css', array(), $version );
    wp_register_style( 'eventos-block-style', get_template_directory_uri() . 'blocks/eventos/estilos.css', array(), $version );
    wp_register_style( 'posts-destacados-block-style', get_template_directory_uri() . 'blocks/posts-destacados/estilos.css', array(), $version );
    wp_register_style( 'texto-imagen-block-style', get_template_directory_uri() . 'blocks/texto-imagen/estilos.css', array(), $version );
    wp_register_style( 'texto-titular-block-style', get_template_directory_uri() . 'blocks/texto-titular/estilos.css', array(), $version );
    wp_register_style( 'timeline-block-style', get_template_directory_uri() . 'blocks/timeline/estilos.css', array(), $version );
    wp_register_style( 'timeline-fecha-block-style', get_template_directory_uri() . 'blocks/timeline-fecha/estilos.css', array(), $version );
    wp_register_style( 'equipo-block-style', get_template_directory_uri() . 'blocks/equipo/estilos.css', array(), $version );
    wp_register_style( 'equipo-card-interior-block-style', get_template_directory_uri() . 'blocks/equipo-card-interior/estilos.css', array(), $version );
    wp_register_style( 'teambuilding-block-style', get_template_directory_uri() . 'blocks/teambuilding/estilos.css', array(), $version );
    wp_register_style( 'descargables-block-style', get_template_directory_uri() . 'blocks/descargables/estilos.css', array(), $version );
    wp_register_style( 'oficinas-block-style', get_template_directory_uri() . 'blocks/oficinas/estilos.css', array(), $version );
    wp_register_style( 'oficinas-card-interior-block-style', get_template_directory_uri() . 'blocks/oficinas-card-interior/estilos.css', array(), $version );
    wp_register_style( 'empresas-block-style', get_template_directory_uri() . 'blocks/empresas/estilos.css', array(), $version );
    wp_register_style( 'empresas-card-interior-block-style', get_template_directory_uri() . 'blocks/empresas-card-interior/estilos.css', array(), $version );
    wp_register_style( 'contacto-block-style', get_template_directory_uri() . 'blocks/contacto/estilos.css', array(), $version );
    wp_register_style( 'grid-blog-block-style', get_template_directory_uri() . 'blocks/grid-blog/estilos.css', array(), $version );
    wp_register_style( 'desplegables-block-style', get_template_directory_uri() . 'blocks/desplegables/estilos.css', array(), $version );
    wp_register_style( 'desplegables-pregunta-block-style', get_template_directory_uri() . 'blocks/desplegables-pregunta/estilos.css', array(), $version );*/

    // $css_path = get_template_directory_uri() . '/recursos/css/style.css';
    // wp_enqueue_style('wordpycat-blocks-global', $css_path, [], $version);
    wp_enqueue_style(
        'wordpycat-blocks-global',
        get_template_directory_uri() . '/recursos/css/style.css',
        false,
        '2.1',
        'all'
    );

}

add_action( 'acf/init', 'registrar_estilo_bloques' );



/**
 * Registrar scripts de los bloques
 */

 function registrar_scripts_bloques() {
    $version = '1.0.0';

    // Añadir aquí los scripts de todos los bloques
    wp_register_script( 'wordpycat-block-js', get_template_directory_uri() . 'blocks/wordpycat-block/app.js', array( 'acf' ), $version, true );

}

add_action( 'acf/init', 'registrar_scripts_bloques' );



/**
 * Añade ruta para que se guarden los custom fields en la carpeta fields.
 * https://www.advancedcustomfields.com/resources/local-json/#saving-explained
 */
function guardar_custom_fields( $path ) {
    $path = WORDPYCAT_PATH. 'fields';

	return $path;
}

add_filter('acf/settings/save_json', 'guardar_custom_fields' );



/**
 * Customiza el nombre de los archivos que se guardan.
 */

function custom_acf_json_filename( $filename, $post, $load_path ) {
    $filename = str_replace(
        array(
            ' ',
            '_',
        ),
        array(
            '-',
            '-'
        ),
        $post['title']
    );
    $normalized = Normalizer::normalize($filename, Normalizer::NFD);
    $filename = preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', $normalized);
    $filename = strtolower( $filename ) . '.json';

    return $filename;
}
add_filter( 'acf/json/save_file_name', 'custom_acf_json_filename', 10, 3 );



/**
 * Set path for saving ACF JSON files.
 * https://www.advancedcustomfields.com/resources/local-json/#loading-explained
 */
function cargar_custom_fields( $paths ) {
	
    unset($paths[0]);

    $paths[] = WORDPYCAT_PATH . 'fields';

    return $paths;
}

add_filter( 'acf/settings/load_json', 'cargar_custom_fields' );


