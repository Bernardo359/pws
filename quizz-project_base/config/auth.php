<?php

function isAdminLoggedIn(){
    return isset($_SESSION['admin']);
}

function requireAdmin(){
    if(!isAdminLoggedIn()){
        header("Location: " . BASE_URL . "/login");
        exit;
    }
}