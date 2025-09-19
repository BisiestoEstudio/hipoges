<?php 
$block_name = 'cta-simple';

$estructura_contenido = get_field('estructura_contenido');
$imagen_fondo_id = get_field('imagen_fondo');
$imagen_fondo = wp_get_attachment_image_src($imagen_fondo_id, 'full'); 
$style_bg = $imagen_fondo ? 'background-image: url(' . esc_url($imagen_fondo[0]) . ');' : '';
$color_fondo = 'background-color: var(--color-7);';
$style_bg = $imagen_fondo ? 'background-image: url(' . esc_url($imagen_fondo[0]) . '); background-size: cover; background-position: center;' : '';

$titular = escaped(get_field('titular'));

$cta_principal = get_field('cta_principal');
$cta_secundario = get_field('cta_secundario');

$redes_sociales = get_field('redes_sociales');
?>


<?php if ($estructura_contenido === 'fullwidth') : ?>
<section style="<?= esc_attr($color_fondo) ?> background-size: cover; background-position: center right; <?= esc_attr($style_bg) ?>" class="fullwidth-cta">
<div id="<?= esc_attr($block['id']) ?>" class="hip-<?= esc_attr($block_name) ?> hip-container hip-module">
<?php else :?>
<section style="<?= esc_attr($color_fondo) ?>" class="boxed-cta">
<div id="<?= esc_attr($block['id']) ?>" class="hip-<?= esc_attr($block_name) ?> hip-container hip-module hip-<?= esc_attr($block_name) ?>-boxed">
<?php endif; ?>

    <div class="hip-<?= esc_attr($block_name) ?>-container">
        
        <?php if ($titular) : ?>
            <h2 class="hip-<?= esc_attr($block_name) ?>-titular h1"><?= $titular; ?></h2>
        <?php endif; ?>

		<?php if (!empty($cta_principal) && is_array($cta_principal) && isset($cta_principal['url'])) : ?>
        <div class="hip-<?= esc_attr($block_name) ?>-botones btn-group">
            <?php if (!empty($cta_principal) && is_array($cta_principal) && isset($cta_principal['url'])) : ?>
                <a href="<?= esc_url($cta_principal['url']) ?>" class="btn btn-tertiary" target="<?= esc_attr($cta_principal['target'] ?? '_self') ?>">
                    <?= escaped($cta_principal['title']); ?>
                </a>
            <?php endif; ?>

            <?php if (!empty($cta_secundario) && is_array($cta_secundario) && isset($cta_secundario['url'])) : ?>
                <a href="<?= esc_url($cta_secundario['url']) ?>" class="btn btn-primary" target="<?= esc_attr($cta_secundario['target'] ?? '_self') ?>">
                    <?= escaped($cta_secundario['title']); ?>
                </a>
            <?php endif; ?>
        </div>
		<?php endif; ?>

        <?php if ($redes_sociales) : ?>
            <div class="hip-<?= esc_attr($block_name) ?>-redes">
                <?php foreach ($redes_sociales as $red) : 
                    $icono_id = $red['icono_red_social'];
                    $icono = wp_get_attachment_image_src($icono_id, 'thumbnail'); 
                    $nombre = escaped($red['nombre_red_social']);
                    $enlace = $red['enlace_red_social'];
                ?>
                    <div class="hip-<?= esc_attr($block_name) ?>-red">
                        <?php if ($icono && isset($enlace['url'])) : ?>
                            <a href="<?= esc_url($enlace['url']) ?>" target="<?= esc_attr($enlace['target'] ?? '_self') ?>" alt="<?= $nombre; ?>"><img src="<?= esc_url($icono[0]) ?>" alt="<?= esc_attr($nombre) ?>"></a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
	
	<?php if ($estructura_contenido === 'boxed') : ?>
    <div class="hip-img-container">
		<img src="<?=esc_url($imagen_fondo[0])?>">
	</div>
	<?php endif; ?>
</div>
</section>