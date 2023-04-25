<!--/**
* Template Name: Alumni Stories Page
*/-->
<?php get_header(); if(have_posts()): while(have_posts()): the_post(); 
$banner = get_field('banner_image'); $mainHeading = get_field('main_header'); $backLink = get_field('back_link'); $tileColumnCount = get_field('tile_column_count'); 
$postsGroup = get_field('posts_group');
$postsHeading = $postsGroup['posts_heading']; $submitPostBtn = $postsGroup['submit_post_button']; $postsIntroContent = $postsGroup['posts_intro_content']; $postsCategory = $postsGroup['posts_category'];
?>
<?php if($banner): ?>
<div id="banner" class="interior-banner">
    <div class="banner-inner">
        <?php echo '<img src="'. $banner['url'] .'" alt="'. $banner['alt'] .'" title="'. $banner['title'] .'" class="img-responsive center-block" />'; ?>
        <?php echo $mainHeading ? '<h1 class="banner-header">'. $mainHeading .'</h1>' : ''; ?>
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
    <?php if(have_rows('image_tiles_repeater')): ?>
    <div id="image-tiles">
        <div class="image-tiles-box flex-display">
            <?php while(have_rows('image_tiles_repeater')): the_row(); 
            $image = get_sub_field('image'); $title = get_sub_field('title'); $link = get_sub_field('link'); $tileColor = get_sub_field('tile_color');
            ?>
            <div class="image-tile-box<?php if($tileColumnCount == '2'): ?> flex-2-col-sm<?php elseif($tileColumnCount == '3'): ?> flex-3-col<?php elseif($tileColumnCount == '4'): ?> flex-4-col<?php endif; ?> <?php echo $tileColor ? $tileColor : ''; ?>">
                <div class="image-tile-box-inner">
                    <?php echo $link ? '<a href="'. $link['url'] .'" title="'. $link['title'] .'" target="'. $link['target'] .'">' : ''; ?>
                    <?php echo $image ? '<div class="image-tile-image"><img class="img-responsive center-block" src="'. $image['url'] .'" title="'. $image['title'] .'" alt="'. $image['alt'] .'"></div>' : ''; ?>
                    <?php echo $title ? '<span class="tile-heading">'. $title .'</span>' : ''; ?>
                    <?php echo $link ? '</a>' : ''; ?>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <?php endif; ?>
    <div class="blog-container">
        <?php echo $submitPostBtn ? '<div class="submit-post"><a class="btn" href="'. $submitPostBtn['url'] .'" title="'. $submitPostBtn['title'] .'" alt="'. $submitPostBtn['title'] .'"'. ($submitPostBtn['target'] ? ' target="_blank"' : '') .'>'. $submitPostBtn['title'] .'</a></div>' : ''; ?>
        <?php echo $postsHeading ? '<h2>'. $postsHeading .'</h2>' : ''; ?>
        <?php echo $postsIntroContent ? $postsIntroContent : ''; ?>
        <div class="blog-info">
            <?php $stories_query = new WP_Query(array('category_name' => $postsCategory, 'posts_per_page' => -1)); $count = $stories_query->found_posts; ?>
            <?php while($stories_query->have_posts()) : $stories_query->the_post(); 
            $image = get_field('post_image'); $classYear = get_field('class_year'); $content = get_field('main_post_content');
            $excerpt = getStoriesExcerpt($content, $post->ID, false);
            ?>
            <div class="alumni-story-box">
                <div class="alumni-stories-content">
                    <?php the_post_thumbnail( 'full', array( 'class'  => 'img-responsive pull-left' ) ); ?>
                    <div class="post-content">
                        <h2><?php the_title(); ?></h2>
                        <?php echo $classYear ? '<span class="class-year">'. $classYear .'</span>' : ''; ?>
                        <?php echo $excerpt ? $excerpt : ''; ?>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <?php if($count>3): ?>
            <div class="more-posts">
                <a class="btn more-posts-btn" href="#" title="More Stories" alt="More Stories">More Stories</a>
            </div>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
        </div>
    </div>
</div>
<?php endwhile; endif; get_footer(); ?>
