<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    protected $table = 'mst_publisher';
    protected $primaryKey = 'publisher_id';
    
    const CREATED_AT = 'input_date';
    const UPDATED_AT = 'last_update';

    protected $guarded = ['publisher_id'];

    public function biblios()
    {
        return $this->hasMany(Biblio::class, 'publisher_id', 'publisher_id');
    }
}
