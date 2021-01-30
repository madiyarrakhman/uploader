<?php
if (!empty($_FILES['uploaded_file'])) {
    $file = new \App\components\Uploader();
    $result = $file->load();
    if ($result['result']) {
        header('Location: /');
    }
}

if (array_key_exists('user', $_POST)) {
    if (array_key_exists('unlogged', $_POST['user'])) {
        if (\App\components\User::unlogging()) {
            header('Location: /');
        }
    }
}
?>

<div class="uk-container">
    <form enctype="multipart/form-data" method="POST">

        <div class="uk-margin" uk-margin>
            <div uk-form-custom="target: true">
                <input type="file" name="uploaded_file">
                <input class="uk-input uk-form-width-medium" type="text" placeholder="Выберите файл" disabled>
            </div>
            <button class="uk-button uk-button-default">Загрузить</button>
        </div>

    </form>
    <ul class="uk-list">
        <?php foreach (\App\components\File::getList() as $index => $item): ?>
            <li><a href="/uploads/<?= $item ?>" title="<?= $item ?>"><?= ++$index ?> <?= $item ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
