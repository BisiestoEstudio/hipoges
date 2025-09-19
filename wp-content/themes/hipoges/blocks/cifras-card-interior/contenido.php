<?php 
$block_name = 'cifras-card-interior';

$cifra = escaped(get_field('cifra'));
$texto_cifra = escaped(get_field('texto_cifra'));
$descripcion = get_field('descripcion');
?>

<div class="hip-<?= esc_attr($block_name) ?> hip-module-child">
    
    <?php if ($cifra) : ?>
        <div class="hip-<?= esc_attr($block_name) ?>-cifra"><?= $cifra; ?></div>
    <?php endif; ?>

    <?php if ($texto_cifra) : ?>
        <h3 class="hip-<?= esc_attr($block_name) ?>-texto-cifra hip-titular"><?= $texto_cifra; ?></h3>
    <?php endif; ?>

    <?php if ($descripcion) : ?>
        <div class="hip-<?= esc_attr($block_name) ?>-descripcion">
            <?= wp_kses_post($descripcion) ?>
        </div>
    <?php endif; ?>

</div>
