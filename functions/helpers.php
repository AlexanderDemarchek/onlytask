<?php

function get_registration_flag(){
    if(isset($_POST['reg'])){
        return true;
    }

    return false;
}

function get_auth_flag(){
    if(isset($_POST['auth'])){
        return true;
    }

    return false;
}