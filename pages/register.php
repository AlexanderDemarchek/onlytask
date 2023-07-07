<div style="color: red;"><?= $params["err_message"] ?></div>

<form action="index.php" method='POST'>
    <div>
        <label>Имя</label>
        <input type="text" name="firstname" required></input>
    </div>
    <div>
        <label>Телефон</label>
        <input type="tel" name="phone" required></input>
    </div>
    <div>
        <label>Почта</label>
        <input type="email" name="email" required></input>
    </div>
    <div>
        <label>Пароль</label>
        <input type="password" name="password" ></input>
    </div>
    <div>
        <label>Пожалуйста, повторите пароль</label>
        <input type="password" name="doublepassword" ></input>
    </div>
    <div>
        <input type="submit" name="reg">
    </div>
</form>