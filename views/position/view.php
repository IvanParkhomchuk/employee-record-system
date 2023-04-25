<h1><?= $position['name'] ?></h1>

<div class="mb-3">
    <a href="/employee/add/<?= $position['id'] ?>" class="btn btn-success">Додати працівника</a>
</div>

<div class="row row-cols-1 row-cols-md-4 g-4 categories-list">
    <?php foreach ($employees as $row) : ?>
        <div class="col">
            <a href="/employee/view/<?= $row['id'] ?>" class="card-link">
                <div class="card">
                    <?php $filePath = 'files/employee/' . $row['photo']; ?>

                    <?php if (is_file($filePath)) : ?>
                        <img src="/<?= $filePath ?>" class="card-img-top" alt="">
                    <?php else : ?>
                        <img src="/static/images/no-image.jpg" class="card-img-top" alt="">

                    <?php endif; ?>

                    <div class="card-body">
                        <h5 class="card-title"><?= $row['firstname'] ?></h5>
                    </div>
                    <div class="card-body">
                        <a href="/employee/edit/<?= $row['id'] ?>" class="btn btn-primary">Редагувати</a>
                        <a href="/employee/delete/<?= $row['id'] ?>" class="btn btn-danger">Видалити</a>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>
