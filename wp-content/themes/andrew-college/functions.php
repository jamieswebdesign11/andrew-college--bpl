<?php
/**
 * @package WordPress
 * @subpackage 
 */
 
add_theme_support( 'post-thumbnails' );
require_once('include/wp_bootstrap_navwalker.php');
add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() { register_nav_menus( array( 'main_menu' => 'Main Menu', 'footer_menu' => 'Footer Menu', 'mobile_menu' => 'Mobile Menu', 'mobile_dropdown_menu' => 'Mobile Dropdown Menu', 'sitemap' => 'Sitemap Menu', 'majors' => 'Majors', 'divisions' => 'Divisions', 'about_menu' => 'About Section Menu', 'academics_menu' => 'Academics Section Menu' , 'admission_menu' => 'Admission Section Menu', 'financial_aid_menu' => 'Financial Aid Section Menu' ));}



function theme_styles() {
	wp_enqueue_style( 'my-bootstrap-extension', get_template_directory_uri() . '/assets/css/bootstrap.css');
	wp_enqueue_style( 'font_awesome', get_template_directory_uri() . '/assets/css/font-awesome.css');
	wp_enqueue_style( 'swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.0/css/swiper.min.css' );
	wp_enqueue_style( 'slick-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css' );
	wp_enqueue_style( 'slick-carousel-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css' );
	wp_enqueue_style( 'photo_box' , get_template_directory_uri() . '/assets/css/photobox.css'); 
	wp_enqueue_style( 'base' , get_template_directory_uri() . '/assets/css/base.css'); 
	wp_enqueue_style( 'flex' , get_template_directory_uri() . '/assets/css/flex.css'); 
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css'); 
}
add_action( 'wp_enqueue_scripts', 'theme_styles');

/*
*
* Default Remove Jquery from Wordpress
*
*/
function theme_js_remove_base_jquery() {

	global $wp_scripts;
	//Remove Default Jquery
	wp_deregister_script( 'jquery' );	
	
}
add_action( 'wp_enqueue_scripts', 'theme_js_remove_base_jquery');

/*
*
* We Will Be Adding Jquery BEFORE Gravity Forms Runs It's Inline Jquery
*
*/
function inject_jquery_above_gravity_form( $content = '' ) 
{
	// keep track of jquery so it's not loaded twice!
	global $jquery_already_injected;
	
	if ( !isset($jquery_already_injected) ) {
		
		$jquery_already_injected = true;

		// End inline script
		$content .= "</script>\n";

		// Inject jQuery
		$content .= "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>\n";		

		// Start inline script again
		$content .= "<script>";
	}

	return $content;
}
add_filter( 'gform_cdata_open', 'inject_jquery_above_gravity_form' );



/**
 * Enqueue jQuery in footer unless it's already been injected above Gravity Form.
 * In this case, enqueue a fake version to trigger dependent scripts, and then remove this fake version.
 */

