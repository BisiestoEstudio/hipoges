<?php 
$block_name = 'empresas-card-interior';

$nombre_empresa = escaped(get_field('nombre_empresa'));
$descripcion = get_field('descripcion');
$listado_de_checks = get_field('listado_de_checks');
$enlace = get_field('enlace');

$logo_id = get_field('logo_empresa');
$logo = $logo_id ? wp_get_attachment_image_src($logo_id, 'medium') : false;
?>

<div class="hip-<?= esc_attr($block_name) ?>">
    <div class="hip-<?= esc_attr($block_name) ?>-container">
        
        <!-- Imagen (logo) a la izquierda -->
        <?php if ($logo) : ?>
            <div class="hip-<?= esc_attr($block_name) ?>-imagen">
                <img src="<?= esc_url($logo[0]) ?>" alt="<?= esc_attr($nombre_empresa); ?>">
            </div>
        <?php endif; ?>

        <!-- Contenido a la derecha -->
        <div class="hip-<?= esc_attr($block_name) ?>-contenido">
            
            <?php if ($nombre_empresa) : ?>
                <div class="hip-<?= esc_attr($block_name) ?>-titulo">
                    <?php if ($logo) : ?>
                    <img src="<?= esc_url($logo[0]) ?>" alt="<?= esc_attr($nombre_empresa); ?>">
                    <?php endif; ?>
                    <h3 class="hip-<?= esc_attr($block_name) ?>-nombre"><?= $nombre_empresa; ?></h3>
                </div>
            <?php endif; ?>

            <?php if ($descripcion) : ?>
                <div class="hip-<?= esc_attr($block_name) ?>-descripcion">
                    <?= wp_kses_post($descripcion) ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($listado_de_checks)) : ?>
                <ul class="hip-<?= esc_attr($block_name) ?>-checks">
                    <?php foreach ($listado_de_checks as $check) : ?>
                        <li><?= escaped($check['check']); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php if (!empty($enlace)) : ?>
                <a href="<?= esc_url($enlace) ?>" class="btn btn-terciary" target="_blank">
                    <?php echo get_field('polylang_enlace_empresas', 'option') ?> <?php if ($nombre_empresa) : ?> <?= $nombre_empresa; ?><?php endif; ?>
                </a>
            <?php endif; ?>

        </div>

    </div>
</div>