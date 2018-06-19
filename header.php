<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <meta charset="<?php bloginfo('charset')?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta property="og:title" content="<?php the_title();?>">
	<meta property="og:description" content="<?php ?>">
	<meta property="og:url" content="<?php the_permalink();?>">
	<meta property="og:image" content="<?php the_post_thumbnail_url();?>">
	<meta property="og:image:alt" content="<?php the_post_thumbnail_url();?>">
	<meta property="og:locale" content="es_MX">
	<meta property="og:type" content="website">
	<meta name="twitter:site" content="@">
	<title><?php bloginfo('name');?></title>
	<?php wp_head();?>
	<script>
		var theme_url = '<?php theme_url(); ?>';
		var blog_url = '<?php blog_url(); ?>';
	</script>
</head>
<body <?php body_class();?>>
