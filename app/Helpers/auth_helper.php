<?php 
 
 $data = session()->get('user') ?? [];

function auth($key){
    global $data;

    return $data[$key];
}

function setAuth($users = []){
    global $data;

    $data = $users;
}