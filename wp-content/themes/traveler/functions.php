<?php
//Theme Name
$themename = "Traveler";
//prefix 
$shortname = "theme_";
//Array
$options = array (
  array(
    "name" => "Videos urls",
    "id" => $shortname."_videosArray",
    "std" => "a:5:{s:10:\"url_video1\";a:3:{s:4:\"link\";s:1:\"#\";s:6:\"height\";i:250;s:5:\"width\";i:300;}s:10:\"url_video2\";a:3:{s:4:\"link\";s:1:\"#\";s:6:\"height\";i:250;s:5:\"width\";i:300;}s:10:\"url_video3\";a:3:{s:4:\"link\";s:1:\"#\";s:6:\"height\";i:250;s:5:\"width\";i:300;}s:10:\"url_video4\";a:3:{s:4:\"link\";s:1:\"#\";s:6:\"height\";i:250;s:5:\"width\";i:300;}s:10:\"url_video5\";a:3:{s:4:\"link\";s:1:\"#\";s:6:\"height\";i:250;s:5:\"width\";i:300;}}"),
  array(
    "name" => "Banners",
    "id" => $shortname."_bannersArray",
    "std" => "a:6:{s:13:\"theme_banner1\";a:5:{s:4:\"link\";s:1:\"#\";s:9:\"image_url\";s:0:\"\";s:6:\"height\";i:125;s:5:\"width\";i:125;s:6:\"status\";i:0;}s:13:\"theme_banner2\";a:5:{s:4:\"link\";s:1:\"#\";s:9:\"image_url\";s:0:\"\";s:6:\"height\";i:125;s:5:\"width\";i:125;s:6:\"status\";i:0;}s:13:\"theme_banner3\";a:5:{s:4:\"link\";s:1:\"#\";s:9:\"image_url\";s:0:\"\";s:6:\"height\";i:125;s:5:\"width\";i:125;s:6:\"status\";i:0;}s:13:\"theme_banner4\";a:5:{s:4:\"link\";s:1:\"#\";s:9:\"image_url\";s:0:\"\";s:6:\"height\";i:125;s:5:\"width\";i:125;s:6:\"status\";i:0;}s:13:\"theme_banner5\";a:6:{s:4:\"link\";s:1:\"#\";s:9:\"image_url\";s:0:\"\";s:6:\"height\";i:250;s:5:\"width\";i:300;s:6:\"status\";i:0;s:7:\"adsense\";s:0:\"\";}s:13:\"theme_banner6\";a:6:{s:4:\"link\";s:1:\"#\";s:9:\"image_url\";s:0:\"\";s:6:\"height\";i:60;s:5:\"width\";i:468;s:6:\"status\";i:0;s:7:\"adsense\";s:0:\"\";}}"
  ),
  array(
    "name" => "Styles",
    "id" => $shortname."_css",
    "std" => "style.css"
  ),
  array(
    "name" => "flickr",
    "id" => $shortname."_flickr",
    "std" => "a:4:{s:4:\"nsid\";s:0:\"\";s:7:\"display\";s:0:\"\";s:11:\"displayType\";s:0:\"\";s:4:\"tags\";s:0:\"\";}"
  ),
  array(
    "name" => "feedburner",
    "id" => $shortname."_feedburner",
    "std" => "a:2:{s:2:\"id\";s:0:\"\";s:3:\"num\";s:1:\"5\";}"
  ),
  array(
  	"name" => "feedburnerSubmition",
  	"id" => $shortname."_feedburnerSubmition",
  	"std" => ""
  ),
  array(
  	"name" => "BannersStatus",
  	"id" => $shortname."_bannerStatus",
  	"std" => "1"
  ),
  array(
  	"name" => "categoriesSubMenu",
  	"id" => $shortname."_categoriesSubmenu",
  	"std" => "a:0:{}"
  ),
  array(
  	"name" => "homePostCategory",
  	"id" => $shortname."_homePostCategory",
  	"std" => ""
  ),
  array(
  	"name" => "homeRandomPosts",
  	"id" => $shortname."_homeRandomPosts",
  	"std" => "1"
  ),
  array(
  	"name" => "randomCategoryPost",
  	"id" => $shortname."_randomCategoryPosts",
  	"std" => ""
  )
);
//Flickr display types
$flickrDisplayType = Array("square", "thumbnail", "small");

//Existing CSS Files
$cssFiles = get_availableCss();

function get_bannersSettings($bannerId, $index = FALSE){
  global $themename, $shortname, $options;
 $theBanners = get_settings($shortname."_bannersArray");
  if(!is_array($theBanners)){
  	$theBanners = unserialize($options[1]["std"]);
  }
  $theActualBanner = $theBanners[$bannerId];
  if($index != FALSE){
  	return $theActualBanner[$index];
  }else{
  	return $theActualBanner;
  }
}

function get_videoSettings($videoId, $index){
  global $themename, $shortname, $options;
  $theVideos = get_settings($shortname."_videosArray"); 
  if(!is_array($theVideos)){
		$theVideos = unserialize($options[0]["std"]);
  }
  $theActualVideo = $theVideos[$videoId];
  return $theActualVideo[$index];
}

function get_flickrSettings($index){
	global $themename, $shortname, $options;
	$theflickrSettings = get_settings($shortname."_flickr");
		if(!is_array($theflickrSettings)){
		$theflickrSettings = unserialize($options[3]["std"]);
  }
  return $theflickrSettings[$index];
}

