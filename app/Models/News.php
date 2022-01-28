<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNews(): array
    {
//        return DB::select("SELECT id, title, slug, description, author, status FROM {$this->table}");
        return DB::table($this->table)
            ->select(['id', 'title', 'slug', 'description', 'author', 'status'])
            ->get()
            ->toArray();

    }

    public function getNewsById(int $id)
    {
//        return DB::select("SELECT id, title, slug, description, author, status FROM {$this->table} WHERE id = :id", ['id' => $id]);
        return DB::table($this->table)->find($id);

    }

}
