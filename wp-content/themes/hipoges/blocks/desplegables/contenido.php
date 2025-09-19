<?php 
$block_name = 'desplegables';

$titular = escaped(get_field('titular'));
$descripcion = get_field('descripcion');
$boton = get_field('boton');

$imagen_fondo_obj = get_field('imagen');
$imagen_fondo_id = $imagen_fondo_obj['id'] ?? 0;
$imagen_fondo = wp_get_attachment_image_src($imagen_fondo_id, 'full');
$imagen_url = $imagen_fondo ? esc_url($imagen_fondo[0]) : null;

$color_fondo = 'background-color: var(--color-4);';

$allowed_blocks = [
    'hipoges/desplegables-pregunta'
];
?>

<section style="<?= esc_attr($color_fondo) ?>">
<div id="<?= esc_attr($block['id']) ?>" class="hip-<?= esc_attr($block_name) ?> hip-container hip-module">
    <div class="hip-<?= esc_attr($block_name) ?>-contenedor">
        <div class="hip-<?= esc_attr($block_name) ?>-contenido">

            <?php if ($titular) : ?>
                <h2 class="hip-<?= esc_attr($block_name) ?>-titular hip-titular"><?= $titular; ?></h2>
            <?php endif; ?>

            <?php if ($descripcion) : ?>
                <div class="hip-<?= esc_attr($block_name) ?>-descripcion">
                    <?= wp_kses_post($descripcion) ?>
                </div>
            <?php endif; ?>

            <div class="hip-<?= esc_attr($block_name) ?>-preguntas">
                <InnerBlocks allowedBlocks='<?= esc_attr(wp_json_encode($allowed_blocks)) ?>' />
            </div>

            <?php if (!empty($boton) && isset($boton['url'], $boton['title'])) : ?>
                <div class="hip-<?= esc_attr($block_name) ?>-boton">
                    <a href="<?= esc_url($boton['url']) ?>" class="btn btn-primary" target="<?= esc_attr($boton['target'] ?? '_self') ?>">
                        <?= escaped($boton['title']); ?>
                    </a>
                </div>
            <?php endif; ?>

        </div>
        <div class="hip-<?= esc_attr($block_name) ?>-imagen">
            <?php if ($imagen_url) : ?>
                <img src="<?= esc_url($imagen_url) ?>" alt="<?= esc_attr($titular) ?>">
            <?php endif; ?>
        </div>
    </div>
</div>
</section>