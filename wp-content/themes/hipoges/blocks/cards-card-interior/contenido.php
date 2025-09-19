<?php 
$block_name = 'cards-card-interior';

$elemento_grafico_id = get_field('elemento_grafico');
$titular = escaped(get_field('titular'));
$descripcion = get_field('descripcion');

$elemento_grafico = wp_get_attachment_image_src($elemento_grafico_id, 'medium'); // O usar 'medium', 'large', etc.
?>

<div class="hip-<?= esc_attr($block_name) ?> hip-module-child">
    
    <?php if ($elemento_grafico) : ?>
        <div class="hip-<?= esc_attr($block_name) ?>-imagen">
            <img src="<?= esc_url($elemento_grafico[0]) ?>" alt="<?= esc_attr(get_post_meta($elemento_grafico_id, '_wp_attachment_image_alt', true)) ?>">
        </div>
    <?php endif; ?>

    <?php if ($titular) : ?>
        <h3 class="hip-<?= esc_attr($block_name) ?>-titular hip-titular"><?= $titular; ?></h3>
    <?php endif; ?>

    <?php if ($descripcion) : ?>
        <div class="hip-<?= esc_attr($block_name) ?>-descripcion">
            <?= wp_kses_post($descripcion) ?>
        </div>
    <?php endif; ?>

</div>
