<?php 
$block_name = 'cifras';

$titular = escaped(get_field('titular'));
$descripcion = get_field('descripcion');
$boton = get_field('boton') ?? false;

$allowed_blocks = [
    'hipoges/cifras-card-interior'
];
?>

<section>
<div id="<?= esc_attr($block['id']) ?>" class="hip-<?= esc_attr($block_name) ?> hip-<?= esc_attr($block_name) ?>-layout hip-container hip-module">
    
    <div class="hip-<?= esc_attr($block_name) ?>-col izquierda">
        <?php if ($titular) : ?>
            <h2 class="hip-<?= esc_attr($block_name) ?>-titular hip-titular"><?= $titular; ?></h2>
        <?php endif; ?>

        <?php if ($descripcion) : ?>
            <div class="hip-<?= esc_attr($block_name) ?>-descripcion">
                <?= wp_kses_post($descripcion) ?>
            </div>
        <?php endif; ?>

        <?php if ($boton) : ?>
            <a href="<?= esc_url($boton['url']) ?>" class="btn btn-primary"><?= escaped($boton['title']) ?></a>
        <?php endif; ?>
    </div>

    <div class="hip-<?= esc_attr($block_name) ?>-col derecha">
        <div class="hip-<?= esc_attr($block_name) ?>-carrusel">
            <InnerBlocks allowedBlocks='<?= esc_attr(wp_json_encode($allowed_blocks)) ?>' />
        </div>
        
        <div class="hip-<?= esc_attr($block_name) ?>-arrows">
            <img class="hip-<?= esc_attr($block_name) ?>-arrows-left" src="<?= get_template_directory_uri() . '/recursos/img/icon-arrow-left.svg' ?>" >
            <img class="hip-<?= esc_attr($block_name) ?>-arrows-right" src="<?= get_template_directory_uri() . '/recursos/img/icon-arrow-right.svg' ?>" >
        </div>

        <?php if ($boton) : ?>
            <a href="<?= esc_url($boton['url']) ?>" class="btn btn-primary"><?= escaped($boton['title']) ?></a>
        <?php endif; ?>
    </div>
    

</div>
</section>