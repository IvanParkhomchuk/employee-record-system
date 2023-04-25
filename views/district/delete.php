<?php
    /** @var array $district */
?>

<div class="alert alert-danger mt-3" role="alert">
    <h4 class="alert-heading">Видалити району "<?= $district['name'] ?>"?</h4>
    <hr>
    <p class="mb-0">
        <a href="/district/delete/<?= $district['id'] ?>/yes" class="btn btn-danger">Видалити</a>
        <a href="/district" class="btn btn-light">Відмінити</a>
    </p>
</div>
