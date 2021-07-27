<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Models
 */
class Category extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
{
    return $this->hasMany(Category::class, 'parent_id');
}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * @param $query
     * @param string $slug
     * @return mixed
     */
    public function scopeWhereSlug($query, string $slug)
    {
        return $query->where('slug', $slug);
    }

    /**
     * @param $query
     * @param string $slug
     * @return mixed
     */
    public function scopeWhereProducts($query, string $slug)
    {
        return $query->where('slug', $slug);
    }
}
