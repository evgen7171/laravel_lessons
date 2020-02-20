<?php
$str = \App\User::all();
?>
<hr>
<form method="post" action="/login">
    @csrf
    <div class="line"><span>Логин:</span><input type="text" name="login"></div>
    <div class="line"><span>Пароль:</span><input type="text" name="password"></div>
    <input type="submit" value="отправить">
</form>
