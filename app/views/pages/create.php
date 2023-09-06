<?php

$title = 'Create page';
ob_start();
?>

    <h1 class="mb-4">Create page</h1>
    <form method="POST" action="/<?= APP_BASE_PATH ?>/pages/store">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" required>
        </div>
        <div class="mb-3" id="roles-container">
            <label for="roles" class="form-label">Roles</label>
            <?php foreach ($roles as $role): ?>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="slug" name="roles[]"
                           value="<?php echo $role['id']; ?>">
                    <label for="roles" class="form-check-label"><?php echo $role['role_name']; ?></label>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="submit" class="btn btn-primary">Create Page</button>
    </form>

<?php $content = ob_get_clean();

include 'app/views/layout.php';
?>