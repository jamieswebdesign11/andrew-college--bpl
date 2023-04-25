<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */ ?>
<?php get_header(); if(have_posts()): while(have_posts()): the_post(); 
$banner = get_field('single_blog_banner_image'); $mainHeading = get_field('main_heading'); $backLink = get_field('back_link'); $content = get_field('main_content'); $featuredImage = get_field('featured_image'); ?>
<?php if($banner): ?>
<div id="banner" class="interior-banner">
    <div class="banner-inner">
        <?php echo '<img src="'. $banner['url'] .'" alt="'. $banner['alt'] .'" title="'. $banner['title'] .'" class="img-responsive center-block" />'; ?>
    </div>
</div>
<?php endif; ?>
<div id="inner-page-content" class="flex-container">
	<?php echo $backLink ? '<div id="back-link"><a href="'. $backLink['url'] .'" title="'. $backLink['title'] .'" target="'. $backLink['target'] .'">'. $backLink['title'] .'</a></div>' : ''; ?>
    <?php if(have_rows('main_buttons_repeater')): ?>
    <div id="main-buttons" class="flex-align-end">
        <?php while(have_rows('main_buttons_repeater')): the_row(); 
        $button = get_sub_field('button');
        ?>
        <?php echo $button ? '<div class="button-box"><a class="btn" href="'. $button['url'] .'" title="'. $button['title'] .'" target="'. $button['target'] .'">'. $button['title'] .'</a></div>' : ''; ?>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>
    <div id="blog-content">
        <div class="blog-content-inner flex-display-align">
            <?php echo $mainHeading ? '<h1 class="banner-header">'. $mainHeading .'</h1>' : ''; ?>
			
			<div class="blog-page-content">
				<?php echo $featuredImage ? '<img class="img-responsive center-block" src="'. $featuredImage['url'] .'" title="'. $featuredImage['title'] .'" alt="'. $featuredImage['alt'] .'">' : ''; ?>
				<?php echo $content ? $content : ''; ?>
			</div>
        </div>
    </div>
</div>
<?php endwhile; endif; get_footer(); ?>