function get_feedburner($index){
	global $themename, $shortname, $options;
	$thefeedburnerSettings = get_settings($shortname."_feedburner");
	if(!is_array($thefeedburnerSettings)){
		$thefeedburnerSettings = unserialize($options[4]["std"]);
	}
	return $thefeedburnerSettings[$index];
}
/*
Get Available CSS
*/
function get_availableCss(){
  $result = array();
  $dir = dir(TEMPLATEPATH."/");
  while (false !== ($file = $dir->read())) {
    if(ereg("\.css", $file, $r)){
    	$result[] = $file;
    }
  }
  $dir->close();
  return $result;
}
/*
Reset or Update Theme Options
*/
function newThemeOptions_add_admin() {
  global $themename, $shortname, $options, $cssFiles;
  if ( $_GET['page'] == basename(__FILE__) ) {
    if($_REQUEST['saveButton']){


      update_option( $shortname."_css", $_REQUEST[ $shortname."_css" ] );
      while(list($bannerId, $bannerInfo) = each($_REQUEST[$shortname."_banner"])){
        $bannerInfo["width"] = get_bannersSettings($bannerId, "width");
        $bannerInfo["height"] = get_bannersSettings($bannerId, "height");
        $bannerInfo["status"] = $_REQUEST[$shortname."_banner"][$bannerId]["status"];
        if($_REQUEST[$shortname."_banner"][$bannerId]["adsense"])
        	$bannerInfo["adsense"] = ($_REQUEST[$shortname."_banner"][$bannerId]["adsense"]);
        $allBanners[$bannerId] = $bannerInfo;
      }
      update_option( $shortname."_bannersArray", $allBanners);
      update_option( $shortname."_flickr", $_REQUEST[$shortname."_flickr"]);
      update_option( $shortname."_feedburner", $_REQUEST[$shortname."_feedburner"]);
      update_option( $shortname."_feedburnerSubmition", $_REQUEST[$shortname."_feedburnerSubmition"]);
      update_option( $shortname."_bannerStatus", $_REQUEST[$shortname."_bannerStatus"]);
      update_option( $shortname."_categoriesSubmenu", $_REQUEST[$shortname."_categoriesSubmenu"]);
      update_option( $shortname."_homePostCategory", $_REQUEST[ $shortname."_homePostCategory" ] );
      update_option( $shortname."_homeRandomPosts", $_REQUEST[ $shortname."_homeRandomPosts" ] );
      update_option( $shortname."_randomCategoryPosts", $_REQUEST[ $shortname."_randomCategoryPosts" ] );
      header("Location: themes.php?page=functions.php&saved=true");
      die;
  	}else if($_REQUEST['resetButton']){
      foreach ($options as $value) {
      	delete_option( $value['id'] ); }
      header("Location: themes.php?page=functions.php&reset=true");
      die;
    }
  }
  add_theme_page($themename." Options", "Theme Options", 'edit_themes', basename(__FILE__), 'newThemeOptions_admin');
}
function themeOption_cat_rows( $parent = 0, $level = 0, $categories = 0 , $categoriesMenu) {
	if ( !$categories ) {
		$args = array('hide_empty' => 0);
		if ( !empty($_GET['s']) )
			$args['search'] = $_GET['s'];
		$categories = get_categories( $args );
	}
	$children = _get_term_hierarchy('category');
	if ( $categories ) {
		ob_start();
		foreach ( $categories as $category ) {
			if ( $category->parent == $parent) {
				echo "\t" . themeOption_cat_row( $category, $level , false, $categoriesMenu);
				if ( isset($children[$category->term_id]) )
					themeOption_cat_rows( $category->term_id, $level +1, $categories , $categoriesMenu);
			}
		}
		$output = ob_get_contents();
		ob_end_clean();
		$output = apply_filters('cat_rows', $output);
		echo $output;
	} else {
		return false;
	}
}
function themeOption_cat_row( $category, $level, $name_override = false , $categoriesMenu) {
	global $themename, $shortname, $options;
	global $class;
	$category = get_category( $category );
	$pad = str_repeat( '&#8212; ', $level );
	$name = ( $name_override ? $name_override : $pad . ' ' . $category->name );
	$edit = $name;
	$class = " class='alternate'" == $class ? '' : " class='alternate'";
	$category->count = number_format_i18n( $category->count );
	$posts_count = $category->count;
	$output = "\n\t\t<tr $class>\n\t\t\t<th scope='row' class='check-column'>";
	if ( absint(get_option( 'default_category' ) ) != $category->term_id ) {
		$output .= "<input type='checkbox' name='".$shortname."_categoriesSubmenu[]' value='".$category->term_id."' ".(in_array($category->term_id, $categoriesMenu) ? "checked":"")."/>";
	} else {
		$output .= "&nbsp;";
	}
	$output .= "\n\t\t\t</th>\n\t\t\t<td>$edit</td>\n\t\t\t<td>$category->description</td>\n\t\t</tr>";

	return apply_filters('cat_row', $output);
}
/*
Main admin function
*/
function newThemeOptions_admin() {
  global $themename, $shortname, $options, $cssFiles, $flickrDisplayType;
  if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
  if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
	echo "\n<script>";
	echo "\n\tfunction markAll(selectStatus){";
	echo "\n\t\tif(selectStatus){";
	echo "\n\t\t\tdocument.getElementById('theme__banner[theme_banner1][status]').checked = true;";
	echo "\n\t\t\tdocument.getElementById('theme__banner[theme_banner2][status]').checked = true;";
	echo "\n\t\t\tdocument.getElementById('theme__banner[theme_banner3][status]').checked = true;";
	echo "\n\t\t\tdocument.getElementById('theme__banner[theme_banner4][status]').checked = true;";
	echo "\n\t\t\tdocument.getElementById('theme__banner[theme_banner5][status]').checked = true;";
	echo "\n\t\t\tdocument.getElementById('theme__banner[theme_banner6][status]').checked = true;";
	echo "\n\t\t}else{";
	echo "\n\t\t\tdocument.getElementById('theme__banner[theme_banner1][status]').checked = false;";
	echo "\n\t\t\tdocument.getElementById('theme__banner[theme_banner2][status]').checked = false;";
	echo "\n\t\t\tdocument.getElementById('theme__banner[theme_banner3][status]').checked = false;";
	echo "\n\t\t\tdocument.getElementById('theme__banner[theme_banner4][status]').checked = false;";
	echo "\n\t\t\tdocument.getElementById('theme__banner[theme_banner5][status]').checked = false;";
	echo "\n\t\t\tdocument.getElementById('theme__banner[theme_banner6][status]').checked = false;";
	echo "\n\t\t}";
	echo "\n\t}";
	echo "\n</script>";
  	echo "\n<div class=\"wrap\">";
  	echo "\n<p id=\"icon-options-general\" class=\"icon32\"><h2>".$themename." "?><?php _e("theme settings","traveler");?><?php "</h2></p>";
 	echo "\n<form method=\"post\">";
  	echo "\n<p class=\"submit\" style=\"border:0px;padding:0px;\">";
 	echo "\n\t<input  class=\"button-primary\" type=\"submit\" name=\"saveButton\" value=\""?><?php _e("Save settings","traveler");?><?php echo "\" />";
 	echo "\n\t<input class=\"button\" name=\"resetButton\" type=\"submit\" value=\""?><?php _e("Reset settings","traveler");?><?php echo "\" />";
  	echo "\n</p>";  
  	echo "\n<table class=\"widefat\"><thead><tr><th style='font-size:14px;font-weight:normal;font-style:normal;padding-left:10px;'>"?><?php _e("Theme Style","traveler");?><?php "</th></tr></thead>";
  	echo "\n\t\t<tbody><tr><th >"?><?php _e("Select your Style","traveler");?><?php "";
  	echo "\n\t\t\t<select name=\"".$shortname."_css\" id=\"".$shortname."_css\">";
 	while(list(, $f) = each($cssFiles)){
  	echo "\n\t\t\t\t<option value=\"".$f."\" ".((get_settings( $shortname."_css" )==$f)?"selected":"").">".$f."</option>";
  }
  	echo "\n\t\t\t</select>";
	echo "\n</td></th></tr></tbody></table>";

  	echo "\n<br/><table class=\"widefat\"><thead><tr><th style='font-size:14px;font-weight:normal;font-style:normal;padding-left:10px;'>"?><?php _e("Hot Spots Category","traveler");?><?php "</th></tr></thead>";
	echo "\n\t\t<tbody><tr><th>"?><?php _e("Select a category for left sidebar articles","traveler");?><?php " ";
  	echo "\n\t\t\t<select name=\"".$shortname."_randomCategoryPosts\" id=\"".$shortname."_randomCategoryPosts\">";
  	echo "\n\t\t\t\t<option value=\"\" ".((get_settings( $shortname."_randomCategoryPosts" )=="")?"selected":"").">Select</option>";
	$args = array('hide_empty' => 0);
	$categories = get_categories( $args );
  while(list(, $fa) = each($categories)){
  	if($fa->parent == 0)
  		echo "\n\t\t\t\t<option value=\"".$fa->term_id."\" ".((get_settings( $shortname."_randomCategoryPosts" )==$fa->term_id)?"selected":"").">".$fa->name."</option>";
  }
  reset($categories);
  	echo "\n\t\t\t</select>";
  	echo "\n</td></th></tr></tbody></table>";
   	echo "\n<h2 style='font-size:20px;font-style:normal;'>"?><?php _e("Categories Submenu","traveler");?><?php "</h2>";
  	echo "\n<p>"?><?php _e("Click on the Categories and Child Categories to Build Submenu and Dropdown Items. (If this is empty, please create Categories).","traveler");?><?php "</p>";
 	echo "\n<table  class=\"widefat\">";
	echo "\n\t<thead>";
	echo "\n\t\t<tr>";
	echo "\n\t\t\t<th scope=\"col\" class=\"check-column\"></th>";
	echo "\n\t\t\t<th scope=\"col\">"?><?php _e("Name", "traveler")?><?php echo "</th>";
	echo "\n\t\t\t<th scope=\"col\">"?><?php _e("Description", "traveler")?><?php echo "</th>";
	echo "\n\t\t</tr>";
	echo "\n\t</thead>";
	echo "\n\t<tbody id=\"the-list\" class=\"list:cat\">";
	echo "\n\t\t<tr><td colspan=\"3\"><div style=\"height: 192px; overflow: auto;\">";
	echo "\n<table class=\"widefat\">";
	echo "\n\t<tbody id=\"the-list\" class=\"list:cat\">";
	$categoriesSubMenu = (is_array(get_settings( $shortname."_categoriesSubmenu" ))) ? get_settings( $shortname."_categoriesSubmenu" ) : array();
themeOption_cat_rows(0, 0, $categories, $categoriesSubMenu);
	echo "</div></tbody></table></td></tr>";
	echo "\n\t</tbody>";
  	echo "\n</table>";
    	 echo "\n<br><table class=\"widefat\"><thead><tr><th>";
  echo "\n  <span style='font-size:14px;font-weight:normal;font-style:normal;padding-left:10px;'>"?><?php _e("Advertisement Banner Management", "traveler")?><?php echo "</span>";
   echo "\n</th></tr></thead>";
       echo "\n<tbody><tr><th>";
  echo "\n<table class=\"form-table\">";
  echo "\n\t<tr valign=\"top\">";
  echo "\n\t\t<th scope=\"row\">"?><?php _e("Status: ", "traveler")?><?php echo "</th>";
  $bannersArray = unserialize($options[1]["std"]);
	$c = 0;
  echo "\n\t\t<td><input type=\"checkbox\" name=\"".$shortname."_bannerStatus\" id=\"".$shortname."_bannerStatus\" value=\"1\" ".((get_settings($shortname.'_bannerStatus')==1)?"checked":"")." onClick=\"javascript: markAll(this.checked);\">"?><?php _e(" Enable All Banners", "traveler")?><?php echo "</td>";
 	echo "\n\t</tr>"; 
  echo "\n</table>";   
  echo "\n<div id=\"diFortable\">";
  echo "\n<table class=\"form-table\">";
  $x = 1;
  $bg = '';
  while(list($bannerIndex, $aBanner) = each($bannersArray)){
		$bg = ($bg == 'style="background: #F4F9FD;"') ? '' : 'style="background: #F4F9FD;"';
		$bannerName = ereg_replace("[0-9]{1}", "  #".$x++, str_replace($shortname,"", $bannerIndex));
    echo "\n\t<tr valign=\"top\">";
    echo "\n\t\t<th scope=\"row\" ".(($bg) ? $bg : "style=\"width: 100px;\"").">"?><?php _e("Banner Ad", "traveler")?><?php echo "<br/>("?><?php _e("Size: ", "traveler")?><?php echo "  ".get_bannersSettings($bannerIndex, "width")."x".get_bannersSettings($bannerIndex, "height")."):</th>";
    echo "\n\t\t<td ".$bg.">";
    echo "\n\t\t<dl>";
    echo "\n\t\t\t<dt>"?><?php _e("Image: ", "traveler")?><?php echo "</dt>";
    echo "\n\t\t\t<dd><input style=\"width: 450px;padding:5px;margin:0;\" name=\"".$shortname."_banner[".$bannerIndex."][image_url]\" id=\"".$shortname."_banner[".$bannerIndex."][image_url]\" type=\"text\" value=\"".( (get_bannersSettings($bannerIndex, "image_url")!="")?get_bannersSettings($bannerIndex, "image_url"):$aBanner[$bannerIndex]["image_url"])."\" /><br />"?><?php _e("Enter the URL Path for this Banner Image.", "traveler")?><?php echo "<dd>";
    echo "\n\t\t\t<dt>Url:</dt>";
    echo "\n<dd><input  style=\"width: 450px;padding:5px;margin:0;\" name=\"".$shortname."_banner[".$bannerIndex."][link]\" id=\"".$shortname."_banner[".$bannerIndex."][link]\" type=\"text\" value=\"".( (get_bannersSettings($bannerIndex, "link")!="")?get_bannersSettings($bannerIndex, "link"):$aBanner[$bannerIndex]["link"])."\" /><br />"?><?php _e("Enter the URL Link where this Banner Links To.", "traveler")?><?php echo "<dd>";
    $bannerAux = get_bannersSettings($bannerIndex);
    if(isset($bannerAux["adsense"])){
		  echo "\n\t\t\t<dt>"?><?php _e("Google Adsense code: ", "traveler")?><?php echo "</dt>";
		  echo "\n\t\t\t<dd><textarea name=\"".$shortname."_banner[".$bannerIndex."][adsense]\" id=\"".$shortname."_banner[".$bannerIndex."][adsense]\" style=\"width: 550px; height: 120px;\">".stripslashes((get_bannersSettings($bannerIndex, "adsense")!="")?get_bannersSettings($bannerIndex, "adsense"):$aBanner[$bannerIndex]["adsense"])."</textarea><br />"?><?php _e("If Adsense Publisher Code is Present, it will show as default banner. ", "traveler")?><?php echo "<dd>";
    }
    echo "\n\t\t\t<dt>"?><?php _e("Status: ", "traveler")?><?php echo "</dt>";
    echo "\n\t\t\t<dd><input type=\"checkbox\" name=\"".$shortname."_banner[".$bannerIndex."][status]\" id=\"".$shortname."_banner[".$bannerIndex."][status]\" value=\"1\" ".( (get_bannersSettings($bannerIndex, "status") == 1) ? "checked" : "").">"?><?php _e(" Enabled", "traveler")?><?php echo "<dd>";
    echo "\n\t\t</td>";
    echo "\n\t</tr>";
  }
  echo "\n</table>";
   echo "\n</td></th></tr></tbody></table>";
  if(get_settings($shortname.'_bannerStatus') == 1){
  	echo "\n<script>markAll(1);</script>";
  } 
  echo "\n</div>";
  echo "\n<p class=\"submit\">";
 	echo "\n\t<input  class=\"button-primary\" type=\"submit\" name=\"saveButton\" value=\""?><?php _e("Save settings","traveler");?><?php echo "\" />";
 	echo "\n\t<input class=\"button\" name=\"resetButton\" type=\"submit\" value=\""?><?php _e("Reset settings","traveler");?><?php echo "\" />";
  echo "\n</p>";
  echo "\n</form>";


}
/*
Add CSS Style to Header
*/
function newThemeOptions_wp_head() {
	global $shortname;
	echo "\n<link href=\"".get_template_directory_uri()."/".((get_settings( $shortname."_css" ) != "") ? get_settings( $shortname."_css" ):"style.css")."\" rel=\"stylesheet\" type=\"text/css\" />";
}
/*
Show 125x125 Banners
*/
function newThemeOptions_showBannersSquare(){
	global $themename, $shortname, $options, $cssFiles;
	if(get_bannersSettings("theme_banner1", "status") OR get_bannersSettings("theme_banner2", "status") OR get_bannersSettings("theme_banner3", "status") OR get_bannersSettings("theme_banner4", "status")){
		echo "\n<div id=\"bannersSquare\">";
		echo "\n\t";
		if((get_bannersSettings("theme_banner1", "image_url")!="") AND (get_bannersSettings("theme_banner1", "status")==1)){
			echo "\n\t\t<a href=\"".get_bannersSettings("theme_banner1", "link")."\" title=\"\"><img src=\"".get_bannersSettings("theme_banner1", "image_url")."\" alt=\"\"/></a>";
		}
		if((get_bannersSettings("theme_banner2", "image_url")!="") AND (get_bannersSettings("theme_banner2", "status")==1)){
			echo "\n\t\t<a href=\"".get_bannersSettings("theme_banner2", "link")."\" title=\"\"><img src=\"".get_bannersSettings("theme_banner2", "image_url")."\" alt=\"\"/></a>";
		}
		if((get_bannersSettings("theme_banner3", "image_url")!="") AND (get_bannersSettings("theme_banner3", "status")==1)){
			echo "\n\t\t<a href=\"".get_bannersSettings("theme_banner3", "link")."\" title=\"\"><img src=\"".get_bannersSettings("theme_banner3", "image_url")."\" alt=\"\"/></a>";
		}
		if((get_bannersSettings("theme_banner4", "image_url")!="") AND (get_bannersSettings("theme_banner4", "status")==1)){
			echo "\n\t\t<a href=\"".get_bannersSettings("theme_banner4", "link")."\" title=\"\"><img src=\"".get_bannersSettings("theme_banner4", "image_url")."\" alt=\"\"/></a>";
		}
		echo "\n\t";
		echo "\n</div>\n";

	}
}