function enqueue_jquery()
{
	global $jquery_already_injected;

	// jQuery has not been loaded
	if ( !isset($jquery_already_injected) ) {
		
		wp_enqueue_script( 'our_jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', '', '', true);
		wp_enqueue_script( 'bootstrap_js', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.0/js/bootstrap.min.js', '', '', true);
		wp_enqueue_script( 'matchHeight', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js', '', '', true);
		wp_enqueue_script( 'slick-slider', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js', '', '', true);
		wp_enqueue_script( 'swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.0/js/swiper.jquery.min.js', '', '', true);
		wp_enqueue_script( 'photobox', get_template_directory_uri() . '/assets/js/jquery.photobox.js', '', '', true);
        wp_enqueue_script( 'slide_reveal', get_template_directory_uri() . '/assets/js/jquery.slidereveal.min.js', '', '', true);
		wp_enqueue_script( 'visible', get_template_directory_uri() . '/assets/js/visible.js', '', '', true);
        wp_enqueue_script( 'net_calculator', get_template_directory_uri() . '/assets/js/net-calculator.js', '', '', true);
		wp_enqueue_script( 'my_custom_js', get_template_directory_uri() . '/assets/js/scripts.js', '', '', true);
	
	}
	// jQuery has already been loaded above a Gravity Form
	else {
		// Enqueue fake script to trigger dependencies
		wp_enqueue_script( 'jquery', '//fake-jquery-script.js', [], null );
		
		wp_enqueue_script( 'our_jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', '', '', true);
		wp_enqueue_script( 'bootstrap_js', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.0/js/bootstrap.min.js', '', '', true);
		wp_enqueue_script( 'matchHeight', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js', '', '', true);
		wp_enqueue_script( 'slick-slider', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js', '', '', true);
		wp_enqueue_script( 'swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.0/js/swiper.jquery.min.js', '', '', true);
		wp_enqueue_script( 'photobox', get_template_directory_uri() . '/assets/js/jquery.photobox.js', '', '', true);
        wp_enqueue_script( 'slide_reveal', get_template_directory_uri() . '/assets/js/jquery.slidereveal.min.js', '', '', true);
		wp_enqueue_script( 'visible', get_template_directory_uri() . '/assets/js/visible.js', '', '', true);
        wp_enqueue_script( 'net_calculator', get_template_directory_uri() . '/assets/js/net-calculator.js', '', '', true);
		wp_enqueue_script( 'my_custom_js', get_template_directory_uri() . '/assets/js/scripts.js', '', '', true);
	
		
		// Remove this fake script's HTML before it's actually injected into the DOM
		function gc_remove_fake_jquery_script( $tag ) {
			$tag = ( strpos($tag, 'fake-jquery-script') !== false ) ? '' : $tag;
			return $tag;
		}
		add_filter( 'script_loader_tag', 'gc_remove_fake_jquery_script' );
	}

}
add_action('wp_footer', 'enqueue_jquery', 9);





function theme_options_register( $wp_customize ) {
	class Text_Editor_Custom_Control extends WP_Customize_Control { 
		public $type = 'textarea'; /** ** Render the content on the theme customizer page */ 
		public function render_content() { 
		?>
<label><span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
    <?php $settings = array( 'media_buttons' => false, 'quicktags' => true ); $this->filter_editor_setting_link(); wp_editor($this->value(), $this->id, $settings ); ?>
</label>
<?php do_action('admin_footer'); do_action('admin_print_footer_scripts'); } 
		private function filter_editor_setting_link() { 
			add_filter( 'the_editor', function( $output ) { 
				return preg_replace( '/<textarea/', '<textarea ' . $this->get_link(), $output, 1 ); 
			}); 
		} 
	} 
	function editor_customizer_script() {
		wp_enqueue_script( 'wp-editor-customizer', get_template_directory_uri() . '/js/customizer-panel.js', array( 'jquery' ), rand(), true ); 
	}
	add_action( 'customize_controls_enqueue_scripts', 'editor_customizer_script' ); 	 
	
	
	$wp_customize->add_panel( 'theme_options', array(
		'priority' => 40,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options', 'textdomain' ),
		'description' => __( 'Theme Options Panel', 'theme_customizer' ),

    ));
	$wp_customize->add_section( 'theme_option_section_partner', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Partner Details', 'textdomain' ),
		'description' => '',
		'panel' => 'theme_options',
	));
	
	//Partner Name Options
	$wp_customize->add_setting( 'footer_partner_name' , array(
		'default' => '',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_partner_name_control', array(
		'label'      => __( 'Footer Partner Name', 'Theme Options' ),
		'section'    => 'theme_option_section_partner',
		'settings'   => 'footer_partner_name',
		'type'       => 'text'
	)));
	
	
	//Footer Partner URL
	$wp_customize->add_setting( 'footer_partner_url' , array(
		'default' => '',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_partner_url_control', array(
		'label'      => __('Footer Partner URL'),
		'section'    => 'theme_option_section_partner',
		'settings'   => 'footer_partner_url',
		'type'       => 'text'
	)));
	
	$wp_customize->add_section( 'theme_option_section_business', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Business Details', 'textdomain' ),
		'description' => '',
		'panel' => 'theme_options',
	));
	
	
	
	//Business Name
	$wp_customize->add_setting( 'business_name' , array(
		'default'   => '',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'business_name_control', array(
		'label'      => __('Business Name'),
		'section'    => 'theme_option_section_business',
		'settings'   => 'business_name',
		'type'       => 'text'
	)));
	
	//Street Address
	$wp_customize->add_setting( 'street_address' , array(
		'default'   => 'Street Address',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'street_address_control', array(
		'label'      => __( 'Street Address'),
		'section'    => 'theme_option_section_business',
		'settings'   => 'street_address',
		'type'       => 'text'
	)));
	
	//City
	$wp_customize->add_setting( 'address_city' , array(
		'default'   => 'City',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'address_city_control', array(
		'label'      => __( 'Address - City'),
		'section'    => 'theme_option_section_business',
		'settings'   => 'address_city',
		'type'       => 'text'
	)));
	
	//State
	$wp_customize->add_setting( 'address_state' , array(
		'default'   => 'State',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'address_state_control', array(
		'label'      => __( 'Address - State'),
		'section'    => 'theme_option_section_business',
		'settings'   => 'address_state',
		'type'       => 'text'
	)));
	
	//Zipcode
	$wp_customize->add_setting( 'address_zipcode' , array(
		'default'   => 'Zipcode',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'address_zipcode_control', array(
		'label'      => __( 'Address - Zipcode'),
		'section'    => 'theme_option_section_business',
		'settings'   => 'address_zipcode',
		'type'       => 'text'
	)));
	
	//Address Link Checkbox
	$wp_customize->add_setting( 'address_link_checkbox', array(
		'default'    => false,
		'transport'  => 'refresh',
	));
	$wp_customize->add_control(  new WP_Customize_Control( $wp_customize, 'address_link_checkbox_control', array(
		'label'    => __( 'Include google maps link in the header/footer address' ),
		'section'  => 'theme_option_section_business',
		'settings' => 'address_link_checkbox',
		'type'     => 'checkbox'
	)));
	
	//Phone Number
	$wp_customize->add_setting( 'phone_number' , array(
		'default'   => '',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'phone_number_control', array(
		'label'      => __( 'Phone Number'),
		'section'    => 'theme_option_section_business',
		'settings'   => 'phone_number',
		'type'       => 'text'
	)));
	
	//Email
	$wp_customize->add_setting( 'email' , array(
		'default'   => '',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'email_control', array(
		'label'      => __( 'Email'),
		'section'    => 'theme_option_section_business',
		'settings'   => 'email',
		'type'       => 'text'
	)));
	
	//Logo Image
	$wp_customize->add_setting( 'logo_image' , array(
		'default'   => '',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_image_control', array(
		'label'      => __( 'Logo Image'),
		'description' => __('Width maximum 341px, Height should be 225px', 'Business'),
		'section'    => 'theme_option_section_business',
		'settings'   => 'logo_image',
	)));
	
	
	$wp_customize->add_section( 'theme_option_section_social', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Social Networking Details', 'textdomain' ),
		'description' => '',
		'panel' => 'theme_options',
	));
	
	
	//Facebook
	$wp_customize->add_setting( 'facebook' , array(
		'default'   => '',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook_control', array(
		'label'      => __( 'Facebook'),
		'section'    => 'theme_option_section_social',
		'settings'   => 'facebook',
		'type'       => 'text'
	)));
	
	//Twitter
	$wp_customize->add_setting( 'twitter' , array(
		'default'   => '',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter_control', array(
		'label'      => __( 'Twitter'),
		'section'    => 'theme_option_section_social',
		'settings'   => 'twitter',
		'type'       => 'text'
	)));
    
    //Instagram
	$wp_customize->add_setting( 'instagram' , array(
		'default'   => '',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'instagram_control', array(
		'label'      => __( 'Instagram'),
		'section'    => 'theme_option_section_social',
		'settings'   => 'instagram',
		'type'       => 'text'
	)));
	
	
	$wp_customize->add_section( 'theme_option_section_page_settings', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Page Settings', 'textdomain' ),
		'description' => '',
		'panel' => 'theme_options',
	));
	
	
	//Creating 404 page select field list
	$page_list = array(); $args = array('post_type' => 'page'); $themePages = get_posts($args); 
	foreach($themePages as $themePage) {
		$page_list[$themePage->post_title] = $themePage->post_title;
		$removeHome = array_search('Home',$page_list);
		unset($page_list[$removeHome]);
	}
	//404 Banner Image
	$wp_customize->add_setting( '404_banner_image' , array(
		'default'   => '',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, '404_banner_image_control', array(
		'label'      => __( '404 Banner Image'),
		'section'    => 'theme_option_section_page_settings',
		'settings'   => '404_banner_image',
		'type'       => 'select',
		'choices' => $page_list,
	)));
	
	$wp_customize->add_setting( 'google_ga_code' , array(
		'default'   => '',
		'transport' => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'google_ga_code_control', array(
        'label'      => __( 'Google GA Code'),
        'section'    => 'theme_option_section_page_settings',
		'settings'   => 'google_ga_code',
        'type'       => 'textarea',
	)));
}
add_action( 'customize_register', 'theme_options_register' );


