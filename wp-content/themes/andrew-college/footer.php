<?php 
$businessName = get_theme_mod('business_name'); 
$phone = get_theme_mod('phone_number');
$email = antispambot(get_theme_mod('email'),1);
$addressLink = get_theme_mod('address_link_checkbox');
$street = get_theme_mod('street_address'); $city = get_theme_mod('address_city');  $state = get_theme_mod('address_state'); $zip = get_theme_mod('address_zipcode');
$facebook = get_theme_mod('facebook'); $instagram = get_theme_mod('instagram'); $twitter = get_theme_mod('twitter');
$services = get_theme_mod('services'); $company = get_theme_mod('company');
$footerOptions = get_field('footer_options', 'options');
$employmentGroup = $footerOptions['employment_group']; $employmentHeader = $employmentGroup['employment_header']; $employmentContent = $employmentGroup['employment_content'];
$otherThemeOptions = get_field('other_theme_options', 'options');
$applyNowForm = $otherThemeOptions['apply_now_form'];
$partnerName = get_theme_mod('footer_partner_name');
$partnerUrl = get_theme_mod('footer_partner_url');
?>
<div id="apply-now-popup" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Before You Get Started…</h4>
            </div>
            <div class="modal-body">
                <?php if($applyNowForm): $formShort = '[gravityform id='. $applyNowForm .' title=false description=false tabindex=49]'; echo do_shortcode($formShort); endif; ?>
            </div>
        </div>
    </div>
</div>
<div id="footer-content" class="flex-display">
    <?php if ( !is_page_template( 'templates/page-contact.php' )){ ?>
    <div class="contact-info-container flex-40">
        <div itemscope itemtype="http://schema.org/LocalBusiness">
            <h3>Contact Information</h3>
            <?php echo $addressLink ? '<span class="contact-info" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><span itemprop="streetAddress"><a target="_blank" rel="noreferrer" title="Our Location" href="http://maps.google.com/maps?q='. $street .',+'. $city .',+'. $state .' '. $zip .'">' : '<span class="contact-info" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><span itemprop="streetAddress">'; 
                    echo $street ? $street .',<br>' : '';
                    echo $city ? $city .', ' : '';
                    echo $state ? $state .' ' : '';
                    echo $zip ? $zip . '</span>' : '';
                    echo $addressLink ? '</a></span></span>' : '</span></span>';
                ?>
            <?php echo $phone ? '<span class="contact-info" itemprop="telephone"><i class="fas fa-phone"></i><a title="Call Us" rel="noreferrer" href="tel:+1'. $phone .'">'. $phone .'</a></span>' : ''; ?>
            <span class="contact-info footer-social">
                <?php echo $email ? '<span itemprop="email"><a title="Our Email" rel="noreferrer" href="mailto:'. $email .'"><i aria-label="Email Us" title="Email Us" aria-hidden="true" class="fa fa-envelope"></i></a></span>' : ''; ?>
                <?php echo $facebook ? '<a title="Our Facebook" rel="noreferrer" href="'. $facebook .'" target="_blank"><i class="fab fa-facebook-square"></i></a>' : ''; ?>
                <?php echo $instagram ? '<a title="Our Instagram" rel="noreferrer" href="'. $instagram .'" target="_blank"><i class="fab fa-instagram"></i></a>' : ''; ?>
                <?php echo $twitter ? '<a title="Our Twitter" rel="noreferrer" href="'. $twitter .'" target="_blank"><i class="fab fa-twitter"></i></a>' : ''; ?>
            </span>
        </div>
    </div>
    <?php } ?>
    <div class="footer-extra flex-60">
        <div class="flex-display">
            <div class="resources flex-col">
                <h3>Resources</h3>
                <?php if(have_rows('header_options', 'options')): while(have_rows('header_options', 'options')): the_row(); 
                if(have_rows('quick_links')): ?>
                <div class="footer-resources">
                    <?php while(have_rows('quick_links')): the_row(); 
                    $icon = get_sub_field('icon'); $title = get_sub_field('title'); $link = get_sub_field('link');
                    ?>
                    <div class="resource-box">
                        <?php echo $link ? '<a href="'. $link['url'] .'" title="'. $link['title'] .'" target="'. $link['target'] .'">' : ''; ?>
                        <?php echo $icon ? '<span class="quick-link-icon">'. $icon .'</span>' : ''; ?>
                        <?php echo $title ? '<span class="quick-link-title">'. $title .'</span>' : ''; ?>
                        <?php echo $link ? '</a>' : ''; ?>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; endwhile; endif; ?>
            </div>
            <div class="admissions flex-col">
                <h3>Admissions</h3>
                <?php if(have_rows('footer_options', 'options')): while(have_rows('footer_options', 'options')): the_row(); 
                if(have_rows('admissions_links')): ?>
                <div class="footer-resources">
                    <?php while(have_rows('admissions_links')): the_row(); 
                    $icon = get_sub_field('icon'); $title = get_sub_field('title'); $link = get_sub_field('link');
                    ?>
                    <div class="resource-box">
                        <?php echo $link ? '<a href="'. $link['url'] .'" title="'. $link['title'] .'" target="'. $link['target'] .'">' : ''; ?>
                        <?php echo $icon ? '<span class="quick-link-icon">'. $icon .'</span>' : ''; ?>
                        <?php echo $title ? '<span class="quick-link-title">'. $title .'</span>' : ''; ?>
                        <?php echo $link ? '</a>' : ''; ?>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; endwhile; endif; ?>
            </div>
            <div class="employment flex-col">
                <?php echo $employmentHeader ? '<h3>'. $employmentHeader .'</h3>' : ''; ?>
                <?php echo $employmentContent ? $employmentContent : ''; ?>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="footer-inner">
        <?php if('footer_menu' == true): ?>
        <div class="sitemap">
            <?php wp_nav_menu(array('theme_location' => 'footer_menu', 'items_wrap' => '<ul class="list-inline">%3$s</ul>', 'menu_class' => '' )); ?>
        </div>
        <?php endif; ?>
        <div class="copyright">
            <?php echo $partnerName ? '<a href="'. $partnerUrl .'" rel="nofollow" target="_blank">&copy; '. date('Y') .' Copyright &amp; Powered By '. $partnerName .'</a>' : ''; ?>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>
