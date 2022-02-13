<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder;

class News extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'news';

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'author',
        'status',
        'description',
        'image'
    ];

    // Можно указать исключения полей
//    protected $guarded = [
//      'id'
//    ];

    protected $availableFields = ['id', 'title', 'author', 'status', 'description', 'image', 'created_at']; // можно использовать данную переменную в запросах для того, чтобы указывать конкретные поля базы данных

    public function getNews(): array
    {
        return \DB::table($this->table)
            ->select($this->availableFields)
            ->get()
            ->toArray();
    }

    public function getNewsById(int $id)
    {
        return \DB::table($this->table)->find($id, $this->availableFields);
    }

    public function category(): BelongsTo
    {
        return$this->belongsTo(Category::class, "category_id", 'id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
