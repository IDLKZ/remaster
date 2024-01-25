<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreedomResponse extends Model
{

    use HasFactory;

    public $table = 'freedom_requests';
    public $timestamps = true;
    public $fillable = [
        "data",
        "success"
    ];

    protected $casts = [
        'id' => 'integer',
        'data' => 'json',
        'success' => 'boolean',
    ];
}
