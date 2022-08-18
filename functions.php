<?php
/*
Theme Name: Bounty Bali
Theme URI: http://www.bountybali.com/
Description: Themes Bounty Bali
Version: 4.5.3
Author: Wordpress
Author URI: http://www.bountybali.com/
*/

include('BootstrapNavMenuWalker.php');
add_theme_support( 'post-thumbnails' );
add_image_size( 'slider', 1680, 1050, true );
add_image_size( 'category-thumb', 250, 155, true );
add_image_size( 'thumb-cat', 300, 300, true );
add_image_size( 'thumb-category', 263, 263, true );
automatic_feed_links();

// Shorten Excerpt text for use in theme
function pov_excerpt($text, $chars = 0) {
	$text = substr($text,0,$chars);
	$text = substr($text,0,strrpos($text,' '));
	$text = $text." ...";
	return $text;
}
// You can change the directory name, but please always keep slash in the end.
DEFINE('NEW_MEDIA_DIR', 'media/');

// If you want to make the uploads URLs look like:
// http://website.com/sample-media-library-image.png
// use this instead:
// DEFINE('NEW_MEDIA_DIR', '');

function bis_findfile($pattern, $flags = 0) {
	$files = glob($pattern, $flags);
	foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir) {
		$files = array_merge($files, bis_findfile($dir.'/'.basename($pattern), $flags));
	}
	return $files;
}

function bis_get_allowed_extensions() {
	return array('jpg', 'jpeg', 'jpe', 'gif', 'psng', 'bmp', 'tif', 'tiff', 'ico', 'pdf');
}

function bis_detect_image($request) {
	global $wp, $wpdb;
	
	// Allowed MIME types
	$mime_types_array = bis_get_allowed_extensions();
	$mime_types = implode("|", $mime_types_array);
	
	// Prepare the new directory name for REGEX rule
	$new_media_dir = preg_quote(NEW_MEDIA_DIR, '/');
	
	// Check if requested file is an attachment
	preg_match("/{$new_media_dir}(.+)\.({$mime_types})/", $wp->request, $is_file);
	
	if(!empty($is_file)) {
		// Get the uploads dir used by WordPress to host the media files
		$upload_dir = wp_upload_dir();
		
		// Decode the URI-encoded characters
		$filename = basename(urldecode($wp->request));
		
		// Check if filename contains non-ASCII characters. If does, use SQL to find the file on the server
		if(preg_match('/[^\x20-\x7f]/', $filename)) {
			
			// Check if the file is a thumbnail
			preg_match("/(.*)(-[\d]+x[\d]+)([\S]{3,4})/", $filename, $is_thumb);
			
			// Prepare the pattern
			$pattern = "{$upload_dir['baseurl']}/%/{$filename}";
			
			// Use the full size URL in SQL query (remove the thumb appendix)
			$pattern = (!empty($is_thumb[2])) ? preg_replace("/(-[\d]*x[\d]*)/", "", "{$upload_dir['baseurl']}/%/{$filename}") : $pattern;
			
			$file_url = $wpdb->get_var($wpdb->prepare("SELECT guid FROM $wpdb->posts WHERE guid LIKE %s", $pattern));
			
			if(!empty($file_url)) {
				// Replace the URL with DIR
				$file_dir = str_replace($upload_dir['baseurl'], $upload_dir['basedir'], $file_url);
				
				// Get the original path
				$file_dir = (!empty($is_thumb[2])) ? str_replace($is_thumb[1], "{$is_thumb[1]}{$is_thumb[2]}", $file_dir) : $file_dir;
			}
		} else {
			// Prepare the pattern
			$pattern = "{$upload_dir['basedir']}/*/{$filename}";
			
			$found_files = bis_findfile($pattern);
			
			// Get the original path if file is found
			$file_dir = (!empty($found_files[0])) ? $found_files[0] : false;
		}
	}
	
	// Double check if the file exists
	if(!empty($file_dir) && file_exists($file_dir)) {
		$file_mime = mime_content_type($file_dir);
		$file_last_modified = filemtime($current_file_name); 
		
		// Set headers
		header("Content-type: " . $file_mime . "\n");
		//header("Last modified: " . gmdate('D, d M Y H:i:s', $file_last_modified) . " GMT\n";
		readfile($file_dir);
		die();
	}
	
	return $request;
}
add_filter('request', 'bis_detect_image', 999);

function bis_shorten_media_url($attachment_url) {
	$mime_types_array = bis_get_allowed_extensions();
	$extension  = pathinfo($attachment_url, PATHINFO_EXTENSION);
	
	// Only the selected file extension should be rewritten
	if(in_array($extension, $mime_types_array)) {
		$home_url = preg_quote(rtrim(get_home_url(), "/"), "/");
		$attachment_url = preg_replace("/(?!{$home_url})(wp-content\/uploads\/[\d]{4}\/[\d]{2}\/)/ui", NEW_MEDIA_DIR, $attachment_url);
	}
	
	return $attachment_url;
}
add_filter('wp_get_attachment_url', 'bis_shorten_media_url');
add_filter('the_content', 'bis_shorten_media_url');


