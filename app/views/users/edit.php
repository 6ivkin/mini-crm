<?php

$title = 'Edit user';
ob_start();
?>

<h1>Edit user</h1>

<form action="/<?= APP_BASE_PATH ?>/users/update/<?php echo $user['id']; ?>" method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>"
               required>
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
    </div>

    <div class="form-group">
        <label for="role">Role</label>
        <select name="role" id="role" class="form-control">
            <?php foreach ($roles as $role): ?>
                <option value="<?php echo $role['id']; ?>" <?php echo $user['role'] == $role['id'] ? 'selected' : ''; ?>>
                    <?php echo $role['role_name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Save Changes</button>
</form>

<?php $content = ob_get_clean();

include 'app/views/layout.php';
?>
