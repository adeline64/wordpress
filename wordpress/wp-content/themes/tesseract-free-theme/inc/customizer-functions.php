<?php

/**

 * Theme Customizer Functions

 *

 */



/*========================== CUSTOMIZER CONTROLS FUNCTIONS ==========================*/



// Add simple heading option to the theme customizer

if ( class_exists( 'WP_Customize_Control' ) ) :



    class Tesseract_Customize_Header_Control extends WP_Customize_Control {



        public function render_content() {



            $allowed_html = array(

                'a' => array(

                    'href' => array(),

                    'title' => array()

                ),

                'br' => array(),

                'em' => array(),

                'strong' => array(),

            ); ?>



			<h4><?php echo wp_kses( $this->label, $allowed_html ); ?></h4>

            <span class="description"><?php echo wp_kses( $this->description, $allowed_html ); ?></span>



<?php

        }

    }

	

	if (  !class_exists( 'Tesseract_Customize_Footer_Control' ) ) :

	class Tesseract_Customize_Footer_Control extends WP_Customize_Control {



        public function render_content() {



            $allowed_html = array(

                'a' => array(

                    'href' => array(),

                    'title' => array()

                ),

                'br' => array(),

                'em' => array(),

                'strong' => array(),

				 'img' => array(

				 	'src' => array(),

				 ),

            ); ?>



			<h4><?php echo wp_kses( $this->label, $allowed_html ); ?></h4>

            <span class="description"><?php echo wp_kses( $this->description, $allowed_html ); ?></span>



<?php

        }

    }

	endif;

	

	class Tesseract_Customize_Footer2_Control extends WP_Customize_Control {



        public function render_content() {



            $allowed_html = array(

                'a' => array(

                    'href' => array(),

                    'title' => array(),

					'target' => array()

                ),

                'br' => array(),

                'em' => array(),

                'strong' => array(),

				 'img' => array(

				 	'src' => array(),

				 ),

            ); ?>

 

            <span class="description"><?php echo wp_kses( $this->description, $allowed_html ); ?></span>

			<script language="javascript">

			( function( $ ) {

			  $('input[type=radio][name=_customize-radio-tesseract_footer_additional_content_right]').change(function() {

				this.value == 'themeby' ? $('#customize-control-tesseract_footer_additional_content_right2').hide() : $('#customize-control-tesseract_footer_additional_content_right2').show().attr("tabindex",-1).focus();

			  } );

			  $('input[type=radio][name=_customize-radio-tesseract_footer_additional_content_right]').trigger('change');

			} )( jQuery );			

			</script>            



<?php

        }

    }



	class Tesseract_Customize_Description_Control extends WP_Customize_Control {



        public function render_content() {



            $allowed_html = array(

                'a' => array(

                    'href' => array(),

                    'title' => array()

                ),

                'br' => array(),

                'em' => array(),

                'strong' => array(),

            ); ?>



			<span class="description"><?php echo wp_kses( $this->label, $allowed_html ); ?></span>



<?php

        }

    }



	class Tesseract_Customize_Text_Control extends WP_Customize_Control {



        public function render_content() {  ?>



			<span class="textfield"><?php echo esc_html( $this->label ); ?></span>



<?php

        }

    }



	class Tesseract_Customize_Button_Control extends WP_Customize_Control {



		public function render_content() {  ?>



            <span><?php echo esc_html( $this->label ); ?></span>



<?php



		}

	}



	class Tesseract_Customize_Font_Control extends WP_Customize_Control {



		private $fonts = false;



		public function __construct($manager, $id, $args = array(), $options = array()) {



			$this->fonts = array(

				'Arial' => 'Arial',

				'Alef' => 'Alef',

				'Carme' => 'Carme',

				'Droid Sans' => 'Droid Sans',

				'Francois One' => 'Francois One',

				'Josefin Slab' => 'Josefin Slab',

				'Lobster' => 'Lobster',

				'Luckiest Guy' => 'Luckiest Guy',

				'Jockey One' => 'Jockey One',

				'Maven Pro' => 'Maven Pro',

				'Modern Antiqua' => 'Modern Antiqua',

				'Nobile' => 'Nobile',

				'Oswald' => 'Oswald',

				'Permanent Marker' => 'Permanent Marker',

				'Roboto' => 'Roboto',

				'Share' => 'Share',

				'Tahoma' => 'Tahoma',

				'Ubuntu' => 'Ubuntu',

				'Verdana' => 'Verdana');

			parent::__construct( $manager, $id, $args );



		}



		public function render_content() {



			if( !empty($this->fonts) ) :

            ?>

                <label>

                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

					<div class="customize-font-select-control">

						<select <?php $this->link(); ?>>

							<?php

								foreach ( $this->fonts as $k => $v )

								{

									printf('<option value="%s" %s>%s</option>', $k, selected($this->value(), $k, false), $v);

								}

							?>

						</select>

					</div>

				</label>



            <?php

			endif;

		}



	}



