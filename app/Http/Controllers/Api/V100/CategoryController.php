<?php

namespace App\Http\Controllers\Api\V100;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V100\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Repository\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = CategoryResource::collection($this->categoryRepository->index());

        return response()->json($categories);
    }

    public function store(CategoryRequest $request)
    {
        $this->categoryRepository->create($request->validated());

        return response()->json('Success');
    }

    public function show(Category $category)
    {
        return response()->json(
            new CategoryResource($this->categoryRepository->show($category->id, ['*'], ['advertisements']))
        );
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $this->categoryRepository->update($category->id, $request->validated());

        return response()->json('Success');
    }

    public function destroy(Category $category)
    {
        $this->categoryRepository->delete($category->id);

        return response()->json('Success');
    }
}