function newthemeoptions_showheaderbanner(){
	global $themename, $shortname, $options, $cssFiles;
	if(get_bannersSettings("theme_banner6", "status")==1){
		if(get_bannersSettings("theme_banner6", "adsense")!=""){
			echo stripslashes(get_bannersSettings("theme_banner6", "adsense"))."\n";
		}else if(get_bannersSettings("theme_banner6", "image_url")!=""){
			echo "<a href=\"".get_bannersSettings("theme_banner6", "link")."\" title=\"\"><img src=\"".get_bannersSettings("theme_banner6", "image_url")."\" alt=\"\" /></a>\n";
		}
	}
}

function newThemeOptions_categoriesSubmenu($inUL = FALSE){
	global $shortname;
	$categoriesSubMenu = (is_array(get_settings( $shortname."_categoriesSubmenu" ))) ? get_settings( $shortname."_categoriesSubmenu" ) : array();	if($inUL){
	if(count($categoriesSubMenu) > 0){
		$ul = "\n<ul  id=\"catnav\">";
		$not = array();
		foreach($categoriesSubMenu AS $aCategory){
			if(!in_array($aCategory, $not)){
				$ul .= "\n\t<li><a href=\"".get_category_link($aCategory)."\" title=\"\">".get_cat_name($aCategory)."</a>";
				$subCats = explode(" ", get_category_children($aCategory, " ", ""));
				$auxChildren = "";
				while(list(, $ch) = @(each($subCats))){
					if(in_array((int)trim($ch), $categoriesSubMenu)){
						$auxChildren .= "\n\t\t\t<li><a href=\"".get_category_link((int)trim($ch))."\" title=\"\">".get_cat_name((int)trim($ch))."</a></li>";
						$not[] = (int)trim($ch);
					}
				}
				if($auxChildren){
					$ul .= "\n\t\t<ul class='children'>".$auxChildren;
					$ul .= "\n\t\t</ul>";
				}
				$ul .= "</li>";
			}
		}
		$ul .= "\n</ul>\n";
		echo $ul;	
	}else{
		$ul = "\n<ul  id=\"catnav\">";
		$ul .= "\n\t<li><a href=\"".get_category_link($aCategory)."\" title=\"\">".get_cat_name($aCategory)."</a></li>";
		$ul .= "\n\t<li><a href=\"".get_category_link($aCategory)."\" title=\"\">".get_cat_name($aCategory)."</a></li>";
		
		$ul .= "\n</ul>\n";
		echo $ul;			
	}
	}else{
		return $categoriesSubMenu;
	}
}
/*
Show Random Videos
*/
function newThemeOptions_showVideo(){
	global $themename, $shortname, $options, $cssFiles;
	$c = 0;
	$search = TRUE;
	srand((float) microtime() * 10000000);
	$theVideos = get_settings($shortname."_videosArray");
  if(!is_array($theVideos)){
		$theVideos = unserialize($options[0]["std"]);
  }
	srand((float)microtime() * 1000000);
	shuffle($theVideos);
	while(($c <= 4)AND($search)){
		if(preg_match("#param(.+?)movie(.+?)>#is", stripslashes($theVideos[$c]["link"]), $r)){
			if(preg_match("#([a-zA-Z]+[:\/\/]+[A-Za-z0-9\-_]+\\.+[A-Za-z0-9\.\/%&=\?\-_]+)#is", $r[0], $r)){
				$theUrl = $r[1];
				$theWidth = 324;
				$theheight = 264;
				$search = FALSE;
			}
		}
		$c++;
	}
if($theUrl!=""){
		echo "<object type=\"application/x-shockwave-flash\" width=\"".$theWidth."\" height=\"".$theheight."\" data=\"".$theUrl."\">";
		echo "<param name=\"movie\" value=\"".$theUrl."\"/>";
		echo "<param name=\"wmode\" value=\"transparent\"/>";
		
		echo "</object>";
	}
}
$no_of_dropdowns = 3;
$order_by = 1;
//Various Wordpress hooks
add_action('admin_menu', 'dropdown_manager_addmenuitems');
//register_activation_hook( __FILE__ , 'dropdown_manager_install' );
//register_deactivation_hook( __FILE__ , 'dropdown_manager_uninstall' );

