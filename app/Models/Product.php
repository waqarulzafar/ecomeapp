<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    public function getProductPictureAttribute(){
      return Storage::url($this->default_picture);
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
