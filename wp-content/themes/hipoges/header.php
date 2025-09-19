<?php
$locations = get_nav_menu_locations();
$header_menu = [];
$header_featured = [];

if(isset($locations['header_menu']))
  $header_menu = wp_get_nav_menu_items($locations['header_menu']);
if(isset($locations['header_featured']))
  $header_featured = wp_get_nav_menu_items($locations['header_featured']);
$header_menu_assoc = [];
$header_menu_html_desktop = [];
$header_menu_html_mobile = [];

foreach ($header_menu as $item)
  if ($item->menu_item_parent == 0)
	  $header_menu_assoc[$item->ID] = ['item' => $item, 'children' => []];
  else
	  $header_menu_assoc[$item->menu_item_parent]['children'][] = $item;

foreach ($header_menu_assoc as $id => $menu) {
  if(!empty($menu['children'])) {
  	$submenu_items = array_map(function ($child) {
      return '<a href="' . esc_url($child->url) . '" target="'. $child->target .'">' . esc_html($child->title) . '</a>';
    }, $menu['children']);
	  $header_menu_html_desktop[] = '<div tabindex="0">'. esc_html($menu['item']->title) .'
      <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.2921 0.293165C13.6497 -0.0657789 14.2291 -0.1024 14.6309 0.223829C15.0326 0.550238 15.1149 1.12444 14.837 1.54805L14.7764 1.63106L8.27645 9.63106C8.08656 9.86474 7.80119 10.0002 7.50008 10.0002C7.19905 10.0001 6.91356 9.86469 6.72371 9.63106L0.223713 1.63106L0.163166 1.54805C-0.114606 1.12446 -0.0324106 0.550185 0.369221 0.223829C0.770968 -0.102568 1.35035 -0.0656506 1.70809 0.293165L1.77645 0.369337L7.50008 7.41328L13.2237 0.369337L13.2921 0.293165Z"/></svg>
    <div>'. implode('', $submenu_items) .'</div></div>';
  } else
	  $header_menu_html_desktop[] = '<a href="' . esc_url($menu['item']->url) . '" target="'. $menu['item']->target .'">'. esc_html($menu['item']->title) .'</a>';
}
foreach ($header_menu_assoc as $id => $menu) {
  if(!empty($menu['children'])) {
  	$submenu_items = array_map(function ($child) {
      return '<a href="' . esc_url($child->url) . '" target="'. $child->target .'">' . esc_html($child->title) . '</a>';
    }, $menu['children']);
	  $header_menu_html_mobile[] = '<div tabindex="0"><div>'. esc_html($menu['item']->title) .'
      <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.2921 0.293165C13.6497 -0.0657789 14.2291 -0.1024 14.6309 0.223829C15.0326 0.550238 15.1149 1.12444 14.837 1.54805L14.7764 1.63106L8.27645 9.63106C8.08656 9.86474 7.80119 10.0002 7.50008 10.0002C7.19905 10.0001 6.91356 9.86469 6.72371 9.63106L0.223713 1.63106L0.163166 1.54805C-0.114606 1.12446 -0.0324106 0.550185 0.369221 0.223829C0.770968 -0.102568 1.35035 -0.0656506 1.70809 0.293165L1.77645 0.369337L7.50008 7.41328L13.2237 0.369337L13.2921 0.293165Z"/></svg>
    </div><div>'. implode('', $submenu_items) .'</div></div>';
  } else
	  $header_menu_html_mobile[] = '<a href="' . esc_url($menu['item']->url) . '" target="'. $menu['item']->target .'">'. esc_html($menu['item']->title) .'</a>';
}

/* Genera y configura el menú para idiomas*/
function custom_languages_nav($device = 'desktop') {
  $custom_flags = [
    '' => '',
    'es' => get_template_directory_uri() . '/recursos/img/flag-es.svg',
    'en' => get_template_directory_uri() . '/recursos/img/flag-uk.svg',
    'it' => get_template_directory_uri() . '/recursos/img/flag-it.svg',
    'pt' => get_template_directory_uri() . '/recursos/img/flag-pt.svg',
    'el' => get_template_directory_uri() . '/recursos/img/flag-el.svg',
  ];

  if (function_exists('pll_the_languages')) {
    $current_lang = pll_current_language(); // Obtener el idioma actual
    $languages = pll_the_languages([
        'dropdown' => 0, // No generar un menú desplegable por defecto
        'show_flags' => 1, // No mostrar las banderas
        'show_names' => 1, // Mostrar los nombres completos para que podamos filtrar
        'hide_if_no_translation' => 1, // Ocultar si no hay traducción
        'raw' => 1 // Obtener los datos en formato array para manipularlos
    ]);

    if(count($languages) > 1) {
      if($device == 'mobile')
        custom_languages_nav_mobile($languages, $current_lang, $custom_flags);
      else if($device == 'desktop')
        custom_languages_nav_dekstop($languages, $current_lang, $custom_flags);
        
    }
  }
}

