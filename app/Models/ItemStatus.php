<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemStatus extends Model
{
    use HasFactory;

    protected $table = 'mst_item_status';
    protected $primaryKey = 'item_status_id';
    public $incrementing = false; // it's char(3)
    protected $keyType = 'string';
    
    const CREATED_AT = 'input_date';
    const UPDATED_AT = 'last_update';

    protected $guarded = ['item_status_id'];
}
