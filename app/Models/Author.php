<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'mst_author';
    protected $primaryKey = 'author_id';
    
    const CREATED_AT = 'input_date';
    const UPDATED_AT = 'last_update';

    protected $guarded = ['author_id'];

    public function biblios()
    {
        return $this->belongsToMany(Biblio::class, 'biblio_author', 'author_id', 'biblio_id')->withPivot('level');
    }
}
