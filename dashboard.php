<?php
$users = $userModel->getAll();
?>
<h2>All Students</h2>
<?php if ($users): ?>
    <div class="row">
        <?php foreach ($users as $u): ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($u['name'] ?? '') ?></h5>
                        <p class="card-text">Email: <?= esc($u['email'] ?? '') ?><br>Age: <?= esc($u['age'] ?? '') ?></p>
                        <a href="?action=edit&id=<?= urlencode($u['id']) ?>" class="btn btn-primary btn-sm">Update</a>
                        <a href="?action=delete&id=<?= urlencode($u['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this user?')">Delete</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>No students found.</p>
<?php endif; ?>