// Displays post image attachment (sizes: thumbnail, medium, full)
function dp_attachment_image($postid=0, $size='full', $attributes='title') {
	if ($postid<1) $postid = get_the_ID();
	if ($images = get_children(array(
		'post_parent' => $postid,
		'post_type' => 'attachment',
		'numberposts' => 1,
		'post_mime_type' => 'image',)))
		foreach($images as $image) {
			$attachment=wp_get_attachment_image_src($image->ID, $size);
			?><img src="<?php echo $attachment[0]; ?>" <?php echo $attributes; ?> />
			<?php
		}
}
// Setting menus
register_nav_menus( array(
		'mainmenu' => __( 'Main Menu Navigation', 'default' ),
		'sidebarmenu' => __( 'Hotel Singapore', 'default' ),
		'hotelmenu' => __( 'Hotel Nusa Dua Menu', 'default' ),
		'hotelmenu2' => __( 'Hotel Tanjung Benoa Menu', 'default' ),
		'hotelmenu3' => __( 'Hotel jimbaran Menu', 'default' ),
		'hotelmenu4' => __( 'Hotel Kuta Menu', 'default' ),
		'hotelmenu5' => __( 'Hotel Ubud Menu', 'default' ),
		'hotelmenu6' => __( 'Hotel Candidasa Menu', 'default' ),
		'hotelmenu7' => __( 'Hotel Sanur Menu', 'default' ),
		//'footermenu' => __( 'Footer Navigation', 'default' ),
) );

function main_menu() {
	wp_nav_menu( array(
                'menu'              => 'mainmenu',
                'theme_location'    => 'mainmenu',
                'depth'             => 3,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'menu',
                'menu_class'        => 'nav navbar-nav navbar-right',
                'fallback_cb'       => 'Yamm_Nav_Walker_menu_fallback',
                'walker'            => new yammnavwalker()
	));
}

function side_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area (RU)', 'default' ),
		'id'            => 'widget_ru',
		'description'   => __( 'Appears in the footer of the site in Russian.', 'default' ),
		'before_widget' => '<div class="col-lg-4 col-md-4 col-sm-12 widget-footer">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area (EN)', 'default' ),
		'id'            => 'widget_en',
		'description'   => __( 'Appears in the footer of the site in English.', 'default' ),
		'before_widget' => '<div class="col-lg-4 col-md-4 col-sm-12 widget-footer">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'side_widgets_init' );

add_filter( 'the_password_form', 'custom_password_form' );
function custom_password_form() {
    global $post;
	//$lang = pll_get_post_language($post->ID);
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	
	/*if($lang<>"ru"){
		$o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
		' . __( "" ) . '
		<div class="col-lg-12">
			<label class="pass-label" for="' . $label . '">' . __( "PASSWORD:" ) . ' </label>
		</div>
		<div class="col-lg-6">
			<input name="post_password" id="' . $label . '" type="password" class="form-control" />
		</div>
		<div class="col-lg-12">
			<div style="margin-top:10px;"></div>
			<input type="submit" name="Submit" class="btn btn-pass" value="' . esc_attr__( "Submit" ) . '" />
		</div>
		<div class="col-lg-12">
			<p><strong><a href="/?p=2803">Register</a></strong></p>
			<p>If you do not have to enter a password, you need to be registered.</p>
		</div>
		</form>
		';
	}else{ */
		$o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
		' . __( "" ) . '
		<div class="col-lg-12">
			<label class="pass-label" for="' . $label . '">' . __( "Пароль:" ) . ' </label>
		</div>
		<div class="col-lg-6">
			<input name="post_password" id="' . $label . '" type="password" class="form-control" />
		</div>
		<div class="col-lg-12">
			<div style="margin-top:10px;"></div>
			<input type="submit" name="Submit" class="btn btn-pass" value="' . esc_attr__( "Отправить" ) . '" />
		</div>
		<div class="col-lg-12">
			<p><strong><a href="https://bountybali.com/register/">ЗАРЕГИСТРИРОВАТЬСЯ</a></strong></p>
			<p>Если у вас еще нет пароля для входа, вам надо пройти регистрацию.</p>
		</div>
		</form>
		';
	//}
    return $o;
}


/*function the_title_trim($title) {
	$title = attribute_escape($title);
	$findthese = array(
		'#Protected:#',
		'#Private:#',
		'#ЗАЩИЩЕНО:#'
	);
	$replacewith = array(
		'', // What to replace "Protected:" with
		'', // What to replace "Private:" with
		''	// What to replace "ЗАЩИЩЕНО:" with
	);
	$title = preg_replace($findthese, $replacewith, $title);
	return $title;
}
add_filter('the_title', 'the_title_trim');*/

function protect_my_privates($text){
  $text='%s';
  return $text;
}
add_filter('private_title_format','protect_my_privates');
add_filter('protected_title_format', 'protect_my_privates');

function wp_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'type'  => 'array'
	) );
	if( is_array($page_format) ) {
				$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
				echo '<div class="pagination loop-pagination"><ul class="page-numbers">';
				//echo '<li><span class="page-numbers current">'. $wp_query->max_num_pages .'</span></li>';
				foreach ( $page_format as $page ) {
						echo "<li>$page</li>";
				}
			   echo '</ul></div>';
	}
}



?>