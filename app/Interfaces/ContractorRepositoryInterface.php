<?php

namespace App\Interfaces;

/* Defining the methods that the class that implements it must have. */
interface ContractorRepositoryInterface
{
    public function getAll();
    public function findById($id);
    public function create($data);
    public function update($data, $id);
    public function delete($id);
    public function revised();
    public function clever();
}
