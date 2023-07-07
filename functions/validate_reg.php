<?php

function create_profile(string $firstname, string $phone, string $email, string $passw){
    global $con;
    $new_prof = "INSERT users(firstname, phone, email, passw)
    VALUES(\"$firstname\",\"$phone\",\"$email\",\"$passw\");";
    $result = mysqli_query($con, $new_prof);
    return $result;
}

function fetch_reg_inf(){
    $reg_inf = ["firstname" => $_POST["firstname"],
                "phone" => $_POST["phone"],
                "email" => $_POST["email"],
                "passw" => $_POST["password"]];

    return $reg_inf;
}

function validation(string $firstname, string $phone, string $email, string $passw){

    $err_mes = validate_firstname($firstname);
    if($err_mes){
        return $err_mes;
    }

    $err_mes = validate_phone($phone);
    if($err_mes){
        return $err_mes;
    }
    
    $err_mes = validate_email($email);
    if($err_mes){
        return $err_mes;
    }

    $err_mes = validate_password($passw);
    if($err_mes){
        return $err_mes;
    }

    return 'ok';
}

function validate_firstname(string $firstname){
    if(isset($firstname) && !empty($firstname)){
        if(strlen($firstname) < 20){
            return '';
        } else{
            return "Имя не должно превышать 20 символов!";
        }
    } 

    return "Введите имя!";
}

function validate_phone(string $phone){

    if(isset($phone) && !empty($phone)){
        if(preg_match('~^(?:\+7|8)\d{10}$~', $phone)){

            global $con;
            $query = "SELECT id FROM users WHERE phone = $phone;";
            $result = mysqli_query($con, $query);
            $phone_exist_flag = mysqli_num_rows($result);
            if($phone_exist_flag == 0){
                return '';
            }else{
                return 'Пользователь с таким номером телефона уже зарегестрирован!';
            }

        }else{                
            return "Неверный формат телефона!";
        }
    }

    return "Введите номер телефона!";
}

function validate_email(string $email){
    if(isset($email) && !empty($email)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            
            global $con;
            $query = "SELECT id FROM users WHERE email = \"$email\";";
            $result = mysqli_query($con, $query);
            $email_exist_flag = mysqli_num_rows($result);
            if($email_exist_flag == 0){
                return '';
            }else{
                return 'Пользователь с таким email уже зарегестрирован!';
            }

        }else{
            return "Неверный формат email!";
        }
    }
    return "Введите email!";
}

function validate_password(string $passw){
    if(isset($passw) && !empty($passw)){
        if(strlen($passw) < 21 && strlen($passw) > 4){
            if(strcmp($passw, $_POST['doublepassword']) == 0){
                return'';
            }else{
                return 'Неверно подтвержден пароль!';
            }
        }else{
            return "Пароль не должен быть меньше 5 символов и не больше 20";
        }

        return 'Введите пароль!';
    }

    return false;
}


