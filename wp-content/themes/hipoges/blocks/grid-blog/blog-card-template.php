<?php
/**
 * Template part for rendering a post inside the AJAX grid.
 * Variables esperadas: $post (setup), $block_name
 */

$block_name = $args['block_name'] ?? 'blog-grid';
?>
<div class="hip-<?= esc_attr($block_name) ?>-post" data-category="<?= esc_attr(implode(' ', wp_get_post_categories(get_the_ID()))) ?>">
    <div class="hip-<?= esc_attr($block_name) ?>-post-image">
        <a href="<?= esc_url(get_permalink()) ?>">
            <?= get_the_post_thumbnail(get_the_ID(), 'medium') ?>
        </a>
    </div>
    <div class="hip-<?= esc_attr($block_name) ?>-post-contenido">
        <h3 class="hip-<?= esc_attr($block_name) ?>-post-titulo">
            <a href="<?= esc_url(get_permalink()) ?>">
                <?= get_the_title(); ?>
            </a>
        </h3>
        <p class="hip-<?= esc_attr($block_name) ?>-post-extracto">
            <?= esc_html(wp_trim_words(get_the_excerpt(), 20, '...')) ?>
        </p>
        <a href="<?= esc_url(get_permalink()) ?>" class="btn btn-terciary">Leer más</a>
    </div>
</div>