<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $table = 'content';
    protected $primaryKey = 'content_id';
    
    // SLiMS uses input_date and last_update
    const CREATED_AT = 'input_date';
    const UPDATED_AT = 'last_update';

    protected $guarded = ['content_id'];
}
