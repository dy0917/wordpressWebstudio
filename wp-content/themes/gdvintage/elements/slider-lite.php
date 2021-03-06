<?php
/**
 * Title: Slider Lite Element
 *
 * Description: Slides three images having optional custom links
 *
 * Please do not edit this file. This file is part of the Cyber Chimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category Cyber Chimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     http://www.cyberchimps.com/
 */

// Don't load directly
if ( !defined('ABSPATH') ) { die('-1'); }

// Action for Slider Lite
add_action ('slider_lite', 'cyberchimps_slider_lite_content' );

function cyberchimps_slider_lite_content() {
	global $wp_query, $post;
	
	// Set directory uri
	$directory_uri = get_template_directory_uri();
	$slide = array();
	$link = array();
		
	if (is_page()) {
		$slider_speed		= get_post_meta( $post->ID, 'cyberchimps_slider_lite_speed', true );
		$slider_height		= get_post_meta( $post->ID, 'cyberchimps_slider_lite_height', true );
		$slider_arrows		= get_post_meta( $post->ID, 'cyberchimps_slider_lite_arrows', true );
		
		for( $d = 1; $d <= 12; $d++ ) {
			$slide_default = ( $d === 1 ) ? $directory_uri . apply_filters( 'cyberchimps_slider_lite_img1' ,'/images/branding/slide1.jpg' ) : '';
			$slides[$d]['img'] = get_post_meta($post->ID, 'cyberchimps_slider_lite_slide_image_' . $d , true);
			$slides[$d]['link'] = get_post_meta($post->ID, 'cyberchimps_slider_lite_slide_url_' . $d , true);
			$slides[$d]['caption'] = get_post_meta($post->ID, 'cyberchimps_slider_lite_slide_caption_' . $d , true);
		}
	}
	
	else {
		$slider_speed		= cyberchimps_get_option( 'slider_speed', 3000 );
		$slider_height		= cyberchimps_get_option( 'slider_height', 300 );
		$slider_arrows		= cyberchimps_get_option( 'slider_arrows', 1 );
		
		for( $d = 1; $d <= 12; $d++ ) {
			$slide_default = ( $d === 1 ) ? $directory_uri . apply_filters( 'cyberchimps_slider_lite_img1' ,'/images/branding/slide1.jpg' ) : '';
			$slides[$d]['img'] = cyberchimps_get_option( 'image_slide_' . $d, $slide_default );
			$slides[$d]['link'] = cyberchimps_get_option( 'image_slide_url_' . $d, '' );
			$slides[$d]['caption'] = cyberchimps_get_option( 'image_slide_caption_' . $d, '' );
		}
	}

	// Set slider height
	$height = ( $slider_height != '' ) ? 'style="max-height:'.intval( $slider_height ).'px!important"' : 'style="max-height:300px"';
	
	$i = 0;
?>
<div class="row-fluid">
	<div id="slider-lite" class="carousel slide">
		<div class="carousel-inner">
      <?php foreach( $slides as $slide ): ?>
      <?php if( $slide['img'] != '' ): ?>
      <?php if( $i == 0 ): ?>
			<div class="active item">
      <?php else: ?>
      <div class="item">
      <?php endif; ?>
		<?php if($slide['link'] != "" ): ?>
				<a href="<?php echo esc_url( $slide['link'] ); ?>">
					<img src="<?php echo esc_url( $slide['img'] ); ?>" alt="Slider" <?php echo $height; ?> />
				</a>
		<?php else: ?>
				<img src="<?php echo esc_url( $slide['img'] ); ?>" alt="Slider" <?php echo $height; ?> />
		<?php endif; ?>
				<?php
				// Display caption bar if caption is present
				if( $slide['caption'] != "" ) : ?>
					<div class="carousel-caption">
						<h4> <?php echo $slide['caption']; ?> </h4>
					</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>
      <?php $i++;
			endforeach; ?>
		</div>
		
		<!-- Slider nav -->
		 <?php // turn off arrows if set ?>
        <?php if( !empty( $slider_arrows ) ): ?>
			<a class="carousel-control left slider-lite-left" href="#slider-lite" data-slide="prev">&lsaquo;</a>
			<a class="carousel-control right slider-lite-right" href="#slider-lite" data-slide="next">&rsaquo;</a>
		<?php endif; ?>		
	</div>
</div><!-- row-fluid -->

	<script type="text/javascript">
		jQuery(document).ready(function() {
		
			// Initialize the carousel and supply the speed
			jQuery('.carousel').carousel({
				interval: <?php echo $slider_speed; ?>
			})
		});
	</script>
<?php
}
?>