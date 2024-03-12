<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAmountDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'deposit',
        'withdraw',
        'email',
        'transfer',
        'field'

    ];


}
