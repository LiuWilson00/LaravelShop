<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $fillable = ['name', 'image_url', 'price'];

    use HasFactory;
    private $procutTagName = 'product_tag';
    public function category()
    {
        // return DB::table('categories')->where('id', $this->category_id)->first();
        return @$this->belongsTo(Category::class) ?: "Default";
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, $this->procutTagName)
            ->using(ProductTag::class)
            ->withPivot(['enabled'])
            ->withTimestamps();
    }
    public function categoriesList()
    {
        $categories = [];
        $tmp = $this->category;

        while (!is_null($tmp)) {
            array_unshift($categories, $tmp);
            $tmp = $tmp->parent;
        }
        return $categories;
    }

    public function enabledRelatedTags()
    {
        return $this->belongsToMany(Tag::class, $this->procutTagName)
            ->using(ProductTag::class)
            ->withPivot(['enabled', 'order_index'])
            ->withTimestamps()
            ->wherePivot('enabled', true)
            ->orderByPivot('order_index');
    }
}
