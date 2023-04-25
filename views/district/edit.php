<?php
    /** @var array $errors */
    /** @var array $district */
?>

<h2>Редагування району</h2>

<form method="post" action="" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Назва району</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $district['name'] ?>">

        <?php if (!empty($errors['name'])) : ?>
            <div class="form-text text-danger"><?= $errors['name']; ?></div>
        <?php endif; ?>
    </div>
    <div>
        <button class="btn btn-primary">Зберегти</button>
    </div>
</form>