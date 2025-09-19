<?php
header("Content-type: text/css; charset: UTF-8");

require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php'); // Load WordPress functions

?>

@font-face {
    font-family: 'FuenteTitulares';
    src: url('<?php echo is_int(get_field('fuente_titulares_regular', 'option')['woff2']) ? wp_get_attachment_url(get_field('fuente_titulares_regular', 'option')['woff2']) : get_field('fuente_titulares_regular', 'option')['woff2']['url'] ?? '' ?>') format('woff2'), 
         url('<?php echo is_int(get_field('fuente_titulares_regular', 'option')['woff']) ? wp_get_attachment_url(get_field('fuente_titulares_regular', 'option')['woff']) : get_field('fuente_titulares_regular', 'option')['woff']['url'] ?? '' ?>') format('woff'), 
         url('<?php echo is_int(get_field('fuente_titulares_regular', 'option')['ttf']) ? wp_get_attachment_url(get_field('fuente_titulares_regular', 'option')['ttf']) : get_field('fuente_titulares_regular', 'option')['ttf']['url'] ?? '' ?>') format('truetype'); 
    font-weight: 400;
    font-style: normal;
}
@font-face {
    font-family: 'FuenteTitulares';
    src: url('<?php echo is_int(get_field('fuente_titulares_bold', 'option')['woff2']) ? wp_get_attachment_url(get_field('fuente_titulares_bold', 'option')['woff2']) : get_field('fuente_titulares_bold', 'option')['woff2']['url'] ?? '' ?>') format('woff2'), 
         url('<?php echo is_int(get_field('fuente_titulares_bold', 'option')['woff']) ? wp_get_attachment_url(get_field('fuente_titulares_bold', 'option')['woff']) : get_field('fuente_titulares_bold', 'option')['woff']['url'] ?? '' ?>') format('woff'), 
         url('<?php echo is_int(get_field('fuente_titulares_bold', 'option')['ttf']) ? wp_get_attachment_url(get_field('fuente_titulares_bold', 'option')['ttf']) : get_field('fuente_titulares_bold', 'option')['ttf']['url'] ?? '' ?>') format('truetype'); 
    font-weight: 700;
    font-style: normal;
}
@font-face {
    font-family: 'FuenteTitulares';
    src: url('<?php echo is_int(get_field('fuente_titulares_italic', 'option')['woff2']) ? wp_get_attachment_url(get_field('fuente_titulares_italic', 'option')['woff2']) : get_field('fuente_titulares_italic', 'option')['woff2']['url'] ?? '' ?>') format('woff2'), 
         url('<?php echo is_int(get_field('fuente_titulares_italic', 'option')['woff']) ? wp_get_attachment_url(get_field('fuente_titulares_italic', 'option')['woff']) : get_field('fuente_titulares_italic', 'option')['woff']['url'] ?? '' ?>') format('woff'), 
         url('<?php echo is_int(get_field('fuente_titulares_italic', 'option')['ttf']) ? wp_get_attachment_url(get_field('fuente_titulares_italic', 'option')['ttf']) : get_field('fuente_titulares_italic', 'option')['ttf']['url'] ?? '' ?>') format('truetype'); 
    font-weight: 400;
    font-style: italic;
}

@font-face {
    font-family: 'FuenteTexto';
    src: url('<?php echo is_int(get_field('fuente_texto_regular', 'option')['woff2']) ? wp_get_attachment_url(get_field('fuente_texto_regular', 'option')['woff2']) : get_field('fuente_texto_regular', 'option')['woff2']['url'] ?? '' ?>') format('woff2'), 
         url('<?php echo is_int(get_field('fuente_texto_regular', 'option')['woff']) ? wp_get_attachment_url(get_field('fuente_texto_regular', 'option')['woff']) : get_field('fuente_texto_regular', 'option')['woff']['url'] ?? '' ?>') format('woff'), 
         url('<?php echo is_int(get_field('fuente_texto_regular', 'option')['ttf']) ? wp_get_attachment_url(get_field('fuente_texto_regular', 'option')['ttf']) : get_field('fuente_texto_regular', 'option')['ttf']['url'] ?? '' ?>') format('truetype'); 
    font-weight: 400;
    font-style: normal;
}
@font-face {
    font-family: 'FuenteTexto';
    src: url('<?php echo is_int(get_field('fuente_texto_bold', 'option')['woff2']) ? wp_get_attachment_url(get_field('fuente_texto_bold', 'option')['woff2']) : get_field('fuente_texto_bold', 'option')['woff2']['url'] ?? '' ?>') format('woff2'), 
         url('<?php echo is_int(get_field('fuente_texto_bold', 'option')['woff']) ? wp_get_attachment_url(get_field('fuente_texto_bold', 'option')['woff']) : get_field('fuente_texto_bold', 'option')['woff']['url'] ?? '' ?>') format('woff'), 
         url('<?php echo is_int(get_field('fuente_texto_bold', 'option')['ttf']) ? wp_get_attachment_url(get_field('fuente_texto_bold', 'option')['ttf']) : get_field('fuente_texto_bold', 'option')['ttf']['url'] ?? '' ?>') format('truetype'); 
    font-weight: 700;
    font-style: normal;
}
@font-face {
    font-family: 'FuenteTexto';
    src: url('<?php echo is_int(get_field('fuente_texto_italic', 'option')['woff2']) ? wp_get_attachment_url(get_field('fuente_texto_italic', 'option')['woff2']) : get_field('fuente_texto_italic', 'option')['woff2']['url'] ?? '' ?>') format('woff2'), 
         url('<?php echo is_int(get_field('fuente_texto_italic', 'option')['woff']) ? wp_get_attachment_url(get_field('fuente_texto_italic', 'option')['woff']) : get_field('fuente_texto_italic', 'option')['woff']['url'] ?? '' ?>') format('woff'), 
         url('<?php echo is_int(get_field('fuente_texto_italic', 'option')['ttf']) ? wp_get_attachment_url(get_field('fuente_texto_italic', 'option')['ttf']) : get_field('fuente_texto_italic', 'option')['ttf']['url'] ?? '' ?>') format('truetype'); 
    font-weight: 400;
    font-style: italic;
}

:root {
    /* Colors */
    --color-1: <?php echo get_field('color_1', 'option'); ?>;
    --color-2: <?php echo get_field('color_2', 'option'); ?>;
    --color-3: <?php echo get_field('color_3', 'option'); ?>;
    --color-4: <?php echo get_field('color_4', 'option'); ?>;
    --color-5: <?php echo get_field('color_5', 'option'); ?>;
    --color-6: <?php echo get_field('color_6', 'option'); ?>;
    --color-7: <?php echo get_field('color_7', 'option'); ?>;
    --color-8: <?php echo get_field('color_8', 'option'); ?>;
    --color-9: <?php echo get_field('color_9', 'option'); ?>;
    --color-10: <?php echo get_field('color_10', 'option'); ?>;

    /* Borders */
    --border-radius-container: <?php echo get_field('contenedores_borde_radio', 'option'); ?>px;
    --border-radius-button: <?php echo get_field('botones_borde_radio', 'option'); ?>px;
}