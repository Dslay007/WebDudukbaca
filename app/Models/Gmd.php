<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gmd extends Model
{
    use HasFactory;

    protected $table = 'mst_gmd';
    protected $primaryKey = 'gmd_id';
    
    const CREATED_AT = 'input_date';
    const UPDATED_AT = 'last_update';

    protected $guarded = ['gmd_id'];
}
