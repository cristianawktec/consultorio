<?php
/**
 * SKT Launch Theme Customizer
 *
 * @package SKT Launch
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function sktlaunch_customize_register( $wp_customize ) {
	
	//Add a class for titles
    class sktlaunch_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	
	class WP_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
        <?php
    }
}
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_control('display_header_text');
	
 
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#ff9000',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','skt-launch'),
 			'description' => sprintf( __( 'More color options in <br /> %s.', 'skt-launch' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_PRO_THEME_URL.'"' ), __( 'PRO Version', 'skt-launch' )
						)
					),				
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
// About The Author Section
	$wp_customize->add_section('author_box',array(
		'title'	=> __('About The Author','skt-launch'),
		'description'	=> __('Select Page from the dropdown','skt-launch'),
		'priority'	=> null
	));
	
	$wp_customize->add_setting('authorpage-setting',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'sktlaunch_sanitize_integer'
	));
	
	$wp_customize->add_control('authorpage-setting',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for about the author section','skt-launch'),
			'section'	=> 'author_box'	
	));
	
// About The Author Section	

// Book Features Boxes 	
	$wp_customize->add_section('page_boxes',array(
		'title'	=> __('Book Features Boxes','skt-launch'),
		'description'	=> __('Select Pages from the dropdown','skt-launch'),
		'priority'	=> null
	));
	
	$wp_customize->add_setting('page-setting1',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'sktlaunch_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for box one:','skt-launch'),
			'section'	=> 'page_boxes',
	));
	
	$wp_customize->add_setting('page-setting2',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'sktlaunch_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for box two:','skt-launch'),
			'section'	=> 'page_boxes'
	));
	
	$wp_customize->add_setting('page-setting3',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'sktlaunch_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for box three:','skt-launch'),
			'section'	=> 'page_boxes'
	));	
	 
// Book Features Boxes
 
	$wp_customize->add_section('slider_section',array(
		'title'	=> __('Slider Settings','skt-launch'),
 		'description' => __('Add Slide Here:','skt-launch'),			
		'priority'		=> null
	));	
	// Slide Image 1
	$wp_customize->add_setting('slide_image1',array(
		'default'	=> get_template_directory_uri().'/images/slides/slider1.jpg',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(   new WP_Customize_Image_Control( $wp_customize, 'slide_image1', array(
            'label' => __('Slide Image 1 (1400x544)','skt-launch'),
            'section' => 'slider_section',
            'settings' => 'slide_image1'
       		)
     	 )
	);	
	$wp_customize->add_setting('slide_title1',array(
			'default'	=> __('Welcome To Launch','skt-launch'),
			'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'slide_title1', array(	
			'label'	=> __('Slide title 1','skt-launch'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_title1'
	));
	$wp_customize->add_setting('slide_desc1',array(
		'default'	=> __('Quisque blandit dolor risus, sed dapibus dui facilisis sed. Donec eu porta elit. Aliquam porta sollicitudin ante, acntum orci mattis et. Phasellus ac nibh eleifend, sagittis purus nec, elementum massa.','skt-launch'),
		'sanitize_callback'	=> 'sanitize_text_field'	
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'slide_desc1', array(
				'label'	=> __('Slider description  1','skt-launch'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_desc1'
			)
		)
	);
	$wp_customize->add_setting('slide_link1',array(
			'default'	=> '#link1',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('slide_link1',array(
			'label'	=> __('Slide link 1','skt-launch'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_link1'
	));	
	// Slide Image 2
	$wp_customize->add_setting('slide_image2',array(
			'default'	=> get_template_directory_uri().'/images/slides/slider2.jpg',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control(	new WP_Customize_Image_Control(	$wp_customize, 'slide_image2', array(
				'label'	=> __('Slide image 2','skt-launch'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_image2'
			)
		)
	);	
	$wp_customize->add_setting('slide_title2',array(
			'default'	=> __('Build Your Imagination','skt-launch'),
			'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'slide_title2', array(	
			'label'	=> __('Slide title 2','skt-launch'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_title2'
	));	
	$wp_customize->add_setting('slide_desc2',array(
			'default'	=> __('Quisque blandit dolor risus, sed dapibus dui facilisis sed. Donec eu porta elit. Aliquam porta sollicitudin ante, acntum orci mattis et. Phasellus ac nibh eleifend, sagittis purus nec, elementum massa. Quisque tincidunt sapien a sem porttitor, id convallis dolor','skt-launch'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'slide_desc2', array(
				'label'	=> __('Slide description 2','skt-launch'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_desc2'
			)
		)
	);	
	$wp_customize->add_setting('slide_link2',array(
			'default'	=> '#link2',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('slide_link2',array(
		'label'	=> __('Slide link 2','skt-launch'),
		'section'	=> 'slider_section',
		'setting'	=> 'slide_link2'
	));	
	// Slide Image 3
	$wp_customize->add_setting('slide_image3',array(
			'default'	=> get_template_directory_uri().'/images/slides/slider3.jpg',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control(	$wp_customize,'slide_image3', array(
				'label'	=> __('Slide Image 3','skt-launch'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_image3'				
			)
		)
	);	
	$wp_customize->add_setting('slide_title3',array(
			'default'	=> __('Striving To Excellence','skt-launch'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('slide_title3', array(		
			'label'	=> __('Slide title 3','skt-launch'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_title3'			
	));	
	$wp_customize->add_setting('slide_desc3',array(
			'default'	=> __('Quisque blandit dolor risus, sed dapibus dui facilisis sed. Donec eu porta elit. Aliquam porta sollicitudin ante, acntum orci mattis et. Phasellus ac nibh eleifend, sagittis purus nec, elementum massa. Quisque tincidunt sapien a sem porttitor, id convallis dolor','skt-launch'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(	new WP_Customize_Textarea_Control($wp_customize,'slide_desc3', array(
				'label'	=> __('Slide Description 3','skt-launch'),
				'section'	=> 'slider_section',
				'setting'	=> 'slide_desc3'		
			)
		)
	);	
	$wp_customize->add_setting('slide_link3',array(
			'default'	=> '#link3',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('slide_link3',array(
			'label'	=> __('Slide link 3','skt-launch'),
			'section'	=> 'slider_section',
			'setting'	=> 'slide_link3'
	));	
 
	$wp_customize->add_section('social_sec',array(
			'title'	=> __('Social Settings','skt-launch'),
			'description' => __('Add Social Icons Link Here.:','skt-launch'),			
			'priority'		=> null
	));
	$wp_customize->add_setting('fb_link',array(
			'default'	=> '#facebook',
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
			'label'	=> __('Add facebook link here','skt-launch'),
			'section'	=> 'social_sec',
			'setting'	=> 'fb_link'
	));	
	$wp_customize->add_setting('twitt_link',array(
			'default'	=> '#twitter',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt_link',array(
			'label'	=> __('Add twitter link here','skt-launch'),
			'section'	=> 'social_sec',
			'setting'	=> 'twitt_link'
	));
	$wp_customize->add_setting('gplus_link',array(
			'default'	=> '#gplus',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('gplus_link',array(
			'label'	=> __('Add google plus link here','skt-launch'),
			'section'	=> 'social_sec',
			'setting'	=> 'gplus_link'
	));
	$wp_customize->add_setting('linked_link',array(
			'default'	=> '#linkedin',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('linked_link',array(
			'label'	=> __('Add linkedin link here','skt-launch'),
			'section'	=> 'social_sec',
			'setting'	=> 'linked_link'
	));

	$wp_customize->add_section('contact_sec',array(
			'title'	=> __('Contact Details','skt-launch'),
			'description'	=> __('Add you contact details here','skt-launch'),
			'priority'	=> null
	));
	
	$wp_customize->add_setting('contact_no',array(
			'default'	=> __('+11 123 456 7890','skt-launch'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_no',array(
			'label'	=> __('Add contact number here.','skt-launch'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_no'
	));
	$wp_customize->add_setting('contact_mail',array(
			'default'	=> 'demo@companyname.com',
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('contact_mail',array(
			'label'	=> __('Add you email here','skt-launch'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_mail'
	));
 
    $wp_customize->add_section(
        'theme_doc_sec',
        array(
            'title' => __('Documentation &amp; Support', 'skt-launch'),
            'priority' => null,
 			'description' => sprintf( __( 'For documentation and support check this link : <br />%s.', 'skt-launch' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_THEME_DOC.'"' ), __( 'Launch Documentation', 'skt-launch' )
						)
					),							
        )
    );  
    $wp_customize->add_setting('sktlaunch_options[info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new sktlaunch_Info( $wp_customize, 'doc_section', array(
        'section' => 'theme_doc_sec',
        'settings' => 'sktlaunch_options[info]',
        'priority' => 10
        ) )
    );		
}
add_action( 'customize_register', 'sktlaunch_customize_register' );

//Integer
function sktlaunch_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

function sktlaunch_custom_css(){
		?>
        	<style type="text/css">
					
					a, .header .header-inner .nav ul li a:hover, 
					.signin_wrap a:hover,				
					.services-wrap .one_fourth:hover h3,
					.blog_lists h2 a:hover,
					#sidebar ul li a:hover,
					.recent-post h6:hover,
					.MoreLink:hover,
					.cols-3 ul li a:hover,.wedobox:hover 
					.btn-small,.wedobox:hover .boxtitle,.slide_more,.slide_info h2 span,
					.header .header-inner .logo h1 span,h2.section-title span
					{ color:<?php echo esc_attr(get_theme_mod('color_scheme','#ff9000') ); ?>;}
					
					.pagination ul li .current, .pagination ul li a:hover, 
					#commentform input#submit:hover
					{ background-color:<?php echo esc_attr(get_theme_mod('color_scheme','#ff9000')); ?>;}
					
					.MoreLink:hover
					{ border-color:<?php echo esc_attr(get_theme_mod('color_scheme','#ff9000')); ?>;}
					
			</style>
<?php      
}
         
add_action('wp_head','sktlaunch_custom_css');	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function sktlaunch_customize_preview_js() {
	wp_enqueue_script( 'sktlaunch_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'sktlaunch_customize_preview_js' );


function sktlaunch_custom_customize_enqueue() {
	wp_enqueue_script( 'sktlaunch-custom-customize', get_template_directory_uri() . '/js/custom.customize.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'sktlaunch_custom_customize_enqueue' );