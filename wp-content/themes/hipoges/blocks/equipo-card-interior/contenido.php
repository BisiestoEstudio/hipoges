<?php 
$block_name = 'equipo-card-interior';

$foto_id = get_field('foto');
$foto = $foto_id ? wp_get_attachment_image_src($foto_id, 'medium') : false;

$nombre = escaped(get_field('nombre'));
$cargo = escaped(get_field('cargo'));
$descripcion = get_field('descripcion');
$url_linkedin = get_field('url_linkedin');

$lightbox_id = uniqid('lightbox-equipo-');
?>

<div class="hip-<?= esc_attr($block_name) ?>">
    <div class="hip-<?= esc_attr($block_name) ?>-container">

        <?php if ($foto) : ?>
            <div class="hip-<?= esc_attr($block_name) ?>-foto">
                <img src="<?= esc_url($foto[0]) ?>" alt="<?= esc_attr($nombre); ?>" data-lightbox="<?= esc_attr($lightbox_id) ?>" onclick="showLightbox(this)">
            </div>
        <?php endif; ?>

        <?php if ($nombre) : ?>
            <h3 class="hip-<?= esc_attr($block_name) ?>-nombre"><?= $nombre; ?></h3>
        <?php endif; ?>

        <?php if ($cargo) : ?>
            <div class="hip-<?= esc_attr($block_name) ?>-cargo"><?= $cargo; ?></div>
        <?php endif; ?>

        <button class="hip-<?= esc_attr($block_name) ?>-leer-mas" data-lightbox="<?= esc_attr($lightbox_id) ?>" onclick="showLightbox(this)">
            <?php echo get_field('polylang_enlace_equipo', 'option') ?>
        </button>

    </div>
</div>

<div id="<?= esc_attr($lightbox_id) ?>" class="hip-lightbox">
    <div class="hip-lightbox-content">
        <button class="hip-lightbox-close" onclick="hideLightbox(this)"><img src="<?= get_template_directory_uri() . '/recursos/img/icon-times.svg' ?>" alt="&times;"></button>

        <div class="hip-lightbox-container">
            
            <?php if ($foto) : ?>
                <div class="hip-lightbox-foto">
                    <img src="<?= esc_url($foto[0]) ?>" alt="<?= esc_attr($nombre); ?>">
                </div>
            <?php endif; ?>

            <div class="hip-lightbox-info">
                <div class="hip-lightbox-cabecera">
                    <?php if ($foto) : ?>
                        <div class="hip-lightbox-foto-movil">
                            <img src="<?= esc_url($foto[0]) ?>" alt="<?= esc_attr($nombre); ?>">
                        </div>
                    <?php endif; ?>
                    <div>
                        <?php if ($nombre) : ?>
                            <h3 class="hip-lightbox-nombre"><?= $nombre; ?></h3>
                        <?php endif; ?>

                        <?php if ($cargo) : ?>
                            <p class="hip-lightbox-cargo"><?= $cargo; ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if ($descripcion) : ?>
                    <div class="hip-lightbox-descripcion">
                        <?= wp_kses_post($descripcion) ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($url_linkedin)) : ?>
                    <a href="<?= esc_url($url_linkedin) ?>" class="hip-lightbox-linkedin" target="_blank">
                        <img src="<?= get_template_directory_uri() . '/recursos/img/icon-linkedin.svg' ?>" alt="LinkedIn">
                    </a>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>
