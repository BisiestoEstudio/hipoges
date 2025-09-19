<?php 
$block_name = 'certificaciones';

$titular = escaped(get_field('titular'));
$descripcion = get_field('descripcion');
$carrusel_logos = get_field('carrusel_logos');
?>

<section>
<div class="hip-<?= esc_attr($block_name) ?> hip-container hip-module">
    
    <?php if ($titular) : ?>
        <h2 class="hip-<?= esc_attr($block_name) ?>-titular hip-titular"><?= $titular; ?></h2>
    <?php endif; ?>

    <?php if ($descripcion) : ?>
        <div class="hip-<?= esc_attr($block_name) ?>-descripcion">
            <?= wp_kses_post($descripcion) ?>
        </div>
    <?php endif; ?>

    <?php if ($carrusel_logos) : ?>
        <div class="hip-<?= esc_attr($block_name) ?>-carrusel">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php while (have_rows('carrusel_logos')) : the_row(); 
                        $logo_id = get_sub_field('logo_certificacion');
                        $logo = wp_get_attachment_image_src($logo_id, 'medium'); 
                    ?>
                        <?php if ($logo) : ?>
                            <div class="swiper-slide">
                                <img src="<?= esc_url($logo[0]) ?>" alt="<?= esc_attr(get_post_meta($logo_id, '_wp_attachment_image_alt', true)) ?>">
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    <?php endif; ?>

</div>
</section>