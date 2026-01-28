<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'item';
    protected $primaryKey = 'item_id';
    
    // Schema says: input_date (datetime) NOT NULL, last_update (datetime) YES
    const CREATED_AT = 'input_date';
    const UPDATED_AT = 'last_update';

    public function getDateFormat()
    {
        return 'Y-m-d';
    }

    protected $guarded = ['item_id'];

    public function biblio()
    {
        return $this->belongsTo(Biblio::class, 'biblio_id', 'biblio_id');
    }

    public function status()
    {
        return $this->belongsTo(ItemStatus::class, 'item_status_id', 'item_status_id');
    }
}
