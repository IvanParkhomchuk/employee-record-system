<?php
    /** @var array $rows */
?>

<h2>Список районів</h2>

<div class="mb-3">
    <a href="/district/add" class="btn btn-success">Додати район</a>
</div>

<div class="row row-cols-1 row-cols-md-4 g-4">
    <?php foreach ($rows as $row) : ?>
        <div class="col">
            <a href="/district/view/<?= $row['id'] ?>" class="card-link">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['name'] ?></h5>
                    </div>
                    <div class="card-body">
                        <a href="/district/edit/<?= $row['id'] ?>" class="btn btn-primary">Редагувати</a>
                        <a href="/district/delete/<?= $row['id'] ?>" class="btn btn-danger">Видалити</a>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>
