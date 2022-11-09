<?php

namespace App\Contracts;

interface CategoryRepositoryInterface
{
    public function getAllCategories();
    public function getCategorieById(int $id);
    public function getCategorieBySlug(string $slug);
    public function createCategorie(array $categorie);
    public function updateCategorie(int $id, $categorie);
    public function destroyCategorie(int $id);
}
