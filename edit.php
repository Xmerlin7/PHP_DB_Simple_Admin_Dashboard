<?php
if (empty($_GET['id'])) {
    echo '<p>User id missing.</p>';
    return;
}
$id = (int)$_GET['id'];
$u = $userModel->getById($id);
if (!$u) {
    echo '<p>User not found.</p>';
    return;
}
?>
<h2>Update Student</h2>
<form method="post" action="?action=update" class="mb-4">
    <input type="hidden" name="id" value="<?= esc($u['id']) ?>">
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input class="form-control" type="text" name="name" value="<?= esc($u['name']) ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input class="form-control" type="email" name="email" value="<?= esc($u['email']) ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Age</label>
        <input class="form-control" type="number" name="age" value="<?= esc($u['age']) ?>">
    </div>
    <button class="btn btn-primary">Update</button>
</form>
