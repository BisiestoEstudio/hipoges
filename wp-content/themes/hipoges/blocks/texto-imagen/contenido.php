<?php 
$block_name = 'texto-imagen';

$orientacion = get_field('orientacion_bloque') == 'imagen_izquierda' ? 'imagen-izquierda' : 'imagen-derecha';
$imagen_id = get_field('imagen');
$titular = escaped(get_field('titular'));
$descripcion = get_field('descripcion');
$boton = get_field('boton') ?? false;

$imagen_url = $imagen_id ? wp_get_attachment_image_url($imagen_id, 'full') : '';

?>

<section>
<div id="<?= esc_attr($block['id']) ?>" class="hip-<?= esc_attr($block_name) ?> <?= esc_attr($orientacion) ?> hip-container hip-module">
    <div class="hip-<?= esc_attr($block_name) ?>-contenedor">
        <div class="hip-<?= esc_attr($block_name) ?>-imagen">
            <?php if ($imagen_url) : ?>
                <img src="<?= esc_url($imagen_url) ?>" alt="<?= esc_attr($titular) ?>">
            <?php endif; ?>
        </div>
        <div class="hip-<?= esc_attr($block_name) ?>-contenido">
            <?php if ($titular) : ?>
                <h2 class="hip-<?= esc_attr($block_name) ?>-titular hip-titular"><?= $titular; ?></h2>
            <?php endif; ?>

            <?php if ($descripcion) : ?>
                <div class="hip-<?= esc_attr($block_name) ?>-descripcion">
                    <?= wp_kses_post($descripcion) ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($boton) && isset($boton['url'], $boton['title'])) : ?>
                <a href="<?= esc_url($boton['url']) ?>" class="btn btn-primary"><?= escaped($boton['title']) ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>
</section>

