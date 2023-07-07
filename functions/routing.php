<?php

function include_page(array $params = []){
    $page_name = 'pages/welcome.php';
    if(array_key_exists("page_name", $params)){
        $page_name = 'pages/' . $params['page_name'] . '.php';
    }
    
    $title = '';
    if(array_key_exists("title", $params)){
        $title = $params['title'];
    }

    if(array_key_exists("firstname", $params)){
        $firstname = $params["firstname"];
    }

    if(array_key_exists("phone", $params)){
        $phone = $params["phone"];
    }

    if(array_key_exists("email", $params)){
        $email = $params["email"];
    }
    
    if(array_key_exists("password", $params)){
        $password = $params["password"];
    }

    require("template.php");
}


function get_page_data(){
    global $welcome_page, $auth_page, $register_page;
    $result = $welcome_page; 

    if(array_key_exists('page',$_GET)){
            $page_name = $_GET['page'];

            switch ($page_name){
                case 'welcome':
                    $result = $welcome_page;
                    break;
                case 'auth':
                    $result = $auth_page;
                    break;
                case 'register':
                    $result = $register_page;
                    break;
            }
    }

        return $result;
}