<?php 
$block_name = 'hero';

$estructura_contenido = get_field('estructura_contenido');
$tipo_hero = get_field('tipo_hero');
$titular = escaped(get_field('titular_bloque'));
$imagen_fondo_id = get_field('imagen_fondo');
$imagen_fondo_url = $imagen_fondo_id ? wp_get_attachment_image_url($imagen_fondo_id, 'full') : '';
$descripcion = get_field('descripcion');
$cta_primario = get_field('cta_primario');
$cta_secundario = get_field('cta_secundario');
$codigo_embebido = get_field('codigo_embebido');

$fecha_publicacion = get_the_date('j F Y'); // Formato de fecha
?>

<?php if ($estructura_contenido === 'fullwidth') : ?>
<section style="background-color: transparent; background-image: url('<?= esc_url($imagen_fondo_url) ?>'); background-size: cover; background-position: bottom center;" class="fullwidth-hero">
<div id="<?= esc_attr($block['id']) ?>" class="hip-<?= esc_attr($block_name) ?> <?= ($tipo_hero === 'post' ? 'hip-'.esc_attr($block_name).'-post':'hip-'.esc_attr($block_name).'-page') ?> hip-module">
<?php else :?>
<section style="background-color: transparent; background-image: url('<?= esc_url($imagen_fondo_url) ?>'); background-size: cover; background-position: center right;" class="boxed-hero">
<div id="<?= esc_attr($block['id']) ?>" class="hip-<?= esc_attr($block_name) ?> <?= ($tipo_hero === 'post' ? 'hip-'.esc_attr($block_name).'-post':'hip-'.esc_attr($block_name).'-page') ?> hip-module">
<?php endif; ?>
    <div class="hip-<?= esc_attr($block_name) ?>-container hip-container">

        <?php if ($titular) : ?>
            <h1 class="hip-titular"><?= $titular; ?></h1>
        <?php endif; ?>

        <?php if ($tipo_hero === 'post') : ?>
            <div class="hip-<?= esc_attr($block_name) ?>-fecha"><?= esc_html($fecha_publicacion); ?></div>
        <?php endif; ?>

        <?php if ($tipo_hero === 'pagina') : ?>
            <?php if ($descripcion) : ?>
                <div class="hip-<?= esc_attr($block_name) ?>-descripcion">
                    <?= wp_kses_post($descripcion) ?>
                </div>
            <?php endif; ?>

            <div class="hip-<?= esc_attr($block_name) ?>-botones btn-group">
                <?php if (!empty($cta_primario) && isset($cta_primario['url'], $cta_primario['title'])) : ?>
                    <a href="<?= esc_url($cta_primario['url']) ?>" class="btn btn-primary" target="<?= esc_attr($cta_primario['target'] ?? '_self') ?>">
                        <?= escaped($cta_primario['title']); ?>
                    </a>
                <?php endif; ?>

                <?php if (!empty($cta_secundario) && isset($cta_secundario['url'], $cta_secundario['title'])) : ?>
                    <a href="<?= esc_url($cta_secundario['url']) ?>" class="btn btn-tertiary" target="<?= esc_attr($cta_secundario['target'] ?? '_self') ?>">
                        <?= escaped($cta_secundario['title']); ?>
                    </a>
                <?php endif; ?>
            </div>

            <?php if ($codigo_embebido) : ?>
                <div class="hip-<?= esc_attr($block_name) ?>-codigo">
                    <?= $codigo_embebido; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>

    </div>
</div>
</section>