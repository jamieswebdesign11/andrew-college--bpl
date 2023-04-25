<!--/**
* Template Name: Home Page
*/-->
<?php get_header(); if(have_posts()): while(have_posts()): the_post(); 
$headerOptions = get_field('header_options', 'options'); 
$quickLinksTitle = $headerOptions['quick_links_title'];
$fafsaBox = $headerOptions['fafsa_box'];
$fafsaTopText = $fafsaBox['fafsa_top_text']; $fafsaMainText = $fafsaBox['fafsa_main_text'];
$bannerGroup = get_field('banner_group');
$bannerType = $bannerGroup['banner_type']; $bannerImage = $bannerGroup['banner_image']; $bannerVidFile = $bannerGroup['banner_video_file']; $bannerVidEmbed = $bannerGroup['banner_video_embed'];
$bannerContent = $bannerGroup['banner_content'];
$mainHeading = $bannerContent['main_heading']; $bannerButtonOne = $bannerContent['banner_button_one']; $bannerButtonTwo = $bannerContent['banner_button_two']; $bannerButtonThree = $bannerContent['banner_button_three'];
$leftFeatureBlock = get_field('left_feature_block');
$leftFeatureImage = $leftFeatureBlock['left_feature_image']; $leftFeatureCalendar = $leftFeatureBlock['left_feature_calendar'];
$centerFeatureBlock = get_field('center_feature_block');
$centerFeatureTitle = $centerFeatureBlock['center_feature_title']; $centerFeatureSubTitle = $centerFeatureBlock['center_feature_sub_title']; $centerFeatureForm = $centerFeatureBlock['center_feature_form'];
$rightFeatureBlock = get_field('right_feature_block');
$rightFeatureAthleticsImage = $rightFeatureBlock['right_feature_athletics_image']; $rightFeatureAthleticsTitle = $rightFeatureBlock['right_feature_athletics_title']; $rightFeatureGiftImage = $rightFeatureBlock['right_feature_gift_image']; $rightFeatureGiftIcon = $rightFeatureBlock['right_feature_gift_icon']; $rightFeatureGiftTitle = $rightFeatureBlock['right_feature_gift_title']; $rightFeatureGiftButton = $rightFeatureBlock['right_feature_gift_button'];
$visitCampus = get_field('visit_campus');
$visitCampusImage = $visitCampus['visit_campus_image']; $visitCampusTitle = $visitCampus['visit_campus_title']; $visitCampusButton = $visitCampus['visit_campus_button'];
?>
<div id="banner">
    <div class="banner-inner">
        <?php if($bannerType == 'Image'): ?>
        <?php echo $bannerImage ? '<img class="banner-img img-responsive" src="'. $bannerImage['url'] .'" title="'. $bannerImage['title'] .'" alt="'. $bannerImage['alt'] .'">' : ''; ?>
        <?php endif; ?>
        <?php if($bannerType == 'Video File'): ?>
        <?php echo $bannerVidFile ? '<div class="banner-video parallax-video"><video autoplay muted loop playsinline><source src="'. $bannerVidFile['url'] .'" type="video/mp4" /></video></div>' : ''; ?>
        <?php endif; ?>
        <?php if($bannerType == 'Video Embed'): ?>
        <?php echo $bannerVidEmbed ? '<div class="banner-video parallax-video embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://player.vimeo.com/video/'. $bannerVidEmbed .'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>' : ''; ?>
        <?php endif; ?>
        <div class="banner-content">
            <?php echo $mainHeading ? '<h1>'. $mainHeading .'</h1>' : ''; ?>
            <div class="banner-buttons flex-display">
                <?php echo $bannerButtonOne ? '<div class="flex-col"><a class="btn banner-btn" href="'. $bannerButtonOne['url'] .'" title="'. $bannerButtonOne['title'] .'" target="'. $bannerButtonOne['target'] .'">'. $bannerButtonOne['title'] .'</a></div>' : ''; ?>
                <?php echo $bannerButtonTwo ? '<div class="flex-col"><a class="btn banner-btn" href="'. $bannerButtonTwo['url'] .'" title="'. $bannerButtonTwo['title'] .'" target="'. $bannerButtonTwo['target'] .'">'. $bannerButtonTwo['title'] .'</a></div>' : ''; ?>
                <?php echo $bannerButtonThree ? '<div class="flex-col"><a class="btn banner-btn" href="'. $bannerButtonThree['url'] .'" title="'. $bannerButtonThree['title'] .'" target="'. $bannerButtonThree['target'] .'">'. $bannerButtonThree['title'] .'</a></div>' : ''; ?>
            </div>
        </div>
        <div id="fafsa-banner">
            <div class="fafsa-banner-box">
                <?php echo $fafsaTopText ? '<span class="fafsa-top-text">'. $fafsaTopText .'</span>' : ''; ?>
                <?php echo $fafsaMainText ? '<h2>'. $fafsaMainText .'</h2>' : ''; ?>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div id="top-feature-blocks">
        <div class="top-feature-blocks-inner flex-display">
            <div class="calendar-block flex-25" <?php echo $leftFeatureImage ? 'style="background-image:url('. $leftFeatureImage['url'] .')"' : ''; ?>>
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Event Widget')) : ?>
				<?php endif; ?>
			</div>
            <div class="welcome-block flex-50">
                <div class="welcome-block-inner">
                    <?php echo $centerFeatureTitle ? '<h2>'. $centerFeatureTitle .'</h2>' : ''; ?>
                    <?php echo $centerFeatureSubTitle ? '<h3>'. $centerFeatureSubTitle .'</h3>' : ''; ?>
                    <?php if($centerFeatureForm): $formShort = '[gravityform id='. $centerFeatureForm .' title=false description=false tabindex=49]'; echo do_shortcode($formShort); endif; ?>
                </div>
            </div>
            <div class="additional-block flex-25">
                <div class="gift-block" <?php echo $rightFeatureGiftImage ? 'style="background-image:url('. $rightFeatureGiftImage['url'] .')"' : ''; ?>>
                    <div class="gift-block-inner">
                        <?php echo $rightFeatureGiftIcon ? '<div class="feature-icon">'. $rightFeatureGiftIcon .'</div>' : ''; ?>
                        <?php echo $rightFeatureGiftTitle ? '<h3>'. $rightFeatureGiftTitle .'</h3>' : ''; ?>
                        <?php echo $rightFeatureGiftButton ? '<a class="btn" href="'. $rightFeatureGiftButton['url'] .'" title="'. $rightFeatureGiftButton['title'] .'" target="'. $rightFeatureGiftButton['target'] .'">'. $rightFeatureGiftButton['title'] .'</a>' : ''; ?>
                    </div>
                </div>
                <div class="athletics-block" <?php echo $rightFeatureAthleticsImage ? 'style="background-image:url('. $rightFeatureAthleticsImage['url'] .')"' : ''; ?>>
                    <div class="athletics-block-inner">
                        <?php echo $rightFeatureAthleticsTitle ? '<h3>'. $rightFeatureAthleticsTitle .'</h3>' : ''; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="visit-campus" <?php echo $visitCampusImage ? 'style="background-image:url('. $visitCampusImage['url'] .')"' : ''; ?>>
        <div class="visit-campus-inner">
            <?php echo $visitCampusTitle ? '<h2>'. $visitCampusTitle .'</h2>' : ''; ?>
            <?php echo $visitCampusButton ? '<a class="btn" href="'. $visitCampusButton['url'] .'" title="'. $visitCampusButton['title'] .'" target="'. $visitCampusButton['target'] .'">'. $visitCampusButton['title'] .'</a>' : ''; ?>
        </div>
    </div>
    <?php if(have_rows('feature_links')): ?>
    <div id="feature-links">
        <div class="feature-links-inner flex-display-align">
            <?php while(have_rows('feature_links')): the_row(); 
            $image = get_sub_field('image'); $link = get_sub_field('link');
            ?>
            <div class="feature-link-box flex-5-col-shrink">
                <div class="feature-link-box-inner">
                    <?php echo $image ? '<img class="img-responsive center-block" src="'. $image['url'] .'" title="'. $image['title'] .'" alt="'. $image['alt'] .'">' : ''; ?>
                    <?php echo $link ? '<a class="btn" href="'. $link['url'] .'" title="'. $link['title'] .'" target="'. $link['target'] .'">'. $link['title'] .'</a>' : ''; ?>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <?php endif; ?>
    <div id="news-articles">
        <div class="news-articles-inner flex-display-align">
            <?php $the_query = new WP_Query(array('posts_per_page' => 3, 'paged' => get_query_var('paged'), 'category_name' => news, 'tag' => 'home_page_articles' )); $count = $the_query->found_posts; ?>
            <?php while($the_query->have_posts()) : $the_query->the_post(); 
			$contentImage = get_field('featured_image'); $title = get_field('main_heading'); $content = get_field('main_content');
			$excerpt = getTextExcerpt($content, $post->ID, false);
			?>
            <div class="news-article-box flex-col">
                <div class="article-image-box">
                    <?php echo $contentImage ? '<img class="img-responsive center-block" src="'. $contentImage['url'] .'" title="'. $contentImage['title'] .'" alt="'. $contentImage['alt'] .'">' : ''; ?>
                    <a class="btn hidden-sm hidden-xs" href="<?php echo get_permalink($post->ID); ?>" title="Read More">Read More</a>
                </div>
                <div class="article-content-box">
                    <?php echo $title ? '<h2>'. $title .'</h2>' : ''; ?>
                    <?php echo $excerpt ? '<div class="blog-excerpt">'. $excerpt .'</div>' : ''; ?>
                    <a class="btn hidden-lg hidden-md" href="<?php echo get_permalink($post->ID); ?>" title="Read More">Read More</a>
                </div>
            </div>
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
        </div>
    </div>
    <?php if(have_rows('statistics')): ?>
    <div id="statistics">
        <div class="statistics-inner flex-display-align">
            <?php while(have_rows('statistics')): the_row(); 
            $icon = get_sub_field('icon'); $heading = get_sub_field('heading');
            ?>
            <div class="statistics-box flex-col">
                <?php echo $icon ? $icon : ''; ?>
                <?php echo $heading ? '<h3>'. $heading .'</h3>' : ''; ?>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <?php endif; ?>
    <?php if(have_rows('bottom_testimonial')): ?>
    <div id="bottom-banner">
        <div class="bottom-banner-inner">
            <div id="image-scroller" class="image-scroller">
                <?php while(have_rows('bottom_testimonial')): the_row();
                $image = get_sub_field('image'); $testimonial = get_sub_field('testimonial', false, false);
                ?>
                <div class="scroll-item">
                    <?php echo $image ? '<img class="img-responsive center-block" src="'. $image['url'] .'" title="'. $image['title'] .'" alt="'. $image['alt'] .'">' : ''; ?>
                    <?php echo $testimonial ? '<h2>'. $testimonial .'</h2>' : ''; ?>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php endwhile; endif; get_footer(); ?>
