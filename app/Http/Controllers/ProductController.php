<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;


    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * @OA\Get(
     *
     *     path="/api/products",
     *     description="Listar produtos",
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Missing Data"
     *     )
     * )
     */
    public function index()
    {
        $products = $this->productService->getAllProducts();
        return ProductResource::collection($products);
    }

    /**
     * @OA\Post(
     *
     *     path="/api/products",
     *     description="Cadastrar Produto",
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         type="string",
     *         description="Nome do produto",
     *         required=true,
     *     ),
     *   @OA\Parameter(
     *         name="description",
     *         in="query",
     *         type="string",
     *         description="Descricao do produto",
     *         required=false,
     *     ),
     *   @OA\Parameter(
     *         name="price",
     *         in="query",
     *         type="float",
     *         description="Preco do produto",
     *         required=true,
     *     ),
     *      @OA\Parameter(
     *         name="category_id",
     *         in="query",
     *         type="string",
     *         description="Id da categoria do produto",
     *         required=true,
     *     ),
     *   @OA\Parameter(
     *         name="active",
     *         in="query",
     *         type="string",
     *         description="Status do produto",
     *         required=false,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *     ),
     * )
     */
    public function store(Request $request): ProductResource
    {
        $request->validate([
            'name' => 'required|unique:products',
            'category_id' => 'required',
        ]);
        $product = $this->productService->makeProduct($request->all());
        return new ProductResource($product);
    }


    /**
     * @OA\Get(
     *
     *     path="/api/products/{id}",
     *     description="Listar um produto por id",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         type="integer",
     *         description="Id do produto",
     *         required=true,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *     ),
     * )
     */
    public function show($id): ProductResource
    {
        $product = $this->productService->getProductById($id);
        return new ProductResource($product);
    }

    /**
     * @OA\Put(
     *
     *     path="/api/products/{id}",
     *     description="Atualizar um produto",
     *  @OA\Parameter(
     *         name="id",
     *         in="query",
     *         type="path",
     *         description="Id doproduto",
     *         required=true,
     *     ),
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         type="string",
     *         description="Nome do produto",
     *         required=false,
     *     ),
     *   @OA\Parameter(
     *         name="price",
     *         in="query",
     *         type="float",
     *         description="Preco do produto",
     *         required=true,
     *     ),
     *   @OA\Parameter(
     *         name="description",
     *         in="query",
     *         type="string",
     *         description="Descricao do produto",
     *         required=false,
     *     ),
     *      @OA\Parameter(
     *         name="category_id",
     *         in="query",
     *         type="string",
     *         description="Id da categoria do produto",
     *         required=false,
     *     ),
     *      @OA\Parameter(
     *         name="active",
     *         in="query",
     *         type="string",
     *         description="Status do produto",
     *         required=false,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *     ),
     * )
     */
    public function update(Request $request, $id)
    {
        $product = $this->productService->updateProduct($id, $request->all());
        return $product;
    }

    /**
     * @OA\Delete(
     *
     *     path="/api/products/{id}",
     *     description="Deletar um produto",
     *     @OA\Parameter(
     *         name="id",
     *         in="query",
     *         type="path",
     *         description="Id doproduto",
     *         required=true,
     *     ),
     * )
     */
    public function destroy($id)
    {
        $product = $this->productService->destroyProduct((int)$id);
        return $product;
    }
}
