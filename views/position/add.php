<?php
    /** @var array $errors */
    /** @var array $departments */
?>

<h2>Додавання посади</h2>

<form method="post" action="" enctype="multipart/form-data">
    <div class="row mb-3">
        <div class="col-sm-6">
            <label for="name" class="form-label m-0">Назва Посади</label>
            <input type="text" class="form-control" id="name" name="name">

            <?php if (!empty($errors['name'])) : ?>
                <div class="form-text text-danger"><?= $errors['name']; ?></div>
            <?php endif; ?>
        </div>

        <div class="col-sm-6">
            <label for="department_id">Район</label>

            <select class="form-control" id="department_id" name="department_id">
                <?php foreach ($departments as $department) : ?>
                    <option <?php if ($department['id'] == $_SESSION['department_id']) echo 'selected'; ?>
                            value="<?= $department['id'] ?>"><?= $department['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div>
        <button class="btn btn-primary">Додати</button>
    </div>
</form>