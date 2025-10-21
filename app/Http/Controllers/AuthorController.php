<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;


class AuthorController extends Controller
{
    /**
 * @api {get} /api/authors List all authors
 * @apiName GetAuthors
 * @apiGroup Authors
 * @apiVersion 1.0.0
 *
 * @apiSuccess {Object[]} authors List of authors.
 * @apiSuccess {Number} authors.id Author ID.
 * @apiSuccess {String} authors.name Author's full name.
 * @apiSuccess {String} authors.nationality Author's nationality.
 * @apiSuccess {Number} authors.age Author's age.
 * @apiSuccess {String} authors.gender Author's gender.
 *
 * @apiSuccessExample {json} Success Response:
 * HTTP/1.1 200 OK
 * {
 *   "authors": [
 *     {
 *       "id": 1,
 *       "name": "Emma Clarke",
 *       "nationality": "British",
 *       "age": 42,
 *       "gender": "female"
 *     },
 *     ...
 *   ]
 * }
 */

    public function index()
    {
        $authors = Author::all();
        return response()->json([
            'authors' => $authors,
        ]);
    }

/**
 * @api {post} /api/authors Create new author
 * @apiName CreateAuthor
 * @apiGroup Authors
 * @apiVersion 1.0.0
 *
 * @apiBody {String} name Author’s full name.
 * @apiBody {String} nationality Author’s nationality.
 * @apiBody {Number} age Author’s age.
 * @apiBody {String} gender Author’s gender.
 *
 * @apiExample {json} Request Example:
 * {
 *   "name": "New Author",
 *   "nationality": "Canadian",
 *   "age": 39,
 *   "gender": "female"
 * }
 *
 * @apiSuccess (201 Created) {Object} author Created author data.
 * @apiSuccessExample {json} Success Response:
 * HTTP/1.1 201 Created
 * {
 *   "author": {
 *     "id": 11,
 *     "name": "New Author",
 *     "nationality": "Canadian",
 *     "age": 39,
 *     "gender": "female"
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

    public function store(AuthorRequest $request)
{
    $author = Author::create($request->validated());

    return response()->json([
        'author' => $author,
    ], 201);
}

/**
 * @api {put} /api/authors/:id Update an author
 * @apiName UpdateAuthor
 * @apiGroup Authors
 * @apiVersion 1.0.0
 *
 * @apiParam {Number} id Author’s unique ID.
 * @apiBody {String} name Author’s full name.
 * @apiBody {String} nationality Author’s nationality.
 * @apiBody {Number} age Author’s age.
 * @apiBody {String} gender Author’s gender.
 *
 * @apiExample {json} Request Example:
 * {
 *   "name": "Updated Name",
 *   "nationality": "Irish",
 *   "age": 48,
 *   "gender": "male"
 * }
 *
 * @apiSuccess (200 OK) {Object} author Updated author data.
 * @apiSuccessExample {json} Success Response:
 * HTTP/1.1 200 OK
 * {
 *   "author": {
 *     "id": 4,
 *     "name": "Updated Name",
 *     "nationality": "Irish",
 *     "age": 48,
 *     "gender": "male"
 *   }
 * }
 *
 * @apiErrorExample {json} Not Found:
 * HTTP/1.1 404 Not Found
 * {
 *   "message": "No query results for model [App\\Models\\Author] 99"
 * }
 */

    public function update(AuthorRequest $request, $id)
{
    $author = Author::findOrFail($id);
    $author->update($request->validated());

    return response()->json([
        'author' => $author,
    ], 200);
}

    /**
 * @api {delete} /api/authors/:id Delete an author
 * @apiName DeleteAuthor
 * @apiGroup Authors
 * @apiVersion 1.0.0
 *
 * @apiParam {Number} id Author’s unique ID.
 *
 * @apiSuccess {String} message Deletion confirmation message.
 * @apiSuccess {Number} id Deleted author ID.
 *
 * @apiSuccessExample {json} Success Response:
 * HTTP/1.1 200 OK
 * {
 *   "message": "Author deleted successfully",
 *   "id": 4
 * }
 *
 * @apiErrorExample {json} Not Found:
 * HTTP/1.1 404 Not Found
 * {
 *   "message": "No query results for model [App\\Models\\Author] 99"
 * }
 */

    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();
        return response()->json([
            'message' => 'Author deleted successfully',
            'id' => $id
        ]);
    }
/**
 * @api {get} /api/authors/:id Get author by ID
 * @apiName GetAuthor
 * @apiGroup Authors
 * @apiVersion 1.0.0
 *
 * @apiParam {Number} id Author’s unique ID.
 *
 * @apiSuccess {Object} author Author data.
 * @apiSuccess {Number} author.id Author ID.
 * @apiSuccess {String} author.name Author's full name.
 * @apiSuccess {String} author.nationality Author's nationality.
 * @apiSuccess {Number} author.age Author's age.
 * @apiSuccess {String} author.gender Author's gender.
 *
 * @apiErrorExample {json} Not Found:
 * HTTP/1.1 404 Not Found
 * {
 *   "message": "No query results for model [App\\Models\\Author] 99"
 * }
 */

    public function show($id)
{
    $author = Author::findOrFail($id);

    return response()->json([
        'author' => $author,
    ]);
}

}
