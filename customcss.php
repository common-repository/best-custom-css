<?php
/*
Plugin Name: Best Custom CSS
Plugin URI: http://wordpress.org/extend/plugins/best-custom-css
Description: This plugin help you to manage your css files with an easy and convenient method directly from Wordpress dashboard..
Version: 1.0
Author: StarNetwork
Author URI: http://www.s4u.co.il
License: GPL2
*/
function customcss_page(){
	if( $_POST['customcss_hidden'] == 'Y' ) {
		$custom_admin = $_POST[ 'customcss-load-admin-css' ];
		$ie6 = $_POST[ 'customcss-load-ie6' ];
		$ie7 = $_POST[ 'customcss-load-ie7' ];
		$ie8 = $_POST[ 'customcss-load-ie8' ];
		$ie9 = $_POST[ 'customcss-load-ie9' ];
		$ie = $_POST['customcss-load-ie'];
		$custom = $_POST[ 'customcss-load-custom' ];
		
		update_option( 'customcss-load-admin-css', $custom_admin );
		update_option( 'customcss-load-ie6', $ie6 );
		update_option( 'customcss-load-ie7', $ie7 );
		update_option( 'customcss-load-ie8', $ie8 );
		update_option( 'customcss-load-ie9', $ie9 );
		update_option( 'customcss-load-ie', $ie );
		update_option( 'customcss-load-custom', $custom );
	}
	?>
<div class="wrap">
<h2><?php echo _e('Custom CSS Plugin')?></h2>
	<form name="form1" method="post" action="">
	<p><input type="hidden" name="customcss_hidden" value="Y"><input
		type="checkbox" name="customcss-load-admin-css"
		<?php if(get_option('customcss-load-admin-css') == 'custom-admin'){ ?>
		checked="checked" <?php } ?> value="custom-admin" /><label
		for="load-admin-css"><?php _e('Load Custom Admin')?></label><br />
	<label for="load-frontend-css"><?php _e('Load frontend CSS')?></label><br />
	</label><input type="checkbox" name="customcss-load-ie6"
	<?php if(get_option('customcss-load-ie6') == 'ie6'){ ?>
		checked="checked" <?php } ?> value="ie6" /><label for="ie6"><?php _e('Load IE6')?><br />
	<input type="checkbox" name="customcss-load-ie7"
	<?php if(get_option('customcss-load-ie7') == 'ie7'){ ?>
		checked="checked" <?php } ?> value="ie7" /><label for="ie7"><?php _e('Load IE7')?></label><br />
	<input type="checkbox" name="customcss-load-ie8"
	<?php if(get_option('customcss-load-ie8') == 'ie8'){ ?>
		checked="checked" <?php } ?> value="ie8" /><label for="ie8"><?php _e('Load IE8')?></label><br />
	<input type="checkbox" name="customcss-load-ie9"
	<?php if(get_option('customcss-load-ie9') == 'ie9'){ ?>
		checked="checked" <?php } ?> value="ie9" /><label for="ie9"><?php _e('Load IE9')?></label><br />
	<input type="checkbox" name="customcss-load-ie"
	<?php if(get_option('customcss-load-ie') == 'ie'){ ?> checked="checked"
	<?php } ?> value="ie" /><label for="ie"><?php _e('Load IE')?></label><br />
	<input type="checkbox" name="customcss-load-custom"
	<?php if(get_option('customcss-load-custom') == 'custom'){ ?>
		checked="checked" <?php } ?> value="custom" /><label for="custom"><?php _e('Custom')?></label>
		</p>
	<hr />
	
	<p class="submit"><input type="submit" name="Submit"
		value="<?php _e('Update Settings', 'mt_trans_domain' ) ?>" /></p>
	
	</form>
</div>
<div class="wrap starcustomcss">
General Module file	: <a href="./plugin-editor.php?plugin=best-custom-css%2Fcustomcss.php">Edit the Custom CSS files Here</a><br />
ie6.css Editor		: <a href="./plugin-editor.php?file=best-custom-css%2Fcss%2Fie6.css&plugin=best-custom-css%2Fcustomcss.php">ie6.css</a><br />
ie7.css Editor		: <a href="./plugin-editor.php?file=best-custom-css%2Fcss%2Fie7.css&plugin=best-custom-css%2Fcustomcss.php">ie7.css</a><br />
ie8.css Editor		: <a href="./plugin-editor.php?file=best-custom-css%2Fcss%2Fie8.css&plugin=best-custom-css%2Fcustomcss.php">ie8.css</a><br />
ie9.css Editor		: <a href="./plugin-editor.php?file=best-custom-css%2Fcss%2Fie9.css&plugin=best-custom-css%2Fcustomcss.php">ie9.css</a><br />
ie.css  Editor		: <a href="./plugin-editor.php?file=best-custom-css%2Fcss%2Fie.css&plugin=best-custom-css%2Fcustomcss.php">ie.css</a><br />
Site Custom CSS Editor  : <a href="./plugin-editor.php?file=best-custom-css%2Fcss%2Fcustom.css&plugin=best-custom-css%2Fcustomcss.php">custom.css</a><br />
Admin Custom CSS Editor : <a href="./plugin-editor.php?file=best-custom-css%2Fcss%2Fcustom-admin.css&plugin=best-custom-css%2Fcustomcss.php">custom-admin.css</a><br /><br />
<b>Explanation:</b><br />
ie6.css affects only in IE6<br />
ie7.css affects only in IE6<br />
ie8.css affects only in IE6<br />
ie9.css affects only in IE6<br />
ie.css affects for all IE versions<br />
custom.css affects for all Browsers<br />
custom-admin.css affects in Admin Panel, for all Browsers<br />
</div>
<?php
}