require_once get_template_directory() . '/include/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'na_register_required_plugins' );
function na_register_required_plugins() {
	$plugins = array(
	
		array( 'name' => 'Classic Editor', 'slug' => 'classic-editor', 'source' => 'https://downloads.wordpress.org/plugin/classic-editor.zip', 'required' => true, 'version' => '', 'force_activation' => true, 'force_deactivation' => false, 'external_url' => '', 'is_callable' => '', ),
		array( 'name' => 'Simple History', 'slug' => 'simple-history', 'source' => 'https://downloads.wordpress.org/plugin/simple-history.zip', 'required' => true, 'version' => '', 'force_activation' => true, 'force_deactivation' => false, 'external_url' => '', 'is_callable' => '', ),
		array( 'name' => 'User Role Editor', 'slug' => 'user-role-editor', 'source' => 'https://downloads.wordpress.org/plugin/user-role-editor.zip', 'required' => true, 'version' => '', 'force_activation' => true, 'force_deactivation' => false, 'external_url' => '', 'is_callable' => '', ),
		
		array( 'name' => 'Post Types Order', 'slug' => 'post-types-order', 'source' => get_template_directory() . '/packages/plugins/post-types-order.zip', 'required' => true, 'version' => '', 'force_activation' => false, 'force_deactivation' => false, 'external_url' => '', 'is_callable' => '', ),
		array( 'name' => 'Gravity Forms', 'slug' => 'gravityforms', 'source' => get_template_directory() . '/packages/plugins/gravityforms.zip', 'required' => true, 'version' => '', 'force_activation' => false, 'force_deactivation' => false, 'external_url' => '', 'is_callable' => '', ),
		array( 'name' => 'SEO Ultimate', 'slug' => 'seo-ultimate', 'source' => get_template_directory() . '/packages/plugins/seo-ultimate.zip', 'required' => true, 'version' => '', 'force_activation' => false, 'force_deactivation' => false, 'external_url' => '', 'is_callable' => '', ),
		array( 'name' => 'Disable Comments', 'slug' => 'disable-comments', 'source' => get_template_directory() . '/packages/plugins/disable-comments.zip', 'required' => true, 'version' => '', 'force_activation' => false, 'force_deactivation' => false, 'external_url' => '', 'is_callable' => '', ),
		array( 'name' => 'All In One WP Migration', 'slug' => 'all-in-one-wp-migration', 'source' => get_template_directory() . '/packages/plugins/all-in-one-wp-migration.zip', 'required' => true, 'version' => '', 'force_activation' => false, 'force_deactivation' => false, 'external_url' => '', 'is_callable' => '', ),
		array( 'name' => 'All In One WP Migration Unlimited Extension', 'slug' => 'all-in-one-wp-migration-unlimited-extension', 'source' => get_template_directory() . '/packages/plugins/all-in-one-wp-migration-unlimited-extension.zip', 'required' => true, 'version' => '', 'force_activation' => false, 'force_deactivation' => false, 'external_url' => '', 'is_callable' => '', ),
		array( 'name' => 'Advanced Custom Fields PRO', 'slug' => 'advanced-custom-fields-pro', 'source' => get_template_directory() . '/packages/plugins/advanced-custom-fields-pro.zip', 'required' => true,  'version' => '',	'force_activation'   => false,'force_deactivation' => false,'external_url' => '','is_callable' => '',),
		array( 'name' => 'ACF - Repeater Field Tabs', 'slug' => 'acf-repeater-tabs', 'source' => get_template_directory() . '/packages/plugins/acf-repeater-tabs.zip', 'required' => true, 'version' => '1.5.6', 'force_activation' => false, 'force_deactivation' => false, 'external_url' => '', 'is_callable' => '', ),
		array( 'name' => 'Advanced Custom Fields: Gravityforms Add-on', 'slug' => 'acf-gravityforms-add-on', 'source' => get_template_directory() . '/packages/plugins/acf-gravityforms-add-on.zip', 'required' => true, 'version' => '1.2.1', 'force_activation' => false, 'force_deactivation' => false, 'external_url' => '', 'is_callable' => '', ),
	);
	$config = array( 'id' => 'na', 'default_path' => '', 'menu' => 'tgmpa-install-plugins', 'parent_slug' => 'themes.php', 'capability' => 'edit_theme_options', 'has_notices' => true, 'dismissable' => true, 'dismiss_msg' => '', 'is_automatic' => true, 'message' => '', );
	tgmpa( $plugins, $config );
}



