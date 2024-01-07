<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreedomToken extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'freedom_tokens';
    public $timestamps = true;
    public $fillable = [
        'refresh_token',
        'access_token',
    ];
}