function customcss_admin_register_head() {
	$name = 'custom-admin';
	$siteurl = get_option('siteurl');
	$url = $siteurl . '/wp-content/plugins/best-custom-css/css/'.$name.'.css';
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$url\" />\n";
}

function load_frontend() {
	$stylesheets = array(
		'ie6' => get_option('customcss-load-ie6'),
		'ie7' => get_option('customcss-load-ie7'),
		'ie8' => get_option('customcss-load-ie8'),
		'ie9' => get_option('customcss-load-ie9'),
		'ie' => get_option('customcss-load-ie'),
		'custom' => get_option('customcss-load-custom')
	);
	$siteurl = get_option('siteurl');
	foreach($stylesheets as $key => $css){
		if($css != ""){
			$url = $siteurl . '/wp-content/plugins/best-custom-css/css/'.$css.'.css';
			switch($key){
				case "ie6":
					echo "<!--[if IE 6]>";
					break;
				case "ie7":
					echo "<!--[if IE 7]>";
					break;
				case "ie8":
					echo "<!--[if IE 8]>";
					break;
				case "ie9":
					echo "<!--[if IE 9]>";
					break;
				case "ie":
					echo "<!--[if IE]>";
					break;
			}
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$url\" />\n";
			if(substr($key,0,2) == "ie"){
				echo "<![endif]-->";
			}
		}
	}
}

function install(){
	require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
	$c_dir = dirname(__FILE__);
	$dir = $c_dir. DIRECTORY_SEPARATOR ."css";
	if(!file_exists($dir)){
		if(is_writable($c_dir))
			mkdir($dir);
		else exit('Please make sure that the directory: "' . $c_dir . '" is writable.' );
	}
	$dir = $dir . DIRECTORY_SEPARATOR;
	$files = array("custom-admin.css","custom.css","ie.css","ie6.css","ie7.css","ie8.css","ie9.css");
	foreach($files as $file){
		if(!file_exists($dir.$file)){
			if(is_writable($dir))
				$fh = fopen($dir.$file, 'w');
			else exit('Please make sure that the directory: "' . $dir . '" is writable.' );
			fclose($fh);
		}
	}
}

register_activation_hook ( __FILE__, 'install' );

function customcss_admin_menu() {
	add_menu_page('Custom CSS', 'Custom CSS', 'administrator',  'customcss', 'customcss_page');
}

if(get_option('customcss-load-admin-css') == 'custom-admin'){
	add_action('admin_head', 'customcss_admin_register_head');
}

add_action('wp_head', 'load_frontend', 40);
add_action('admin_menu', 'customcss_admin_menu');