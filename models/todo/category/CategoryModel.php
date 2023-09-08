<?php

namespace models\todo\category;

use models\Database;

class CategoryModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();

        try {
            $result = $this->db->query("SELECT 1 FROM `todo_category` LIMIT 1");
        } catch (\PDOException $e) {
            $this->createTable();
        }
    }

    public function createTable()
    {
        $roleTableQuery = "CREATE TABLE IF NOT EXISTS `todo_category` (
            `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `title` VARCHAR(255) NOT NULL,
            `description` TEXT,
            `usability` TINYINT DEFAULT 1,
            `user` INT NOT NULL,
            FOREIGN KEY (user) REFERENCES users(id) ON DELETE CASCADE 
        )";

        try {
            $this->db->exec($roleTableQuery);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getAllCategories()
    {
        try {
            $stmt = $this->db->query("SELECT * FROM todo_category");
            $todo_category = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $todo_category[] = $row;
            }
            return $todo_category;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function createCategory($title, $description, $user_id)
    {
        $query = "Insert INTO todo_category(title, description, user) VALUES (?,?,?)";
        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            $role = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $role ? $role : false;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function createRole($role_name, $role_description)
    {
        $query = "INSERT INTO roles (role_name, role_description) VALUES (?, ?)";
        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$role_name, $role_description]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function updateRole($id, $role_name, $role_description)
    {
        $query = "UPDATE roles SET role_name = ?, role_description = ? WHERE id = ?";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$role_name, $role_description, $id]);

            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function deleteRole($id)
    {
        $query = "DELETE FROM roles WHERE id = ?";
        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }
}