//add items to theme options menu
function dropdown_manager_addmenuitems()
{
	add_menu_page('Multi Search', 'Multi Search', 10, __FILE__."?dropdown-manager=1", 'dropdown_manager_show');
	
}
//this controls the theme options page
function theme_options (){
echo 'Welcome to your custom theme options page, Use the links above to control your options';
}
//this gets the # of dropdowns allowed
function dropdown_get_dropdowns()
{
	global $wpdb;
	
	$sql = "SELECT `value` as `dropdowns` FROM `" . $wpdb->prefix . "dropdown_plugin_settings` WHERE `name`='total_dropdowns';";
	$row = $wpdb->get_results ( $sql , OBJECT );
	
	return $row[0]->dropdowns;
}
//this gets the # of dropdowns allowed
function dropdown_get_orderby()
{
	global $wpdb;
	
	$sql = "SELECT `value` as `dropdowns` FROM `" . $wpdb->prefix . "dropdown_plugin_settings` WHERE `name`='order_by';";
	$row = $wpdb->get_results ( $sql , OBJECT );
	
	return $row[0]->dropdowns;
}

function dropdown_manager_paintdropdown( $num )
{
	global $wpdb;

	$wpdb->show_errors();

	$sql = "SELECT `terms`.`term_id` as `term_id`, `terms`.`name` as `name`, `label`
			FROM `" . $wpdb->prefix . "terms` as `terms`
			LEFT JOIN `" . $wpdb->prefix . "dropdown_plugin_dropdowns` as `dropdown`
			ON ( `dropdown`.`term_id` = `terms`.`term_id` )
			WHERE `dropdown`.`menu` = '" . (int)$num . "'
			ORDER BY terms." . (get_option('dropdown_sort_oder')=='1'?'name':'term_id') ." ASC;";
	
	$rows = $wpdb->get_results ( $sql, OBJECT );

		$blogurl = get_bloginfo('url');

	if ( $rows )
	{
		$i=0;
		foreach ( $rows as $row )
		{
			if ($i==0)
			{
				echo '<span class="dd'. ($i+1) . '"><span class="searchby">' . $row->label . '</span>';
				echo '<select class="style01" id="dropdown_plugin_dropdowns_'.$num.'" name="dropdown_plugin_dropdowns_'.$num.'"><option value="">' . attribute_escape(__('Select Category')) . '</option>';
				
			}
			$i++;
			
			$selected = '';
			
			if (isset($_POST['dropdown_plugin_dropdowns_'.$num]))
			{
				if ($_POST['dropdown_plugin_dropdowns_'.$num] == $row->term_id)
				{
					$selected = 'selected';
				}
			}
			//$option = '<option value="'. $blogurl .'/?cat=' . $row->term_id . '"  >' . $row->name . '</option>';
			
			$option = '<option value="'. $row->term_id . '" ' . $selected . ' >' . $row->name . '</option>';
			echo $option;
		}
	}	
	//echo out the end of the select
	echo '</select></span>';
}

