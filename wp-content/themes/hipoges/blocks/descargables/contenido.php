<?php 
$block_name = 'descargables';

$titular = escaped(get_field('titular'));
$descripcion = get_field('descripcion');
$descargables = get_field('descargables'); // Lista de IDs de los posts descargables
$boton = get_field('boton');
?>

<section>
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

        <?php if (!empty($descargables) && is_array($descargables)) : ?>
            <div class="hip-<?= esc_attr($block_name) ?>-grid">
                <?php foreach ($descargables as $post_id) :
                    if (!get_post_status($post_id)) continue; // Evita errores si el post no existe

                    $titulo_descarga = get_the_title($post_id);
                    $imagen_id = get_post_thumbnail_id($post_id);
                    $imagen = $imagen_id ? wp_get_attachment_image_src($imagen_id, 'medium') : false;
                    $fichero = get_field('fichero', $post_id); // Ya es la URL directa
                ?>
                    <div class="hip-<?= esc_attr($block_name) ?>-item">
                        <?php if ($imagen) : ?>
                            <img src="<?= esc_url($imagen[0]) ?>" alt="<?= esc_attr($titulo_descarga); ?>">
                        <?php else : ?>
                           
                        <?php endif; ?>

                        <h3 class="hip-<?= esc_attr($block_name) ?>-titulo hip-titulo"><?= escaped($titulo_descarga); ?></h3>

                        <?php if (!empty($fichero)) : ?>
                            <a href="<?= esc_url($fichero) ?>" class="btn-download" target="_blank">
                                <img src="<?= get_template_directory_uri() . '/recursos/img/arrow-download.svg' ?>" >
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($boton) : ?>
            <div class="hip-<?= esc_attr($block_name) ?>-boton">
                <a href="<?= esc_url($boton['url']) ?>" class="btn btn-primary">
                    <?= esc_html($boton['title']) ?>
                </a>
            </div>
        <?php endif; ?>

    </div>
</div>
</section>