endif;



/*========================== CUSTOMIZER SANITIZE FUNCTIONS ==========================*/



function tesseract_sanitize_textarea_html( $value ) {



	$allowed = array(

		//container and button

		'p' => array(),

		'center' => array(),

		'em' => array(),

		'strong' => array(),

		'h1' => array(),

		'h2' => array(),

		'h3' => array(),

		'h4' => array(),

		'h5' => array(),

		'h6' => array(),

		'br'  => array(),

		'ul'  => array(),

		'li'  => array(),

		'img' => array(

			'src' => array(),

			'height' => array(),

			'width' => array(),

			'style' => array()

		 ),

		'div' => array(

			'style' => array()

		),

		'input'    	=> array(

			'height'	=> array(),

			'name'		=> array(),

			'size' 		=> array(),

			'type' 		=> array(),

			'value'		=> array(),

			'width' 	=> array(),

			'class' 	=> array(),

			'id'		=> array(),

			'style' 	=> array(),

			'img' => array(

				'src' => array(),

				'height' => array(),

				'width' => array(),

				'style' => array()

			)

		),

		'button'   	=> array(

			'name' 		=> array(),

			'type'		=> array(),

			'value' 	=> array(),

			'class' 	=> array(),

			'id'		=> array(),

			'style' 	=> array()

		),



		//links

		'a'     => array(

			'href' 	=> array(),

			'target'=> array(),

			'name' 	=> array(),

			'class' => array(),

			'id'	=> array(),

			'style' => array()

		)

	);



	$allowed_prot = array('http', 'https', 'mailto', 'news', 'irc', 'feed', 'tel');





	return wp_kses($value, $allowed, $allowed_prot);



	}



function tesseract_sanitize_checkbox( $value ) {



	if ( $value == 'yes') :

        return 'yes';

	else:

		return 'no';

	endif;

}



function tesseract_sanitize_radio( $value ) {



	if ( $value == 1) :

        return 1;

	else:

		return '';

	endif;

}



function tesseract_blog_sanitize_content( $value ) {if ( ! in_array( $value, array( 'excerpt', 'content', 'titleonly' ) ) ):

		$value = 'excerpt';

	endif;

	return $value;

	}

	

function tesseract_blog_sanitize_date( $value ) {if ( ! in_array( $value, array( 'showdate', 'hidedate' ) ) ):

		$value = 'showdate';

	endif;

	return $value;

	}	

	

function tesseract_blog_sanitize_author( $value ) {if ( ! in_array( $value, array( 'showauthor', 'hideauthor' ) ) ):

		$value = 'showauthor';

	endif;

	return $value;

	}

	

function tesseract_blog_sanitize_comments( $value ) {if ( ! in_array( $value, array( 'showcomment', 'hidecomment' ) ) ):

		$value = 'showcomment';

	endif;

	return $value;

	}		



function tesseract_blog_sanitize_featimg_pos( $value ) {

	if ( ! in_array( $value, array( 'above', 'below', 'left', 'right' ) ) ):

		$value = 'above';

	endif;

	return $value;

	}



function tesseract_blog_sanitize_featimg_size( $value ) {if ( ! in_array( $value, array( 'default', 'tv', 'hdtv', 'theater1', 'theater2', 'pixel' ) ) ) :

        $value = 'default';

	endif;

    return $value;

	}

	

//BLOGLIST BUTTON POSITION SIZE AND TEXTONLY

function tesseract_blog_sanitize_button_size( $value ) {if ( ! in_array( $value, array( 'small', 'medium', 'large', 'textonly' ) ) ):

		$value = 'medium';

	endif;

	return $value;

	}

	

