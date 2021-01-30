<?php
/**
 * @var string $content ;
 */
?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Загрузчик прайсов</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/css/uikit.min.css"/>
    <link rel="stylesheet" href="/assets/css/style.css?v=1.0">
</head>
<body>
<header>
    <nav class="uk-navbar-container uk-margin" uk-navbar>
        <div class="uk-navbar-left">
            <a class="uk-navbar-item uk-logo" href="/">Прайс листы</a>
            <ul class="uk-navbar-nav">

            </ul>

        </div>

        <div class="uk-navbar-right">
            <ul class="uk-navbar-nav">
                <form method="post">
                    <?php if(\App\components\User::check()): ?>
                        <li class="uk-active">
                            <button type="submit" name="user[unlogged]" class="uk-button uk-button-default">Выйти</button>
                        </li>
                    <?php endif; ?>
                </form>
            </ul>
        </div>

    </nav>
</header>
<main class="uk-padding-large"><?= $content ?></main>
<script src="/assets/js/main.js" type="application/javascript"></script>
<script src="/assets/js/uikit.min.js"></script>
<script src="/assets/js/uikit-icons.min.js"></script>
</body>
</html>