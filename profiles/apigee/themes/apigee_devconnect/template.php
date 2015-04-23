<?php

/*
 * Implements hook_preprocess_html().
 */
function apigee_devconnect_preprocess_html(&$variables) {
  $header_bg_color         = theme_get_setting('header_bg_color');
  $header_txt_color        = theme_get_setting('header_txt_color');
  $header_hover_bg_color   = theme_get_setting('header_hover_bg_color');
  $header_hover_txt_color  = theme_get_setting('header_hover_txt_color');
  $link_color              = theme_get_setting('link_color');
  $link_hover_color        = theme_get_setting('link_hover_color');
  $footer_bg_color         = theme_get_setting('footer_bg_color');
  $footer_link_color       = theme_get_setting('footer_link_color');
  $footer_link_hover_color = theme_get_setting('footer_link_hover_color');
  $button_background_color = theme_get_setting('button_background_color');
  $button_text_color       = theme_get_setting('button_text_color');
  $button_hover_background_color  = theme_get_setting('button_hover_background_color');
  $button_hover_text_color        = theme_get_setting('button_hover_text_color');

  $dynamic_css = <<<EOF
.navbar-inner {background-color: $header_bg_color}
.navbar .nav > li > a {color: $header_txt_color}
.navbar .nav > li > a.active {background-color: $header_hover_bg_color}
.navbar .nav > li > a:hover, ul.menu li.active-trail a {background-color: $header_hover_bg_color}
.navbar .nav .active > a, .navbar .nav .active > a:hover, .navbar.navbar-fixed-top #main-menu li a:hover {background-color: $header_hover_bg_color}
.navbar .nav > li > a:hover {color: $header_hover_txt_color}
a {color: $link_color}
a:hover {color: $link_hover_color}
.footer .footer-inner {background-color: $footer_bg_color}
.footer .footer-inner .navbar ul.footer-links > li > a {color: $footer_link_color}
.footer .footer-inner .navbar ul.footer-links > li > a:hover {color: $footer_link_hover_color}
.btn {background: $button_background_color; color: $button_text_color}
.btn:hover {background-color: $button_hover_background_color; color: $button_hover_text_color}
.navbar .nav .dropdown-toggle .caret, .navbar .nav .open.dropdown .caret {border-bottom-color: $header_txt_color; border-top-color: $header_txt_color; color: $header_txt_color;}
EOF;

  switch(theme_get_setting('logo_size')) {
    case 'standard':
      break;
    case 'big':
      $dynamic_css .= '.navbar .brand {padding:0;} .navbar .brand {padding-right:10px;} #breadcrumb-navbar {height:60px;}';
      break;
    case 'bigger':
      $dynamic_css .= '.navbar .brand {padding:0;} .navbar .brand {padding-right:10px;} #breadcrumb-navbar {height:105px;}';
      break;
    default:
      break;
  }
  drupal_add_css($dynamic_css, array('group' => CSS_THEME, 'type' => 'inline'));

  /**
   * Deprecation message that will be shown to the users of administrative role.
   */
  if (user_access('administer themes') && !theme_get_setting('disable_deprecation_message')) {
    $message = 'You are using a deprecated theme. It is strongly recommended that you upgrade to the new Responsive theme (<a href="@doc_url" target="_blank">more information</a>). '
      . 'To disable this message please check the <em>Disable deprecation message</em> checkbox on the <a href="@theme_settings">theme settings page.</a>';
    $msg_vars = array(
      '@doc_url' => 'http://apigee.com/docs/developer-services/content/customizing-theme',
      '@theme_settings' => url('admin/appearance/settings/apigee_devconnect', array('query' => array('destination' => $_GET['q'])))
    );
    drupal_set_message(t($message, $msg_vars));
  }

}

/**
 * Preprocessor for theme('page').
 */
