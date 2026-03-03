<?php
// Header + helper functions
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function esc($s)
{
    return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Students Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
    <header class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Students Admin</h1>
        <nav>
            <a class="btn btn-sm btn-outline-primary" href="?action=dashboard">Dashboard</a>
            <a class="btn btn-sm btn-outline-success" href="?action=create">Create</a>
        </nav>
    </header>
    <?php if (!empty($_SESSION['flash'])): ?>
        <div class="alert alert-warning"><?php echo esc($_SESSION['flash']); unset($_SESSION['flash']); ?></div>
    <?php endif; ?>
