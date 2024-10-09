<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Http\Requests\SaveBook;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $books = QueryBuilder::for(Book::class)
            ->allowedFilters([
                AllowedFilter::exact('status'),
                AllowedFilter::exact('published_year'),
            ])
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $selectedStatus = request()->input('filter.status', '');
        $selectedPublishedYear = request()->input('filter.published_year', '');

        $props = [
            'books' => $books,
            'statusList' => Book::getStatusList(),
            'publishedYearList' => Book::getPublishedYearList(),
            'selectedStatus' => $selectedStatus,
            'selectedPublishedYear' => $selectedPublishedYear,
        ];

        return Inertia::render('Books/Index', $props);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $props = [
            'statusList' => Book::getStatusList()
        ];

        return Inertia::render('Books/Create', $props);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveBook $request)
    {
        $bookData = $request->validated();

        Book::create($bookData);

        return to_route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book): Response
    {
        $props = [
            'book' => $book
        ];

        return Inertia::render('Books/Show', $props);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book): Response
    {
        $props = [
            'statusList' => Book::getStatusList(),
            'book' => $book
        ];

        return Inertia::render('Books/Edit', $props);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveBook $request, Book $book)
    {
        $bookData = $request->validated();

        $book->update($bookData);

        return to_route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return to_route('books.index');
    }
}