function attachmentpages_noindex() {
if(is_attachment()) {
echo '<meta name="robots" content="noindex" />';
}
}
add_action('wp_head', 'attachmentpages_noindex');

function wpdocs_excerpt_more( $more ) {
    return sprintf( '<a class="read-more btn" href="%1$s">%2$s</a>',
        get_permalink( get_the_ID() ),
        __( 'Read More', 'textdomain' )
    );
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

//Sort Directories
add_filter('acf/load_value/name=staff_members', 'my_acf_load_value', 10, 3); //repeater_name
function my_acf_load_value($rows) {
    foreach( $rows as $key => $row ) {
        $column_id[$key] = $row['field_5d8cd065b0ff3'];
    }
    array_multisort( $column_id, SORT_ASC, $rows );
    return $rows;
}

//Get Versioned Filepath for CSS/JS Cache
function get_versioned_filepath($filename){
	$url = get_stylesheet_directory_uri() . $filename;
	$file = get_stylesheet_directory() .'/'. $filename;
	if ( file_exists($file)) {
		return $url . '?ver=' . date("Ymd-His", filemtime($file)) .'-'. filesize($file);
	}
	clearstatcache();
}

//Add options page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Theme Options');
}

//String to SEO Freindly URL
setlocale(LC_ALL, 'en_US.UTF8');
function seo_friendly_url($str, $replace=array(), $delimiter='-') {
	if( !empty($replace) ) {
		$str = str_replace((array)$replace, ' ', $str);
	}
	$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
	$clean = preg_replace("~[^a-zA-Z0-9/_|+ -]~", '', $clean);
	$clean = preg_replace("~[/_|+ -]+~", $delimiter, $clean);
	$clean = strtolower(trim($clean, '-'));
	return $clean;
}

