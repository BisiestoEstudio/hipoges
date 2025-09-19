<?php 
$block_name = 'oficinas-card-interior';

$imagen_oficina_id = get_field('imagen_oficina');
$imagen_oficina_url = $imagen_oficina_id ? wp_get_attachment_image_url($imagen_oficina_id, 'medium') : '';
$nombre_oficina = escaped(get_field('nombre_oficina'));
$direccion = get_field('direccion');
$url_google_maps = get_field('url_direccion_google_maps');
$telefono = get_field('telefono');
?>

<div class="hip-<?= esc_attr($block_name) ?>" style="background-image: url('<?= esc_url($imagen_oficina_url) ?>');">
    <div class="hip-<?= esc_attr($block_name) ?>-content">
        
        <?php if ($nombre_oficina) : ?>
            <h3 class="hip-<?= esc_attr($block_name) ?>-nombre"><?= $nombre_oficina; ?></h3>
        <?php endif; ?>

        <div class="hip-<?= esc_attr($block_name) ?>-info">
            <?php if ($direccion && $url_google_maps) : ?>
                <a href="<?= esc_url($url_google_maps) ?>" target="_blank" class="hip-<?= esc_attr($block_name) ?>-direccion">
                    <img src="<?= get_template_directory_uri() . '/recursos/img/icon-direction.svg' ?>" >
                    <span><?= esc_html($direccion); ?></span>
                </a>
            <?php endif; ?>

            <?php if ($telefono) : ?>
                <a href="tel:<?= esc_attr($telefono) ?>" class="hip-<?= esc_attr($block_name) ?>-telefono">
                    <img src="<?= get_template_directory_uri() . '/recursos/img/icon-phone.svg' ?>" >
                    <span><?= esc_html($telefono); ?></span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>
