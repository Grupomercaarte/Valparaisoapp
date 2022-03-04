<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'last_name',
        'second_last_name',
        'phone',
        'email',
        'rfc',
        'curp',
        'date',
        'address_id',
        'office_id'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class,'address_id');
    }

    public function office()
    {
        return $this->belongsTo(Office::class,'office_id');
    }
}
