<?php 
$block_name = 'servicios-card-interior';

$imagen_id = get_field('imagen');
$titular = escaped(get_field('titular'));
$descripcion = get_field('descripcion');
$boton = get_field('boton');

$imagen = wp_get_attachment_image_src($imagen_id, 'medium'); 
?>

<div class="hip-<?= esc_attr($block_name) ?>">
    <div class="hip-<?= esc_attr($block_name) ?>-contenedor hip-module-child" style="background-image: url(<?= esc_url($imagen[0]) ?>);" tabindex="0">

        <div class="hip-<?= esc_attr($block_name) ?>-descripcion">
            <p><?= wp_kses_post($descripcion) ?></p>
        </div>
        
        <div class="hip-<?= esc_attr($block_name) ?>-enlace">
            <h3 class="hip-<?= esc_attr($block_name) ?>-titular hip-titular"><?= $titular; ?></h3>
            <?php if ($boton) : ?>
                <a href="<?= esc_url($boton) ?>" class="hip-<?= esc_attr($block_name) ?>-icono"><img src="<?= get_template_directory_uri() ?>/recursos/img/arrow-right.svg"></a>
            <?php endif; ?>
        </div>

    </div>
</div>
