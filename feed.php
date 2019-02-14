<?php
############################################################
# PODCAST GENERATOR
#
# Created by Alberto Betella
# http://www.podcastgenerator.net
# 
# This is Free Software released under the GNU/GPL License.
############################################################

header('Content-type: application/xml');

ob_start(); 

########### Security code, avoids cross-site scripting (Register Globals ON)
if (isset($_REQUEST['GLOBALS']) OR isset($_REQUEST['absoluteurl']) OR isset($_REQUEST['amilogged']) OR isset($_REQUEST['theme_path'])) { exit; } 
########### End

include("core/includes.php"); 

$ShowCategory = NULL;
if (isset($_GET['cat']) AND $_GET['cat'] != NULL) {
$ShowCategory = avoidXSS($_GET['cat']);
}

generatePodcastFeed(FALSE,$ShowCategory,FALSE); //Output on screen

ob_end_flush();

?>