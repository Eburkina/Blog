<?php

namespace Eburkina\Blog\Models;

use Eburkina\Blog\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Actualite extends Model
{
    use HasFactory;
    use UsesUuid;

    protected $table = 'actualites';
    protected $primaryKey = 'uuid';

    protected $fillable = [
        'uuid',
        'category_id',
        'nombre_lus',
        'titre',
        'body',
        'image_couverture',
        'auteur',
        'tags',
    ];
    public function categorie()
    {
        return $this->belongsTo(Category::class,'category_id','uuid');
    }

}
