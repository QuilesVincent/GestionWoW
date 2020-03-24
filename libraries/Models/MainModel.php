<?php


namespace Models;

require_once('libraries/autoload.php');

abstract class MainModel
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = \DBManager::dbConnect();
    }

    public function find($target, $id)
    {
        $req = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE $target = :id");
        $req->execute([
            ":id" => $id,
        ]);
        $item = $req->fetch();
        return $item;
    }

    public function findAll($target, $id)
    {
        $req = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE $target = :id");
        $req->execute([
            ":id" => $id,
        ]);
        $item = $req->fetchAll();
        return $item;
    }

    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute([':id' => $id]);
    }

}