/*function tesseract_blog_sanitize_button_textonly( $value ) {if ( ! in_array( $value, array( 'textonly', 'textbutton' ) ) ):

		$value = 'textbutton';

	endif;

	return $value;

	} */	



function tesseract_blog_sanitize_button_pos( $value ) {

	if ( ! in_array( $value, array( 'left', 'right', 'center' ) ) ):

		$value = 'left';

	endif;

	return $value;

	}

	

	

/*  bloglist */

function tesseract_bloglist_sanitize_content( $value ) {if ( ! in_array( $value, array( 'excerpt', 'content' ) ) ):		

		$value = 'excerpt';

	endif;	

	return $value;	}



function tesseract_bloglist_sanitize_featimg_pos( $value ) {	if ( ! in_array( $value, array( 'above', 'below', 'left', 'right' ) ) ):

		$value = 'above';	

	endif;	

	return $value;	}



function tesseract_bloglist_sanitize_featimg_size( $value ) {if ( ! in_array( $value, array( 'default', 'tv', 'hdtv', 'theater1', 'theater2', 'pixel' ) ) ) :  

        $value = 'default';	

	endif;    

	return $value;	}	





// WOOCOMMERCE BREADCRUMB RATINGS AND SINGLE BUTTON SIZE OPTION//

function tesseract_woocommerce_shop_sanitize_breadcrumb( $value ) {	if ( ! in_array( $value, array( 'showbreadcrumb','hidebreadcrumb' ) ) ):

		$value = 'showbreadcrumb';	

	endif;	

	return $value;	}



function tesseract_woocommerce_product_sanitize_breadcrumb( $value ) {	if ( ! in_array( $value, array( 'showbreadcrumb','hidebreadcrumb' ) ) ):

		$value = 'showbreadcrumb';	

	endif;	

	return $value;	}



function tesseract_woocommerce_product_sanitize_ratings( $value ) {	if ( ! in_array( $value, array( 'showratings','hideratings' ) ) ):

		$value = 'showratings';	

	endif;	

	return $value;	}



function tesseract_woocommerce_sanitize_button_size( $value ) {if ( ! in_array( $value, array( 'small', 'medium', 'large' ) ) ):

		$value = 'medium';

	endif;

	return $value;

	}	



// WOOCOMMERCE READ MORE BUTTON OPTION TITLE SIZE AND UNDERLINE AND PRICE BOLD AND RATINGS //

function tesseract_woocommerce_product_sanitize_morebutton( $value ) {	if ( ! in_array( $value, array( 'showcartbutton','hidecartbutton', 'showmorebutton' ) ) ):

		$value = 'showcartbutton';	

	endif;	

	return $value;	}



function tesseract_woocommerce_sanitize_title_size( $value ) {if ( ! in_array( $value, array( 'small', 'medium', 'large' ) ) ):

		$value = 'medium';

	endif;

	return $value;

	}	

	

function tesseract_woocommerce_sanitize_title_underline( $value ) {if ( ! in_array( $value, array( 'underline', 'notunderline' ) ) ):

		$value = 'notunderline';

	endif;

	return $value;

	}	

	

function tesseract_woocommerce_sanitize_price_weight( $value ) {if ( ! in_array( $value, array( 'bold', 'nonbold' ) ) ):

		$value = 'nonbold';

	endif;

	return $value;

	}

	

function tesseract_woocommerce_shop_sanitize_ratings( $value ) {	if ( ! in_array( $value, array( 'showratings','hideratings' ) ) ):

		$value = 'hideratings';	

	endif;	

	return $value;	}

	

function tesseract_sanitize_radio_menuPos( $value ) {



	if ( ! in_array( $value, array( 'left', 'center' ) ) ) :

        $value = 'left';

	endif;



    return $value;

}



function tesseract_sanitize_radio_addcontentPos( $value ) {



	if ( ! in_array( $value, array( 'left', 'right' ) ) ) :

        $value = 'left';

	endif;



    return $value;

}



function tesseract_sanitize_radio_sepChar( $value ) {



	if ( ! in_array( $value, array( 'nothing', 'middot', 'line', 'circle', 'dash' ) ) ) :

        $value = 'nothing';

	endif;



    return $value;

}



