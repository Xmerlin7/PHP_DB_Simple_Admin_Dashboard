<?php
// vulnerable_demo.php
// Demonstrates unsafe SQL usage (DO NOT USE IN PRODUCTION).
// This file is provided for educational purposes so you can see how SQL
// concatenation can lead to SQL injection vulnerabilities.

require_once __DIR__ . '/db.php';

// Unsafe create – concatenates values directly into SQL
function create_vulnerable(PDO $pdo, $name, $email, $age)
{
    // WARNING: unsafe string concatenation
    $sql = "INSERT INTO students (name, email, age) VALUES ('" .
           addslashes($name) . "', '" . addslashes($email) . "', " . (int)$age . ")";
    return $pdo->exec($sql);
}

// Unsafe update – concatenates values directly into SQL
function update_vulnerable(PDO $pdo, $id, $name, $email, $age)
{
    // WARNING: unsafe string concatenation
    $sql = "UPDATE students SET name='" . addslashes($name) . "', email='" . addslashes($email) . "', age=" . (int)$age . " WHERE id=" . (int)$id;
    return $pdo->exec($sql);
}

// Example usage (uncomment to run; do not expose this file on production servers)
/*
create_vulnerable($pdo, "Alice', 1); DROP TABLE students; --", 'attacker@example.com', 99);
echo "Done\n";
*/

echo "vulnerable_demo.php — functions available: create_vulnerable, update_vulnerable\n";
?>
