<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class SmsVerification extends Model
{

    use HasFactory;

    public $table = 'sms_verification';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = [''];



    public $fillable = [
        'uuid',
        'start_at',
        'expired_at',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'uuid' => 'string',
        'start_at' => 'datetime',
        'expired_at' => 'datetime',
    ];

}
