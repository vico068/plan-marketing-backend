<?php

namespace App\Repositories;

use App\Models\Product;
use App\Contracts\ProductRepositoryInterface;


class ProductRepository implements ProductRepositoryInterface
{

    protected $model;

    public function __construct(Product $Product)
    {
        $this->model = $Product;
    }


    /**
     * getAllProducts
     *
     * @return void
     */
    public function getAllProducts()
    {
        return $this->model->paginate();
    }


    /**
     * getProductById
     *
     * @param  mixed $id
     * @return void
     */
    public function getProductById(int $id)
    {
        return $this->model->where('id', $id)->first();
    }

    /**
     * getProductBySlug
     *
     * @param  mixed $slug
     * @return void
     */
    public function getProductBySlug(string $slug)
    {
        return $this->model->where('slug', $slug)->first();
    }


    /**
     * createProduct
     *
     * @param  mixed $Product
     * @return void
     */
    public function createProduct(array $Product)
    {
        return $this->model->create($Product);
    }


    /**
     * updateProduct
     *
     * @param  mixed $id
     * @param  mixed $Products
     * @return void
     */
    public function updateProduct(int $id, array $Products)
    {
        $Product = $this->model->find($id);
        return $Product->update($Products);
    }


    /**
     * destroyProduct
     *
     * @param  mixed $id
     * @return void
     */
    public function destroyProduct(int $id)
    {
        $Product = $this->model->find($id);
        return $Product->delete();
    }
}
