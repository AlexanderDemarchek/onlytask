<?php

function fetch_auth_inf(){
    $result = ["login" => $_POST["login"],
                "passw" => $_POST["passw"]];
    return $result;
}

function auth(string $login, string $passw){
    $user = get_user($login,$passw);
    if(!empty($user)){
        $user = $user[0];
        if(strcmp($passw,$user["passw"]) == 0){
            return "ok";
        }else{
            return "Неверный пароль!";
        }
    }

    return "Пользователь не найден. Пожалуйста, проверьте данные или зарегистрируйтесь!";  
}

function get_user(string $login, string $passw){
    global $con;

    $query = "SELECT * from users WHERE phone = \"$login\" OR email = \"$login\"";
    
    $result = mysqli_query($con, $query);
    $user = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $user;
}