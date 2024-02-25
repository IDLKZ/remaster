<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class FreedomResponse
 * @package App\Models
 * @version February 25, 2024, 8:08 am UTC
 *
 * @property string $data
 * @property boolean $success
 */
class FreedomResponse extends Model
{

    use HasFactory;

    public $table = 'freedom_responses';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = [''];



    public $fillable = [
        'data',
        'success'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'data' => 'string',
        'success' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'data' => 'required|string',
        'success' => 'nullable|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
