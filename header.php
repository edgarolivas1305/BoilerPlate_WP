<?php $template_name = 'Site_name'; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
	<meta property="og:title" content="<?php the_title();?>">
	<meta property="og:site_name" content="<?php echo $template_name ?>">
    <meta property="og:description" content="Simple Product">
	<meta property="og:url" content="<?php echo the_permalink();?>">
	<meta property="og:image" content="<?php echo get_the_post_thumbnail_url()?>">	
	<!-- WP HEAD
	============================================= -->
	<?php wp_head(); ?>
	<?php global $post; $postID = $post->ID; ?>
	<title><?php echo $template_name; wp_title( '|', true, 'left' ); ?></title>
	<script>
		var theme_url = '<?php theme_url(); ?>';
		var blog_url = '<?php echo blog_url(); ?>';
	</script>
</head>
<body <?php body_class(); ?>>

<section class="header pad-und-sm">
	<header>
		<div class="row flex_nc">				
			</div>
			<div class="small-6 medium-6 columns flex_nc">
				<a href="<?php blog_url();?>">
					<img src="http://placehold.it/60x150" alt="">
				</a>
			</div>
			<div class="small-6 medium-1 columns">
				<div class="hamburger hamburger--squeeze flex_nc float-right" open_menu>
					<div class="hamburger-box">
						<div class="hamburger-inner"></div>
					</div>
				</div>				
			</div>
		</div>
	</header>
</section>

<main id="skrollr-body">