<!--/**
* Template Name: Blog Page
*/-->
<?php get_header(); if(have_posts()): while(have_posts()): the_post(); 
$banner = get_field('banner_image'); $mainHeading = get_field('main_heading'); $backLink = get_field('back_link');
?>
<?php if($banner): ?>
<div id="banner" class="interior-banner">
    <div class="banner-inner">
        <?php echo '<img src="'. $banner['url'] .'" alt="'. $banner['alt'] .'" title="'. $banner['title'] .'" class="img-responsive center-block" />'; ?>
        <?php echo $mainHeading ? '<h1 class="banner-header">'. $mainHeading .'</h1>' : ''; ?>
    </div>
</div>
<?php endif; ?>
<div id="inner-page-content" class="flex-display">

	
    <div id="side-nav" class="flex-20">
        <div class="side-nav-inner">
            <?php wp_nav_menu(array('theme_location' => $sideNavMenu, 'items_wrap' => '<ul class="side-nav-menu">%3$s</ul>')); ?>
        </div>
    </div>
   
    <div class="blog-container flex-80">
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
	<div class="flex-display">
        <div class="blog-info flex-70">
            <?php $the_query = new WP_Query(array('posts_per_page' => 3, 'paged' => get_query_var('paged'), 'category_name' => news )); $count = $the_query->found_posts; ?>
            <?php while($the_query->have_posts()) : $the_query->the_post(); 
            $contentImage = get_field('featured_image'); $title = get_field('main_heading'); $content = get_field('main_content');
            $excerpt = getTextExcerpt($content, $post->ID, false);
            ?>
            <div class="blog-page-box flex-display-align">
                <div class="blog-page-image flex-30">
                    <?php echo $contentImage ? '<img class="img-responsive center-block" src="'. $contentImage['url'] .'" title="'. $contentImage['title'] .'" alt="'. $contentImage['alt'] .'">' : ''; ?>
                </div>
                <div class="blog-page-content<?php echo $contentImage ? ' flex-70' : ''; ?>">
                    <?php echo $title ? '<h2>'. $title .'</h2>' : ''; ?>
                    <?php echo $excerpt ? '<p>'. $excerpt .'</p>' : ''; ?>
                    <a class="btn" href="<?php echo get_permalink($post->ID); ?>" title="Read More">Read More</a>
                </div>
            </div>
            <?php endwhile; ?>
            <?php if($count>3): ?>
            <nav class="pagination">
                <?php pagination_bar(); ?>
            </nav>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
        </div>
        <div class="blog-sidebar flex-25">
            <?php get_sidebar( 'the-blog' ); ?>
        </div>
	</div>
    </div>
</div>
<?php endwhile; endif; get_footer(); ?>
