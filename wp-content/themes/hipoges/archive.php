<?php
/**
 * Listado de post de una categoría, etiqueta...
 */
$archives_background_url = get_field('archives_background', 'option');

// Cabecera
get_header(); ?>
<section style="background-color: transparent; background-image: url('<?= $archives_background_url ?>'); background-size: cover; background-position: center right;" class="boxed-hero">
	<div class="hip-hero hip-hero-page hip-module">
		<div class="hip-hero-container hip-container">
			<h1 class="hip-titular"><?= get_the_archive_title(); ?></h1>
		</div>
	</div>
</section>

<section>
	<div class="hip-blog-grid hip-container hip-module">
		<div class="hip-blog-grid-grid">

<?php
if(have_posts()){
	while(have_posts()){
	?>		
	<?php the_post(); ?>
			<div class="hip-blog-grid-post" >
				<div class="hip-blog-grid-post-image">
					<a href="<?= the_permalink(); ?>">
						<?= get_the_post_thumbnail(get_the_ID(), 'medium') ?>
					</a>
				</div>
				<div class="hip-blog-grid-post-contenido">
					<h3 class="hip-blog-grid-post-titulo">
						<a href="<?= the_permalink(); ?>">
							<?= get_the_title(); ?>
						</a>
					</h3>
					<p class="hip-blog-grid-post-extracto">
						<?= wp_trim_words(get_the_excerpt(), 20, '...') ?>
					</p>
					<a href="<?= the_permalink(); ?>">Leer más</a>
				</div>
			</div>	         
	<?php
	}
	next_posts_link( '<<');
	previous_posts_link( '>>' );
}else{
?>
			<p class="hip-blog-grid-no-posts">No hay artículos disponibles.</p>
<?php
}
?>	
		</div>
	</div>
</section>
<?php
// Footer
get_footer();
