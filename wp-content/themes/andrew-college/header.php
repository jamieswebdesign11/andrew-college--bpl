<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- VIEWPORT FOR MOBILE DEVICES -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TITLE & DESCRIPTION -->
    <title>
        <?php wp_title(); ?>
    </title>
    <!-- NO MORE THAN 75 CHAR.-->
    <?php wp_head(); ?>
    <!-- STYLESHEETS -->
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WVV6KJS');

    </script>
    <!-- End Google Tag Manager -->
    <?php $gaCode = get_theme_mod('google_ga_code'); if($gaCode): echo $gaCode; endif; 
    $logo = get_theme_mod('logo_image');
    $businessName = get_theme_mod('business_name'); 
    $phone = get_theme_mod('phone_number');
    $email = antispambot(get_theme_mod('email'),1);
    $addressLink = get_theme_mod('address_link_checkbox');
    $street = get_theme_mod('street_address'); $city = get_theme_mod('address_city');  $state = get_theme_mod('address_state'); $zip = get_theme_mod('address_zipcode');
    $facebook = get_theme_mod('facebook'); $instagram = get_theme_mod('instagram'); $twitter = get_theme_mod('twitter');
    $headerOptions = get_field('header_options', 'options'); $scrollingMessage = $headerOptions['scrolling_message'];
    $quickLinksTitle = $headerOptions['quick_links_title'];
    $fafsaBox = $headerOptions['fafsa_box'];
    $fafsaTopText = $fafsaBox['fafsa_top_text']; $fafsaMainText = $fafsaBox['fafsa_main_text'];
    ?>
</head>

<body <?php is_front_page() ? body_class() : body_class('interior-page'); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WVV6KJS" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="header">
        <div class="header-inner flex-align-between">
            <div class="logo">
                <?php echo $logo ? '<div class="logo-container"><a href="'. home_url('/') .'" title="Home"><img src="'. $logo .'" alt="'. $businessName .' Logo" title="'. $businessName .' Logo" class="img-responsive logo-img"></a></div>' : ''; ?>
                <?php echo $scrollingMessage ? '<div class="message-scroller-mobile"><span class="message-scroller-inner">'. $scrollingMessage .'</span></div>' : ''; ?>
            </div>
            <div class="c2a">
                <a href="<?php echo home_url('/');?>" title="Home" class="home-link"><i class="fas fa-home"></i></a>
                <?php echo $scrollingMessage ? '<div class="message-scroller"><span class="message-scroller-inner">'. $scrollingMessage .'</span></div>' : ''; ?>
                <?php echo $addressLink ? '<span class="address"><a target="_blank" title="Our Location" href="http://maps.google.com/maps?q='. $street .',+'. $city .',+'. $state .' '. $zip .'"><i class="fas fa-map-marker-alt"></i>Find Us</a></span>' : ''; ?>
                <span class="social">
                    <?php echo $facebook ? '<a class="facebook-icon" title="Facebook" target="_blank" href="'. $facebook .'"><i class="fab fa-facebook-square"></i></a>' : ''; ?>
                    <?php echo $instagram ? '<a class="instagram-icon" title="Instagram" target="_blank" href="'. $instagram .'"><i class="fab fa-instagram"></i></a>' : ''; ?>
                    <?php echo $twitter ? '<a class="twitter-icon" title="Twitter" target="_blank" href="'. $twitter .'"><i class="fab fa-twitter"></i></a>' : ''; ?>
                </span>
            </div>
            <div class="navigation">
                <div id="main-nav" class="main-nav">
                    <div id="mobile-nav" class="mobile-nav">
                        <?php wp_nav_menu(array('theme_location' => 'mobile_menu', 'items_wrap' => '<ul class="mobile-list">%3$s<li class="nav-toggler" id="nav-toggler"><span class="toggle-text toggle-more">More</span><span class="toggle-text toggle-less">Hide</span><i class="fa fa-angle-down"></i></li></ul>')); ?>
                    </div>
                    <div id="menu-wrap" class="menu-wrap-container">
                        <?php wp_nav_menu(array('theme_location' => 'mobile_dropdown_menu', 'items_wrap' => '<ul class="nav-list">%3$s</ul>', 'menu_class' => '', )); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="side-pull-out">
        <div class="nav-trigger">
            <a class="btn"><span class="menu-text">Menu</span> <i class="fas fa-angle-left"></i></a>
        </div>
        <div id="main-nav" class="main-nav">
            <div id="menu-wrap" class="menu-wrap-container">
                <?php wp_nav_menu(array('theme_location' => 'main_menu', 'container' => false, 'walker' => new wp_bootstrap_navwalker())); ?>
            </div>
        </div>
        <?php if(have_rows('header_options', 'options')): while(have_rows('header_options', 'options')): the_row(); 
        if(have_rows('quick_links')): ?>
        <div class="nav-quick-links">
            <?php echo $quickLinksTitle ? '<div class="quick-links-title">'. $quickLinksTitle .'</div>' : ''; ?>
            <?php while(have_rows('quick_links')): the_row(); 
            $icon = get_sub_field('icon'); $title = get_sub_field('title'); $link = get_sub_field('link');
            ?>
            <div class="quick-link-box">
                <?php echo $link ? '<a href="'. $link['url'] .'" title="'. $link['title'] .'" target="'. $link['target'] .'">' : ''; ?>
                <?php echo $icon ? '<span class="quick-link-icon">'. $icon .'</span>' : ''; ?>
                <?php echo $title ? '<span class="quick-link-title">'. $title .'</span>' : ''; ?>
                <?php echo $link ? '</a>' : ''; ?>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; endwhile; endif; ?>
    </div>