//this is the control for the dropdown menu
function dropdown_manager_show()
{
	global $wpdb;
	
	$no_of_dropdowns = dropdown_get_dropdowns();
	$order_by = dropdown_get_orderby();
	
	$wpdb->show_errors();
	
	//user pressed "change"
	if ( isset ( $_POST['submit'] ) )
	{
		
		if (  $_POST['submit']  == 'Submit' )
		{
			$sql = "UPDATE `" . $wpdb->prefix . "dropdown_plugin_settings` SET `value`='" . (int)$_POST['total_dropdowns'] . "' WHERE `name`='total_dropdowns';";
			$wpdb->query ( $sql);
			
			$sql = "UPDATE `" . $wpdb->prefix . "dropdown_plugin_settings` SET `value`='" . (int)$_POST['order_by'] . "' WHERE `name`='order_by';";
			$wpdb->query ( $sql);
			
			$no_of_dropdowns = (int)$_POST['total_dropdowns'];
			
			//delete all the dropdows selected
			$sql = "TRUNCATE `" . $wpdb->prefix . "dropdown_plugin_dropdowns`";
			$wpdb->query ( $sql );
			
			for ( $i = 0; $i < $no_of_dropdowns; $i++ )
			{	
				if ( is_array ( $_POST['terms_' . $i ] ) && !empty ( $_POST['terms_' . $i ] ) )
				{
					//Enable each of the categories selected.
					foreach ( $_POST['terms_' . $i ] as $key=>$value )
					{
						$wpdb->show_errors();
						//$sql = "INSERT INTO " . $wpdb->prefix . "dropdown_plugin_dropdowns ( `term_id`, `menu` ) VALUES ( '" . (int)$value . "', '" . $i . "' )";
						
					
						$sql = "INSERT INTO " . $wpdb->prefix . "dropdown_plugin_dropdowns ( `term_id`, `menu`, `label` ) VALUES ( '" . (int)$value . "', '" . $i . "','". $_POST['name_' . $i ] ."' )";
						$wpdb->query ( $sql );
					}
				}
			} //end updating the categories
		}
		
	}
	
	if ( isset ( $_POST['reset'] ) )
	{
		$sql = "TRUNCATE `" . $wpdb->prefix . "dropdown_plugin_dropdowns`";
			$wpdb->query ( $sql );
	}
	
	if (isset($_POST['order_by']))
	{
		$order_by = (int)$_POST['order_by'];
		
		update_option('dropdown_sort_oder', $order_by);
	}
	
	echo '<div class="wrap">
	<style type="text/css">
	.formclass1
	{

		display: inline-block;
		padding-left: 15px;
	}
	#leftbuttons
	{
		text-align: left;
		margin-top: 10px;
		margin-left: 10px;
	}
	
	#settings
	{
		margin-top: 10px;
		margin-left: 10px;
	}
	
	.regular-text
	{
		width:150px;
		border:1px solid #CCCCCC;
		padding:3px;
	}
	
	</style>
	
	<div id="icon-options-general" class="icon32"><br /></div>
<h2>Multi Category Search management</h2>
	

	<form action="' . $PHP_SELF . '" method="post">';
	echo "<br/><table class=\"widefat\"><thead><tr><th>Number of Dropdown Search Modules</th></tr></thead>";
	echo '<tbody><tr><th><label for="blogname">Number of dropdown menus </label><select name="total_dropdowns" onchange="javascript:document.forms[0].submit()">';
	
	
	for ( $i = 0; $i <= 10; $i++ )
	{
		echo '<option value="'. $i . '"' . ( $i == $no_of_dropdowns ? ' selected="selected"' : '' ) .  '>' . $i . '</option>';
	}
	
	echo "</select>";
  	echo "</td></th></tr></tbody></table><br/>";
	
	
	
	if ($order_by == 1)
	{
	echo "<table class=\"widefat\"><thead><tr><th>Arrange Categories</th></tr></thead>";
		echo '<tbody><tr><th><label for="blogname"><label for="blogname">Sort categories by </label><select name="order_by"><option value="1" selected >Name</option><option value="2">Date</option></select>';
  	echo '</td></th></tr></tbody></table><br/>';
	}
	else
	{
		echo '<tbody><tr><th><label for="blogname"><label for="blogname">Sort categories by </label></th><td><select name="order_by"><option value="1">Name</option><option value="2" selected>Date</option></select>';
  	echo '</td></th></tr></tbody></table>';
	}
	echo "<table class=\"widefat\"><thead><tr><th>Category Search Builder</th></tr></thead>";

	
	for ( $menu = 0; $menu < $no_of_dropdowns; $menu++ )
	{
	echo "<span class=formclass1>";
	
	echo "<table style=\"float:left;width:220px;margin:20px;\" class=\"widefat \"><thead><tr><th>Categories for Menu " . ( $menu + 1 ) . "</th></tr></thead>";
		$sql = "SELECT `terms`.`term_id` as `term_id`, `terms`.`name` as `name`, `terms`.`slug` as `slug`
					FROM `" . $wpdb->prefix . "terms` as `terms` LEFT JOIN `" . $wpdb->prefix . "term_taxonomy` as `tax`
					ON ( `terms`.`term_id` = `tax`.`term_id` ) 

					WHERE `tax`.`taxonomy` = 'category' 
					ORDER BY terms." . ($order_by==1?'name':'term_id') ." ASC;";
				
		$rows = $wpdb->get_results ( $sql, OBJECT );
		

		$sql = "SELECT * FROM `" . $wpdb->prefix . "dropdown_plugin_dropdowns` WHERE menu = " . $menu . " ;";

		$selected = $wpdb->get_results ( $sql, OBJECT );
		
	
		if (is_array($selected))

	echo '<tbody><tr><th><label> &nbsp;  Enter Label </label><input style=\"margin:0;padding:1px;\" type="text" name="name_' . $menu . '" value="' . $selected[0]->label . '" /></th></tr>';


		//If there are any categories
		if ( $rows )
		{
			//go through each of them
			foreach ( $rows as $row )
			{
				//and check it wether or not it's enabled
				$checked = '';
				
				foreach ( $selected as $sel )
				{
					if ( $sel->menu == $menu && $sel->term_id == $row->term_id )
					{
						$checked =  ' checked="checked"';
					}
				}
				
				echo '<tbody><tr><th><label"><input type="checkbox" name="terms_' . $menu . '[]" value="' . $row->term_id . '"' . $checked . '/>  ' . $row->name . '</label><br/></th></tr>';

	
			}
			
			echo '</fieldset></td></tr>';
		}
		
		echo '</td></th></tr></tbody></table>';
		echo "</span>";
	}
	
	
	
	echo '<div id="leftbuttons"><input  class="button-primary" type="submit" name="submit" value="Submit"/><input class="button" name="reset" type="submit" value="Reset"/></div></form>';
	
	//sample dropdown menu
	echo "<br/><table class=\"widefat\"><thead><tr><th>MultiSearch Preview</th></tr></thead>";
	echo '<tbody><tr><th>';
	//the actual dropdown menu
	for ( $i = 0; $i < $no_of_dropdowns; $i++ )
	{
		dropdown_manager_paintdropdown( $i );
	}
			echo '</th></tr></tbody></table>';
}

function dropdown_manager_search_criteria()
{
	$number_of_categories = dropdown_get_dropdowns(); 
	if ($number_of_categories > 0)
	{	
		echo "<span class='breadcrumb'><strong>"?><?php _e("Search Results for: ","traveler")?><?php echo "</strong> ";
		for($i=0;$i<($number_of_categories-1);$i++)
		{
			$category_id = $_POST['dropdown_plugin_dropdowns_'.$i];
			
			if ($category_id!="")
			{
				$cat = get_category( $category_id);
				echo "<a href=\"" . get_category_link( $category_id ) ."\">" .$cat->cat_name."</a> &raquo;</span>";
			}
		} 
	}
		

}

//this function takes care of altering the categories table with a dropdown column
function dropdown_manager_install()
{
	global $wpdb;

	$sql = "CREATE TABLE `" . $wpdb->prefix . "dropdown_plugin_settings` ( `setting_id` MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY, `name` VARCHAR(255) NOT NULL, `value` VARCHAR(255) NOT NULL )"; 
	$wpdb->query ( $sql );
	
	
	$sql = "CREATE TABLE `" . $wpdb->prefix . "dropdown_plugin_dropdowns` ( `dropdown_id` MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY, `term_id` MEDIUMINT NOT NULL, `menu` MEDIUMINT NOT NULL ,`label` VARCHAR(255) NOT NULL)";
	$wpdb->query ( $sql );
	
	$sql = "INSERT INTO `" . $wpdb->prefix . "dropdown_plugin_settings` ( `name`, `value` ) VALUES ( 'total_dropdowns', '3' );";
	$wpdb->query ( $sql );
	$sql = "INSERT INTO `" . $wpdb->prefix . "dropdown_plugin_settings` ( `name`, `value` ) VALUES ( 'order_by', '1' );";
	$wpdb->query ( $sql );
}

function dropdown_manager_uninstall()
{
	global $wpdb;

	$sql = "DROP TABLE `" . $wpdb->prefix . "dropdown_plugin_settings`"; 
	$wpdb->query ( $sql );
	
	
	$sql = "DROP TABLE `" . $wpdb->prefix . "dropdown_plugin_dropdowns`";
	$wpdb->query ( $sql );
	

}


