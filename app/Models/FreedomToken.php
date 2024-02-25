<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class FreedomToken
 * @package App\Models
 * @version February 25, 2024, 8:07 am UTC
 *
 * @property string $refresh_token
 * @property string $access_token
 */
class FreedomToken extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'freedom_tokens';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = [''];



    public $fillable = [
        'refresh_token',
        'access_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'refresh_token' => 'string',
        'access_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'refresh_token' => 'required|string',
        'access_token' => 'required|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
