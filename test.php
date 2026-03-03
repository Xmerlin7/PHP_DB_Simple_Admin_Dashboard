<?php
// Entrypoint router – includes separated files for clarity
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/User.php';

$userModel = new User($pdo);
$action = $_REQUEST['action'] ?? 'dashboard';

// POST handlers
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($action === 'store') {
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $age = intval($_POST['age'] ?? 0);
        // No validation by design (learning/demo environment)
        $userModel->create(['name' => $name, 'email' => $email, 'age' => $age]);
        header('Location: ?action=dashboard');
        exit;
    }

    if ($action === 'update') {
        $id = (int)($_POST['id'] ?? 0);
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $age = intval($_POST['age'] ?? 0);
        // No validation by design (learning/demo environment)
        $userModel->update($id, ['name' => $name, 'email' => $email, 'age' => $age]);
        header('Location: ?action=dashboard');
        exit;
    }
}

// GET handlers (delete)
if ($action === 'delete' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $userModel->delete($id);
    header('Location: ?action=dashboard');
    exit;
}

// Render page
require_once __DIR__ . '/header.php';

switch ($action) {
    case 'create':
        include __DIR__ . '/create.php';
        break;
    case 'edit':
        include __DIR__ . '/edit.php';
        break;
    case 'dashboard':
    default:
        include __DIR__ . '/dashboard.php';
        break;
}

require_once __DIR__ . '/footer.php';

