<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $table = 'mst_place';
    protected $primaryKey = 'place_id';
    
    const CREATED_AT = 'input_date';
    const UPDATED_AT = 'last_update';

    protected $guarded = ['place_id'];
    
    public function getDateFormat()
    {
        return 'Y-m-d';
    }
}
