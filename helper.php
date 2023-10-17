<?php
function isLogIn(){
  return isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true;
  }
