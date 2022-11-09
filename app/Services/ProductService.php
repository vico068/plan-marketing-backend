<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Contracts\ProductRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * getAllProducts
     *
     * @return void
     */
    public function getAllProducts()
    {
        return $this->productRepository->getAllProducts();
    }

    /**
     * getProductById
     *
     * @param  mixed $id
     * @return void
     */
    public function getProductById(int $id)
    {
        return $this->productRepository->getProductById($id);
    }

    /**
     * makeProduct
     *
     * @param  mixed $product
     * @return void
     */
    public function makeProduct(array $product)
    {

        $product['slug'] = Str::slug($product['name']);
        return $this->productRepository->createProduct($product);
    }


    /**
     * updateProduct
     *
     * @param  mixed $id
     * @param  mixed $product
     * @return void
     */
    public function updateProduct(int $id, array $product)
    {
        $productR = $this->productRepository->getProductById($id);

        if (!$productR) {
            return response()->json(['message' => 'Product Not Found'],  Response::HTTP_NOT_FOUND);
        }


        $this->productRepository->updateProduct($productR->id, $product);
        return response()->json(['message' => 'Product Updated'],  Response::HTTP_OK);
    }

    /**
     * destroyProduct
     *
     * @param  mixed $id
     * @return void
     */
    public function destroyProduct(int $id)
    {
        $productR = $this->productRepository->getProductById($id);

        if (!$productR) {
            return response()->json(['message' => 'Product Not Found'], Response::HTTP_NOT_FOUND);
        }

        $this->productRepository->destroyProduct($productR->id);
        return response()->json(['message' => 'Product Deleted'], Response::HTTP_OK);
    }

    public function storeImageProduct(object $image)
    {
        return $image->store("/products");
    }
}
