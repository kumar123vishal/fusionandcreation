<?php
/**
 * Sirat Theme Customizer
 *
 * @package Sirat
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function sirat_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'sirat_custom_controls' );

function sirat_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	//add home page setting pannel
	$wp_customize->add_panel( 'sirat_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'sirat' ),
	) );

	// Layout
	$wp_customize->add_section( 'sirat_left_right', array(
    	'title'      => __( 'General Settings', 'sirat' ),
		'panel' => 'sirat_panel_id'
	) );

	$wp_customize->add_setting('sirat_width_option',array(
        'default' => __('Full Width','sirat'),
        'sanitize_callback' => 'sirat_sanitize_choices'
	));
	$wp_customize->add_control(new Sirat_Image_Radio_Control($wp_customize, 'sirat_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','sirat'),
        'description' => __('Here you can change the width layout of Website.','sirat'),
        'section' => 'sirat_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/assets/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/assets/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('sirat_theme_options',array(
        'default' => __('Right Sidebar','sirat'),
        'sanitize_callback' => 'sirat_sanitize_choices'
	));
	$wp_customize->add_control('sirat_theme_options',array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','sirat'),
        'description' => __('Here you can change the sidebar layout for posts. ','sirat'),
        'section' => 'sirat_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','sirat'),
            'Right Sidebar' => __('Right Sidebar','sirat'),
            'One Column' => __('One Column','sirat'),
            'Three Columns' => __('Three Columns','sirat'),
            'Four Columns' => __('Four Columns','sirat'),
            'Grid Layout' => __('Grid Layout','sirat')
        ),
	) );

	$wp_customize->add_setting('sirat_page_layout',array(
        'default' => __('One Column','sirat'),
        'sanitize_callback' => 'sirat_sanitize_choices'
	));
	$wp_customize->add_control('sirat_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','sirat'),
        'description' => __('Here you can change the sidebar layout for pages. ','sirat'),
        'section' => 'sirat_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','sirat'),
            'Right Sidebar' => __('Right Sidebar','sirat'),
            'One Column' => __('One Column','sirat')
        ),
	) );

	//Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'sirat_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'sirat_switch_sanitization'
    ) );
    $wp_customize->add_control( new Sirat_Toggle_Switch_Custom_Control( $wp_customize, 'sirat_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','sirat' ),
		'section' => 'sirat_left_right'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'sirat_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'sirat_switch_sanitization'
    ) );
    $wp_customize->add_control( new Sirat_Toggle_Switch_Custom_Control( $wp_customize, 'sirat_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','sirat' ),
		'section' => 'sirat_left_right'
    )));

	//Pre-Loader
	$wp_customize->add_setting( 'sirat_loader_enable',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'sirat_switch_sanitization'
    ) );
    $wp_customize->add_control( new Sirat_Toggle_Switch_Custom_Control( $wp_customize, 'sirat_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','sirat' ),
        'section' => 'sirat_left_right'
    )));

	$wp_customize->add_setting('sirat_loader_icon',array(
        'default' => __('Two Way','sirat'),
        'sanitize_callback' => 'sirat_sanitize_choices'
	));
	$wp_customize->add_control('sirat_loader_icon',array(
        'type' => 'select',
        'label' => __('Pre-Loader Type','sirat'),
        'section' => 'sirat_left_right',
        'choices' => array(
            'Two Way' => __('Two Way','sirat'),
            'Dots' => __('Dots','sirat'),
            'Rotate' => __('Rotate','sirat')
        ),
	) );

	//Top Bar
	$wp_customize->add_section( 'sirat_topbar', array(
    	'title'      => __( 'Top Bar Settings', 'sirat' ),
		'panel' => 'sirat_panel_id'
	) );

	$wp_customize->add_setting( 'sirat_topbar_hide_show',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'sirat_switch_sanitization'
    ));  
    $wp_customize->add_control( new Sirat_Toggle_Switch_Custom_Control( $wp_customize, 'sirat_topbar_hide_show',
       array(
          'label' => esc_html__( 'Show / Hide Topbar','sirat' ),
          'section' => 'sirat_topbar'
    )));

    $wp_customize->add_setting( 'sirat_header_search',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'sirat_switch_sanitization'
    ));  
    $wp_customize->add_control( new Sirat_Toggle_Switch_Custom_Control( $wp_customize, 'sirat_header_search',array(
      	'label' => esc_html__( 'Show / Hide Search','sirat' ),
      	'section' => 'sirat_topbar'
    )));

    //Sticky Header
	$wp_customize->add_setting( 'sirat_sticky_header',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'sirat_switch_sanitization'
    ) );
    $wp_customize->add_control( new Sirat_Toggle_Switch_Custom_Control( $wp_customize, 'sirat_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','sirat' ),
        'section' => 'sirat_topbar'
    )));

	$wp_customize->add_setting('sirat_contact_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('sirat_contact_call',array(
		'label'	=> __('Add Phone Number','sirat'),
		'input_attrs' => array(
            'placeholder' => __( '+00 987 654 1230', 'sirat' ),
        ),
		'section'=> 'sirat_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('sirat_contact_email',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('sirat_contact_email',array(
		'label'	=> __('Add Email Address','sirat'),
		'input_attrs' => array(
            'placeholder' => __( 'example@gmail.com', 'sirat' ),
        ),
		'section'=> 'sirat_topbar',
		'type'=> 'text'
	));

    //Header layout
	$wp_customize->add_setting('sirat_header_content_option',array(
        'default' => __('Left','sirat'),
        'sanitize_callback' => 'sirat_sanitize_choices'
	));
	$wp_customize->add_control(new Sirat_Image_Radio_Control($wp_customize, 'sirat_header_content_option', array(
        'type' => 'select',
        'label' => __('Header Layouts','sirat'),
        'section' => 'sirat_topbar',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/header-layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/header-layout2.png',
            'Right' => get_template_directory_uri().'/assets/images/header-layout3.png',
    ))));
    
	//Slider 
	$wp_customize->add_section( 'sirat_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'sirat' ),
		'panel' => 'sirat_panel_id'
	) );

	$wp_customize->add_setting( 'sirat_slider_arrows',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'sirat_switch_sanitization'
    ));  
    $wp_customize->add_control( new Sirat_Toggle_Switch_Custom_Control( $wp_customize, 'sirat_slider_arrows',array(
      	'label' => esc_html__( 'Show / Hide Slider','sirat' ),
      	'section' => 'sirat_slidersettings'
    )));

    $wp_customize->add_setting('sirat_slider_background_options',array(
        'default' => __('Slideshow','sirat'),
        'transport' => 'refresh',
        'sanitize_callback' => 'sirat_sanitize_choices'
	));
	$wp_customize->add_control('sirat_slider_background_options',array(
        'type' => 'select',
        'label' => __('Slider Background Option','sirat'),
        'description' => __('Please refresh the page after selecting background option ','sirat'),
        'section' => 'sirat_slidersettings',
        'choices' => array(
        	'Slideshow' => __('Slideshow','sirat'),
            'Image' => __('Image','sirat'),
            'Gradient' => __('Gradient','sirat')
        ),
	) );

	//Slideshow
	if(get_theme_mod( 'sirat_slider_background_options') == 'Slideshow'){

		for ( $count = 1; $count <= 4; $count++ ) {

			$wp_customize->add_setting( 'sirat_slider_page' . $count, array(
				'default'           => '',
				'transport' => 'refresh',
				'sanitize_callback' => 'sirat_sanitize_dropdown_pages'
			) );
			$wp_customize->add_control( 'sirat_slider_page' . $count, array(
				'label'    => __( 'Select Slider Page', 'sirat' ),
				'description' => __('Slider image size (1500 x 800)','sirat'),
				'section'  => 'sirat_slidersettings',
				'type'     => 'dropdown-pages'
			));
		}
	}

	//Image
	if(get_theme_mod( 'sirat_slider_background_options') == 'Image' || get_theme_mod( 'sirat_slider_background_options') == 'Gradient'){

		$wp_customize->add_setting( 'sirat_slider2_page' , array(
			'default'           => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'sirat_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'sirat_slider2_page' , array(
			'label'    => __( 'Select Slider Page', 'sirat' ),
			'description' => __('Image Size (1500 x 800)','sirat'),
			'section'  => 'sirat_slidersettings',
			'type'     => 'dropdown-pages'
		));
	}

	//Gradient
	if(get_theme_mod( 'sirat_slider_background_options') == 'Gradient'){

		$wp_customize->add_setting( 'sirat_slider_background', array(
		    'default' => '#febe00',
		    'transport' => 'refresh',
		    'sanitize_callback' => 'sanitize_hex_color'
	  	));
	  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sirat_slider_background', array(
		    'section' => 'sirat_slidersettings',
		    'settings' => 'sirat_slider_background',
	  	)));
	}

	//content layout
	$wp_customize->add_setting('sirat_slider_content_option',array(
        'default' => __('Left','sirat'),
        'sanitize_callback' => 'sirat_sanitize_choices'
	));
	$wp_customize->add_control(new Sirat_Image_Radio_Control($wp_customize, 'sirat_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','sirat'),
        'section' => 'sirat_slidersettings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/assets/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/assets/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'sirat_slider_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'sirat_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','sirat' ),
		'section'     => 'sirat_slidersettings',
		'type'        => 'range',
		'settings'    => 'sirat_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('sirat_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'sirat_sanitize_choices'
	));

	$wp_customize->add_control( 'sirat_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','sirat' ),
	'section'     => 'sirat_slidersettings',
	'type'        => 'select',
	'settings'    => 'sirat_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','sirat'),
      '0.1' =>  esc_attr('0.1','sirat'),
      '0.2' =>  esc_attr('0.2','sirat'),
      '0.3' =>  esc_attr('0.3','sirat'),
      '0.4' =>  esc_attr('0.4','sirat'),
      '0.5' =>  esc_attr('0.5','sirat'),
      '0.6' =>  esc_attr('0.6','sirat'),
      '0.7' =>  esc_attr('0.7','sirat'),
      '0.8' =>  esc_attr('0.8','sirat'),
      '0.9' =>  esc_attr('0.9','sirat')
	),
	));
    
	//Our Services section
	$wp_customize->add_section( 'sirat_services_section' , array(
    	'title'      => __( 'Our Services Settings', 'sirat' ),
		'priority'   => null,
		'panel' => 'sirat_panel_id'
	) );

	$wp_customize->add_setting('sirat_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('sirat_section_title',array(
		'label'	=> __('Add Section Title','sirat'),
		'input_attrs' => array(
            'placeholder' => __( 'AWESOME SERVICES', 'sirat' ),
        ),
		'section'=> 'sirat_services_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('sirat_section_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('sirat_section_text',array(
		'label'	=> __('Add Section Text','sirat'),
		'input_attrs' => array(
            'placeholder' => __( 'Lorem ipsum is dummy text', 'sirat' ),
        ),
		'section'=> 'sirat_services_section',
		'type'=> 'text'
	));

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('sirat_our_services',array(
		'default'	=> 'select',
		'sanitize_callback' => 'sirat_sanitize_choices',
	));
	$wp_customize->add_control('sirat_our_services',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Services','sirat'),
		'description' => __('Image Size (50 x 50)','sirat'),
		'section' => 'sirat_services_section',
	));

	$wp_customize->add_setting( 'sirat_about_page' , array(
		'default'           => '',
		'sanitize_callback' => 'sirat_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'sirat_about_page' , array(
		'label'    => __( 'Select About Page', 'sirat' ),
		'description' => __('Image Size (280 x 280)','sirat'),
		'section'  => 'sirat_services_section',
		'type'     => 'dropdown-pages'
	) );

	$wp_customize->add_setting( 'sirat_services_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'sirat_services_excerpt_number', array(
		'label'       => esc_html__( 'Services Excerpt length','sirat' ),
		'section'     => 'sirat_services_section',
		'type'        => 'range',
		'settings'    => 'sirat_services_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog Post
	$wp_customize->add_section('sirat_blog_post',array(
		'title'	=> __('Blog Post Settings','sirat'),
		'panel' => 'sirat_panel_id',
	));	

	$wp_customize->add_setting( 'sirat_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'sirat_switch_sanitization'
    ) );
    $wp_customize->add_control( new Sirat_Toggle_Switch_Custom_Control( $wp_customize, 'sirat_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','sirat' ),
        'section' => 'sirat_blog_post'
    )));

    $wp_customize->add_setting( 'sirat_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'sirat_switch_sanitization'
    ) );
    $wp_customize->add_control( new Sirat_Toggle_Switch_Custom_Control( $wp_customize, 'sirat_toggle_author',array(
		'label' => esc_html__( 'Author','sirat' ),
		'section' => 'sirat_blog_post'
    )));

    $wp_customize->add_setting( 'sirat_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'sirat_switch_sanitization'
    ) );
    $wp_customize->add_control( new Sirat_Toggle_Switch_Custom_Control( $wp_customize, 'sirat_toggle_comments',array(
		'label' => esc_html__( 'Comments','sirat' ),
		'section' => 'sirat_blog_post'
    )));

    $wp_customize->add_setting( 'sirat_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'sirat_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','sirat' ),
		'section'     => 'sirat_blog_post',
		'type'        => 'range',
		'settings'    => 'sirat_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
	$wp_customize->add_setting('sirat_blog_layout_option',array(
        'default' => __('Default','sirat'),
        'sanitize_callback' => 'sirat_sanitize_choices'
	));
	$wp_customize->add_control(new Sirat_Image_Radio_Control($wp_customize, 'sirat_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','sirat'),
        'section' => 'sirat_blog_post',
        'choices' => array(
            'Default' => get_template_directory_uri().'/assets/images/blog-layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/blog-layout2.png',
            'Left' => get_template_directory_uri().'/assets/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('sirat_button_text',array(
		'default'=> 'READ MORE',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('sirat_button_text',array(
		'label'	=> __('Add Button Text','sirat'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'sirat' ),
        ),
		'section'=> 'sirat_blog_post',
		'type'=> 'text'
	));

	//404 Page Setting
	$wp_customize->add_section('sirat_404_page',array(
		'title'	=> __('404 Page Settings','sirat'),
		'panel' => 'sirat_panel_id',
	));	

	$wp_customize->add_setting('sirat_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('sirat_404_page_title',array(
		'label'	=> __('Add Title','sirat'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'sirat' ),
        ),
		'section'=> 'sirat_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('sirat_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('sirat_404_page_content',array(
		'label'	=> __('Add Text','sirat'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'sirat' ),
        ),
		'section'=> 'sirat_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('sirat_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('sirat_404_page_button_text',array(
		'label'	=> __('Add Button Text','sirat'),
		'input_attrs' => array(
            'placeholder' => __( 'Go Back', 'sirat' ),
        ),
		'section'=> 'sirat_404_page',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('sirat_responsive_media',array(
		'title'	=> __('Responsive Media','sirat'),
		'panel' => 'sirat_panel_id',
	));

	$wp_customize->add_setting( 'sirat_resp_topbar_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'sirat_switch_sanitization'
    ));  
    $wp_customize->add_control( new Sirat_Toggle_Switch_Custom_Control( $wp_customize, 'sirat_resp_topbar_hide_show',array(
          'label' => esc_html__( 'Show / Hide Topbar','sirat' ),
          'section' => 'sirat_responsive_media'
    )));

    $wp_customize->add_setting( 'sirat_stickyheader_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'sirat_switch_sanitization'
    ));  
    $wp_customize->add_control( new Sirat_Toggle_Switch_Custom_Control( $wp_customize, 'sirat_stickyheader_hide_show',array(
          'label' => esc_html__( 'Sticky Header','sirat' ),
          'section' => 'sirat_responsive_media'
    )));

    $wp_customize->add_setting( 'sirat_resp_slider_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'sirat_switch_sanitization'
    ));  
    $wp_customize->add_control( new Sirat_Toggle_Switch_Custom_Control( $wp_customize, 'sirat_resp_slider_hide_show',array(
          'label' => esc_html__( 'Show / Hide Slider','sirat' ),
          'section' => 'sirat_responsive_media'
    )));

	$wp_customize->add_setting( 'sirat_metabox_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'sirat_switch_sanitization'
    ));  
    $wp_customize->add_control( new Sirat_Toggle_Switch_Custom_Control( $wp_customize, 'sirat_metabox_hide_show',array(
          'label' => esc_html__( 'Show / Hide Metabox','sirat' ),
          'section' => 'sirat_responsive_media'
    )));

    $wp_customize->add_setting( 'sirat_sidebar_hide_show',array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'sirat_switch_sanitization'
    ));  
    $wp_customize->add_control( new Sirat_Toggle_Switch_Custom_Control( $wp_customize, 'sirat_sidebar_hide_show',array(
          'label' => esc_html__( 'Show / Hide Sidebar','sirat' ),
          'section' => 'sirat_responsive_media'
    )));

	//Content Creation
	$wp_customize->add_section( 'sirat_content_section' , array(
    	'title' => __( 'Customize Home Page Settings', 'sirat' ),
		'priority' => null,
		'panel' => 'sirat_panel_id'
	) );

	$wp_customize->add_setting('sirat_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new Sirat_Content_Creation( $wp_customize, 'sirat_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','sirat' ),
		),
		'section' => 'sirat_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'sirat' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('sirat_footer',array(
		'title'	=> __('Footer Settings','sirat'),
		'panel' => 'sirat_panel_id',
	));	
	
	$wp_customize->add_setting('sirat_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('sirat_footer_text',array(
		'label'	=> __('Copyright Text','sirat'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'sirat' ),
        ),
		'section'=> 'sirat_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'sirat_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'sirat_switch_sanitization'
    ));  
    $wp_customize->add_control( new Sirat_Toggle_Switch_Custom_Control( $wp_customize, 'sirat_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','sirat' ),
      	'section' => 'sirat_footer'
    )));

	$wp_customize->add_setting('sirat_scroll_top_alignment',array(
        'default' => __('Right','sirat'),
        'sanitize_callback' => 'sirat_sanitize_choices'
	));
	$wp_customize->add_control(new Sirat_Image_Radio_Control($wp_customize, 'sirat_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','sirat'),
        'section' => 'sirat_footer',
        'settings' => 'sirat_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/layout2.png',
            'Right' => get_template_directory_uri().'/assets/images/layout3.png'
    ))));	
}

add_action( 'customize_register', 'sirat_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Sirat_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Sirat_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Sirat_Customize_Section_Pro( $manager,'example_1', array(
			'priority'   => 1,
			'title'    => esc_html__( 'SIRAT PRO', 'sirat' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'sirat' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/multipurpose-wordpress-theme/'),
		) )	);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'sirat-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'sirat-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Sirat_Customize::get_instance();