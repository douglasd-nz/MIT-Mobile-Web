<?

/**
 * Copyright (c) 2009 West Virginia University
 * 
 * Licensed under the MIT License
 * Redistributions of files must retain the above copyright notice.
 * 
 */

// various copy includes
require_once "../../config.gen.inc.php";
require_once "data/data.inc.php";

// records stats
require_once "../page_builder/page_header.php";

// libs
require_once "../../lib/rss_services.php";
require_once "lib/textformat.lib.php";

if (array_key_exists($_REQUEST['news'], $news_srcs)) {
	$rss_url = $news_srcs[$_REQUEST['news']]['url'];
    $section = $news_srcs[$_REQUEST['news']]['title'];
    $key = $_REQUEST['news'];
    $shared = true;
}
else {
	$key = key($news_srcs);
	$rss_url = $news_srcs[$key]['url'];
    $section = $news_srcs[$key]['title'];
    $shared = false;
}

$News = new RSS();
$items = $News->get_feed($rss_url);

if ($shared == true) {
  require "templates/$prefix/shared.html";
}
else {
  require "templates/$prefix/index.html";
}

$page->output();
    
?>
