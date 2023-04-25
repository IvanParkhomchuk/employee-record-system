<?php
    /** @var array $rows */
?>

<h1 class="h3 mb-3 fw-normal text-center">Список звільлнених працівників</h1>

<div class="row row-cols-1 row-cols-md-4 g-4 categories-list">
    <?php foreach ($rows as $row) : ?>
        <?php if ($row['fired']) : ?>
            <div class="col">
                <a href="/employee/view/<?= $row['employee_id'] ?>" class="card-link">
                    <div class="card">
                        <?php $filePath = 'files/employee/' . $row['photo']; ?>

                        <?php if (is_file($filePath)) : ?>
                            <img src="/<?= $filePath ?>" class="card-img-top" alt="">
                        <?php else : ?>
                            <img src="/static/images/no-image.jpg" class="card-img-top" alt="">

                        <?php endif; ?>

                        <div class="card-body">
                            <h5 class="card-title text-center"><?= $row['firstname'] . ' ' . $row['midname'] . ' ' . $row['lastname'] ?></h5>
                        </div>
                        <div class="card-body">
                            <a href="/employee/edit/<?= $row['employee_id'] ?>" class="btn btn-primary">Редагувати</a>
                            <a href="/employee/delete/<?= $row['employee_id'] ?>" class="btn btn-danger">Видалити</a>
                        </div>
                    </div>
                </a>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
