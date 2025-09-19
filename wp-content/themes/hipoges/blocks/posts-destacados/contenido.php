<?php 
$block_name = 'posts-destacados';

$titular = escaped(get_field('titular'));
$descripcion = get_field('descripcion');
$boton = get_field('boton');

$color_fondo = 'background-color: var(--color-4);';

if (is_singular('post')) {
    $categories = get_the_category();
    $category_id = !empty($categories) ? $categories[0]->term_id : null;

    $args = [
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'category__in'   => $category_id ? [$category_id] : [],
        'post__not_in'   => [get_the_ID()],
        'orderby'        => 'date',
        'order'          => 'DESC',
    ];
} else {
    $args = [
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ];
}

$query = new WP_Query($args);
?>

<section style="<?= esc_attr($color_fondo) ?>">
<div id="<?= esc_attr($block['id']) ?>" class="hip-<?= esc_attr($block_name) ?> hip-container hip-module">

    <?php if ($titular) : ?>
        <h2 class="hip-<?= esc_attr($block_name) ?>-titular hip-titular"><?= $titular; ?></h2>
    <?php endif; ?>

    <?php if ($descripcion) : ?>
        <div class="hip-<?= esc_attr($block_name) ?>-descripcion">
            <?= wp_kses_post($descripcion) ?>
        </div>
    <?php endif; ?>

    <?php if ($query->have_posts()) : ?>
        <div class="hip-<?= esc_attr($block_name) ?>-grid">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="hip-<?= esc_attr($block_name) ?>-post">
                    
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="hip-<?= esc_attr($block_name) ?>-imagen">
                            
                            <div class="hip-<?= esc_attr($block_name) ?>-categorias">
                                <?php 
                                $post_categories = get_the_category();
                                if (!empty($post_categories)) :
                                    foreach ($post_categories as $cat) : ?>
                                        <span class="hip-<?= esc_attr($block_name) ?>-categoria">
                                            <?= esc_html($cat->name); ?>
                                        </span>
                                    <?php endforeach; 
                                endif; ?>
                            </div>

                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="hip-<?= esc_attr($block_name) ?>-contenido">
                        <h3 class="hip-<?= esc_attr($block_name) ?>-titulo hip-titular">
                            <a href="<?php the_permalink(); ?>"><?= get_the_title(); ?></a>
                        </h3>

                        <div class="hip-<?= esc_attr($block_name) ?>-extracto">
                            <?= wp_trim_words(get_the_excerpt(), 15, '...'); ?>
                        </div>

                        <a href="<?php the_permalink(); ?>" class="hip-<?= esc_attr($block_name) ?>-leer-mas">
                            <?= esc_html__(get_field('polylang_enlace_post', 'option'), 'hipoges'); ?>
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
    
    <div class="hip-<?= esc_attr($block_name) ?>-navs">
        <img class="hip-<?= esc_attr($block_name) ?>-navs-left" src="<?= get_template_directory_uri() . '/recursos/img/icon-arrow-left.svg' ?>" >
        <div class="hip-<?= esc_attr($block_name) ?>-navs-dots">
            <span class="active">●</span>
            <span>●</span>
            <span>●</span>
        </div>
        <img class="hip-<?= esc_attr($block_name) ?>-navs-right" src="<?= get_template_directory_uri() . '/recursos/img/icon-arrow-right.svg' ?>" >
    </div>

    <?php if ($boton) : ?>
        <div class="hip-<?= esc_attr($block_name) ?>-boton">
            <a href="<?= esc_url($boton['url']) ?>" class="btn btn-primary">
                <?= esc_html($boton['title']) ?>
            </a>
        </div>
    <?php endif; ?>

</div>
</section>