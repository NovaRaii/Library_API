<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
 * @api {get} /api/categories List all categories
 * @apiName GetCategories
 * @apiGroup Categories
 * @apiVersion 1.0.0
 *
 * @apiSuccess {Object[]} categories List of all categories.
 * @apiSuccess {Number} categories.id Category ID.
 * @apiSuccess {String} categories.name Category name.
 *
 * @apiSuccessExample {json} Success Response:
 * HTTP/1.1 200 OK
 * {
 *   "categories": [
 *     { "id": 1, "name": "Historical Fiction" },
 *     { "id": 2, "name": "Science Fiction" },
 *     { "id": 3, "name": "Romance" },
 *     { "id": 4, "name": "Fantasy" },
 *     { "id": 5, "name": "Mystery" },
 *     { "id": 6, "name": "Thriller" },
 *     { "id": 7, "name": "Gothic" },
 *     { "id": 8, "name": "Drama" },
 *     { "id": 9, "name": "Adventure" },
 *     { "id": 10, "name": "Contemporary" }
 *   ]
 * }
 */

    public function index()
    {
        $categories = Category::all();
        return response()->json([
            'categories' => $categories,
        ]);
    }
/**
 * @api {post} /api/categories Create new category
 * @apiName CreateCategory
 * @apiGroup Categories
 * @apiVersion 1.0.0
 *
 * @apiBody {String} name Category name.
 *
 * @apiExample {json} Request Example:
 * {
 *   "name": "Poetry"
 * }
 *
 * @apiSuccess (201 Created) {Object} category Created category record.
 * @apiSuccessExample {json} Success Response:
 * HTTP/1.1 201 Created
 * {
 *   "category": {
 *     "id": 11,
 *     "name": "Poetry"
 *   }
 * }
 *
 * @apiErrorExample {json} Validation Error:
 * HTTP/1.1 422 Unprocessable Entity
 * {
 *   "errors": {
 *     "name": ["The name field is required."]
 *   }
 * }
 */

    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->all());

        return response()->json([
            'category' => $category,
        ]);
    }
/**
 * @api {put} /api/categories/:id Update category
 * @apiName UpdateCategory
 * @apiGroup Categories
 * @apiVersion 1.0.0
 *
 * @apiParam {Number} id Category’s unique ID.
 * @apiBody {String} [name] Category name.
 *
 * @apiExample {json} Request Example:
 * {
 *   "name": "Romance & Drama"
 * }
 *
 * @apiSuccess (200 OK) {Object} category Updated category data.
 * @apiSuccessExample {json} Success Response:
 * HTTP/1.1 200 OK
 * {
 *   "category": {
 *     "id": 3,
 *     "name": "Romance & Drama"
 *   }
 * }
 *
 * @apiErrorExample {json} Not Found:
 * HTTP/1.1 404 Not Found
 * {
 *   "message": "No query results for model [App\\Models\\Category] 99"
 * }
 */

    public function update(CategoryRequest $request, $id)
	{
		$category = Category::findOrFail($id);
		$category->update($request->all());

		return response()->json([
			'category' => $category,
		]);
	}
    /**
 * @api {delete} /api/categories/:id Delete category
 * @apiName DeleteCategory
 * @apiGroup Categories
 * @apiVersion 1.0.0
 *
 * @apiParam {Number} id Category’s unique ID.
 *
 * @apiSuccess {String} message Deletion confirmation message.
 * @apiSuccess {Number} id Deleted category ID.
 *
 * @apiSuccessExample {json} Success Response:
 * HTTP/1.1 200 OK
 * {
 *   "message": "Category deleted successfully",
 *   "id": 4
 * }
 *
 * @apiErrorExample {json} Not Found:
 * HTTP/1.1 404 Not Found
 * {
 *   "message": "No query results for model [App\\Models\\Category] 99"
 * }
 */

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json([
            'message' => 'Category deleted successfully',
            'id' => $id
        ]);
    }
/**
 * @api {get} /api/categories/:id Get category by ID
 * @apiName GetCategory
 * @apiGroup Categories
 * @apiVersion 1.0.0
 *
 * @apiParam {Number} id Category’s unique ID.
 *
 * @apiSuccess {Object} category Category data.
 * @apiSuccess {Number} category.id Category ID.
 * @apiSuccess {String} category.name Category name.
 *
 * @apiSuccessExample {json} Success Response:
 * HTTP/1.1 200 OK
 * {
 *   "category": {
 *     "id": 4,
 *     "name": "Fantasy"
 *   }
 * }
 *
 * @apiErrorExample {json} Not Found:
 * HTTP/1.1 404 Not Found
 * {
 *   "message": "No query results for model [App\\Models\\Category] 99"
 * }
 */

    public function show($id)
{
    $category = Category::findOrFail($id);

    return response()->json([
        'category' => $category,
    ]);
}
}
