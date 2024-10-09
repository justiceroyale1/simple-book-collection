<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    const AVAILABLE = 'available';
    const BORROWED = 'borrowed';
    const RESERVED = 'reserved';

    protected $fillable = [
        'title',
        'author',
        'description',
        'published_year',
        'status',
    ];

    public static function getStatusList(): array
    {
        return [
            self::AVAILABLE,
            self::BORROWED,
            self::RESERVED
        ];
    }

    public static function getPublishedYearList(): array
    {
        return Book::distinct('published_year')
            ->orderBy('published_year')
            ->pluck('published_year')
            ->toArray();
    }
}
