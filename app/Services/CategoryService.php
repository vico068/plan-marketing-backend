<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Contracts\CategoryRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response as FacadesResponse;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    /**
     * getAllCategories
     *
     * @return void
     */
    public function getAllCategories()
    {
        return $this->categoryRepository->getAllCategories();
    }


    /**
     * getCategorieById
     *
     * @param  mixed $id
     * @return void
     */
    public function getCategorieById(int $id)
    {
        return $this->categoryRepository->getCategorieById($id);
    }

    /**
     * makeCategory
     *
     * @param  mixed $categorie
     * @return void
     */
    public function makeCategory(array $categorie)
    {
        $categorie['slug'] = Str::slug($categorie['name']);
        return $this->categoryRepository->createCategorie($categorie);
    }


    /**
     * updateCategory
     *
     * @param  mixed $id
     * @param  mixed $categorie
     * @return JsonResponse
     */
    public function updateCategory(int $id, $categorie) : JsonResponse
    {
        $category = $this->categoryRepository->getCategorieById($id);

        if (!$category) {
            return response()->json(['message' => 'Category Not Found'], Response::HTTP_NOT_FOUND);
        }

        $this->categoryRepository->updateCategorie($category->id, $categorie);
        return response()->json(['message' => 'Category Updated'], Response::HTTP_OK);
    }


    /**
     * destroyCategorie
     *
     * @param  mixed $id
     * @return JsonResponse
     */
    public function destroyCategorie(int $id) : JsonResponse
    {
        $category = $this->categoryRepository->getCategorieById($id);
        if (!$category) {
            return response()->json(['message' => 'Category Not Found'], Response::HTTP_NOT_FOUND);
        }
        $this->categoryRepository->destroyCategorie($id);

        return response()->json(['message' => 'Category Deleted'], Response::HTTP_OK);
    }
}
