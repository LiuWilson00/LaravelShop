<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $fillable = ['name', 'image_url', 'price'];

    use HasFactory;
    public function category()
    {
        // return DB::table('categories')->where('id', $this->category_id)->first();
        return $this->belongsTo(Category::class);
    }
}
