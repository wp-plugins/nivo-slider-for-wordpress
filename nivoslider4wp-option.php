<?php
	/*organiza url dos arquivos e pastas*/
	if ( function_exists('plugins_url') ){
		$url = plugins_url(plugin_basename(dirname(__FILE__)));
		}
	else
		{
		$url = get_option('siteurl') . '/wp-content/plugins/' . plugin_basename(dirname(__FILE__));
		}
		$ns4wp_plugindir = ABSPATH.'wp-content/plugins/nivoslider4wp/';
		$ns4wp_pluginurl = $url;
?>

<!-- importa o css da area administrativa, assim como o jquery-->
<link rel="stylesheet" type="text/css" href="<?php echo $ns4wp_pluginurl; ?>/css/nivoslider4wp-painel.css" />
<script type="text/javascript" src="<?php echo $ns4wp_pluginurl; ?>/js/jquery.min.js"></script>

<?php
	/* atualiza os valores digitados nos campos*/
	if (isset($_POST['options'])) {
	update_option('nivoslider4wp_width', $_POST['nivoslider4wp_width']);
	update_option('nivoslider4wp_height', $_POST['nivoslider4wp_height']);
	
	update_option('nivoslider4wp_animSpeed', $_POST['nivoslider4wp_animSpeed']);
	update_option('nivoslider4wp_effect', $_POST['nivoslider4wp_effect']);			
	update_option('nivoslider4wp_pauseTime', $_POST['nivoslider4wp_pauseTime']);			
	update_option('nivoslider4wp_directionNav', $_POST['nivoslider4wp_directionNav']);			
	update_option('nivoslider4wp_directionNavHide', $_POST['nivoslider4wp_directionNavHide']);			
	update_option('nivoslider4wp_keyboardNav', $_POST['nivoslider4wp_keyboardNav']);			
	update_option('nivoslider4wp_pauseOnHover', $_POST['nivoslider4wp_pauseOnHover']);			
	update_option('nivoslider4wp_manualAdvance', $_POST['nivoslider4wp_manualAdvance']);			
	
	update_option('nivoslider4wp_backgroundCaption', $_POST['nivoslider4wp_backgroundCaption']);			
	update_option('nivoslider4wp_colorCaption', $_POST['nivoslider4wp_colorCaption']);			
	update_option('nivoslider4wp_captionOpacity', $_POST['nivoslider4wp_captionOpacity']);			
	}
?>

