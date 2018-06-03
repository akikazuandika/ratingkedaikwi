<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function isLoggedIn()
{
    if(empty($_SESSION['username'])){
      redirect("/login");
    }
}
