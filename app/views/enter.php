<?php
if (array_key_exists('username', $_POST) && array_key_exists('password', $_POST)) {
    $user = new \App\components\User($_POST['username'], $_POST['password']);
    if ($user->logging()) {
        header('Location: /');
    }
}
?>
<div class="uk-container">
    <h1>Вход</h1>
    <form method="post">

        <div class="uk-margin">
            <div class="uk-inline">
                <span class="uk-form-icon" uk-icon="icon: user"></span>
                <input class="uk-input" name="username" type="text">
            </div>
        </div>

        <div class="uk-margin">
            <div class="uk-inline">
                <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
                <input class="uk-input" name="password" type="password">
            </div>
        </div>
        <button class="uk-button uk-button-default">Войти</button>

    </form>
</div>
