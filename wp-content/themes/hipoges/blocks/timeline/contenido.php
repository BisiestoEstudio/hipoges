<?php 
$block_name = 'timeline';

$titular = escaped(get_field('titular'));
$descripcion = get_field('descripcion');
$boton = get_field('boton') ?? false;

$color_fondo = 'background-color: var(--color-4);';

$allowed_blocks = [
    'hipoges/timeline-fecha'
];
?>

<section style="<?= esc_attr($color_fondo) ?>">
<div id="<?= esc_attr($block['id']) ?>" class="hip-<?= esc_attr($block_name) ?> hip-container hip-module">
    
    <?php if ($titular) : ?>
        <h2 class="hip-<?= esc_attr($block_name) ?>-titular hip-titular"><?= $titular; ?></h2>
    <?php endif; ?>

    <?php if ($descripcion) : ?>
        <div class="hip-<?= esc_attr($block_name) ?>-descripcion">
            <?= wp_kses_post($descripcion) ?>
        </div>
    <?php endif; ?>

    <div class="hip-<?= esc_attr($block_name) ?>-grid">
        <InnerBlocks allowedBlocks='<?= esc_attr(wp_json_encode($allowed_blocks)) ?>' />
    </div>

    <?php if (!empty($boton) && isset($boton['url'], $boton['title'])) : ?>
        <a href="<?= esc_url($boton['url']) ?>" class="btn btn-primary"><?= escaped($boton['title']) ?></a>
    <?php endif; ?>

</div>
</section>