//UPON ACTIVATION
if ( $_GET['activated'] == 'true' )
{
	theme_setup();
	dropdown_manager_install();
}



 
function multicategories_search()
{
       //Verifying if the plugin it's installed
       if (function_exists('dropdown_manager_paintdropdown'))
       {
               $cats = array();

               //Rendering the drop downs
               $number_of_categories = dropdown_get_dropdowns();
               for($i=0;$i<($number_of_categories);$i++)
               {
                       //Make sure we have a value on it
                       if ($_POST['dropdown_plugin_dropdowns_'.$i] != "")
                       {
                               $cats[] = $_POST['dropdown_plugin_dropdowns_'.$i];
                       }
               }
               if (count($cats) > 0)
               {
                       query_posts(array('category__and' => $cats));
               }


       }
}

/*
Show 300x250 Banner
*/
function newThemeOptions_showBigBanner(){
	global $themename, $shortname, $options, $cssFiles;
	if(get_bannersSettings("theme_banner5", "status")==1){
		if(get_bannersSettings("theme_banner5", "adsense")!=""){
			echo "\n<div class=\"ad300x250\">";
			echo stripslashes(get_bannersSettings("theme_banner5", "adsense"))."\n";
			echo "\n</div>\n";
		}else if(get_bannersSettings("theme_banner5", "image_url")!=""){
			echo "\n<div class=\"ad300x250\">";
			echo "<a href=\"".get_bannersSettings("theme_banner5", "link")."\" title=\"\"><img src=\"".get_bannersSettings("theme_banner5", "image_url")."\" alt=\"\"/></a>\n";
			echo "\n</div>\n";

		}
	}	
}
function photo_gallery($post_id, $size)
	{
		global $wpdb;
		$querystr = " SELECT 
								ID AS 'ID',
								post_excerpt AS 'imageTitle',	
								guid AS 'imageGuid' 
					  FROM
								" . $wpdb->prefix . "posts
					  WHERE
									" . $wpdb->prefix . "posts.post_type = \"attachment\"
					  ORDER BY 
								" . $wpdb->prefix . "posts.menu_order ASC
					  ";
		$pageposts = $wpdb->get_results($querystr, OBJECT);
		
		for($i=0;$i<count($pageposts);$i++)
		{
			$attachment_size=wp_get_attachment_image_src($pageposts[$i]->ID, $size);
		    $permalink = get_permalink();
		    $title = get_the_title();
			if ($attachment_size)
			{
			
			echo "<a href='".$permalink."'><img src='".$attachment_size[0]."'  width='80' height='80' alt='".$title."' /></a>";

			}
		}
		
	}

/*
Get feedburner ID
*/
function get_feedburnersumitionform(){
	global $shortname;
	$feedburnerid = get_settings($shortname.'_feedburnerSubmition');
	if($feedburnerid != ""){
		echo $feedburnerid;
		
	}
}
$ids = array();
$idsj = array();
$idsR = array();
$idsRest = array();
global $wp_query, $shortname, $theme_query, $wpdb, $cx, $showedPosts, $ids, $show;
$show= get_settings($shortname."_homePostCategory");
function Themehave_posts(){
	global $wp_query, $shortname, $theme_query, $wpdb, $cx, $showedPosts, $ids, $show;
	 $show = get_settings($shortname."_homePostCategory");
	$numberOfPost = (int)get_settings($shortname."_homeRandomPosts");
	if($show == ""){
		if(!$theme_query){
			$theme_query = new WP_Query('showposts='.(($numberOfPost) ? $numberOfPost : get_settings('posts_per_page')));
		}
	}else if($show == "-1"){
		if(!$theme_query){
			$theme_query = new WP_Query('orderby=rand&showposts='.(($numberOfPost) ? $numberOfPost : get_settings('posts_per_page')));
		}
	}else if(is_numeric($show)){
		if(!$theme_query){
			if(!in_array($show, $ids))
				$ids[] = $show;
			$theme_query = new WP_Query('category_name='.get_cat_name($show).'&showposts='.(($numberOfPost) ? $numberOfPost : get_settings('posts_per_page')));
		}
	}else{
		if(!$theme_query){
			$theme_query = new WP_Query('showposts='.(($numberOfPost) ? $numberOfPost : get_settings('posts_per_page')));
		}
	}
	$aux = $theme_query->have_posts();
	if(get_the_ID())
		$showedPosts[] = get_the_ID();
	return $aux;
	
}

add_action('wp_head', 'newThemeOptions_wp_head');
add_action('admin_menu', 'newThemeOptions_add_admin');


function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}

function Themehave_random_posts(){
	global $wp_query, $shortname, $theme_queryRandom, $wpdb, $cx, $showedPosts, $ids, $show;
	if(!$theme_queryRandom){
		 $show = (int)get_settings($shortname."_randomCategoryPosts");
		if(!in_array($show, $ids))
			$ids[] = $show;
		$theme_queryRandom = new WP_Query('category_name='.get_cat_name($show).'&showposts=5');
	}
	$aux = $theme_queryRandom->have_posts();
	if(get_the_ID())
		$showedPosts[] = get_the_ID();
	return $aux;
}
add_action('wp_head', 'newThemeOptions_wp_head');
add_action('admin_menu', 'newThemeOptions_add_admin');
?>
<?php
	function search_thumb($post_id, $size)
	{
		global $wpdb;
				$querystr = " SELECT 
								ID AS 'ID',
								post_excerpt AS 'imageTitle',	
								guid AS 'imageGuid' 
					  FROM
								" . $wpdb->prefix . "posts
					  WHERE
									" . $wpdb->prefix . "posts.post_parent = ". $post_id . " 
								AND	" . $wpdb->prefix . "posts.post_type = \"attachment\"
					  ORDER BY 
								" . $wpdb->prefix . "posts.menu_order ASC
					  					  LIMIT 1";
		$pageposts = $wpdb->get_row($querystr);
		$attachment_size=wp_get_attachment_image_src($pageposts->ID, $size);
		$link= get_permalink();
		$blog = get_bloginfo('template_url');
		if ($pageposts)
		{
			return "<a href=".$link."><img src='".$attachment_size[0]."' width=80 height=80 rel=shadowbox  /></a>";
		}
		else
			return "<img src='".$blog . "/images/noimage.png' width=80 height=80 />";
	}
?>
<?php
	function featured_images($post_id, $size)
	{
		global $wpdb;
				$querystr = " SELECT 
								ID AS 'ID',
								post_excerpt AS 'imageTitle',	
								guid AS 'imageGuid' 
					  FROM
								" . $wpdb->prefix . "posts
					  WHERE
									" . $wpdb->prefix . "posts.post_parent = ". $post_id . " 
								AND	" . $wpdb->prefix . "posts.post_type = \"attachment\"
					  ORDER BY 
								" . $wpdb->prefix . "posts.menu_order ASC
					  					  LIMIT 1";
		$pageposts = $wpdb->get_row($querystr);
		$attachment_size=wp_get_attachment_image_src($pageposts->ID, $size);
		$title = get_the_title();
		$blog = get_bloginfo('template_url');
		if ($pageposts)
		{
			return "<img src='".$attachment_size[0]."' width='647' height='297' alt='".$title."' />";
		}
		else
			return;
	}
?>
<?php
	function home_thumbs($post_id, $size)
	{
		global $wpdb;
				$querystr = " SELECT 
								ID AS 'ID',
								post_excerpt AS 'imageTitle',	
								guid AS 'imageGuid' 
					  FROM
								" . $wpdb->prefix . "posts
					  WHERE
									" . $wpdb->prefix . "posts.post_parent = ". $post_id . " 
								AND	" . $wpdb->prefix . "posts.post_type = \"attachment\"
					  ORDER BY 
								" . $wpdb->prefix . "posts.menu_order ASC
					  					  LIMIT 1";
		$pageposts = $wpdb->get_row($querystr);
		$attachment_size=wp_get_attachment_image_src($pageposts->ID, $size);
		$title = get_the_title();
		$blog = get_bloginfo('template_url');
		if ($pageposts)
		{
			return "<img src='".$attachment_size[0]."' width='80' height='80' alt='".$title."' />";
		}
		else
			return;
	}
