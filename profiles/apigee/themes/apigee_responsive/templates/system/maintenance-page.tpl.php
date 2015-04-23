<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <!-- HTML5 element support for IE6-8 -->
  <!--[if lt IE 9]>
  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <?php print $scripts; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
<div id="skip-link">
  <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
</div>
<br>
<br>
<br>
<div class="master-container">
  <header id="navbar" role="banner" class="<?php print $navbar_classes; ?>">
  <div class="container">
    <div class="navbar-header">
      <?php if ($logo): ?>
        <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" />
        </a>
      <?php endif; ?>
    </div> 
  </div>
</header>
  <section class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <img src="/profiles/apigee/themes/apigee_responsive/images/homepage-image.png">
        </div>
        <div class="col-md-8">
          <br>
          <br>
          <h1>Updates coming soon!</h1>
          <hr>
          <h3><span class="text-muted"><?php print $content; ?></span></h3>
          <hr>
        </div>
      </div>
    </div>
  </section>
</div>

</body>
</html>