<div class="wrap">
<h2 id="all-schemes"><?php _e('Nivo Slider For WordPress - Options','nivoslider4wp'); ?></h2> 
  <link rel="Stylesheet" type="text/css" href="<?php echo $ns4wp_pluginurl; ?>/css/jPicker.css" />
  <script src="<?php echo $ns4wp_pluginurl; ?>/js/jpicker-1.1.5.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    var $z = jQuery.noConflict();
	$z(function()
      {
        $z.fn.jPicker.defaults.images.clientPath='<?php echo $ns4wp_pluginurl; ?>/css/images/';
        $z('.Multiple').jPicker({window:{title:'<?php _e('Drag Markers To Pick A Color','nivoslider4wp'); ?>'}});
      });
  </script>
    <div id="nivoslider4wp_options" class="nivoslider4wp_box">
    <form name="nivoslider4wp_options" method="post" action="<?php bloginfo('url') ?>/wp-admin/admin.php?page=nivoslider4wp-options">
		<fieldset>
		<legend><?php _e('Size of crop (will also be the size of the slider)','nivoslider4wp'); ?></legend>
			<small><?php _e('If you have any photos uploaded have to cut out pictures again','nivoslider4wp'); ?></small>
			<label><?php _e('Width','nivoslider4wp'); ?>:<input type="text" name="nivoslider4wp_width" value="<?php echo get_option('nivoslider4wp_width'); ?>" />px</label>
			<label><?php _e('Height','nivoslider4wp'); ?>:<input type="text" name="nivoslider4wp_height" value="<?php echo get_option('nivoslider4wp_height'); ?>" />px</label>
			<input type="submit" name="options" value="<?php _e('Save','nivoslider4wp'); ?>" class="button-primary action" />
		</fieldset>
		<fieldset>
		<legend><?php _e('Nivo Slider Setting ','nivoslider4wp'); ?></legend>
			<label for="nivoslider4wp_effect"><?php _e('Transition effect','nivoslider4wp'); ?>:
				<select name="nivoslider4wp_effect" id="nivoslider4wp_effect">
					<option value="random" <?php if(get_option('nivoslider4wp_effect') == 'random'){echo 'selected';}?>>random</option>
					<option value="fold" <?php if(get_option('nivoslider4wp_effect') == 'fold'){echo 'selected';}?>>fold</option>
					<option value="fade" <?php if(get_option('nivoslider4wp_effect') == 'fade'){echo 'selected';}?>>fade</option>
					<option value="sliceDown" <?php if(get_option('nivoslider4wp_effect') == 'sliceDown'){echo 'selected';}?>>sliceDown</option>
					<option value="sliceDownLeft" <?php if(get_option('nivoslider4wp_effect') == 'sliceDownLeft'){echo 'selected';}?>>sliceDownLeft</option>
					<option value="sliceUp" <?php if(get_option('nivoslider4wp_effect') == 'sliceUp'){echo 'selected';}?>>sliceUp</option>
					<option value="sliceUpLeft" <?php if(get_option('nivoslider4wp_effect') == 'sliceUpLeft'){echo 'selected';}?>>sliceUpLeft</option>
					<option value="sliceUpDown" <?php if(get_option('nivoslider4wp_effect') == 'sliceUpDown'){echo 'selected';}?>>sliceUpDown</option>
					<option value="sliceUpDownLeft" <?php if(get_option('nivoslider4wp_effect') == 'sliceUpDownLeft'){echo 'selected';}?>>sliceUpDownLeft</option>
				</select>
			</label>
			<label for="nivoslider4wp_animSpeed"><?php _e('Slide transition speed','nivoslider4wp'); ?>:<input type="text" name="nivoslider4wp_animSpeed" id="nivoslider4wp_animSpeed" value="<?php echo get_option('nivoslider4wp_animSpeed'); ?>" />ms <?php _e('(default 500ms)','nivoslider4wp');?></label>
			<label for="nivoslider4wp_pauseTime"><?php _e('Pause time between the transitions','nivoslider4wp'); ?>:<input type="text" name="nivoslider4wp_pauseTime" id="nivoslider4wp_pauseTime" value="<?php echo get_option('nivoslider4wp_pauseTime'); ?>" />ms <?php _e('(default 3000ms)','nivoslider4wp');?></label>
			<p><?php _e('Navigation arrows ','nivoslider4wp'); ?>:
				<input type="radio" name="nivoslider4wp_directionNav" class="radiocheck" id="nivoslider4wp_directionNav" value="true" <?php if(get_option('nivoslider4wp_directionNav') == 'true'){echo 'checked';}?> /><?php _e('Enable','nivoslider4wp'); ?>
				<input type="radio" name="nivoslider4wp_directionNav" class="radiocheck" id="nivoslider4wp_directionNav" value="false" <?php if(get_option('nivoslider4wp_directionNav') == 'false'){echo 'checked';}?> /><?php _e('Disable','nivoslider4wp'); ?>
			</p>
			<p>
			<?php _e('Show only the navigation arrows when mouse is on the slide ','nivoslider4wp'); ?>:
				<input type="radio" name="nivoslider4wp_directionNavHide" class="radiocheck" id="nivoslider4wp_directionNavHide" value="true" <?php if(get_option('nivoslider4wp_directionNavHide') == 'true'){echo 'checked';}?> /><?php _e('Enable','nivoslider4wp'); ?>
				<input type="radio" name="nivoslider4wp_directionNavHide" class="radiocheck" id="nivoslider4wp_directionNavHide" value="false" <?php if(get_option('nivoslider4wp_directionNavHide') == 'false'){echo 'checked';}?> /><?php _e('Disable','nivoslider4wp'); ?>
			</p>
			<p>
			<?php _e('Use left & right on keyboard','nivoslider4wp'); ?>:
				<input type="radio" name="nivoslider4wp_keyboardNav" class="radiocheck" id="nivoslider4wp_keyboardNav" value="true" <?php if(get_option('nivoslider4wp_keyboardNav') == 'true'){echo 'checked';}?> /><?php _e('Enable','nivoslider4wp'); ?>
				<input type="radio" name="nivoslider4wp_keyboardNav" class="radiocheck" id="nivoslider4wp_keyboardNav" value="false" <?php if(get_option('nivoslider4wp_keyboardNav') == 'false'){echo 'checked';}?> /><?php _e('Disable','nivoslider4wp'); ?>
			</p>
			<p>
			<?php _e('Stop animation while the mouse is on the slide ','nivoslider4wp'); ?>:
				<input type="radio" name="nivoslider4wp_pauseOnHover" class="radiocheck" id="nivoslider4wp_pauseOnHover" value="true" <?php if(get_option('nivoslider4wp_pauseOnHover') == 'true'){echo 'checked';}?> /><?php _e('Enable','nivoslider4wp'); ?>
				<input type="radio" name="nivoslider4wp_pauseOnHover" class="radiocheck" id="nivoslider4wp_pauseOnHover" value="false" <?php if(get_option('nivoslider4wp_pauseOnHover') == 'false'){echo 'checked';}?> /><?php _e('Disable','nivoslider4wp'); ?>
			</p>
			<p>
			<?php _e('Force manual transitions ','nivoslider4wp'); ?>:
				<input type="radio" name="nivoslider4wp_manualAdvance" class="radiocheck" id="nivoslider4wp_manualAdvance" value="true" <?php if(get_option('nivoslider4wp_manualAdvance') == 'true'){echo 'checked';}?> /><?php _e('Enable','nivoslider4wp'); ?>
				<input type="radio" name="nivoslider4wp_manualAdvance" class="radiocheck" id="nivoslider4wp_manualAdvance" value="false" <?php if(get_option('nivoslider4wp_manualAdvance') == 'false'){echo 'checked';}?> /><?php _e('Disable','nivoslider4wp'); ?>
			</p>
			<label><?php _e('Background color caption','nivoslider4wp'); ?>:<input type="text" name="nivoslider4wp_backgroundCaption" id="nivoslider4wp_backgroundCaption" class="Multiple" value="<?php echo get_option('nivoslider4wp_backgroundCaption'); ?>" /></label>
			<label><?php _e('Text color caption','nivoslider4wp'); ?>:<input type="text" name="nivoslider4wp_colorCaption" id="nivoslider4wp_colorCaption" class="Multiple" value="<?php echo get_option('nivoslider4wp_colorCaption'); ?>" /></label>
			<label><?php _e('Opacity background color caption ','nivoslider4wp'); ?>:<input type="text" name="nivoslider4wp_captionOpacity" value="<?php echo get_option('nivoslider4wp_captionOpacity'); ?>" />% <?php _e('<em>Use scale of <strong>0.0</strong> to <strong>10.0</strong></em>','nivoslider4wp'); ?></label>
			<input type="submit" name="options" value="<?php _e('Save','nivoslider4wp'); ?>" class="button-primary action" />
			</fieldset>
    </form>
  </div>
  	<?php if(current_user_can(10)){?>
  <div id="nivoslider4wp_credits" class="nivoslider4wp_box">
	<h3><?php _e('Credits and Donation','nivoslider4wp'); ?></h3>
	<ul>
		<li><?php _e('Developed by: ','nivoslider4wp'); ?> Marcelo Torres - <a href="http://nivo.dev7studios.com/" target="_blank">http://www.marcelotorresweb.com/</a><li>
		<li><?php _e('Jquery Nivo Slider by: ','nivoslider4wp'); ?><a href="http://nivo.dev7studios.com/" target="_blank"> http://nivo.dev7studios.com/</a><li>
		<li><?php _e('JPicker Plugin by: ','nivoslider4wp'); ?><a href="http://www.digitalmagicpro.com/jPicker/" target="_blank"> http://www.digitalmagicpro.com/jPicker/</a><li>
		<li><?php _e('This plugin has been helpful to you? How about making a donation and encourage me to develop other plugins? ','nivoslider4wp'); ?></li>
	</ul>
			<!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
			<div class="donation_button">
			<form target="pagseguro" action="https://pagseguro.uol.com.br/checkout/doacao.jhtml" method="post">
				<input type="hidden" name="email_cobranca" value="marcelotorres.ib@gmail.com" />
				<input type="hidden" name="moeda" value="BRL" />
				<input type="image" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/doacoes/120x53-doar.gif" name="submit" alt="Pague com PagSeguro - � r�pido, gr�tis e seguro!" />
			</form>
			</div>
			<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
			<!-- INICIO FORMULARIO BOTAO PAYPAL -->
			<div class="donation_button">
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="TMQ9JKXQ7WPKA">
				<input type="image" src="https://www.paypal.com/pt_BR/BR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - A maneira mais f�cil e segura de efetuar pagamentos on-line!">
				<img alt="" border="0" src="https://www.paypal.com/pt_BR/i/scr/pixel.gif" width="1" height="1">
			</form>
			</div>
			<!-- FINAL FORMULARIO BOTAO PAYPAL -->
  </div>
<?php }?>
</div>