function tesseract_sanitize_radio_nextToMenu_right( $value ) {



	if ( ! in_array( $value, array( 'nothing', 'buttons', 'social', 'contact', 'search', 'html', 'menu' ) ) ) :

        $value = 'buttons';

	endif;



    return $value;

}



function tesseract_sanitize_radio_nextToMenu_left( $value ) {



	if ( ! in_array( $value, array( 'nothing', 'logo', 'social', 'contact', 'search', 'html', 'menu' ) ) ) :

        $value = 'search';

	endif;



    return $value;

}





function tesseract_sanitize_radio_mob_link_hover_background_color( $value ) {



	if ( ! in_array( $value, array( 'dark', 'light', 'custom' ) ) ) :

        $value = 'dark';

	endif;



    return $value;



}



function tesseract_sanitize_radio_mob_shadow_color( $value ) {



	if ( ! in_array( $value, array( 'dark', 'light', 'custom' ) ) ) :

        $value = 'dark';

	endif;



    return $value;



}



function tesseract_sanitize_radio_mob_search_background_color( $value ) {



	if ( ! in_array( $value, array( 'dark', 'light' ) ) ) :

        $value = 'dark';

	endif;



    return $value;



}



function tesseract_sanitize_radio_mob_social_background_color( $value ) {



	if ( ! in_array( $value, array( 'dark', 'light' ) ) ) :

        $value = 'dark';

	endif;



    return $value;



}



function tesseract_sanitize_radio_mob_buttons_background_color( $value ) {



	if ( ! in_array( $value, array( 'dark', 'light', 'custom' ) ) ) :

        $value = 'dark';

	endif;



    return $value;



}



function tesseract_sanitize_radio_mob_maxbtn_sep_color( $value ) {



	if ( ! in_array( $value, array( 'dark', 'light' ) ) ) :

        $value = 'dark';

	endif;



    return $value;



}



function tesseract_sanitize_select( $value ) {



	$tesseract_menu_selector_menus = get_terms( 'nav_menu' );



	if ( $tesseract_menu_selector_menus ) :



		$tesseract_menu_selector_items = array();

		$item_keys = array( 'none' );

		foreach ( $tesseract_menu_selector_menus as $items )

			array_push( $item_keys, $items->slug);



	endif;



	if ( in_array( $value, $item_keys ) ) :

        return $value;

	endif;



}



function tesseract_sanitize_select_header_height( $value ) {



	if ( in_array( $value, array( 'small', 'medium', 'large' ) ) ) :

        return $value;

	endif;



}



function tesseract_sanitize_select_header_width( $value ) {



	if ( in_array( $value, array( 'default', 'fullwidth' ) ) ) :

        return $value;

	endif;



}



function tesseract_sanitize_select_footer_width( $value ) {



	if ( in_array( $value, array( 'default', 'fullwidth' ) ) ) :

        return $value;

	endif;



}



function tesseract_sanitize_select_search_results_layout_types( $value ) {



	if ( ! in_array( $value, array( 'sidebar-left', 'sidebar-right', 'fullwidth' ) ) ) :

        $value = 'sidebar-left';

	endif;



    return $value;



}



function tesseract_sanitize_select_blog_post_layout_types( $value ) {



	if ( ! in_array( $value, array( 'sidebar-left', 'sidebar-right', 'fullwidth' ) ) ) :

        $value = 'sidebar-left';

	endif;



    return $value;



}



function tesseract_sanitize_select_header_layout_types( $value ) {



	if ( ! in_array( $value, array( 'none', 'navbottom', 'navright', 'navleft', 'navcentered', 'vertical-left', 'centered-inline-logo','vertical-right', 'defaultlayout' ) ) ) :

        $value = 'default';

	endif;



    return $value;



}





function tesseract_sanitize_rgba( $value ) {



	//Check if string is rgba

	preg_match("/\s*(rgba\(\s*[0-9]+\s*,\s*[0-9]+\s*,\s*[0-9]+\s*,\d+\d*\.\d+\))/", $value, $match);

	$rgba = $match ? true : false;



	preg_match("/#([a-f]|[A-F]|[0-9]){3}(([a-f]|[A-F]|[0-9]){3})?\b/", $value, $match);

	$hex = $match ? true : false;



	if ( $rgba || $hex )

		return $value;



}



/*========================== ACTIVE CALLBACK FUNCTIONS ==========================*/



