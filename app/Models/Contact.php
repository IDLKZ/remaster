<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Contact
 * @package App\Models
 * @version December 30, 2020, 8:53 am UTC
 *
 * @property string $phone
 * @property string $telegram
 * @property string $instagram
 * @property string $facebook
 * @property string $youtube
 * @property string $email
 */
class Contact extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'contacts';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = [''];



    public $fillable = [
        'phone',
        'telegram',
        'instagram',
        'facebook',
        'youtube',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'phone' => 'string',
        'telegram' => 'string',
        'instagram' => 'string',
        'facebook' => 'string',
        'youtube' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'phone' => 'required|string|max:255',
        'telegram' => 'nullable|string|max:255',
        'instagram' => 'nullable|string|max:255',
        'facebook' => 'nullable|string|max:255',
        'youtube' => 'nullable|string|max:255',
        'email' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
