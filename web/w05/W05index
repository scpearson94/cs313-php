<?php
/*
** Scriptures Controller
*/
//Get the herokuConnect function out of the connections.php file
require_once '../library/connections.php';

//Get the queries from the scriptures-model.php file
require_once '../model/scriptures-model.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action){
default:
$scriptures = getScriptures();
if(count($scriptures) > 0){
 $scripturesList = "<ul class='list-group'>";
 foreach ($scriptures as $scripture) {
  $scripturesList .= "<li class='list-group-item'><span class='font-weight-bold'>".$scripture['scripture_book']." ".$scripture['scripture_chapter'].":".$scripture['scripture_verse']." - "."</span>".$scripture['scripture_content']."</li>";
 }
  $scripturesList .= "</ul>";
 } else {
  $message = '<p class="notify">Sorry, no scriptures were returned.</p>';
}
include '../view/teamprojects/week05/scriptures-resources.php';
break;
}
