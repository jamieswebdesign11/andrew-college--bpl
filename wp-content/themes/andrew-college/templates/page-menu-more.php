<!--/**
 * Template Name: Menu Archive Page
 */-->
<?php if(have_posts()): while(have_posts()): the_post(); get_header();
$headerOptions = get_field('header_options', 'options');
$quickLinksTitle = $headerOptions['quick_links_title'];
$fafsaBox = $headerOptions['fafsa_box'];
$fafsaTopText = $fafsaBox['fafsa_top_text']; $fafsaMainText = $fafsaBox['fafsa_main_text'];
$banner = get_field('static_banner_image'); $mainHeading = get_field('main_heading'); $backLink = get_field('back_link');
?>
<?php if($banner): ?>
<div id="banner" class="interior-banner">
    <div class="banner-inner">
        <?php echo '<img src="'. $banner['url'] .'" alt="'. $banner['alt'] .'" title="'. $banner['title'] .'" class="img-responsive center-block" />'; ?>
        <?php echo $mainHeading ? '<h1 class="banner-header">'. $mainHeading .'</h1>' : ''; ?>
        <div id="fafsa-banner">
            <div class="fafsa-banner-box">
                <?php echo $fafsaTopText ? '<span class="fafsa-top-text">'. $fafsaTopText .'</span>' : ''; ?>
                <?php echo $fafsaMainText ? '<h2>'. $fafsaMainText .'</h2>' : ''; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<div id="inner-page-content" class="flex-container">
    <div id="back-link">
        <?php echo $backLink ? '<a href="'. $backLink['url'] .'" title="'. $backLink['title'] .'" target="'. $backLink['target'] .'">'. $backLink['title'] .'</a>' : ''; ?>
    </div>
    <?php if(have_rows('main_buttons_repeater')): ?>
    <div id="main-buttons" class="flex-align-end">
        <?php while(have_rows('main_buttons_repeater')): the_row(); 
        $button = get_sub_field('button');
        ?>
        <?php echo $button ? '<div class="button-box"><a class="btn" href="'. $button['url'] .'" title="'. $button['title'] .'" target="'. $button['target'] .'">'. $button['title'] .'</a></div>' : ''; ?>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>
    <?php while(have_rows('sections', 895)): the_row(); if(have_rows('newsletters')): ?>
    <div id="newsletters-archive">
        <div class="newsletters-archive-inner">
            <?php while(have_rows('newsletters', 895)): the_row(); 
            $icon = get_sub_field('icon'); $link = get_sub_field('link'); $briefDescription = get_sub_field('brief_description');
            ?>
            <div class="newsletter-row flex-display">
                <?php echo $icon ? '<div class="flex-10">'. $icon .'</div>' : ''; ?>
                <?php echo $link ? '<div class="flex-40"><a href="'. $link['url'] .'" title="'. $link['title'] .'" target="'. $link['target'] .'">'. $link['title'] .'</a></div>' : ''; ?>
                <?php echo $briefDescription ? '<div class="flex-50">'. $briefDescription .'</div>' : ''; ?>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <?php endif; endwhile; ?>
</div>
<?php get_footer(); endwhile; endif; ?>