function tesseract_button_textarea_enable() {



	$textarea_enable = get_theme_mod( 'tesseract_header_right_content' );

	$bool = ( $textarea_enable == 'buttons' ) ? true : false;



	return $bool;



}



function tesseract_header_content_menu_select_enable() {



	$select_enable = get_theme_mod( 'tesseract_header_right_content' );

	$bool = ( $select_enable == 'menu' ) ? true : false;



	return $bool;



}



function tesseract_header_right_menu_select_enable() {



	$select_enable = get_theme_mod( 'tesseract_header_right_content' );

	$bool = ( $select_enable == 'menu' ) ? true : false;



	return $bool;



}



function tesseract_mobmenu_link_hover_background_color_custom_enable() {



	$color_option = get_theme_mod( 'tesseract_mobmenu_link_hover_background_color' );

	$bool = ( $color_option == 'custom' ) ? true : false;



	return $bool;



}



function tesseract_mobmenu_shadow_color_custom_enable() {



	$color_option = get_theme_mod( 'tesseract_mobmenu_shadow_color' );

	$bool = ( $color_option == 'custom' ) ? true : false;



	return $bool;



}



function tesseract_mobmenu_search_enable() {



	$content_option = get_theme_mod( 'tesseract_header_right_content' );

	$bool = ( $content_option == 'search' ) ? true : false;



	return $bool;



}



function tesseract_mobmenu_buttons_enable() {



	$content_option = get_theme_mod( 'tesseract_header_right_content' );

	$bool = ( $content_option == 'buttons' ) ? true : false;



	return $bool;



}



function tesseract_mobmenu_social_enable() {



	$content_option = get_theme_mod( 'tesseract_header_right_content' );

	$bool = ( $content_option == 'social' ) ? true : false;



	return $bool;



}



function tesseract_mobmenu_additionals_buttons_header_enable() {



	$content_option = get_theme_mod( 'tesseract_header_right_content' );

	$bool = ( $content_option == 'buttons' ) ? true : false;



	return $bool;



}



function tesseract_mobmenu_additionals_social_header_enable() {



	$content_option = get_theme_mod( 'tesseract_header_right_content' );

	$bool = ( $content_option == 'social' ) ? true : false;



	return $bool;



}



function tesseract_mobmenu_additionals_search_header_enable() {



	$content_option = get_theme_mod( 'tesseract_header_right_content' );

	$bool = ( $content_option == 'search' ) ? true : false;



	return $bool;



}



function tesseract_mobmenu_buttons_background_color_custom_enable() {



	$color_option = get_theme_mod( 'tesseract_mobmenu_buttons_background_color' );

	$bool = ( ( $color_option == 'custom' ) && ( get_theme_mod( 'tesseract_header_right_content' ) == 'buttons' ) ) ? true : false;



	return $bool;



}



function tesseract_mobmenu_maxbtn_sep_enable() {



	$content_option = get_theme_mod( 'tesseract_header_right_content' );

	$bool = ( ( $content_option == 'buttons' ) && is_plugin_active('maxbuttons/maxbuttons.php' ) ) ? true : false;



	return $bool;



}



function tesseract_header_logo_height_enable() {



	$logo_url = get_theme_mod( 'tesseract_header_logo_image' );

	$bool = $logo_url ? true : false;



	return $bool;



}



function tesseract_header_widthProp_enable() {



	$hcContent = get_theme_mod('tesseract_header_right_content');

	$wooCart = get_theme_mod('tesseract_woocommerce_headercart');

	$displayWooCart = ( is_plugin_active('woocommerce/woocommerce.php') && ( $wooCart == 1 ) );

	$hcContent = ( !$displayWooCart && ( !$hcContent || !isset($hcContent) || ( $hcContent == 'nothing' ) ) );

	$bool = ( false == $hcContent ) ? true : false;



	return $bool;



}



function tesseract_header_menu_options_enable() {



	$tesseract_menu_selector_menus = get_terms( 'nav_menu' );

	$bool = $tesseract_menu_selector_menus ? true : false;



	return $bool;



}



function tesseract_blog_featimg_sizes_enable() {



	$sizes_enable = (get_theme_mod( 'tesseract_blog_display_featimg2' )) ? get_theme_mod( 'tesseract_blog_display_featimg2' ) : 'yes';

	$bool = ( $sizes_enable != 'no' ) ? true : false;



	return $bool;



}



