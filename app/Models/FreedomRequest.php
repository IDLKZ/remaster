<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class FreedomRequest
 * @package App\Models
 * @version February 25, 2024, 7:55 am UTC
 *
 * @property string $iin
 * @property string $mobile_phone
 * @property string $verification_sms_code
 * @property string $email
 * @property string $product
 * @property string $period
 * @property string $principal
 * @property string $uuid
 * @property boolean $is_success
 */
class FreedomRequest extends Model
{

    use HasFactory;

    public $table = 'freedom_requests';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = [''];



    public $fillable = [
        'iin',
        'mobile_phone',
        'verification_sms_code',
        'email',
        'product',
        'period',
        'principal',
        'uuid',
        'is_success'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'iin' => 'string',
        'mobile_phone' => 'string',
        'verification_sms_code' => 'string',
        'email' => 'string',
        'product' => 'string',
        'period' => 'string',
        'principal' => 'string',
        'uuid' => 'string',
        'is_success' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'iin' => 'nullable|string',
        'mobile_phone' => 'nullable|string',
        'verification_sms_code' => 'nullable|string',
        'email' => 'nullable|string',
        'product' => 'nullable|string',
        'period' => 'nullable|string',
        'principal' => 'nullable|string',
        'uuid' => 'nullable|string',
        'is_success' => 'required|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
