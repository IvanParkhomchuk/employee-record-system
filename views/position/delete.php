<?php
    /** @var array $position */
?>

<div class="alert alert-danger mt-3" role="alert">
    <h4 class="alert-heading">Видалити посаду "<?= $position['name'] ?>"?</h4>
    <hr>
    <p class="mb-0">
        <a href="/position/delete/<?= $position['id'] ?>/yes" class="btn btn-danger">Видалити</a>
        <a href="/position" class="btn btn-light">Відмінити</a>
    </p>
</div>
