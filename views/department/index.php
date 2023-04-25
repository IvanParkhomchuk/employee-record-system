<?php
    /** @var array $rows */
?>

<h2>Список відділів</h2>

<div class="mb-3">
    <a href="/department/add" class="btn btn-success">Додати відділ</a>
</div>

<div class="row row-cols-1 row-cols-md-4 g-4 categories-list">
    <?php foreach ($rows as $row) : ?>
        <div class="col">
            <a href="/department/view/<?= $row['id'] ?>" class="card-link">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['name'] ?></h5>
                    </div>

                    <div class="card-body">
                        <a href="/department/edit/<?= $row['id'] ?>" class="btn btn-primary">Редагувати</a>
                        <a href="/department/delete/<?= $row['id'] ?>" class="btn btn-danger">Видалити</a>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>
