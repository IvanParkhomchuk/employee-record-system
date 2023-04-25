<?php
    /** @var array $errors */
    /** @var array $districts */
?>

<h2>Додавання відділу</h2>

<form method="post" action="" enctype="multipart/form-data">
    <div class="row mb-3">
        <div class="col-sm-6">
            <label for="name" class="form-label m-0">Назва відділу</label>
            <input type="text" class="form-control" id="name" name="name">

            <?php if (!empty($errors['name'])) : ?>
                <div class="form-text text-danger"><?= $errors['name']; ?></div>
            <?php endif; ?>
        </div>

        <div class="col-sm-6">
            <label for="district_id">Район</label>

            <select class="form-control" id="district_id" name="district_id">
                <?php foreach ($districts as $district) : ?>
                    <option <?php if ($district['id'] == $_SESSION['district_id']) echo 'selected'; ?>
                            value="<?= $district['id'] ?>"><?= $district['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div>
        <button class="btn btn-primary">Додати</button>
    </div>
</form>