<?php
require_once("db_connection.php");
require_once("data_structures/pages_data.php");
require_once("functions/routing.php");
require_once("functions/validate_reg.php");
require_once("functions/validate_auth.php");
require_once("functions/helpers.php");

$registration_flag = get_registration_flag();
$auth_flag = get_auth_flag();


if(!$registration_flag && !$auth_flag)
    {
        $page_data = get_page_data();
        include_page($page_data);
    }
    
if($registration_flag){
    $user_info = fetch_reg_inf();
    extract($user_info);

    $validation_status = validation($firstname,$phone,$email,$passw);

    if(strcmp($validation_status,'ok') == 0){
        create_profile($firstname,$phone,$email,$passw);

        include_page(["page_name" => "profile", 
                    "title" => $firstname,
                    "firstname" => $firstname,
                    "phone" => $phone, 
                    "email" => $email]);
    }else{
        include_page(["page_name" => "register", 
                    "title" => "Заполните форму",
                    "err_message" => $validation_status
                    ]);
    }
}

if($auth_flag){
    $user_info = fetch_auth_inf();
    extract($user_info);

    $auth_status = auth($login, $passw);
    if(strcmp($auth_status, "ok") == 0){
        $user = get_user($login, $passw);
        $user = $user[0];

        include_page(["page_name" => "profile", 
                    "title" => $user["firstname"],
                    "firstname" => $user["firstname"],
                    "phone" => $user["phone"], 
                    "email" => $user["email"],
                    ]); 
    }else{
        include_page(["page_name" => "auth", 
                    "title" => "Введите данные",
                    "err_message" => $auth_status
                    ]);
                }
}