?>
<?php
	function carousel_thumb($post_id, $size)
	{
		global $wpdb;
				$querystr = " SELECT 
								ID AS 'ID',
								post_excerpt AS 'imageTitle',	
								guid AS 'imageGuid' 
					  FROM
								" . $wpdb->prefix . "posts
					  WHERE
									" . $wpdb->prefix . "posts.post_parent = ". $post_id . " 
								AND	" . $wpdb->prefix . "posts.post_type = \"attachment\"
					  ORDER BY 
								" . $wpdb->prefix . "posts.menu_order ASC
					  					  LIMIT 1";
		$pageposts = $wpdb->get_row($querystr);
		$attachment_size=wp_get_attachment_image_src($pageposts->ID, $size);
		$title = get_the_title();
		$blog = get_bloginfo('template_url');
		if ($pageposts)
		{
			return "<img class='nav-thumb' src='".$attachment_size[0]."' width='60' height='40' alt='".$title."' />";
		}
		else
			return;
	}
?>
<?php
	function latest_news($post_id, $size)
	{
		global $wpdb;
				$querystr = " SELECT 
								ID AS 'ID',
								post_excerpt AS 'imageTitle',	
								guid AS 'imageGuid' 
					  FROM
								" . $wpdb->prefix . "posts
					  WHERE
									" . $wpdb->prefix . "posts.post_parent = ". $post_id . " 
								AND	" . $wpdb->prefix . "posts.post_type = \"attachment\"
					  ORDER BY 
								" . $wpdb->prefix . "posts.menu_order ASC
					  					  LIMIT 1";
		$pageposts = $wpdb->get_row($querystr);
		$attachment_size=wp_get_attachment_image_src($pageposts->ID, $size);
		if ($pageposts)
		{
			return "<img src='".$attachment_size[0]."' width=80 height=60 />";
		}
		else
			return "";
	}
?>
<?php
function carousel($post_id, $size)
	{
		global $wpdb;
		$querystr = " SELECT 
								ID AS 'ID',
								post_excerpt AS 'imageTitle',	
								guid AS 'imageGuid' 
					  FROM
								" . $wpdb->prefix . "posts
					  WHERE
									" . $wpdb->prefix . "posts.post_parent = ". $post_id . " 
								AND	" . $wpdb->prefix . "posts.post_type = \"attachment\"
					  ORDER BY 
								" . $wpdb->prefix . "posts.menu_order DESC
					  ";
		$pageposts = $wpdb->get_results($querystr, OBJECT);
		
		for($i=1;$i<count($pageposts);$i++)
		{
			$attachment_size=wp_get_attachment_image_src($pageposts[$i]->ID, $size);
		    $attachment_full= wp_get_attachment_image_src($pageposts[$i]->ID, 'full');
			if ($attachment_size)
			{
			
			echo "<img src='".$attachment_size[0]."'  width='600' height='220' alt='".$title."' />";

			}
		}
		
	}
?>
<?php
function slideshow($post_id, $size)
	{
		global $wpdb;
				$querystr = " SELECT 
								ID AS 'ID',
								post_excerpt AS 'imageTitle',	
								guid AS 'imageGuid' 
					  FROM
								" . $wpdb->prefix . "posts
					  WHERE
									" . $wpdb->prefix . "posts.post_parent = ". $post_id . " 
								AND	" . $wpdb->prefix . "posts.post_type = \"attachment\"
					  ORDER BY 
								" . $wpdb->prefix . "posts.menu_order ASC
					  ";
		$pageposts = $wpdb->get_results($querystr, OBJECT);
		
		for($i=1;$i<count($pageposts);$i++)
		{
			$attachment_size=wp_get_attachment_image_src($pageposts[$i]->ID, 'medium');
		    $thelink = get_permalink();
		    $title = get_the_title();
		    
		    			if ($attachment_size)
			{
				echo "<a href='".$thelink."'><img src='".$attachment_size[0]."'  width='358' height='216' alt='".$title."' /></a>";
			}
		}
		
	}
?>
<?php 
function ShortenTitle($title){
$chars_max = 40;
$chars_text = strlen($title);
$title = $title."";
$title = substr($title,0,$chars_max);
$title = substr($title,0,strrpos($title,' '));
if ($chars_title > $chars_max)
{
$title = $title."...";
}
return $title;
}
function hot_spots($text)
{
	if ($text == '')
	{
		$text = get_the_content('');
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$text = strip_tags($text, '<br/><b><strong><a>');
		$text = nl2br($text);
		$excerpt_length = apply_filters('excerpt_length', 30);
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words) > $excerpt_length) {
			array_pop($words);
			array_push($words, '');
			$text = implode(' ', $words);
		}
	}
	return $text;
}
function limit_content($text)
{
	if ($text == '')
	{
		$text = get_the_content('');
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$text = strip_tags($text, '<br/><b><strong><a>');
		$text = nl2br($text);
		$excerpt_length = apply_filters('excerpt_length', 40);
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words) > $excerpt_length) {
			array_pop($words);
			array_push($words, '');
			$text = implode(' ', $words);
		}
	}
	return $text;
}
function search_description($text)
{
	if ($text == '')
	{
		$text = get_the_content('');
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$text = strip_tags($text, '<p><br/><b><strong><a>');
		$text = nl2br($text);
		$excerpt_length = apply_filters('excerpt_length', 30);
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words) > $excerpt_length) {
			array_pop($words);
			array_push($words, '...');
			$text = implode(' ', $words);
		}
	}
	return $text;
}
function slider_text($text)
{
	if ($text == '')
	{
		$text = get_the_content('');
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$text = strip_tags($text, '<br/><b><strong><a>');
		$text = nl2br($text);
		$excerpt_length = apply_filters('excerpt_length', 24);
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words) > $excerpt_length) {
			array_pop($words);
			array_push($words, '');
			$text = implode(' ', $words);
		}
	}
	return $text;
}
?>
<?php
function ShortenText($text)
{

// Change to the number of characters you want to display
$chars_limit = 460;
$chars_text = strlen($text);
$text = $text." ";
$text = substr($text,0,$chars_limit);
$text = substr($text,0,strrpos($text,' '));
// If the text has more characters that your limit,
//add ... so the user knows the text is actually longer

if ($chars_text > $chars_limit)
{
$text = $text."...";
}
return $text;
}
//Image-Uploader
$img_path_iu = 'logo/';
$surlplugin_iu = '/wp-content/uploads/';
$plugin_path_fix_iu = './../wp-content/uploads/';
$max_img_width_iu = 100; //in pixels (preview)
$max_img_height_iu = 100; //in pixels (preview)
$img_extensions = array ( 'flv', 'png', 'jpg', 'jpeg', 'swf', 'gif', 'bmp', 'svg' );

add_action ( 'admin_menu', 'iupload_add_pages2' );
//register_activation_hook( __FILE__ , 'iupload_install2' );

//
//function adds menu items
//
function iupload_add_pages2()
{
	add_menu_page('Logo Upload', 'Logo Upload', 10, __FILE__."?image-upload=1", 'iupload_admin_page2');
	//add_submenu_page(__FILE__, 'Upload Picture', 'Upload Picture', 1, __FILE__,'iupload_admin_page2');       
}

