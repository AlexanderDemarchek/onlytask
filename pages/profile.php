<div style="color: red;"><?= $params["err_message"] ?></div>

<div>Ваш телефон: <?= $phone ?></div>
<div>Ваш email: <?= $email ?></div>

<button class="data-change">Изменить данные</button>

<form action="prof_settings.php" method='POST' hidden class="setProf">
    <div>
        <label>Имя</label>
        <input type="text" name="firstname" required value=<?= $firstname ?>></input>
    </div>
    <div>
        <label>Телефон</label>
        <input type="tel" name="phone" required value=<?= $phone ?>></input>
    </div>
    <div>
        <label>Почта</label>
        <input type="email" name="email" required value=<?= $email ?>></input>
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
        <input type="text" name="oldphone" value=<?= $phone ?> hidden> 
    </div>
    <div>
        <input type="submit" value="Изменить">
    </div>
</form>

<script>
        let button = document.querySelector(".data-change");
        let form = document.querySelector(".setProf");
        button.onclick = () => {
            form.hidden = !form.hidden;
        };
</script>