//Add to functions
function twentytwelve_widgets_init() {
    register_sidebar( array(
        'name' => 'The Blog',
        'id' => 'sidebar-the-blog',
        'before_widget' => '<div class="widget">',
        'after_widget' => '<div class="clear"></div></div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'twentytwelve_widgets_init' );

function eventWidget() {
    register_sidebar( array(
        'name' => 'Event Widget',
        'id' => 'event-widget',
        'before_widget' => '<div class="widget">',
        'after_widget' => '<div class="clear"></div></div>',
        'before_title' => '<p class="tribe-events-widget-link">',
        'after_title' => '</p>',
    ) );
}
add_action( 'widgets_init', 'eventWidget' );

function getTextExcerpt($text){
	global $post;
	if($text != ''){
		$text = strip_shortcodes($text);
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]&gt;', ']]&gt;', $text);
		$excerpt_length = 35; 
		$excerpt_more = '...';
		$text = wp_trim_words($text, $excerpt_length, $excerpt_more);
	}
	return $text;
}

function getStoriesExcerpt($text){
	global $post;
	if($text != ''){
		$text = strip_shortcodes($text);
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]&gt;', ']]&gt;', $text);
        $paragraph = str_replace('</p>', '', $text);
		$array = explode('<p>', $paragraph);
		$count ="";
        for($i=0;$i< count($array);$i++){
		  	$fullText .= '<p>'.$array[$i].'</p>';
		}
		$firstArray = explode(' ',$text);
		$count = count($firstArray);
		$excerpt_length = 45; 
        $textExcerpt = '<p class="text-excerpt">'. wp_trim_words($text, $excerpt_length) .'</p>'; 
        $excerpt_more = '<div class="full-text-excerpt">'. $textExcerpt . ($count >= $excerpt_length ? '<span class="excerpt-end"><a class="read-more-text">Read More <span class="fas fa-chevron-right"></span></a></span>':'').'</div><div class="alumni-more"> '. $fullText .'</div>';
	}
	return $excerpt_more;
}

