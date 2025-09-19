<?php 
$block_name = 'desplegables-pregunta';

$pregunta = escaped(get_field('pregunta'));
$respuesta = get_field('respuesta');

$acordeon_id = uniqid('acordeon-desplegables-');
?>

<div class="hip-<?= esc_attr($block_name) ?>">
    <div class="hip-<?= esc_attr($block_name) ?>-container">

        <details>
            <summary class="hip-<?= esc_attr($block_name) ?>-pregunta" data-toggle="<?= esc_attr($acordeon_id) ?>">
                <span class="h4"><?= $pregunta; ?></span>
            </summary>

            <div id="<?= esc_attr($acordeon_id) ?>" class="hip-<?= esc_attr($block_name) ?>-respuesta">
                <?= wp_kses_post($respuesta) ?>
            </div>
        </details>

    </div>
</div>
