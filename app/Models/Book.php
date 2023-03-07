<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    protected $fillable = ['judul', 'pengarang', 'penerbit', 'image'];

    public function getImageAttribute($value)
    {
        if ($value) {
            return asset('storage/' . $value);
        } else {
            return asset('img/no-image.png');
        }
    }
}
