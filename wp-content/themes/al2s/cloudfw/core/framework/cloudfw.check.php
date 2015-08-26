<?php
/**
 *	Check PHP version is compatible with the theme or not
 *
 *	@since 1.0
 */
if ( version_compare(PHP_VERSION, CLOUDFW_MINPHPVERSION, '<') ) {
	$error_message = '<strong>'.__('Warning','cloudfw').':</strong>';
	$error_message.= '<br/>';
	$error_message.= sprintf( __('Sorry, this template will only run on PHP version %1$s or greater! Current version: %2$s','cloudfw'), CLOUDFW_MINPHPVERSION, PHP_VERSION );

	if ( defined('WP_DEFAULT_THEME') )
		switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	wp_die( $error_message, __('CloudFw Error','cloudfw') );
	exit;
}

/**
 *	Check WP version is compatible with the theme or not
 *
 *	@since 1.0
 */
if ( version_compare( CLOUDFW_WPVERSION , CLOUDFW_MINWPVERSION, '<') ) {
	$error_message = '<strong>'.__('Warning','cloudfw').':</strong>';
	$error_message.= '<br/>';
	$error_message.= sprintf( __('Sorry, this template will only run on WordPress %1$s or greater! (Current version: %2$s)','cloudfw'), CLOUDFW_MINWPVERSION, get_bloginfo('version') );

	if ( defined('WP_DEFAULT_THEME') )
		switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	wp_die( $error_message, __('CloudFw Error','cloudfw') );
	exit;
}

/**
 *	Check is the theme in the correct folder
 *
 *	@since 2.3
 */

if ( basename( dirname( CLOUDFW_TMP_PATH ) ) !== 'themes' ) {
	$theme_folder  = basename( CLOUDFW_TMP_PATH );
	$true_folder   = str_replace( '/', '\\', ABSPATH . basename(content_url('themes')) ) .'\\';
	$wrong_folder  = dirname( CLOUDFW_TMP_PATH ).'\\';

	$error_message = '<strong>'.__('Warning','cloudfw').':</strong>';
	$error_message.= '<br/>';
	$error_message.= __('It seems that you uploaded all folders in the theme package that downloaded by you from ThemeForest, to the themes folder of WordPress.','cloudfw');
	$error_message.= '<br/><br/>';
	$error_message.= sprintf( __('The theme folder (%3$s/) in the theme package has to be in <em>%1$s</em> folder, not in <em>%2$s</em> folder.' ,'cloudfw'),
		$true_folder,
		$wrong_folder,
		$theme_folder
	);
	$error_message.= '<br/><br/>';
	$error_message.= '<strong>'.__('Solution','cloudfw').':</strong>';
	$error_message.= '<br/>';
	$error_message.= sprintf( __('You should move or copy the "%3$s/" folder into <em>%1$s</em> folder. Then delete <em>%2$s</em> folder and re-activate the theme.' ,'cloudfw'),
		$true_folder,
		$wrong_folder,
		$theme_folder
	);

	if ( defined('WP_DEFAULT_THEME') )
		switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	wp_die( $error_message, __('CloudFw Error','cloudfw') );
}

/**
 *	Check Upload Folders
 *
 *	@since 1.0
 */
function cloudfw_check_upload_folders(){
	/*if ( ! cloudfw_is_writable( CLOUDFW_UPLOADDIR ) === true ) {
		add_action( 'network_admin_notices', 'cloudfw_check_upload_folder_message', 4 );
		add_action( 'admin_notices', 'cloudfw_check_upload_folder_message', 1 );
	}*/

	if ( ! cloudfw_is_writable( CACHE_DIR_BASE ) === true  ) {
		add_action( 'network_admin_notices', 'cloudfw_check_cache_folder_message', 4 );
		add_action( 'admin_notices', 'cloudfw_check_cache_folder_message', 1 );
	}

}

function cloudfw_check_upload_folder_message() {

	  printf ("<div class='cloudfw-update-messages error'>%s</div>",
	  sprintf ("<div style='padding:15px;'>%s</div>",
		sprintf ( __('Error: %s folder is not writable. Please adjust the chmod permissions to allow it to be written to.','cloudfw') , '<strong>'. CLOUDFW_UPLOADDIR . '</strong>' )
	  )

	);
}

function cloudfw_check_cache_folder_message() {

	  printf ("<div class='cloudfw-update-messages error'>%s</div>",
	  sprintf ("<div style='padding:15px;'>%s</div>",
		sprintf ( __('Error: %s folder is not writable. Please adjust the chmod permissions to allow it to be written to.','cloudfw') , '<strong>' . CACHE_DIR_BASE . '</strong>')
	  )

	);
}

/**
 *	Checks max_input_vars
 */
function cloudfw_need_increase_max_input_vars( $return_min = false ){
	$max_input_vars = (int) @ini_get('max_input_vars');
	$minimum = (int) apply_filters('cloudfw_min_max_input_vars', 3000);

	if ( $return_min ) {
		return $minimum;
	}

	return is_numeric($max_input_vars) && $max_input_vars > 0 && $max_input_vars < $minimum;
}

if ( is_admin() ) {
	if ( cloudfw_need_increase_max_input_vars() ) {
		add_action( 'network_admin_notices', 'cloudfw_check_max_input_var_message', 4 );
		add_action( 'admin_notices', 'cloudfw_check_max_input_var_message', 1 );
	}

	function cloudfw_check_max_input_var_message() {
		$max_input_vars = @ini_get('max_input_vars');
		printf ("<div class='cloudfw-update-messages error'>%s</div>",
		  	sprintf ("<div style='padding:15px;'>%s</div>",
				sprintf ( __('<strong>Input Vars Limit Warning</strong>: It seems that the post variable limit imposed by your server configuration is %s. Exceeding this limit all of your page contents may not be saved. Please increase your <strong>max_input_vars</strong> directive in php.ini. %s','cloudfw') , '<strong>'. $max_input_vars . '</strong>', '<a target="_blank" href=\''. cloudfw_admin_url('global') .'#troubleshooting\'>'. __('More information','cloudfw') .'</a>' )
			)
		);
	}
}

if ( ! get_option('embed_autourls') )
	update_option('embed_autourls',1);