<?php 
$block_name = 'faqs';

$imagen_fondo_id = get_field('imagen_fondo');
$imagen_fondo = wp_get_attachment_image_src($imagen_fondo_id, 'full'); 
$style_bg = $imagen_fondo ? 'background-image: url(' . esc_url($imagen_fondo[0]) . '); background-size: cover; background-position: center;' : '';

$titular = escaped(get_field('titular'));
$descripcion = get_field('descripcion');
$boton = get_field('boton');

$color_fondo = 'background-color: var(--color-4);';

$allowed_blocks = [
    'hipoges/faqs-pregunta'
];
?>

<section style="<?= esc_attr($color_fondo) ?> <?= esc_attr($style_bg) ?>">

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

        <div class="hip-<?= esc_attr($block_name) ?>-preguntas">
            <InnerBlocks allowedBlocks='<?= esc_attr(wp_json_encode($allowed_blocks)) ?>' />
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

<script>
if (typeof window.splitFaqsIntoColumns !== 'function') {
    window.splitFaqsIntoColumns = function () {
        const containers = document.querySelectorAll('.hip-faqs-preguntas .acf-innerblocks-container');
        if (!containers.length) return;

        containers.forEach(container => {
            const children = Array.from(container.children);
            if (children.length === 0) return;

            const half = Math.ceil(children.length / 2);
            const firstCol = document.createElement('div');
            const secondCol = document.createElement('div');

            firstCol.className = 'hip-faqs-column first';
            secondCol.className = 'hip-faqs-column second';

            children.forEach((child, index) => {
                if (index < half) {
                    firstCol.appendChild(child);
                } else {
                    secondCol.appendChild(child);
                }
            });

            container.innerHTML = '';
            container.appendChild(firstCol);
            container.appendChild(secondCol);
        });
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', window.splitFaqsIntoColumns);
    } else {
        window.splitFaqsIntoColumns();
    }
}
</script>

</section>
