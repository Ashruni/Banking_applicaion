<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAmountDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'uid',
        'deposit',
        'withdraw',
        'email',
        'transfer'


    ];


}
