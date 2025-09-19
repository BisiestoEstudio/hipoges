<?php 
$block_name = 'empresas';

$titular = escaped(get_field('titular'));
$descripcion = get_field('descripcion');

$allowed_blocks = [
    'hipoges/empresas-card-interior'
];
?>

<section class="fullwidth">
<div id="<?= esc_attr($block['id']) ?>" class="hip-<?= esc_attr($block_name) ?> hip-container hip-module">
    <div class="hip-<?= esc_attr($block_name) ?>-container">

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

    </div>
</div>
</section>