<?php
    /** @var array $department */
?>

<div class="alert alert-danger mt-3" role="alert">
    <h4 class="alert-heading">Видалити відділ "<?= $department['name'] ?>"?</h4>
    <hr>
    <p class="mb-0">
        <a href="/department/delete/<?= $department['id'] ?>/yes" class="btn btn-danger">Видалити</a>
        <a href="/department" class="btn btn-light">Відмінити</a>
    </p>
</div>
