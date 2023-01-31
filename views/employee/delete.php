<?php
    /** @var array $employee */
?>

<div class="alert alert-danger mt-3" role="alert">
    <h4 class="alert-heading">Видалити працівника "<?= $employee['name'] ?>"?</h4>
    <p>Ви дійсно хочете видалити цього працівника?</p>
    <hr>
    <p class="mb-0">
        <a href="/employee/delete/<?= $employee['id'] ?>/yes" class="btn btn-danger">Видалити</a>
        <a href="/employee" class="btn btn-light">Відмінити</a>
    </p>
</div>
