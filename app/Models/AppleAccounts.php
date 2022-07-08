<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppleAccounts extends Model
{
    use HasFactory;

    protected $fillable = [
        'appleID',
        'email',
        'name',
    ];
}
