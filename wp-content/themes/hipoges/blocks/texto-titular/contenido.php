<?php 
$block_name = 'texto-titular';

$imagen_fondo_id = get_field('imagen_fondo');
$imagen_fondo = wp_get_attachment_image_src($imagen_fondo_id, 'full'); 
$style_bg = $imagen_fondo ? 'background-image: url(' . esc_url($imagen_fondo[0]) . '); background-size: cover; background-position: center;' : '';

$titular = escaped(get_field('titular'));
$descripcion = get_field('descripcion');
$boton = get_field('boton') ?? false;
?>

<section style="<?= esc_attr($style_bg) ?>">

<div id="<?= esc_attr($block['id']) ?>" class="hip-<?= esc_attr($block_name) ?> hip-container hip-module">
    <div class="hip-<?= esc_attr($block_name) ?>-grid">
        <div class="hip-<?= esc_attr($block_name) ?>-col izquierda">
            <?php if ($titular) : ?>
                <h2 class="hip-<?= esc_attr($block_name) ?>-titular hip-titular"><?= $titular; ?></h2>
            <?php endif; ?>
        </div>
        <div class="hip-<?= esc_attr($block_name) ?>-col derecha">
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