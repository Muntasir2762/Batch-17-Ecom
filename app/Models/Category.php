<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subCategory ()
    {
        return $this->hasMany(SubCategory::class, 'cat_id', 'id');
    }

    public function product ()
    {
        return $this->hasMany(Product::class, 'cat_id', 'id');
    }
}

// Category hasMany Product

// belongsTo 
// hasMany 


// Category HasMany subCategory






// BelongsTo
// HasMany



// Rahim => Employee
// Karim => Employee


// Rafiq => Manager


// Hair Oil => SubCategory
// Medical Device => SubCategory

// Healt & Beauty => Category
