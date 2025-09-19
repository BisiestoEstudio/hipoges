<?php 
$block_name = 'ventajas-card-interior';

$estrellas = escaped(get_field('estrellas'));
$nombre = escaped(get_field('nombre'));
$cargo = escaped(get_field('cargo'));
$descripcion = get_field('descripcion');
?>

<div class="hip-<?= esc_attr($block_name) ?>">
    
    <?php if ($estrellas) : ?>
        <div class="hip-<?= esc_attr($block_name) ?>-estrellas">
            <?= str_repeat('<img src="'. get_template_directory_uri() .'/recursos/img/icon-star.svg" >', $estrellas); ?>
        </div>
    <?php endif; ?>

    <?php if ($nombre) : ?>
        <h4 class="hip-<?= esc_attr($block_name) ?>-nombre"><?= $nombre; ?></h4>
    <?php endif; ?>

    <?php if ($cargo) : ?>
        <div class="hip-<?= esc_attr($block_name) ?>-cargo"><?= $cargo; ?></div>
    <?php endif; ?>

    <?php if ($descripcion) : ?>
        <div class="hip-<?= esc_attr($block_name) ?>-descripcion">
            <?= wp_kses_post($descripcion) ?>
        </div>
    <?php endif; ?>

</div>