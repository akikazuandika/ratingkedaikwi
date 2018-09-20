<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function isLoggedIn()
{
    if(empty($_SESSION['username'])){
      redirect("/login");
    }
}

function genPassword($password)
{
    return password_hash($password, PASSWORD_DEFAULT);
}

function verifyPassword($password, $hash)
{
    return password_verify($password, $hash);
}