function custom_languages_nav_dekstop($languages, $current_lang, $custom_flags) {
  echo '<div class="language">';
  // echo '<img class="flag" src="'. get_template_directory_uri() .'/recursos/img/flag-spain.svg">';
  foreach ($languages as $lang)
    if($lang['slug'] === $current_lang)
      echo '<img class="flag" src="'. esc_url($custom_flags[$lang['slug']]) .'" alt="' . esc_attr($lang['name']) . '">';
  echo '<svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.2921 0.293165C13.6497 -0.0657789 14.2291 -0.1024 14.6309 0.223829C15.0326 0.550238 15.1149 1.12444 14.837 1.54805L14.7764 1.63106L8.27645 9.63106C8.08656 9.86474 7.80119 10.0002 7.50008 10.0002C7.19905 10.0001 6.91356 9.86469 6.72371 9.63106L0.223713 1.63106L0.163166 1.54805C-0.114606 1.12446 -0.0324106 0.550185 0.369221 0.223829C0.770968 -0.102568 1.35035 -0.0656506 1.70809 0.293165L1.77645 0.369337L7.50008 7.41328L13.2237 0.369337L13.2921 0.293165Z"/></svg>';
  echo '<div class="language-options">';

  // Mostrar los otros idiomas
  foreach ($languages as $lang)
    if($lang['slug'] !== $current_lang)
      echo '<a href="'. esc_url($lang['url']) .'" lang="' . esc_attr($lang['locale']) . '"><img class="flag" src="' . esc_url($custom_flags[$lang['slug']]) . '" alt="' . esc_attr($lang['name']) . '"></a>';

  echo '</div>';
  echo '</div>';
}

function custom_languages_nav_mobile($languages, $current_lang, $custom_flags) {
  echo '<div class="language">';
  // echo '<img class="flag" src="'. get_template_directory_uri() .'/recursos/img/flag-spain.svg">';
  foreach ($languages as $lang)
    if($lang['slug'] === $current_lang)
      echo '<img class="flag" src="'. esc_url($custom_flags[$lang['slug']]) .'" alt="' . esc_attr($lang['name']) . '">';
  echo '<svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.2921 0.293165C13.6497 -0.0657789 14.2291 -0.1024 14.6309 0.223829C15.0326 0.550238 15.1149 1.12444 14.837 1.54805L14.7764 1.63106L8.27645 9.63106C8.08656 9.86474 7.80119 10.0002 7.50008 10.0002C7.19905 10.0001 6.91356 9.86469 6.72371 9.63106L0.223713 1.63106L0.163166 1.54805C-0.114606 1.12446 -0.0324106 0.550185 0.369221 0.223829C0.770968 -0.102568 1.35035 -0.0656506 1.70809 0.293165L1.77645 0.369337L7.50008 7.41328L13.2237 0.369337L13.2921 0.293165Z"/></svg>';
  echo '<div class="language-options">';

  // Mostrar los otros idiomas
  foreach ($languages as $lang)
    if($lang['slug'] !== $current_lang)
      echo '<a href="'. esc_url($lang['url']) .'" lang="' . esc_attr($lang['locale']) . '"><img class="flag" src="' . esc_url($custom_flags[$lang['slug']]) . '" alt="' . esc_attr($lang['name']) . '"></a>';

  echo '</div>';
  echo '</div>';
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <?php if(is_front_page()) { ?>
    <title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
    <?php } else { ?>
    <title><?php wp_title(' | ', 'echo', 'right'); ?></title>
    <?php } ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	  
	<?php echo get_field('scripts_header', 'option') ?>
	
    <?php wp_head(); ?>

    <script>
      // JavaScript to toggle the navigation menu
      document.addEventListener("DOMContentLoaded", function() {
        const header = document.querySelector("header.mobile");
        const menuButtonOpen = document.querySelector(".bt-open");
        const menuButtonClose = document.querySelector(".bt-close");
        
        menuButtonOpen.addEventListener("click", function() {console.log(header)
          header.classList.add("open");
        });
        menuButtonClose.addEventListener("click", function() {
          header.classList.remove("open");
        });

        document.querySelectorAll("header.mobile .dropdown nav > div > div:nth-of-type(1)")
          .forEach(el => el.addEventListener("click", function() {
              this.classList.toggle("open");
          }));
        document.querySelector("header.mobile .dropdown .language").addEventListener("click", function() {
          this.classList.toggle("open");
        });
      });
    </script>

  </head>
  <body <?php body_class(isset($class) ? $class : ''); ?>>
	<?php echo get_field('scripts_body', 'option') ?>

    <header class="desktop">
      <div class="logo">
        <a href="<?php echo pll_home_url(); ?>">
          <img src="<?php echo get_field('header_logo', 'option') ?>">
        </a>
      </div>
      <nav>
	      <?= implode('', $header_menu_html_desktop); ?>
      </nav>
      <div class="nav-featured">
      <?php foreach($header_featured as $link) { ?>
        <a href="<?=esc_url($link->url)?>" target="<?=$link->target?>"><?=esc_html($link->title)?></a>
      <?php } ?>
      </div>
      <?php custom_languages_nav() ?>
    </header>

    <header class="mobile">
      <div class="header">
        <div class="logo">
          <a href="<?php echo get_site_url(); ?>">
            <img src="<?php echo get_field('header_logo', 'option') ?>">
          </a>
        </div>
        <div class="bt-menu">
          <img class="bt-open" src="<?php echo get_template_directory_uri() .'/recursos/img/menu-bars.svg' ?>">
          <img class="bt-close" src="<?php echo get_template_directory_uri() .'/recursos/img/menu-cross.svg' ?>">
        </div>
      </div>
      <div class="dropdown">
        <nav>
          <?= implode('', $header_menu_html_mobile); ?>
        </nav>
        <?php custom_languages_nav('mobile') ?>
        <div class="nav-featured">
        <?php foreach($header_featured as $link) { ?>
          <a href="<?=esc_url($link->url)?>" target="<?=$link->target?>"><?=esc_html($link->title)?></a>
        <?php } ?>
        </div>
      </div>
    </header>

    <main>
