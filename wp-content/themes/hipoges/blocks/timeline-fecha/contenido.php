<?php 
$block_name = 'timeline-fecha';

$imagen_id = get_field('imagen');
$imagen_url = $imagen_id ? wp_get_attachment_image_url($imagen_id, 'full') : '';
$ano = get_field('ano');
$titular = escaped(get_field('titular'));
$descripcion = get_field('descripcion');
?>

<div id="<?= esc_attr($block['id']) ?>" class="hip-<?= esc_attr($block_name) ?>">
    
    <?php if ($imagen_url) : ?>
        <div class="hip-<?= esc_attr($block_name) ?>-imagen">
            <img src="<?= esc_url($imagen_url) ?>" alt="<?= esc_attr($titular) ?>">
        </div>
    <?php endif; ?>
        
    <div class="hip-<?= esc_attr($block_name) ?>-timeline"><span>●</span></div>

    <?php if ($ano) : ?>
        <div class="hip-<?= esc_attr($block_name) ?>-anno">
            <?= esc_html($ano) ?>
        </div>
    <?php endif; ?>

    <?php if ($titular) : ?>
        <h3 class="hip-<?= esc_attr($block_name) ?>-titular hip-titular">
            <?= $titular; ?>
        </h3>
    <?php endif; ?>

    <?php if ($descripcion) : ?>
        <div class="hip-<?= esc_attr($block_name) ?>-descripcion">
            <?= wp_kses_post($descripcion) ?>
        </div>
    <?php endif; ?>

</div>