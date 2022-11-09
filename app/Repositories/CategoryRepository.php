<?php

namespace App\Repositories;

use App\Models\Category;
use App\Contracts\CategoryRepositoryInterface;


class CategoryRepository implements CategoryRepositoryInterface
{

    protected $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }


    /**
     * getAllCategories
     *
     * @return void
     */
    public function getAllCategories()
    {
        return $this->model->paginate();
    }


    /**
     * getCategorieById
     *
     * @param  mixed $id
     * @return void
     */
    public function getCategorieById(int $id)
    {
        return $this->model->where('id', $id)->first();
    }

    /**
     * getCategorieBySlug
     *
     * @param  mixed $slug
     * @return void
     */
    public function getCategorieBySlug(string $slug)
    {
        return $this->model->where('slug', $slug)->first();
    }


    /**
     * createCategorie
     *
     * @param  mixed $category
     * @return void
     */
    public function createCategorie(array $category)
    {
        return $this->model->create($category);
    }


    /**
     * updateCategorie
     *
     * @param  mixed $id
     * @param  mixed $categorie
     * @return void
     */
    public function updateCategorie(int $id, $categorie)
    {
        $category = $this->model->find($id);
        return $category->update($categorie);
    }


    /**
     * destroyCategorie
     *
     * @param  mixed $id
     * @return void
     */
    public function destroyCategorie(int $id)
    {
        $category = $this->model->find($id);
        return $category->delete();
    }
}
