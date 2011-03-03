<?php
	/*mostra o slide no site*/
	function nivoslider4wp_show() {
		if ( function_exists('plugins_url') )
			$url = plugins_url(plugin_basename(dirname(__FILE__)));
		else
			$url = get_option('siteurl') . '/wp-content/plugins/' . plugin_basename(dirname(__FILE__));
		global $wpdb;
		$ns4wp_plugindir = ABSPATH.'wp-content/plugins/nivoslider4wp/';
		$ns4wp_pluginurl = $url;
		$ns4wp_filesdir = ABSPATH.'wp-content/plugins/nivoslider4wp/files/';
		$ns4wp_filesurl = $url.'/files/';

	?>
		<div id="slider">
				<?php $items = $wpdb->get_results("SELECT nivoslider4wp_id,nivoslider4wp_type,nivoslider4wp_text_headline,nivoslider4wp_image_link FROM {$wpdb->prefix}nivoslider4wp ORDER BY nivoslider4wp_order,nivoslider4wp_id"); ?>
				<?php foreach($items as $item) : ?>
						<?php
						if(!$item->nivoslider4wp_image_link){ ?>
						<img src="<?php echo $ns4wp_filesurl.$item->nivoslider4wp_id.'_s.'.$item->nivoslider4wp_type; ?>" alt="<?php echo stripslashes($item->nivoslider4wp_text_headline); ?>" title="<?php echo stripslashes($item->nivoslider4wp_text_headline); ?>"/>
						<?php } else { ?>
						<a href="<?php echo $item->nivoslider4wp_image_link;?>"><img src="<?php echo $ns4wp_filesurl.$item->nivoslider4wp_id.'_s.'.$item->nivoslider4wp_type; ?>" alt="<?php echo stripslashes($item->nivoslider4wp_text_headline); ?>" title="<?php echo stripslashes($item->nivoslider4wp_text_headline); ?>"/></a>
						<?php } ?>
				<?php endforeach; ?>
		</div>
	<?php
	}

	/*conteudo que ora para dentro do <head>*/
	function js_NivoSlider(){
	?>
<script type="text/javascript" src="<?php echo get_option('siteurl') . '/wp-content/plugins/nivoslider4wp/js/jquery.min.js';?>"></script>
<script type="text/javascript" src="<?php echo get_option('siteurl') . '/wp-content/plugins/nivoslider4wp/js/jquery.nivo.slider.js';?>"></script>
<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'<?php echo get_option('nivoslider4wp_effect'); ?>',
		slices:15,
		animSpeed:<?php echo get_option('nivoslider4wp_animSpeed'); ?>,
		pauseTime:<?php echo get_option('nivoslider4wp_pauseTime'); ?>,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:<?php echo get_option('nivoslider4wp_directionNav'); ?>, //Next & Prev
		directionNavHide:<?php echo get_option('nivoslider4wp_directionNavHide'); ?>, //Only show on hover
		controlNav:true, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		controlNavThumbsFromRel:false, //Use image rel for thumbs
		controlNavThumbsSearch: '.jpg', //Replace this with...
		controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
		keyboardNav:<?php echo get_option('nivoslider4wp_keyboardNav'); ?>, //Use left & right arrows
		pauseOnHover:<?php echo get_option('nivoslider4wp_pauseOnHover'); ?>, //Stop animation while hovering
		manualAdvance:<?php echo get_option('nivoslider4wp_manualAdvance'); ?>, //Force manual transitions
		captionOpacity:<?php echo get_option('nivoslider4wp_captionOpacity'); ?>, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){}, //Triggers after all slides have been shown
		lastSlide: function(){}, //Triggers when last slide is shown
		afterLoad: function(){} //Triggers when slider has loaded
	});
});
</script>
<link rel="stylesheet" type="text/css" href="<?php echo get_option('siteurl') . '/wp-content/plugins/nivoslider4wp/css/nivoslider4wp.css'?>" />
<style>
	.nivoSlider {
	width:<?php echo get_option('nivoslider4wp_width'); ?>px;
}
.nivo-caption {
	background:#<?php echo get_option('nivoslider4wp_backgroundCaption'); ?>;
	color:#<?php echo get_option('nivoslider4wp_colorCaption'); ?>;
}
</style>
	<?php
	}
add_action('wp_head', 'js_NivoSlider');
?>