function tesseract_blog_featimg_px_size_enable() {



	$size_enable = get_theme_mod( 'tesseract_blog_featimg_size' );

	$bool = ( $size_enable == 'pixel' ) ? true : false;



	return $bool;



}



function tesseract_footer_logo_enable() {



	$logo_enable = get_theme_mod( 'tesseract_footer_logo_enable' );

	$bool = ( $logo_enable == 'yes' ) ? true : false;



	return $bool;



}



function tesseract_footer_logo_height_enable() {



	$hlogo_url = get_theme_mod( 'tesseract_header_logo_image' );

	$flogo_url = get_theme_mod( 'tesseract_footer_logo_image' );

	$enable = ( get_theme_mod('tesseract_footer_logo_enable') == 'yes' ) ? true : false;

	$bool = ( ( $hlogo_url || $flogo_url ) && $enable ) ? true : false;



	return $bool;



}



function tesseract_footer_widthProp_enable() {



	$fcContent = get_theme_mod('tesseract_footer_right_content');

	$fcContent = ( is_string($fcContent) && ( $fcContent !== 'nothing' ) );

	$bool = ( $fcContent ) ? TRUE : FALSE;



	return $bool;



}



function tesseract_vertical_header_width_enable() {



	$vertwidth_enable = get_theme_mod( 'tesseract_header_layout_setting' );

	$bool1 = ( ( $vertwidth_enable == 'vertical-left' ) || ( $vertwidth_enable == 'vertical-right' ) ) ? true : false;



	return $bool1;



}

function tesseract_header_logo_choice_image_2()
{
	$logo_type = get_theme_mod( 'tesseract_header_logo_type' );

	$bool1 = ( ( $logo_type == 'image' ) ) ? true : false;
	return $bool1;
}

function tesseract_header_logo_choice_text()
{
	$logo_type = get_theme_mod( 'tesseract_header_logo_type' );
	$bool1 = ( ( $logo_type == 'text' ) ) ? true : false;
	return $bool1;
}

function tesseract_left_area_html_enable()
{
	$select_enable_2 = get_theme_mod( 'tesseract_footer_additional_content' );
	$bool_2 = (( $select_enable_2 == 'html' )) ? true : false;
	return $bool_2;
}

function tesseract_footer_left_menu_select_enable_2()
{
	$select_enable_3 = get_theme_mod( 'tesseract_footer_additional_content' );
	$bool_3 = (( $select_enable_3 == 'menu' )) ? true : false;
	return $bool_3;
}

function tesseract_vertical_header_layout_choice() {
	$vertwidth_enable = get_theme_mod( 'tesseract_header_layout_setting' );

	$bool1 = ( ( $vertwidth_enable == 'navbottom' ) || ( $vertwidth_enable == 'navright' ) || ( $vertwidth_enable == 'navcentered' ) || ( $vertwidth_enable == 'centered-inline-logo' ) || ( $vertwidth_enable == 'navleft' ) || ( $vertwidth_enable == 'defaultlayout' ) || ( $vertwidth_enable == 'logoleft-navleft' ) ) ? true : false;
	return $bool1;

}

function tesseract_centre_menu_in_logo_odd()
{
	$tesheadr_layout = get_theme_mod('tesseract_header_layout_setting');
	if($tesheadr_layout == 'centered-inline-logo')
    {

		$theme_location = 'primary';

		$theme_locations = get_nav_menu_locations();

		$menu_obj = get_term( $theme_locations[$theme_location], 'nav_menu' );
		$items = wp_get_nav_menu_items( $menu_obj->term_id );
		// if we don't have anything, exit
		if(!$items)
		{
			return false;
		}
		if( count( $items ) <= 0 ){
			return false;
		}
		// go through each item
		$parents = array();
		foreach( $items as $item ) {
			// if the item's parent is 0, it's a top level, add it to an array
			if( $item->menu_item_parent == 0 )
				$parents[] = $item;
		}
		// return our count
		$no_of_itm = count( $parents );
		if($no_of_itm%2 == 0 )
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	return false;
	
}

function tesseract_vertical_header_bck_image_choice()
{
	$bck_image = get_theme_mod( 'tesseract_header_layout_bck_image' );
	$bool1 = ( ( $bck_image != '' ) ) ? true : false;
	return $bool1;
}