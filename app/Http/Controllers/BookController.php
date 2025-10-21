<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\BookRequest;


class BookController extends Controller
{
    /**
 * @api {get} /api/books List all books
 * @apiName GetBooks
 * @apiGroup Books
 * @apiVersion 1.0.0
 *
 * @apiSuccess {Object[]} books List of all books.
 * @apiSuccess {Number} books.id Book ID.
 * @apiSuccess {String} books.name Book title.
 * @apiSuccess {Number} books.category_id Category ID (foreign key).
 * @apiSuccess {Number} books.price Price in USD or chosen currency.
 * @apiSuccess {Date} books.publication_date Publication date.
 * @apiSuccess {Number} books.edition Edition number.
 * @apiSuccess {Number} books.author_id Author ID (foreign key).
 * @apiSuccess {String} [books.isbn] ISBN number (optional).
 * @apiSuccess {String} [books.cover] Cover image path (optional).
 *
 * @apiSuccessExample {json} Success Response:
 * HTTP/1.1 200 OK
 * {
 *   "books": [
 *     {
 *       "id": 1,
 *       "name": "The London Fog",
 *       "category_id": 1,
 *       "price": 20,
 *       "publication_date": "2021-05-10",
 *       "edition": 1,
 *       "author_id": 1,
 *       "isbn": "978-1-00001-001-1",
 *       "cover": "covers/book1.jpg"
 *     },
 *     {
 *       "id": 2,
 *       "name": "Digital Frontier",
 *       "category_id": 2,
 *       "price": 23,
 *       "publication_date": "2022-01-20",
 *       "edition": 1,
 *       "author_id": 2,
 *       "isbn": "978-1-00002-001-0",
 *       "cover": "covers/book6.jpg"
 *     }
 *   ]
 * }
 */

    public function index()
    {
        $books = Book::all();
        return response()->json([
            'books' => $books,
        ]);
    }
/**
 * @api {post} /api/books Create new book
 * @apiName CreateBook
 * @apiGroup Books
 * @apiVersion 1.0.0
 *
 * @apiBody {String} name Book title.
 * @apiBody {Number} category_id Category ID (required).
 * @apiBody {Number} price Book price.
 * @apiBody {Date} publication_date Publication date.
 * @apiBody {Number} edition Edition number.
 * @apiBody {Number} author_id Author ID.
 * @apiBody {String} [isbn] ISBN number (optional).
 * @apiBody {String} [cover] Cover image path (optional).
 *
 * @apiExample {json} Request Example:
 * {
 *   "name": "New Horizons",
 *   "category_id": 2,
 *   "price": 25,
 *   "publication_date": "2024-02-14",
 *   "edition": 1,
 *   "author_id": 3,
 *   "isbn": "978-1-00003-010-0",
 *   "cover": "covers/book21.jpg"
 * }
 *
 * @apiSuccess (201 Created) {Object} book Created book record.
 * @apiSuccessExample {json} Success Response:
 * HTTP/1.1 201 Created
 * {
 *   "book": {
 *     "id": 21,
 *     "name": "New Horizons",
 *     "category_id": 2,
 *     "price": 25,
 *     "publication_date": "2024-02-14",
 *     "edition": 1,
 *     "author_id": 3,
 *     "isbn": "978-1-00003-010-0",
 *     "cover": "covers/book21.jpg"
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

    public function store(BookRequest $request)
    {
        $book = Book::create($request->all());

        return response()->json([
            'book' => $book,
        ]);
    }
/**
 * @api {put} /api/books/:id Update book
 * @apiName UpdateBook
 * @apiGroup Books
 * @apiVersion 1.0.0
 *
 * @apiParam {Number} id Book’s unique ID.
 *
 * @apiBody {String} [name] Book title.
 * @apiBody {Number} [category_id] Category ID.
 * @apiBody {Number} [price] Price.
 * @apiBody {Date} [publication_date] Publication date.
 * @apiBody {Number} [edition] Edition.
 * @apiBody {Number} [author_id] Author ID.
 * @apiBody {String} [isbn] ISBN number.
 * @apiBody {String} [cover] Cover path.
 *
 * @apiExample {json} Request Example:
 * {
 *   "name": "Updated Book Title",
 *   "price": 28,
 *   "edition": 2
 * }
 *
 * @apiSuccess (200 OK) {Object} book Updated book data.
 * @apiSuccessExample {json} Success Response:
 * HTTP/1.1 200 OK
 * {
 *   "book": {
 *     "id": 2,
 *     "name": "Updated Book Title",
 *     "category_id": 2,
 *     "price": 28,
 *     "publication_date": "2022-01-20",
 *     "edition": 2,
 *     "author_id": 2,
 *     "isbn": "978-1-00002-001-0",
 *     "cover": "covers/book6.jpg"
 *   }
 * }
 *
 * @apiErrorExample {json} Not Found:
 * HTTP/1.1 404 Not Found
 * {
 *   "message": "No query results for model [App\\Models\\Book] 999"
 * }
 */

    public function update(BookRequest $request, $id)
	{
		$book = Book::findOrFail($id);
		$book->update($request->validated());

		return response()->json([
			'book' => $book,
		]);
	}
    /**
 * @api {delete} /api/books/:id Delete book
 * @apiName DeleteBook
 * @apiGroup Books
 * @apiVersion 1.0.0
 *
 * @apiParam {Number} id Book’s unique ID.
 *
 * @apiSuccess {String} message Deletion confirmation message.
 * @apiSuccess {Number} id Deleted book ID.
 *
 * @apiSuccessExample {json} Success Response:
 * HTTP/1.1 200 OK
 * {
 *   "message": "Book deleted successfully",
 *   "id": 3
 * }
 *
 * @apiErrorExample {json} Not Found:
 * HTTP/1.1 404 Not Found
 * {
 *   "message": "No query results for model [App\\Models\\Book] 999"
 * }
 */

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return response()->json([
            'message' => 'Book deleted successfully',
            'id' => $id
        ]);
    }
    /**
 * @api {get} /api/books/:id Get book by ID
 * @apiName GetBook
 * @apiGroup Books
 * @apiVersion 1.0.0
 *
 * @apiParam {Number} id Book’s unique ID.
 *
 * @apiSuccess {Object} book Book data.
 * @apiSuccess {Number} book.id Book ID.
 * @apiSuccess {String} book.name Book title.
 * @apiSuccess {Number} book.category_id Category ID.
 * @apiSuccess {Number} book.price Price.
 * @apiSuccess {Date} book.publication_date Publication date.
 * @apiSuccess {Number} book.edition Edition.
 * @apiSuccess {Number} book.author_id Author ID.
 * @apiSuccess {String} [book.isbn] ISBN number.
 * @apiSuccess {String} [book.cover] Cover path.
 *
 * @apiSuccessExample {json} Success Response:
 * HTTP/1.1 200 OK
 * {
 *   "book": {
 *     "id": 1,
 *     "name": "The London Fog",
 *     "category_id": 1,
 *     "price": 20,
 *     "publication_date": "2021-05-10",
 *     "edition": 1,
 *     "author_id": 1,
 *     "isbn": "978-1-00001-001-1",
 *     "cover": "covers/book1.jpg"
 *   }
 * }
 *
 * @apiErrorExample {json} Not Found:
 * HTTP/1.1 404 Not Found
 * {
 *   "message": "No query results for model [App\\Models\\Book] 999"
 * }
 */

    public function show($id)
{
    $book = Book::findOrFail($id);  

    return response()->json([
        'book' => $book,
    ]);
}

}
