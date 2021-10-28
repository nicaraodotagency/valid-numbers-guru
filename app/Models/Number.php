<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    use HasFactory;

    protected $fillable = [
        'number_list_id',
        'number'
    ];

    public function number_list()
    {
        return $this->belongsTo(NumberList::class);
    }
}
