<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //   Guarded geeft aan dat alles mag worden mass assigned behalfe wat in de array word gezet.
    //   Fillable geeft aan dat niks mag worden mass assigned behalfe wat in de array word gezet.
      protected $guarded = [];
//    protected $fillable = ['title', 'excerpt', 'body'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
