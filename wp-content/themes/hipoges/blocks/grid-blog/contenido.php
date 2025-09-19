<?php 
$block_name = 'blog-grid';

$titular = escaped(get_field('titular'));
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$posts_per_page = 6; // Número de posts por página

// Obtener categorías del blog
$categorias = get_categories([
    'taxonomy' => 'category',
    'orderby'  => 'name',
    'order'    => 'ASC',
    'hide_empty' => true
]);

// Query para obtener los posts del blog
$args = [
    'post_type'      => 'post',
    'posts_per_page' => $posts_per_page,
    'paged'          => $paged
];
$query = new WP_Query($args);
?>

<section>
<div id="<?= esc_attr($block['id']) ?>" class="hip-<?= esc_attr($block_name) ?> hip-container hip-module">

    <?php if ($titular) : ?>
        <h2 class="hip-<?= esc_attr($block_name) ?>-titular hip-titular"><?= $titular; ?></h2>
    <?php endif; ?>

    <!-- Categorías -->
    <div class="hip-<?= esc_attr($block_name) ?>-categorias">
        <button class="filter-btn active" data-category="all">Todas</button>
        <?php foreach ($categorias as $categoria) : ?>
            <button class="filter-btn" data-category="<?= esc_attr($categoria->term_id) ?>">
                <?= esc_html($categoria->name) ?>
            </button>
        <?php endforeach; ?>
    </div>

    <!-- Grid de posts -->
    <div class="hip-<?= esc_attr($block_name) ?>-grid">
        <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
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
            <?php endwhile; ?>
        <?php else : ?>
            <p class="hip-<?= esc_attr($block_name) ?>-no-posts">No hay artículos disponibles.</p>
        <?php endif; ?>
    </div>

    <!-- Paginación -->
    <div class="hip-<?= esc_attr($block_name) ?>-pagination">
        <?php
            echo paginate_links([
                'total'        => $query->max_num_pages,
                'current'      => $paged,
                'prev_text'    => '←',
                'next_text'    => '→',
                'mid_size'     => 2
            ]);
        ?>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.filter-btn');
    const postGrid = document.querySelector('.hip-blog-grid-grid');
    const paginationWrapper = document.querySelector('.hip-blog-grid-pagination');

    let currentCategory = 'all';

    function loadPosts(category = 'all', paged = 1) {
        postGrid.innerHTML = '';
        fetch(`<?= admin_url('admin-ajax.php') ?>?action=filtrar_posts&categoria=${category}&paged=${paged}`)
            .then(response => response.text())
            .then(html => {
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = html;

                // Extraer y actualizar contenido
                const newPosts = tempDiv.querySelector('.hip-blog-grid-grid');
                const newPagination = tempDiv.querySelector('.hip-blog-grid-pagination');

                if (newPosts) postGrid.innerHTML = newPosts.innerHTML;
                if (newPagination) paginationWrapper.innerHTML = newPagination.innerHTML;

                bindPaginationLinks(); // Reasignar eventos a la paginación
            })
            .catch(() => {
                postGrid.innerHTML = '<p>Hubo un error al cargar los artículos.</p>';
            });
    }

    function bindPaginationLinks() {
        const paginationLinks = document.querySelectorAll('.hip-blog-grid-pagination a');
        paginationLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const paged = new URL(this.href).searchParams.get('paged') || 1;
                loadPosts(currentCategory, paged);
            });
        });
    }

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            currentCategory = this.dataset.category;
            buttons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            loadPosts(currentCategory, 1);
        });
    });

    bindPaginationLinks(); // Inicial
});
</script>

<?php wp_reset_postdata(); ?>
</section>