<?php 
$block_name = 'oficinas';

$titular = escaped(get_field('titular'));
$descripcion = get_field('descripcion');
?>

<section>
<div id="<?= esc_attr($block['id']) ?>" class="hip-<?= esc_attr($block_name) ?> hip-container hip-module">

    <?php if ($titular) : ?>
        <h2 class="hip-<?= esc_attr($block_name) ?>-titular hip-titular"><?= $titular; ?></h2>
    <?php endif; ?>

    <?php if ($descripcion) : ?>
        <div class="hip-<?= esc_attr($block_name) ?>-descripcion">
            <?= wp_kses_post($descripcion) ?>
        </div>
    <?php endif; ?>

    <!-- Grid de oficinas -->
    <div class="hip-<?= esc_attr($block_name) ?>-grid">
        <InnerBlocks allowedBlocks='["hipoges/oficinas-card-interior"]' />
    </div>

</div>
</section>