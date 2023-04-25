<?php
    /** @var array $errors */
    /** @var array $department */
?>

<h2>Редагування відділу</h2>

<form method="post" action="" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Назва відділу</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $department['name'] ?>">

        <?php if (!empty($errors['name'])) : ?>
            <div class="form-text text-danger"><?= $errors['name']; ?></div>
        <?php endif; ?>
    </div>
    <div>
        <button class="btn btn-primary">Зберегти</button>
    </div>
</form>