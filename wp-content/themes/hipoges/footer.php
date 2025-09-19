<?php
$locations = get_nav_menu_locations();
$footer_middle = [];
$footer_right = [];
$footer_bottom = [];

if(isset($locations['footer_middle'])) {
  $footer_middle = wp_get_nav_menu_items($locations['footer_middle']);
  $footer_middle_title = wp_get_nav_menu_object($locations['footer_middle'])->name;
}
if(isset($locations['footer_right'])) {
  $footer_right = wp_get_nav_menu_items($locations['footer_right']);
  $footer_right_title = wp_get_nav_menu_object($locations['footer_right'])->name;
}
if(isset($locations['footer_bottom']))
  $footer_bottom = wp_get_nav_menu_items($locations['footer_bottom']);

  
?>
    </main>

	  <?php wp_footer(); ?>
    <footer>
      <div>
        <div>
          <h3><?php echo get_field('polylang_nombre_empresa', 'option') ?></h3>
          <p><?php echo get_field('polylang_descripcion', 'option') ?>
          <p>© <?php echo get_field('polylang_nombre_legal', 'option') ?>, <?php echo get_field('polylang_ano_inicio_legal', 'option') ?> – <?= obtener_ano_actual(); ?>
        </div>
        <div>
          <h3><?php echo $footer_middle_title ?></h3>
          <nav>
            <?php foreach($footer_middle as $link) { ?>
              <a href="<?=esc_url($link->url)?>" target="<?=$link->target?>"><?=esc_html($link->title)?></a>
            <?php } ?>
          </nav>
        </div>
        <div>
          <h3><?php echo $footer_right_title ?></h3>
          <nav>
            <?php foreach($footer_right as $link) { ?>
              <a href="<?=esc_url($link->url)?>" target="<?=$link->target?>"><?=esc_html($link->title)?></a>
            <?php } ?>
          </nav>
        </div>
      </div>
      <hr>
      <div>
        <nav>
        <?php foreach($footer_bottom as $link) { ?>
          <a href="<?=esc_url($link->url)?>" target="<?=$link->target?>"><?=esc_html($link->title)?></a>
        <?php } ?>
        </nav>
      </div>
    </footer>
  </body>
</html>
