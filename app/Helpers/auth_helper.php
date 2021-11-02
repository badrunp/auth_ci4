<?php 
 
 $data = [];

function auth($key = false){
    global $data;

    return $key == false ? $data : $data[$key];
}

function setAuth($users = []){
    global $data;

    $data = $users;
}