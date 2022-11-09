<?php

namespace App\Http\Controllers;

use App\Http\Resources\categoryResource;
use App\Services\CategoryService;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;


    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * @OA\Get(
     *
     *     path="/api/categories",
     *     description="Listar categorias",
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
        $categories = $this->categoryService->getAllcategories();
        return categoryResource::collection($categories);
    }

    /**
     * @OA\Post(
     *
     *     path="/api/categories",
     *     description="Cadastrar categorias",
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         type="string",
     *         description="Nome do categorias",
     *         required=true,
     *     ),
     *   @OA\Parameter(
     *         name="description",
     *         in="query",
     *         type="string",
     *         description="Descricao do categorias",
     *         required=false,
     *     ),
     *      @OA\Parameter(
     *         name="category_id",
     *         in="query",
     *         type="string",
     *         description="Id da categoria do categorias",
     *         required=true,
     *     ),
     *   @OA\Parameter(
     *         name="active",
     *         in="query",
     *         type="string",
     *         description="Status do categorias",
     *         required=false,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *     ),
     * )
     */
    public function store(Request $request): categoryResource
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'category_id' => 'required',
        ]);
        $category = $this->categoryService->makecategory($request->all());
        return new categoryResource($category);
    }


    /**
     * @OA\Get(
     *
     *     path="/api/categories/{id}",
     *     description="Listar um categorias por id",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         type="integer",
     *         description="Id do categorias",
     *         required=true,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *     ),
     * )
     */
    public function show($id): categoryResource
    {
        $category = $this->categoryService->getCategorieById($id);
        return new categoryResource($category);
    }

    /**
     * @OA\Put(
     *
     *     path="/api/categories/{id}",
     *     description="Atualizar um categorias",
     *  @OA\Parameter(
     *         name="id",
     *         in="query",
     *         type="path",
     *         description="Id docategorias",
     *         required=true,
     *     ),
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         type="string",
     *         description="Nome do categorias",
     *         required=false,
     *     ),
     *   @OA\Parameter(
     *         name="description",
     *         in="query",
     *         type="string",
     *         description="Descricao do categorias",
     *         required=false,
     *     ),
     *      @OA\Parameter(
     *         name="category_id",
     *         in="query",
     *         type="string",
     *         description="Id da categoria do categorias",
     *         required=false,
     *     ),
     *      @OA\Parameter(
     *         name="active",
     *         in="query",
     *         type="string",
     *         description="Status do categorias",
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
        $category = $this->categoryService->updateCategory($id, $request->all());
        return $category;
    }

    /**
     * @OA\Delete(
     *
     *     path="/api/categories/{id}",
     *     description="Deletar um categorias",
     *     @OA\Parameter(
     *         name="id",
     *         in="query",
     *         type="path",
     *         description="Id docategorias",
     *         required=true,
     *     ),
     * )
     */
    public function destroy($id)
    {
        $category = $this->categoryService->destroyCategorie($id);
        return $category;
    }
}