//
//This function actually moves the already uploaded file
//
function iupload_upload_files ( $temp, $storage2 )
{
	global $img_path_iu, $plugin_path_fix_iu, $wpdb;
	
	$storage2 = stripslashes ( $storage2 );
	
	$filename2 = $storage2;

	$upload_dir = wp_upload_dir();
	
	wp_mkdir_p( trailingslashit($upload_dir['basedir']) . $img_path_iu );
	
	$storage2 = trailingslashit($upload_dir['basedir']) . $img_path_iu . $filename2;

	if( strlen( $storage2 ) > 0 )
	{
		move_uploaded_file ( $temp, $storage2 );

		$sql = "SELECT image_id FROM `" . $wpdb->prefix . "image_upload_plugin` LIMIT 1";
		$row = $wpdb->get_row ( $sql, OBJECT );
		
		if ( $row->image_id == null )
		{
			$sql = "INSERT INTO `" . $wpdb->prefix . "image_upload_plugin` ( `filename`, `uploaded` ) " .
				   "VALUES (  '" . mysql_real_escape_string ( $filename2 ) . "', '" . time() . "' );";
		}
		else
		{
			$sql =  "UPDATE `" . $wpdb->prefix . "image_upload_plugin` SET " .
				"`filename` = '" . mysql_real_escape_string ( $filename2 ) . "'," .
				"`uploaded` = '" . time() . "' " .
				"WHERE `image_id` = '" . $row->image_id . "'";
		}
		
		$wpdb->query ( $sql );
	}
	$wpdb->flush();
}

//
//this function deletes a file
//
function iupload_delete_photo ( $id )
{
	global $wpdb, $plugin_path_fix_iu, $img_path_iu;
	$sql = "SELECT `image_id`, `filename`, `uploaded` FROM `" . $wpdb->prefix . "image_upload_plugin` WHERE `image_id`='" . mysql_real_escape_string ( $id ) . "'";
	$row = $wpdb->get_row ( $sql, OBJECT );
	
	$file = $plugin_path_fix_iu . $img_path_iu . $row->filename;
	
	//if the file exists....
	if ( file_exists ( $file ) && !empty ( $row->filename ) )
	{
		unlink ( $file );
		
		$sql = "DELETE FROM `" . $wpdb->prefix . "image_upload_plugin` WHERE `image_id`='" . mysql_real_escape_string ( $id ) . "'";
		$wpdb->query ( $sql );
	}
	$wpdb->flush();
}

//
//get the extension of a file
//
function iupload_get_ext2 ( $str )
{
	$a = explode ( '.', $str );
	$fileext = strtolower ( $a [ count ( $a ) - 1 ] );
	
	return $fileext;
}

//
//shows the current images
//
function iupload_show_current_photo()
{
	global $wpdb, $img_path_iu, $plugin_path_fix_iu, $imgs_per_row, $surlplugin_iu, $max_img_width_iu, $max_img_height_iu;
	
	$sql = "SELECT `image_id`, `filename`, `uploaded` FROM `" . $wpdb->prefix . "image_upload_plugin` LIMIT 1";
	$results = $wpdb->get_results ( $sql );
	
	if ( !empty ( $results ) )
	{
		echo '<div class="wrap">
	<form action="" method="post">
	
	<h2>Current Photo</h2>
	<br class="clear" />';
	
		foreach ( $results as $row )
		{
			//
			//get file extension
			//
			$fileext = iupload_get_ext2( $row->filename );
			
			$relpath = get_option ( 'siteurl' ) . $surlplugin_iu;
			$directpath = $relpath . $img_path_iu . $row->filename;
			
			if ( $fileext == 'flv' || $fileext == 'swf' )
			{
				$imgpath = $relpath .  'flash.png';
			}
			else
			{
				$imgpath = $directpath;
			}
			
			list ( $w, $h ) = @getimagesize ( $directpath );
				
			$htmlcode = '<a href="' . $directpath . '"><img alt="Agent" src="' . $directpath . '" /></a>';
				
			echo '<div>' . $htmlcode . '<br /><a href="'.$_SERVER['REQUEST_URI'].'&delete=true&id=' . $row->image_id . '" onclick="return confirm(\'Are you sure you want to delete this file?\');"><br />Delete</a><br />
				</div>';
		}
		
		echo '</form></div>';
	}
	$wpdb->flush();
	
}

function show_logo( )
{
	global $wpdb, $img_path_iu, $plugin_path_fix_iu, $imgs_per_row, $surlplugin_iu, $max_img_width_iu, $max_img_height_iu;
	
	$sql = "SELECT `image_id`, `filename`, `uploaded` FROM `" . $wpdb->prefix . "image_upload_plugin` LIMIT 1";
	$results = $wpdb->get_results ( $sql );
	
	if ( !empty ( $results ) )
	{
		echo '';
	
		foreach ( $results as $row )
		{
			//
			//get file extension
			//
			$fileext = iupload_get_ext2( $row->filename );
			
			$relpath = get_option ( 'siteurl' ) . $surlplugin_iu;
			$directpath = $relpath . $img_path_iu . $row->filename;
			
			if ( $fileext == 'flv' || $fileext == 'swf' )
			{
				$imgpath = $relpath .  'flash.png';
			}
			else
			{
				$imgpath = $directpath;
			}
			
			list ( $w, $h ) = @getimagesize ( $directpath );
				
			$blogurl = get_bloginfo('template_url');
			$blogname = get_bloginfo('name');
			
			$htmlcode = '<img  alt="'.$blogname.'" src="'. $directpath . '" />';
				
			echo '' . $htmlcode . '';
		}
		
		echo '';
	}
	$wpdb->flush();
}

//
//This function shows the main page in the admin menu
//
function iupload_admin_page2()
{
	
	global $img_extensions, $wpdb, $plugin_path_fix_iu, $img_path_iu;
	//Someone pressed submit
	
	if ( isset ( $_POST['uploadBtn'] ) )
	{ 
		if (  $_FILES['uploadFiles']['name'] != "" )
		{

			$totalFiles = 0;
			
			$ext = iupload_get_ext2 ( $_FILES['uploadFiles']['name'] );
			
			if ( in_array ( $ext, $img_extensions ) && $_FILES['uploadFiles']['error'] == 0 )
			{
				iupload_upload_files ( $_FILES['uploadFiles']['tmp_name'], $_FILES['uploadFiles']['name'] );
				$totalFiles++;
			}
			
		}
		
		echo "<br /><strong>Sucessfully uploaded {$totalFiles} file(s).</strong><br /><br />";
	}
	else if ( isset ( $_GET['delete'] ) && isset ( $_GET['id'] ) )
	{
		iupload_delete_photo ( $_GET['id'] );
	}
	
	global $current_user;
    get_currentuserinfo();
	
    //echo the add_images form
	echo '
	<form action="" method="post" enctype="multipart/form-data" name="uploadForm" id="uploadForm">
	<input type="hidden" name="userId" value="' . $current_user->ID . '">
	<div class="wrap"><h2>Image Uploader</h2>
	<br/>
	<div>Please upload your image here.
 
<br/><br/><br/>

		
	<input type="hidden" name="MAX_FILE_SIZE" value="100000000000000000" />
		<table class="form-table">
			<tr class="form-field form-required">
				<th scope="row" valign="top"><label>Browse for your Image:<br /></label></th>
				<td><div id="fileList"><input type="file" name="uploadFiles" /></div></td>
			</tr>
		</table>
		
		<p class="submit"><div id="spinner"></div><input type="submit"  class="button" name="uploadBtn" value="Upload" /></p></div></form><br /><br />';
		

	iupload_show_current_photo();
	
	$wpdb->flush();
}

function iupload_install2()
{
	global $wpdb;
	
	//SQL Syntax to make a new table
	$sql = "CREATE TABLE `" . $wpdb->prefix . "image_upload_plugin` 
		(`image_id` MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
		`filename` VARCHAR(255) NOT NULL, 
		`uploaded` INT NOT NULL) ENGINE = MYISAM";
	
	$wpdb->query ( $sql ); //do the query
	
	$wpdb->flush();
}

//UPON ACTIVATION
if ( $_GET['activated'] == 'true' )
{
	theme_setup();
}


function theme_setup()
{
	
	iupload_install2();
}
// function test_localization( $locale ) {
// 	return "es_ES";
//  }
//  add_filter('locale','test_localization');
require_once ('javascript/jquery.php');

// Initialize internationalization and localization 
load_theme_textdomain( 'traveler', TEMPLATEPATH.'/languages/' );
if (function_exists('add_theme_support')) {
add_theme_support( 'post-thumbnails' );
}
if ( function_exists('register_sidebar') )
    register_sidebars(3,array(
        'before_widget' => '<div class="widgets"><ul><li>',
        'after_widget' => '</li></ul></div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
?>