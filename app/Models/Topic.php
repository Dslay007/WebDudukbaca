<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $table = 'mst_topic';
    protected $primaryKey = 'topic_id';
    
    const CREATED_AT = 'input_date';
    const UPDATED_AT = 'last_update';

    protected $guarded = ['topic_id'];
}