function apigee_devconnect_preprocess_page(&$variables) {
  $variables['user_reg_setting'] = variable_get('user_register', USER_REGISTER_VISITORS_ADMINISTRATIVE_APPROVAL);

  $menu_tree = menu_tree_output(menu_tree_all_data('main-menu', NULL, 2));
  $variables['primary_nav'] = drupal_render($menu_tree);

  // Custom Search
  $variables['search'] = FALSE;
  if (theme_get_setting('toggle_search') && module_exists('search')) {
    $variables['search'] = drupal_get_form('search_form');
  }

  if (!user_is_anonymous()) {
    # Fix for long user names
    global $user;
    $user_email = $user->mail;
    if (strlen($user_email) > 22) {
      $tmp = str_split($user_email, 16);
      $user_email = $tmp[0] . '&hellip;';
    }
    $variables['truncated_user_email'] = $user_email;
  } else {
    $variables['truncated_user_email'] = '';
  }
}

/**
 * Preprocessor for theme('region').
 */
function apigee_devconnect_preprocess_region(&$variables, $hook) {
  if ($variables['region'] == 'content') {
    $variables['theme_hook_suggestions'][] = 'region__no_wrapper';
  }

  if($variables['region'] == "sidebar_first") {
    $variables['classes_array'][] = 'well';
  }

  if ($variables['region'] == "sidebar_second") {
    if (isset($variables['elements']['book_navigation'])) {
      $parent_id = 0;
      foreach ($variables['elements']['book_navigation'] as $element) {
        if (is_array($element) && isset($element['#theme'])) {
          $tmp = explode('_', $element['#theme']);
          $parent_id = $tmp[sizeof($tmp) - 1];
        }
      }
      if ($parent_id > 0) {
        $parent_info = node_load($parent_id);
        $tmp = $variables['content'];
        $tmp = str_replace('<h2>Topics</h2>', '<h3><a href="/' . $parent_info -> book['link_path'] . '">' . $parent_info -> title . '</a></h3><h2>Topics</h2>', $tmp);
        $variables['content'] = $tmp;
      }
    }
  }
}

/**
 * Implements hook_comment_form_alter()
 */
function apigee_devconnect_form_comment_form_alter(&$form, &$form_state) {
  hide($form['subject']);
  hide($form['author']);
  hide($form['actions']['preview']);
  $form['actions']['submit']['#value'] = 'Add comment';
}

/**
 * Implements hook_css_alter()
 */
function apigee_devconnect_css_alter(&$css) {
  if (isset($css['misc/ui/jquery.ui.theme.css'])) {
    $css['misc/ui/jquery.ui.theme.css']['data'] = drupal_get_path('theme', 'apigee_devconnect') . '/jquery_ui/jquery-ui-1.9.0.custom.css';
  }

  // Add/Remove apigee_devconnect_wide_layout.css depending on theme setting value (defaults to enabled)
  if (theme_get_setting('wide_layout') == 0) {
    unset($css[drupal_get_path('theme', 'apigee_devconnect') . '/css/apigee_devconnect_wide_layout.css']);
  }
}

/**
 * Preprocessor for theme('menu_link').
 */
function apigee_devconnect_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    // Add our own wrapper
    unset($element['#below']['#theme_wrappers']);
    if (isset($element['#original_link']['module']) && $element['#original_link']['module'] == 'book') {
      $sub_menu = '<ul>' . drupal_render($element['#below']) . '</ul>';
    } else {
      $sub_menu = '<ul class="dropdown-menu">' . drupal_render($element['#below']) . '</ul>';
    }
    $element['#localized_options']['attributes']['class'][] = 'dropdown-toggle';
    $element['#localized_options']['attributes']['data-toggle'] = 'dropdown';
    // Check if this element is nested within another
    if ((!empty($element['#original_link']['depth'])) && ($element['#original_link']['depth'] > 1)) {
      // Generate as dropdown submenu
      $element['#attributes']['class'][] = 'dropdown-submenu';
    }
    else {
      // Generate as standard dropdown
      $element['#attributes']['class'][] = 'dropdown';
      $element['#localized_options']['html'] = TRUE;
      $element['#title'] .= '<span class="caret"></span>';
    }
  }

  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}
