<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    protected $table = 'product_image_gallery';
    use HasFactory;

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
