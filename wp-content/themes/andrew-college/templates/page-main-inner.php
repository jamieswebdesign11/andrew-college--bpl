<!--/**
* Template Name: Main Inner
*/-->
<?php if (have_posts()): while(have_posts()): the_post(); get_header();
$headerOptions = get_field('header_options', 'options');
$quickLinksTitle = $headerOptions['quick_links_title'];
$fafsaBox = $headerOptions['fafsa_box'];
$fafsaTopText = $fafsaBox['fafsa_top_text']; $fafsaMainText = $fafsaBox['fafsa_main_text'];
$banner = get_field('static_banner_image'); $mainHeading = get_field('main_heading'); $pageContainer = get_field('page_container'); $sideNavigation = get_field('side_navigation'); $menuNav = get_field('menu_nav'); $sideNavMenu = get_field('side_nav_menu'); $sideNav = get_field('side_nav'); 
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
<div id="inner-page-content" class="flex-display<?php echo $pageContainer ? ' flex-container' : ''; ?>">
    <?php if($sideNavigation): if($menuNav): ?>
    <div id="side-nav" class="flex-20">
        <div class="side-nav-inner">
            <?php wp_nav_menu(array('theme_location' => $sideNavMenu, 'items_wrap' => '<ul class="side-nav-menu">%3$s</ul>')); ?>
        </div>
    </div>
    <?php else: ?>
    <?php if(have_rows('side_nav')): ?>
    <div id="side-nav" class="flex-20">
        <div class="side-nav-inner">
            <?php while(have_rows('side_nav')): the_row(); 
            $link = get_sub_field('link'); $activePage = get_sub_field('active_page');
            ?>
            <?php echo $link ? '<div class="side-nav-link'. ($activePage ? ' active' : '') .'"><a href="'. $link['url'] .'" title="'. $link['title'] .'"'. ($link['target'] ? ' target="_blank"' : '') .'>'. $link['title'] .'</a></div>' : ''; ?>
            <?php endwhile; ?>
        </div>
    </div>
    <?php endif; endif; endif; ?>
    <div id="main-inner-content" <?php echo $sideNavigation ? 'class="flex-80"' : ''; ?>>
        <div class="main-inner-content-inner">
            <?php $i = 0; if(have_rows('sections')): while(have_rows('sections')): the_row(); $i++; ?>

            <!-- Select Dropdown Menu -->
            <?php if(get_row_layout() == 'select_dropdown'): 
            $menuName = get_sub_field('menu_name'); $menuPlaceholderText = get_sub_field('menu_placeholder_text');
            ?>
            <div id="select-dropdown-menu">
                <?php wp_nav_menu(array('theme_location' => $menuName, 'items_wrap' => '<div class="select-dropdown-menu-box"><option value="" disabled selected>'. $menuPlaceholderText .'</option>%3$s</div>')); ?>
            </div>

            <!-- Back Link -->
            <?php elseif(get_row_layout() == 'back_link_section'): 
            $backLink = get_sub_field('back_link');
            ?>
            <div id="back-link">
                <?php echo $backLink ? '<a href="'. $backLink['url'] .'" title="'. $backLink['title'] .'"'. ($backLink['target'] ? ' target="_blank"' : '') .'>'. $backLink['title'] .'</a>' : ''; ?>
            </div>

            <!-- Main Buttons Section -->
            <?php elseif(get_row_layout() == 'main_buttons'): 
            $searchField = get_sub_field('search_field');
            if(have_rows('main_buttons_repeater')): ?>
            <div id="main-buttons" class="flex-align-end">
                <?php if($searchField): ?>
                <input id="myInput" type="text" placeholder="Search Directory...">
                <?php endif; ?>
                <?php while(have_rows('main_buttons_repeater')): the_row(); 
                $button = get_sub_field('button'); 
                ?>
                <?php echo $button ? '<div class="button-box"><a class="btn" href="'. $button['url'] .'" title="'. $button['title'] .'"'. ($button['target'] ? ' target="_blank"' : '') .'>'. $button['title'] .'</a></div>' : ''; ?>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>

            <!-- Content Block Section -->
            <?php elseif(get_row_layout() == 'content_block'): 
            $content = get_sub_field('content'); ?>
            <?php echo $content ? '<div id="content">'. $content .'</div>' : ''; ?>

            <!-- Feature Section -->
            <?php elseif(get_row_layout() == 'feature'): if(have_rows('feature_repeater')): ?>
            <div id="feature" class="flex-display">
                <?php while(have_rows('feature_repeater')): the_row();
                $image = get_sub_field('image'); $heading = get_sub_field('heading'); $content = get_sub_field('content');
                ?>
                <div class="feature-box flex-4-col-shrink">
                    <div class="feature-box-inner">
                        <?php echo $image ? '<img class="img-responsive center-block img-circle" src="'. $image['url'] .'" title="'. $image['title'] .'" alt="'. $image['alt'] .'">' : ''; ?>
                        <?php echo $heading ? '<h2>'. $heading .'</h2>' : ''; ?>
                        <?php echo $content ? $content : ''; ?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>

            <!-- Feature Blocks Section -->
            <?php elseif(get_row_layout() == 'feature_blocks'): if(have_rows('feature_blocks_repeater')): ?>
            <div id="feature-blocks" class="flex-display">
                <?php while(have_rows('feature_blocks_repeater')): the_row(); 
                $heading = get_sub_field('heading'); $content = get_sub_field('content'); 
                ?>
                <div class="feature-block-box flex-col">
                    <div class="feature-block-box-inner">
                        <?php echo $heading ? '<span class="block-box-heading">'. $heading .'</span>' : ''; ?>
                        <?php echo $content ? '<div class="feature-block-content">'. $content .'</div>' : ''; ?>
                        <?php if(have_rows('list')): ?>
                        <div class="feature-block-list">
                            <?php while(have_rows('list')): the_row();
                            $listName = get_sub_field('list_name'); $listValue = get_sub_field('list_value');
                            ?>
                            <div class="list-line flex-justify-space-between">
                                <?php echo $listName ? '<div class="list-name flex-80">'. $listName .'</div>' : ''; ?>
                                <?php echo $listValue ? '<div class="list-value flex-20">'. $listValue .'</div>' : ''; ?>
                            </div>
                            <?php endwhile; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>

            <!-- Link Process -->
            <?php elseif(get_row_layout() == 'link_process'):
            $linkProcessTitle = get_sub_field('link_process_title');
            if(have_rows('links')):
            ?>
            <div id="link-process">
                <?php echo $linkProcessTitle ? '<h2>'. $linkProcessTitle .'</h2>' : ''; ?>
                <div class="link-process-timeline flex-display-align">
                    <?php while(have_rows('links')): the_row(); 
                    $icon = get_sub_field('icon'); $title = get_sub_field('title'); $link = get_sub_field('link');
                    ?>
                    <div class="link-box flex-4-col-shrink">
                        <?php echo $link ? '<a href="'. $link['url'] .'" title="'. $link['title'] .'" alt="'. $link['title'] .'"'. ($link['target'] ? ' blank="_blank"' : '') .'>' : ''; ?>
                        <?php echo $icon ? '<div class="link-icon">'. $icon .'</div>' : ''; ?>
                        <?php echo $title ? '<span class="box-text">'. $title .'</span>' : ''; ?>
                        <?php echo $link ? '</a>' : ''; ?>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Image Tiles Section -->
            <?php elseif(get_row_layout() == 'image_tiles'):
            $imageTilesHeading = get_sub_field('image_tiles_heading'); $columnCount = get_sub_field('column_count');
            if(have_rows('image_tiles_repeater')):
            ?>
            <div id="image-tiles">
                <?php echo $imageTilesHeading ? '<h2>'. $imageTilesHeading .'</h2>' : ''; ?>
                <div class="image-tiles-box flex-display">
                    <?php while(have_rows('image_tiles_repeater')): the_row(); 
                    $image = get_sub_field('image'); $title = get_sub_field('title'); $link = get_sub_field('link'); $tileColor = get_sub_field('tile_color');
                    ?>
                    <div class="image-tile-box<?php if($columnCount == '2'): ?> flex-2-col-sm<?php elseif($columnCount == '3'): ?> flex-3-col<?php elseif($columnCount == '4'): ?> flex-4-col<?php endif; ?> <?php echo $tileColor ? $tileColor : ''; ?>">
                        <div class="image-tile-box-inner">
                            <?php echo $link ? '<a href="'. $link['url'] .'" title="'. $link['title'] .'" alt="'. $link['title'] .'"'. ($link['target'] ? ' target="_blank"' : '') .'>' : ''; ?>
                            <?php echo $image ? '<div class="image-tile-image"><img class="img-responsive center-block" src="'. $image['url'] .'" title="'. $image['title'] .'" alt="'. $image['alt'] .'"></div>' : ''; ?>
                            <?php echo $title ? '<span class="tile-heading">'. $title .'</span>' : ''; ?>
                            <?php echo $link ? '</a>' : ''; ?>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Academic Buttons Section -->
            <?php elseif(get_row_layout() == 'academic_buttons'): 
            $academicButtonsTitle = get_sub_field('academic_buttons_title');
            if(have_rows('academic_buttons_repeater')): 
            ?>
            <div id="academic-buttons">
                <?php echo $academicButtonsTitle ? '<h2 class="centered-heading">'. $academicButtonsTitle .'</h2>' : ''; ?>
                <div class="academic-buttons-container flex-display">
                    <?php while(have_rows('academic_buttons_repeater')): the_row();
                    $button = get_sub_field('button'); $toggleButton = get_sub_field('toggle_button'); $toggleContent = get_sub_field('toggle_content');
                    ?>
                    <?php echo $button ? '<div class="academic-button flex-2-col"><a class="btn'. ($toggleButton ? ' toggle-btn' : '') .'" href="'. $button['url'] .'" title="'. $button['title'] .'" alt="'. $button['title'] .'"'. ($button['target'] ? ' target="_blank"' : '') .'>'. $button['title'] .'</a>'. ($toggleContent ? '<div class="toggle-content-box">'. $toggleContent .'</div>' : '') .'</div>' : ''; ?>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Inner Sections Section -->
            <?php elseif(get_row_layout() == 'inner_sections'): if(have_rows('inner_sections_repeater')): ?>
            <div id="inner-sections">
                <?php while(have_rows('inner_sections_repeater')): the_row(); 
                $heading = get_sub_field('heading'); $content = get_sub_field('content'); $button = get_sub_field('button'); $imageGroup = get_sub_field('image_group'); $image = $imageGroup['image']; $imageCaption = $imageGroup['image_caption']; $itemsShown = get_sub_field('items_shown'); $additionalContentBox = get_sub_field('additional_content_box'); $additionalContent = get_sub_field('additional_content'); $id = seo_friendly_url($heading);
                $contactCard = get_sub_field('contact_card'); $contentScrollerBox = get_sub_field('content_scroller_box');
                ?>
                <div id="<?php echo $id; ?>" class="inner-section-box">
                    <div class="inner-section-content-box flex-display-align">
                        <?php if(!$contactCard): echo $image ? '<div class="inner-section-image flex-30"><img class="img-responsive center-block" src="'. $image['url'] .'" title="'. $image['title'] .'" alt="'. $image['alt'] .'">'. ($imageCaption ? '<span class="image-caption">'. $imageCaption .'</span>' : '') .'</div>' : '';  endif; ?>
                        <div class="inner-section-content <?php if(!$contactCard): echo $image ? ' flex-70' : ''; endif; ?>">
                            <?php echo $heading ? '<h2>'. $heading .'</h2>' : ''; ?>
                            <?php if(!$contactCard): echo $content ? $content : ''; endif; ?>
                            <?php if($contentScrollerBox): if(have_rows('content_scroller')): ?>
                            <div class="item-scroller" data-items-shown="<?php echo $itemsShown; ?>">
                                <div class="scroller-box">
                                    <?php $i=0; while(have_rows('content_scroller')): the_row(); $i++;
                                    $scrollTitle = get_sub_field('scroll_title'); $scrollContent = get_sub_field('scroll_content', false, false);
                                    ?>
                                    <div class="scroll-item-box">
                                        <?php echo $scrollTitle ? '<span class="scroll-title">'. $scrollTitle .'</span>' : ''; ?>
                                        <?php echo $scrollContent ? $scrollContent : ''; ?>
                                    </div>
                                    <?php endwhile; ?>
                                </div>
                                <div class="scrolls">
                                    <div class="scroll-up"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                    <div class="scroll-down"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                </div>
                            </div>
                            <?php endif; endif; ?>
                            <?php if($contactCard): if(have_rows('contact_card_repeater')): ?>
                            <div class="inner-section-contact-cards flex-display">
                                <?php $i=0; while(have_rows('contact_card_repeater')): the_row(); $i++;
                                $cardImage = get_sub_field('card_image'); $cardContent = get_sub_field('card_content'); $bioPopup = get_sub_field('bio_popup'); $bioPage = get_sub_field('bio_page'); $name = get_sub_field('name'); $bioContent = get_sub_field('bio_content'); $nameId = seo_friendly_url($name);
                                ?>
                                <div class="contact-card-box flex-4-col-shrink">
                                    <?php echo $bioPage ? '<a class="bio-page-link" href="'. $nameId .'-bio" title="Bio Page">' : ''; ?>
                                    <div class="staff-member-box-inner<?php echo $bioPopup || $bioPage ? ' staff-member-popup-link' : ''; ?>" <?php echo $bioPopup ? 'data-toggle="modal" data-target="#bio-popup-'. $i .'"' : ''; ?>>
                                        <?php echo $cardImage ? '<div class="staff-box-img"><img class="img-responsive center-block" src="'. $cardImage['url'] .'" title="'. $cardImage['title'] .'" alt="'. $cardImage['alt'] .'"></div>' : ''; ?>
                                        <div class="staff-content-box">
                                            <?php echo $cardContent ? $cardContent : ''; ?>
                                        </div>
                                    </div>
                                    <?php echo $bioPage ? '</a>' : ''; ?>
                                </div>
                                <?php if($bioPopup): ?>
                                <div id="bio-popup-<?php echo $i; ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                                <?php echo $name ? '<h4 class="modal-title">'. $name .'</h4>' : ''; ?>
                                            </div>
                                            <?php echo $bioContent ? '<div class="modal-body">'. $bioContent .'</div>' : ''; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php endwhile; ?>
                            </div>
                            <?php endif; endif; ?>
                            <?php if(have_rows('inner_blocks_repeater')): ?>
                            <div class="inner-blocks">
                                <?php while(have_rows('inner_blocks_repeater')): the_row(); 
                                $innerHeading = get_sub_field('inner_heading'); $innerContent = get_sub_field('inner_content'); $innerImage = get_sub_field('inner_image');
                                ?>
                                <div class="inner-block-box flex-display-align">
                                    <div class="inner-block-content flex-70">
                                        <?php echo $innerHeading ? '<h2>'. $innerHeading .'</h2>' : ''; ?>
                                        <?php echo $innerContent ? $innerContent : ''; ?>
                                    </div>
                                    <div class="inner-block-image flex-30">
                                        <?php echo $innerImage ? '<img class="img-responsive center-block" src="'. $innerImage['url'] .'" title="'. $innerImage['title'] .'" alt="'. $innerImage['alt'] .'">' : ''; ?>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            </div>
                            <?php endif; ?>
                            <?php echo $button ? '<div class="inner-content-button"><a class="btn" href="'. $button['url'] .'" title="'. $button['title'] .'" target="'. $button['target'] .'">'. $button['title'] .'</a></div>' : ''; ?>
                        </div>
                    </div>
                    <?php if($additionalContentBox): ?>
                    <div class="additional-content">
                        <?php echo $additionalContent ? $additionalContent : ''; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>

            <!-- Column Section -->
            <?php elseif(get_row_layout() == 'column_section'): 
            $columnSectionHeading = get_sub_field('column_section_heading'); $columnCount = get_sub_field('column_count');
            if(have_rows('column_section_repeater')): 
            ?>
            <div id="column-section">
                <?php echo $columnSectionHeading ? '<h2 class="centered-heading">'. $columnSectionHeading .'</h2>' : ''; ?>
                <div class="column-section-container<?php if($columnCount != '1'): ?> flex-display<?php endif; ?>">
                    <?php while(have_rows('column_section_repeater')): the_row(); 
                    $columnContent = get_sub_field('column_content'); $boxBackgroundImage = get_sub_field('box_background_image'); $isLink = get_sub_field('is_link'); $link = get_sub_field('link'); $imagePresent = get_sub_field('image_present'); $image = get_sub_field('image');
                    ?>
                    <div class="column-box<?php if($columnCount == '2'): ?> flex-2-col <?php elseif($columnCount == '3'): ?> flex-3-col <?php elseif($columnCount == '4'): ?> flex-4-col<?php endif; ?>">
                        <?php echo $boxBackgroundImage ? '<div class="column-box-inner">' : ''; ?>
                        <?php if($isLink): echo $link ? '<a href="'. $link['url'] .'" title="'. $link['title'] .'" alt="'. $link['title'] .'"'. ($link['target'] ? ' target="_blank"' : '') .'>' : ''; endif; ?>
                        <?php if($imagePresent): echo $image ? '<img class="img-responsive center-block" src="'. $image['url'] .'" title="'. $image['title'] .'" alt="'. $image['alt'] .'">' : ''; endif; ?>
                        <?php echo $columnContent ? $columnContent : ''; ?>
                        <?php if($isLink): echo $link ? '</a>' : ''; endif; ?>
                        <?php echo $boxBackgroundImage ? '</div>' : ''; ?>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- FAQ Block Section -->
            <?php elseif(get_row_layout() == 'faq_block'): 
            $faqsHeading = get_sub_field('faqs_heading'); $backgroundTexture = get_sub_field('background_texture');
            if(have_rows('faqs')): 
            ?>
            <div id="faqs" <?php echo $backgroundTexture ? 'class="faq-background-texture"' : ''; ?>>
                <?php echo $faqsHeading ? '<h2 class="faqs-section-heading">'. $faqsHeading .'</h2>' : ''; ?>
                <?php while(have_rows('faqs')): the_row(); 
			    $heading = get_sub_field('heading'); $image = get_sub_field('image');
                $contentGroup = get_sub_field('content_group'); $content = $contentGroup['content']; $innerToggles = $contentGroup['inner_toggles']; $button = $contentGroup['button'];
			    ?>
                <div class="faq-box">
                    <a class="faq-toggle flex-justify-space-between">
                        <?php echo $heading ? '<span class="question">'. $heading .'</span>' : ''; ?>
                        <span class="icon"><i class="fas fa-angle-right"></i></span>
                    </a>
                    <div class="faq-info">
                        <div class="flex-display-align">
                            <?php echo $image ? '<div class="faq-image flex-30"><img class="img-responsive center-block" src="'. $image['url'] .'" title="'. $image['title'] .'" alt="'. $image['alt'] .'"></div>' : ''; ?>
                            <div class="faq-content <?php echo $image ? ' flex-70' : ''; ?>">
                                <?php echo $content ? $content : ''; ?>
                                <?php if($innerToggles): ?>
                                <?php while(have_rows('content_group')): the_row(); if(have_rows('inner_faqs')): while(have_rows('inner_faqs')): the_row();
                                $innerHeading = get_sub_field('inner_heading'); $innerContent = get_sub_field('inner_content'); 
                                ?>
                                <div class="faq-box">
                                    <a class="faq-toggle flex-justify-space-between">
                                        <?php echo $innerHeading ? '<span class="question">'. $innerHeading .'</span>' : ''; ?>
                                        <span class="icon"><i class="fas fa-angle-right"></i></span>
                                    </a>
                                    <div class="faq-info">
                                        <?php echo $innerContent ? $innerContent : ''; ?>
                                    </div>
                                </div>
                                <?php endwhile; endif; endwhile; ?>
                                <?php endif; ?>
                                <?php echo $button ? '<div class="faq-button"><a class="btn" href="'. $button['url'] .'" title="'. $button['title'] .'" target="'. $button['target'] .'">'. $button['title'] .'</a></div>' : ''; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>

            <!-- Staff Members Section -->
            <?php elseif(get_row_layout() == 'staff_members_section'): 
            $staffMembersHeading = get_sub_field('staff_members_heading');
            if(have_rows('staff_members')): 
            ?>
            <div id="staff-members" class="staff-members">
                <?php echo $staffMembersHeading ? '<h2>'. $staffMembersHeading .'</h2>' : ''; ?>
                <div class="staff-members-container flex-display-align">
                    <?php $i=0; while(have_rows('staff_members')): the_row(); $i++;
                    $image = get_sub_field('image'); $firstName = get_sub_field('first_name'); $lastName = get_sub_field('last_name'); $section = get_sub_field('section'); $content = get_sub_field('content'); $contactLink = get_sub_field('contact_link'); $secondaryContactLink = get_sub_field('secondary_contact_link'); $bioPopup = get_sub_field('bio_popup'); $bioPage = get_sub_field('bio_page'); $bioContent = get_sub_field('bio_content'); $fullName = $firstName.' '.$lastName; $nameId = seo_friendly_url($fullName); 
                    ?>
                    <div class="staff-member-box flex-3-col-shrink">
                        <?php echo $bioPage ? '<a class="bio-page-link" href="'. $nameId .'-bio" title="Bio Page">' : ''; ?>
                        <div class="staff-member-box-inner<?php echo $bioPopup || $bioPage ? ' staff-member-popup-link' : ''; ?>" <?php echo $bioPopup ? 'data-toggle="modal" data-target="#bio-popup-'. $i .'"' : ''; ?>>
                            <?php echo $image ? '<img class="img-responsive center-block" src="'. $image['url'] .'" title="'. $image['title'] .'" alt="'. $image['alt'] .'">' : ''; ?>
                            <div class="staff-content-box">
                                <div class="staff-content-heading-section">
                                    <?php echo $lastName ? '<h3>'. ($firstName ? $firstName : '') .' '. $lastName .'</h3>' : ''; ?>
                                    <?php echo $section ? '<span class="section-heading">'. $section .'</span>' : ''; ?>
                                </div>
                                <?php echo $content ? '<span class="staff-content">'. $content . '</span>' : ''; ?>
                                <span class="contact-links">
                                    <?php echo $contactLink ? '<a class="contact-link" href="'. $contactLink['url'] .'" title="'. $contactLink['title'] .'"'. ($contactLink['target'] ? ' target="_blank"' : '') .'>'. $contactLink['title'] .'</a>' : ''; ?>
                                    <?php echo $secondaryContactLink ? '<a class="secondary-contact-link" href="'. $secondaryContactLink['url'] .'" title="'. $secondaryContactLink['title'] .'"'. ($secondaryContactLink['target'] ? ' target="_blank"' : '') .'>'. $secondaryContactLink['title'] .'</a>' : ''; ?>
                                </span>
                            </div>
                        </div>
                        <?php echo $bioPage ? '</a>' : ''; ?>
                    </div>
                    <?php if($bioPopup): ?>
                    <div id="bio-popup-<?php echo $i; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <?php echo $firstName ? '<h4 class="modal-title">'. $firstName . ($lastName ? ' '. $lastName : '') .'</h4>' : ''; ?>
                                </div>
                                <?php echo $bioContent ? '<div class="modal-body">'. $bioContent .'</div>' : ''; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Gallery Section -->
            <?php elseif(get_row_layout() == 'gallery_section'): 
            $galleryHeading = get_sub_field('gallery_heading'); $backgroundTexture = get_sub_field('background_texture');
            if(have_rows('gallery_groups')): 
            ?>
            <div id="gallery" <?php echo $backgroundTexture ? 'class="gallery-background"' : ''; ?>>
                <div class="gallery-inner">
                    <?php echo $galleryHeading ? '<h2>'. $galleryHeading .'</h2>' : ''; ?>
                    <div class="gallery-container flex-display">
                        <?php $i=0; while(have_rows('gallery_groups')): the_row(); $i++; $heading = get_sub_field('heading'); ?>
                        <div id="gallery-<?php echo $i; ?>" class="gallery flex-col">
                            <?php if(have_rows('gallery_images')): while(have_rows('gallery_images')): the_row(); 
                            $image = get_sub_field('image'); 
                            if($image): ?>
                            <a href="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>" class="img-responsive center-block" />
                            </a>
                            <?php endif; endwhile; endif; ?>
                            <?php echo $heading ? '<h3 class="gallery-section-heading">'. $heading .'</h3>' : ''; ?>
                            <span class="under-gallery"><em>Click on the Image Above to View Gallery</em></span>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Single Gallery Section -->
            <?php elseif(get_row_layout() == 'single_gallery_section'):
            if(have_rows('gallery')): 
            ?>
            <div id="single-gallery">
                <div class="gallery-container flex-display">
                    <?php while(have_rows('gallery')): the_row(); 
                    $image = get_sub_field('image'); 
                    ?>
                    <div class="gallery flex-col">
                        <?php echo $image ? '<a href="'. $image['url'] .'" title="'. $image['title'] .'"><img class="img-responsive center-block img-thumb" src="'. $image['url'] .'" title="'. $image['title'] .'" alt="'. $image['alt'] .'"></a>' : ''; ?>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Mixed Sizes Gallery -->
            <?php elseif(get_row_layout() == 'mixed_sizes_gallery'): 
            $columns = get_sub_field('columns'); $items = get_sub_field('image_gallery_repeater'); 
            if(have_rows('image_gallery_repeater')): ?>
            <div class="photo-section">
                <div class="photo-section-inner">
                    <div class="gallery flex-display">
                        <?php
			             for($i = 0; $i < $columns; $i++){
				         echo '<div class="flex-col-sm">';
				            for($j = $i; $j < count($items); $j+= $columns){
				            $image = $items[$j]['image'];
				            if($image):
				                echo '<div class="gallery-img">';
                                echo '<a href="'. $image['url'] .'" title="'. $image['title'] .'"><img class="img-responsive center-block" src="'. $image['sizes']['large'] .'" title="'. $image['title'] .'" alt="'. $image['alt'] .'" />';
                                echo '<div class="gallery-img-overlay">';
                                echo '</div></a>';
                                echo '</div>';
                            endif;
				            }
				        echo '</div>';
			         }
			         ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Newsletters Section -->
            <?php elseif(get_row_layout() == 'newsletter_section'):
            $archiveButton = get_sub_field('archive_button');
            if(have_rows('newsletters')): ?>
            <div id="newsletters">
                <?php while(have_rows('newsletters')): the_row(); 
                $icon = get_sub_field('icon'); $link = get_sub_field('link'); $briefDescription = get_sub_field('brief_description');
                ?>
                <div class="newsletter-row flex-display">
                    <?php echo $icon ? '<div class="flex-10">'. $icon .'</div>' : ''; ?>
                    <?php echo $link ? '<div class="flex-40"><a href="'. $link['url'] .'" title="'. $link['title'] .'" target="'. $link['target'] .'">'. $link['title'] .'</a></div>' : ''; ?>
                    <?php echo $briefDescription ? '<div class="flex-50">'. $briefDescription .'</div>' : ''; ?>
                </div>
                <?php endwhile; ?>
                <?php echo $archiveButton ? '<a class="btn" href="'. $archiveButton['url'] .'" title="'. $archiveButton['title'] .'" target="'. $archiveButton['target'] .'">'. $archiveButton['title'] .'</a>' : ''; ?>
            </div>
            <?php endif; ?>

            <!-- Employment Section -->
            <?php elseif(get_row_layout() == 'employment_section'):
            $employmentHeading = get_sub_field('employment_heading'); $employmentImage = get_sub_field('employment_image'); $jobModal = get_sub_field('job_modal'); 
            $jobModalHeading = $jobModal['job_modal_heading']; $jobModalForm = $jobModal['job_modal_form'];
            if(have_rows('available_jobs')): ?>
            <div id="available-jobs" class="vertical-slider">
                <div class="available-jobs-inner flex-display-align">
                    <?php echo $employmentImage ? '<div class="employment-image flex-40"><img class="img-responsive center-block" src="'. $employmentImage['url'] .'" title="'. $employmentImage['title'] .'" alt="'. $employmentImage['alt'] .'"></div>' : ''; ?>
                    <div class="jobs-container flex-60">
                        <?php echo $employmentHeading ? '<h2>'. $employmentHeading .'</h2>' : ''; ?>
                        <div id="jobs-slider" class="carousel slide vertical" data-ride="carousel" data-interval="false">
                            <div class="carousel-inner">
                                <?php $j=-1; $i = 0; while(have_rows('available_jobs')): the_row(); $j++;
                                $applyBtn = get_sub_field('apply_button'); $jobHeading = get_sub_field('job_heading'); $jobDescription = get_sub_field('job_description'); $moreLink = get_sub_field('more_link');
                                ?>
                                <?php if($j % 2 == 0): $i++;?>
                                <div class="<?php echo $i==1 ? 'item active' : 'item'; ?>">
                                    <?php endif;?>
                                    <div class="job-box flex-display">
                                        <?php echo $applyBtn ? '<div class="apply-button flex-20"><a class="btn job-application-btn" data-toggle="modal" data-target="#job-application-popup" title="'. $applyBtn['title'] .'" target="'. $applyBtn['target'] .'">'. $applyBtn['title'] .'</a></div>' : ''; ?>
                                        <div class="job-description flex-80">
                                            <?php echo $jobHeading ? '<h3 class="job-heading">'. $jobHeading .'</h3>' : ''; ?>
                                            <?php echo $jobDescription ? $jobDescription : ''; ?>
                                            <?php echo $moreLink ? '<a href="'. $moreLink['url'] .'" title="'. $moreLink['title'] .'" alt="'. $moreLink['alt'] .'"'. ($moreLink['target'] ? ' _blank' : '') .'>'. $moreLink['title'] .'</a>' : ''; ?>
                                        </div>
                                    </div>
                                    <?php if($j % 2 != 0): echo '</div>'; endif;?>
                                    <?php endwhile; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php if($i>1): ?>
                    <a class="carousel-control left" href="#jobs-slider" data-slide="prev" data-toggle="slider"><i class="fas fa-angle-down"></i></a>
                    <a class="carousel-control right" href="#jobs-slider" data-slide="next" data-toggle="slider"><i class="fas fa-angle-up"></i></a>
                    <?php endif; ?>
                </div>
                <div id="job-application-popup" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <?php echo $jobModalHeading ? '<h4 class="modal-title">'. $jobModalHeading .'</h4>' : ''; ?>
                            </div>
                            <div class="modal-body">
                                <?php if($jobModalForm): $formShort = '[gravityform id='. $jobModalForm .' title=false description=false tabindex=49]'; echo do_shortcode($formShort); endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Job Details -->
            <?php elseif(get_row_layout() == 'job_details'):  
            $jobName = get_sub_field('job_name'); $jobDetailsContent = get_sub_field('job_details_content'); $jobModalHeading = get_sub_field('job_modal_heading'); $jobModalForm = get_sub_field('job_modal_form'); ?>
            <div id="job-details">
                <div class="job-details-inner">
                    <?php echo $jobName ? '<h2 class="job-name">'. $jobName .'</h2>' : ''; ?>
                    <?php echo $jobDetailsContent ? $jobDetailsContent : ''; ?>
                </div>
                <div id="job-application-popup" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <?php echo $jobModalHeading ? '<h4 class="modal-title">'. $jobModalHeading .'</h4>' : ''; ?>
                            </div>
                            <div class="modal-body">
                                <?php if($jobModalForm): $formShort = '[gravityform id='. $jobModalForm .' title=false description=false tabindex=49]'; echo do_shortcode($formShort); endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step Boxes -->
            <?php elseif(get_row_layout() == 'step_boxes'):
            if(have_rows('step_boxes_repeater')): ?>
            <div id="step-boxes">
                <div class="step-boxes-inner">
                    <?php while(have_rows('step_boxes_repeater')): the_row();
                    $heading = get_sub_field('heading'); $content = get_sub_field('content'); ?>
                    <div class="step-box">
                        <?php echo $heading ? '<h2>'. $heading .'</h2>' : ''; ?>
                        <?php echo $content ? $content : ''; ?>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Form Section -->
            <?php elseif(get_row_layout() == 'form_section'): $form = get_sub_field('form'); ?>
            <div id="form-section">
                <div class="form-section-inner">
                    <?php if($form): $formShort = '[gravityform id='. $form .' title=false description=false tabindex=49]'; echo do_shortcode($formShort); endif; ?>
                </div>
            </div>

            <!-- Map Section -->
            <?php elseif(get_row_layout() == 'map_section'): $mapImage = get_sub_field('map_image'); ?>
            <div id="map-section">
                <div class="map-section-inner flex-display">
                    <div class="map-image flex-60">
                        <?php echo $mapImage ? '<img class="img-responsive center-block" src="'. $mapImage['url'] .'" title="'. $mapImage['title'] .'" alt="'. $mapImage['alt'] .'">' : ''; ?>
                    </div>
                    <?php if(have_rows('building_titles')): ?>
                    <div class="building-titles flex-40">
                        <?php $i=0; while(have_rows('building_titles')): the_row(); $i++;
                        $buildingTitle = get_sub_field('building_title'); $buildingImage = get_sub_field('building_image'); $buildingAddress = get_sub_field('building_address'); $buildingYear = get_sub_field('building_year'); $aboutBuilding = get_sub_field('about_building');
                        ?>
                        <?php echo $buildingTitle ? '<div class="building-title"><a data-toggle="modal" data-target="#building-popup-'. $i .'" title="'. $buildingTitle .'" alt="'. $buildingTitle .'">'. $i .' '. $buildingTitle .'</a></div>' : ''; ?>
                        <div id="building-popup-<?php echo $i; ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                        <?php echo $buildingTitle ? '<h4 class="modal-title">'. $buildingTitle .'</h4>' : ''; ?>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo $buildingImage ? '<img class="img-responsive center-block" src="'. $buildingImage['url'] .'" title="'. $buildingImage['title'] .'" alt="'. $buildingImage['alt'] .'">' : ''; ?>
                                        <div class="building-info flex-display">
                                            <?php echo $aboutBuilding ? '<div class="about-building flex-70"><span class="about-building-header">About</span>'. $aboutBuilding .'</div>' : ''; ?>
                                            <?php echo $buildingAddress || $buildingYear ? '<div class="building-info-inner flex-30">' : ''; ?>
                                            <?php echo $buildingAddress ? '<span class="building-address-header">Address</span>'. $buildingAddress : ''; ?>
                                            <?php echo $buildingYear ? '<span class="building-year-header">Year Build</span>'. $buildingYear : ''; ?>
                                            <?php echo $buildingAddress || $buildingYear ? '</div>' : ''; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Custom Script Section -->
            <?php elseif(get_row_layout() == 'custom_script_section'):
            $includeImage = get_sub_field('include_image'); $image = get_sub_field('image'); $customScript = get_sub_field('custom_script');
            ?>
            <div id="custom-script-section">
                <div class="custom-script-section-inner<?php echo $includeImage ? ' flex-display' : ''; ?>">
                    <?php if($includeImage): ?>
                    <?php echo $image ? '<div class="custom-script-image flex-col"><img class="img-responsive center-block" src="'. $image['url'] .'" title="'. $image['title'] .'" alt="'. $image['alt'] .'"></div>' : ''; ?>
                    <?php endif; ?>
                    <div class="custom-script-box<?php echo $includeImage ? ' flex-col' : ''; ?>">
                        <?php if($customScript  == 'Alumni Association Online Form'): include('wp-content/themes/andrew-college/include/custom-pages/alumni-association-online-form.php');
                        elseif($customScript == 'Make A Gift Form'): include('wp-content/themes/andrew-college/include/custom-pages/make-a-gift.php');
                        elseif($customScript == 'Net Calculator'): include('wp-content/themes/andrew-college/include/custom-pages/net-calculator.php');
                        endif; ?>
                    </div>
                </div>
            </div>

            <?php endif; endwhile; endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); endwhile; endif; ?>
