<form action="index.php" method="POST">
    <div style="color: red;"><?= $params["err_message"] ?></div>
    <div>
        <label>Введите номер или email<label>
        <input type="text" name="login"></input>
    </div>
    <div>
        <label>Введите пароль:<label>
        <input type="password" name="passw"></input>
    </div>
    <div>
        <input type="submit" name="auth" >
    </div>
</form>