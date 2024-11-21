<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
	<meta charset="<?php bloginfo('charset');?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <title>
      <?php wp_title(' | ', 'echo', 'right');?>
      <?php bloginfo('name');?>
  </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <?php wp_head();?>
</head>

<body <?php body_class();?>>
<div class="container my-4">
    <!-- Row 1: Header with Site Name, Search Bar, and Write Button -->
    <div class="row align-items-center">
        <div class="col-3">
          <h4><a class="fs-3 navbar-brand text-left" href="<?php echo esc_url(site_url('/')); ?>"><?php bloginfo('name');?></a>
          </h4>
        </div>
        <div class="col-6">
            <input type="text" class="form-control" placeholder="Search...">
        </div>
        <div class="col-3 text-end">
            <button class="btn btn-custom">
                <a href="<?php echo admin_url('post-new.php'); ?>">작성</a>
            </button>

        </div>
    </div>

    <hr>
