<?php 
$block_name = 'teambuilding';

$titular = escaped(get_field('titular'));
$descripcion = get_field('descripcion');

$entrada_destacada_1 = get_field('entrada_destacada_1');
$entrada_destacada_2 = get_field('entrada_destacada_2');

if (!function_exists('get_teambuilding_data')) {
    function get_teambuilding_data($post_id) {
        if (!$post_id || get_post_status($post_id) !== 'publish') return null;

        return [
            'titulo'   => escaped(get_the_title($post_id)) ?: 'Sin título',
            'imagen'   => get_the_post_thumbnail_url($post_id, 'large') ?: false,
            'extracto' => has_excerpt($post_id) ? escaped(get_the_excerpt($post_id)) : escaped(wp_trim_words(get_post_field('post_content', $post_id), 20)),
            'link'     => get_permalink($post_id),
        ];
    }
}

$entrada_1 = $entrada_destacada_1 ? get_teambuilding_data($entrada_destacada_1) : null;
$entrada_2 = $entrada_destacada_2 ? get_teambuilding_data($entrada_destacada_2) : null;
?>

<section class="fullwidth">
<div id="<?= esc_attr($block['id'] ?? '') ?>" class="hip-<?= esc_attr($block_name) ?> hip-container hip-module">
    
    <?php if (!empty($titular)) : ?>
        <h2 class="hip-<?= esc_attr($block_name) ?>-titular hip-titular"><?= $titular; ?></h2>
    <?php endif; ?>

    <?php if (!empty($descripcion)) : ?>
        <div class="hip-<?= esc_attr($block_name) ?>-descripcion">
            <?= wp_kses_post($descripcion) ?>
        </div>
    <?php endif; ?>

    <div class="hip-<?= esc_attr($block_name) ?>-grid">
        <?php foreach ([$entrada_1, $entrada_2] as $entrada) : ?>
            <?php if (!empty($entrada)) : ?>
                <div class="hip-<?= esc_attr($block_name) ?>-card" <?= $entrada['imagen'] ? 'style="background-image: url(' . esc_url($entrada['imagen']) . ');"' : ''; ?>>
                    <div class="hip-<?= esc_attr($block_name) ?>-card-content">
                        <h3 class="hip-<?= esc_attr($block_name) ?>-titulo"><?= $entrada['titulo'] ?></h3>
                        <?php if (!empty($entrada['extracto'])) : ?>
                            <p class="hip-<?= esc_attr($block_name) ?>-extracto"><?= $entrada['extracto'] ?></p>
                        <?php endif; ?>
                        <a href="<?= esc_url($entrada['link']) ?>" class="hip-<?= esc_attr($block_name) ?>-leer-mas"><?php echo get_field('polylang_enlace_teambuilding', 'option') ?></a>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

</div>
</section>