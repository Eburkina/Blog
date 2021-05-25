<?php

namespace Eburkina\Blog\Models;

use Eburkina\Blog\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
  //  protected $table = 'categories';
    protected $primaryKey = 'uuid';
    use UsesUuid;

    protected $fillable = [
        'uuid',
        'titre',
    ];
    public function actualites()
    {
        return $this->hasMany(Actualite::class,'uuid','uuid');
    }
   
}
