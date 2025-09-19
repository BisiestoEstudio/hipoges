<?php 
$block_name = 'contacto';

$titular = escaped(get_field('titular'));
$descripcion = get_field('descripcion');
$datos_contacto = get_field('datos_contacto');
$formulario = get_field('formulario');

$formulario_id = (is_object($formulario) && isset($formulario->ID)) ? $formulario->ID : $formulario;
?>

<section>
<div id="<?= esc_attr($block['id']) ?>" class="hip-<?= esc_attr($block_name) ?> hip-container hip-module">
    <div class="hip-<?= esc_attr($block_name) ?>-container">
        
        <!-- Columna izquierda: Información de contacto -->
        <div class="hip-<?= esc_attr($block_name) ?>-info">
            
            <?php if ($titular) : ?>
                <h2 class="hip-<?= esc_attr($block_name) ?>-titular hip-titular"><?= $titular; ?></h2>
            <?php endif; ?>

            <?php if ($descripcion) : ?>
                <div class="hip-<?= esc_attr($block_name) ?>-descripcion">
                    <?= wp_kses_post($descripcion) ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($datos_contacto)) : ?>
                <div class="hip-<?= esc_attr($block_name) ?>-datos">
                    <?php foreach ($datos_contacto as $dato) :
                        $icono_id = $dato['icono'];
                        $icono = wp_get_attachment_image_src($icono_id, 'thumbnail'); 
                        $texto = escaped($dato['texto']);
                        $enlace = $dato['enlace'] ?? false;
                    ?>
                        <div class="hip-<?= esc_attr($block_name) ?>-dato">
                            <?php if ($icono) : ?>
                                <img src="<?= esc_url($icono[0]) ?>" alt="<?= esc_attr(get_post_meta($icono_id, '_wp_attachment_image_alt', true)) ?>">
                            <?php endif; ?>

							<?php if (!empty($enlace)) : ?>
								<a href="<?= esc_url($enlace) ?>" target="_self">
									<?= $texto; ?>
								</a>
							<?php else : ?>
								<p><?= $texto; ?></p>
							<?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>

        <!-- Columna derecha: Formulario -->
        <div class="hip-<?= esc_attr($block_name) ?>-form">
            <?php if (!empty($formulario_id)) : ?>
                <?= do_shortcode('[contact-form-7 id="' . esc_attr($formulario_id) . '"]'); ?>
            <?php endif; ?>
        </div>

    </div>
</div>
</section>