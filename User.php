<?php
// User model – OOP wrapper around `students` table
class User
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->query('SELECT * FROM students');
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM students WHERE id = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function create(array $data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO students (name, email, age) VALUES (:name, :email, :age)');
        $stmt->execute([
            ':name' => $data['name'] ?? null,
            ':email' => $data['email'] ?? null,
            ':age' => $data['age'] ?? null,
        ]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, array $data)
    {
        $stmt = $this->pdo->prepare('UPDATE students SET name = :name, email = :email, age = :age WHERE id = :id');
        return $stmt->execute([
            ':name' => $data['name'] ?? null,
            ':email' => $data['email'] ?? null,
            ':age' => $data['age'] ?? null,
            ':id' => $id,
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM students WHERE id = :id');
        return $stmt->execute([':id' => $id]);
    }
}
