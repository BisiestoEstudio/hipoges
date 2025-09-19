<?php 
$block_name = 'cards';

$imagen_fondo_id = get_field('imagen_fondo');
$imagen_fondo = wp_get_attachment_image_src($imagen_fondo_id, 'full'); 
$style_bg = $imagen_fondo ? 'background-image: url(' . esc_url($imagen_fondo[0]) . '); background-size: cover; background-position: center;' : '';

$tipo_card = get_field('tipo_card');
$titular = escaped(get_field('titular'));
$descripcion = get_field('descripcion');
$boton = get_field('boton') ?? false;

$allowed_blocks = [
    'hipoges/cards-card-interior'
];
?>
<section style="<?= esc_attr($style_bg) ?>">

<div id="<?= esc_attr($block['id']) ?>" class="hip-<?= esc_attr($block_name) ?> hip-<?= esc_attr($block_name) ?>-<?= esc_attr($tipo_card) ?> hip-container hip-module">

    <?php if ($titular) : ?>
		<h2 class="hip-titular"><?= $titular ?></h2>
    <?php endif; ?>

    <?php if ($descripcion) : ?>
        <div class="hip-<?= esc_attr($block_name) ?>-descripcion">
            <?= wp_kses_post($descripcion) ?>
        </div>
    <?php endif; ?>

    <div class="hip-inner-cards">
        <InnerBlocks allowedBlocks='<?= esc_attr(wp_json_encode($allowed_blocks)) ?>' />
    </div>

    <?php if ($boton) : ?>
        <a href="<?= esc_url($boton['url']) ?>" class="btn btn-primary"><?= escaped($boton['title']) ?></a>
    <?php endif; ?>

</div>

</section>