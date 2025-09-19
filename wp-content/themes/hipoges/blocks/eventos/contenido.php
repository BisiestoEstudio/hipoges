<?php 
$block_name = 'eventos';

$titular = escaped(get_field('titular'));
$descripcion = get_field('descripcion');

// Eventos destacados principales
$evento_principal_1 = get_field('evento_destacado_principal_1');
$evento_principal_2 = get_field('evento_destacado_principal_2');

// Eventos destacados secundarios
$evento_secundario_1 = get_field('evento_destacado_secundario_1');
$evento_secundario_2 = get_field('evento_destacado_secundario_2');

$boton = get_field('boton');

$color_fondo = 'background-color: var(--color-10);';

// Función para obtener los datos del evento
if (!function_exists('obtener_datos_evento')) {
	function obtener_datos_evento($evento_id) {
		if (!$evento_id) return false;

		$fecha_evento = get_field('fecha_evento', $evento_id);
		$fecha_obj = DateTime::createFromFormat('d/m/Y h:i a', $fecha_evento);
		$estado_evento = '';

		if ($fecha_evento) {
			$fecha_actual = date('Y-m-d'); // Fecha actual en formato YYYY-MM-DD
			$estado_evento = ($fecha_obj->format('Y-m-d') >= $fecha_actual) ? get_field('polylang_texto_proximamente', 'option') : get_field('polylang_texto_finalizado', 'option');
			//$estado_evento = strtotime($fecha_evento)."-".strtotime($fecha_actual);
		}

		return [
			'titulo' => get_the_title($evento_id),
			'imagen' => get_the_post_thumbnail_url($evento_id, 'large'),
			'fecha'  => $fecha_evento,
			'descripcion' => get_field('descripcion_evento', $evento_id),
			'url'    => get_permalink($evento_id),
			'estado' => $estado_evento
		];
	}
}
$evento_principal_1 = obtener_datos_evento($evento_principal_1);
$evento_principal_2 = obtener_datos_evento($evento_principal_2);
$evento_secundario_1 = obtener_datos_evento($evento_secundario_1);
$evento_secundario_2 = obtener_datos_evento($evento_secundario_2);
?>

<section style="<?= esc_attr($color_fondo) ?>">
<div id="<?= esc_attr($block['id']) ?>" class="hip-<?= esc_attr($block_name) ?> hip-container hip-module">
    <div>

        <?php if ($titular) : ?>
            <h2 class="hip-<?= esc_attr($block_name) ?>-titular hip-titular"><?= $titular; ?></h2>
        <?php endif; ?>

        <?php if ($descripcion) : ?>
            <div class="hip-<?= esc_attr($block_name) ?>-descripcion">
                <?= wp_kses_post($descripcion) ?>
            </div>
        <?php endif; ?>

        <!-- Eventos principales -->
        <div class="hip-<?= esc_attr($block_name) ?>-principales">
            <?php foreach ([$evento_principal_1, $evento_principal_2] as $evento) :
                if (!$evento) continue;
            ?>
                <div class="hip-<?= esc_attr($block_name) ?>-evento-principal" style="background-image: url('<?= esc_url($evento['imagen']) ?>');">
                    <div class="hip-<?= esc_attr($block_name) ?>-estado-exterior">
                        <?= esc_html($evento['estado']); ?>
                    </div>
                    
                    <!-- Estado del evento (Finalizado / Próximamente) -->
                    <div class="hip-<?= esc_attr($block_name) ?>-evento-principal-content">
                        <div class="hip-<?= esc_attr($block_name) ?>-estado-interior">
                            <?= esc_html($evento['estado']); ?>
                        </div>
                        <h3 class="hip-titular"><?= escaped($evento['titulo']); ?></h3>
                        <!--<p class="hip-<?= esc_attr($block_name) ?>-fecha"><?= escaped($evento['fecha']); ?></p>-->
                        <p class="hip-<?= esc_attr($block_name) ?>-descripcion"><?= wp_kses_post($evento['descripcion']); ?></p>
                        <a href="<?= esc_url($evento['url']) ?>" class="btn-terciary"><?php echo get_field('polylang_enlace_eventos', 'option') ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Eventos secundarios -->
        <div class="hip-<?= esc_attr($block_name) ?>-secundarios">
            <?php foreach ([$evento_secundario_1, $evento_secundario_2] as $evento) :
                if (!$evento) continue;
            ?>
                <div class="hip-<?= esc_attr($block_name) ?>-evento-secundario">
                    <?php if ($evento['imagen']) : ?>
                        <div class="hip-<?= esc_attr($block_name) ?>-evento-secundario-imagen">
                            <img src="<?= esc_url($evento['imagen']) ?>" alt="<?= esc_attr($evento['titulo']) ?>">
                        </div>
                    <?php endif; ?>

                    <div class="hip-<?= esc_attr($block_name) ?>-evento-secundario-content">
                        <h4 class="hip-titular"><?= escaped($evento['titulo']); ?></h4>
                        <p class="hip-<?= esc_attr($block_name) ?>-fecha"><?= DateTime::createFromFormat('d/m/Y h:i a', $evento['fecha'])->format('d/m/Y') ?? ''; ?></p>
                        <a href="<?= esc_url($evento['url']) ?>" class="btn-terciary"><?php echo get_field('polylang_enlace_eventos', 'option') ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if (!empty($boton) && isset($boton['url'], $boton['title'])) : ?>
            <div class="hip-<?= esc_attr($block_name) ?>-boton">
                <a href="<?= esc_url($boton['url']) ?>" class="btn btn-primary" target="<?= esc_attr($boton['target'] ?? '_self') ?>">
                    <?= escaped($boton['title']); ?>
                </a>
            </div>
        <?php endif; ?>

    </div>
</div>
</section>
