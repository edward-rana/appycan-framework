<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php do_action('site_title'); echo apply_filter('site_title_suffix', $GLOBALS['site_title_suffix']); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSS Files -->
  <link rel="stylesheet" href="<?php echo theme_url(); ?>/assets/css/bootstrap.min.css">
  <!--/- CSS Files -->

<?php do_action('before_head_end'); ?>
</head>
<body>