<?php
// var dump du riche
function debug($variable) {
  echo "<pre style='background-color:white;color=black';>".print_r($variable, true)."</pre>";
}

// si la session est pas start on la start
function start() {
  if(session_status() == PHP_SESSION_NONE) {
    session_start();
  }
}
