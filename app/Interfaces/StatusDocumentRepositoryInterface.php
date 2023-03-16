<?php

namespace App\Interfaces;

/* A contract that the class that implements it must have the methods defined in it. */
interface StatusDocumentRepositoryInterface
{
    public function getAll();
    public function findById($id);
    public function create($data);
    public function update($data, $id);
    public function delete($id);
    public function updateMasive($data);
}
