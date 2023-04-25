<?php if(have_posts()): while(have_posts()): the_post(); get_header();
$banner = get_field('static_banner_image'); $mainHeading = get_field('main_heading'); $mainContent = get_field('main_content'); $mainBtn = get_field('main_button_1'); $mainBtn2 = get_field('main_button_2'); ?>
<?php if($banner): ?>
<div id="banner">
	<div class="container-fluid banner-inner">
		<div class="row">
			<?php echo '<img src="'. $banner['url'] .'" alt="'. $banner['alt'] .'" title="'. $banner['title'] .'" class="img-responsive center-block" />'; ?>
		</div>
	</div>
</div>
<?php endif; ?>
<main>
	<div class="container main-inner">
		<div class="row">
			<section class="col-xs-12 col-sm-12 col-md-12 col-lg-12 majors-heading">
				<?php echo $mainHeading ? '<h1 class="majors-h1">'. $mainHeading .'</h1>' : ''; ?>
				<?php echo $mainBtn ? '<div class="h1-btn"><a class="btn" href="' . $mainBtn['url'] . ($mainBtn['target'] ? '" target="_blank">' : '">') . $mainBtn['title'] . '</a></div>' : ''; ?>
				<?php echo $mainBtn2 ? '<div class="h1-btn"><a class="btn" href="' . $mainBtn2['url'] . ($mainBtn2['target'] ? '" target="_blank">' : '">') . $mainBtn2['title'] . '</a></div>' : ''; ?>
			</section>
			<section class="col-xs-12">
				<?php echo $mainContent ? $mainContent : ''; ?>
			</section>
		</div>
	</div>
</main>
<?php get_footer(); endwhile; endif; ?>