function pagination_bar() {
    global $the_query;
 
    $total_pages = $the_query->max_num_pages;
 
    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));
 
        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}

//Exclude other categories from news blog
function exclude_category_posts( $the_query ) {
    if ($the_query->is_home()) {
        $the_query->set( 'cat', '-12, -13' );
    }
}
add_action( 'pre_get_posts', 'exclude_category_posts' );
function exclude_widget_categories($the_query){
    $exclude = "12,13";
    $the_query["exclude"] = $exclude;
    return $the_query;
}
add_filter("widget_categories_args","exclude_widget_categories");

add_filter('gform_validation', 'gfcf_validation');
function gfcf_validation($validation_result) {
	global $gfcf_fields;
	$form = $validation_result['form'];
	$confirm_error = false;
	if(!isset($gfcf_fields[$form['id']]))
	return $validation_result;
	foreach($gfcf_fields[$form['id']] as $confirm_fields) {
		$values = array();
		// loop through form fields and gather all field values for current set of confirm fields
		foreach($form['fields'] as $field) {
			if(!in_array($field['id'], $confirm_fields))
			continue;
			$values[] = rgpost("input_{$field['id']}");
		}
		// filter out unique values, if greater than 1, a value was different
		if(count(array_unique($values)) <= 1)
		continue;
		$confirm_error = true;
		foreach($form['fields'] as &$field) {
			if(!in_array($field['id'], $confirm_fields))
			continue;
			// fix to remove phone format instruction
			if(RGFormsModel::get_input_type($field) == 'phone')
			$field['phoneFormat'] = '';
			$field['failed_validation'] = true;
			$field['validation_message'] = 'Your values do not match.';
		}
	}
	$validation_result['form'] = $form;
	$validation_result['is_valid'] = !$validation_result['is_valid'] ? false : !$confirm_error;
	return $validation_result;
}
function register_confirmation_fields($form_id, $fields) {
	global $gfcf_fields;
	if(!$gfcf_fields)
		$gfcf_fields = array();
	if(!isset($gfcf_fields[$form_id]))
		$gfcf_fields[$form_id] = array();
		$gfcf_fields[$form_id][] = $fields;
}
register_confirmation_fields( 1, array( 2, 3 ) );


//Match Student ID on Application Form
register_confirmation_fields(8, array(3, 4));

//Match Student ID on Summer Orientation Fee Form
register_confirmation_fields(9, array(5, 6));

//Match Student ID on Non-Refundable Enrollment Deposit Form
register_confirmation_fields(10, array(5, 6));