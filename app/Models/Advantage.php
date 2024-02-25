<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use QCod\ImageUp\HasImageUploads;

/**
 * Class Advantage
 * @package App\Models
 * @version February 25, 2024, 6:42 am UTC
 *
 * @property string $title
 * @property string $sub_title
 * @property string $image_url
 */
class Advantage extends Model
{
    use HasImageUploads;

    use HasFactory;

    public $table = 'advantages';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = [''];



    public $fillable = [
        'title',
        'sub_title',
        'image_url'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'sub_title' => 'string',
        'image_url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string',
        'sub_title' => 'required|string',
        'image_url' => 'required|file|image',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];
    public static $updateRules = [
        'title' => 'required|string',
        'sub_title' => 'required|string',
        'image_url' => 'sometimes|nullable|file|image',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    protected static $imageFields = [
        'image_url' => [
            // what disk you want to upload, default config('imageup.upload_disk')
            'disk' => 'local',

            // a folder path on the above disk, default config('imageup.upload_directory')
            'path' => 'uploads',
        ]
    ];


    public static function add($request)
    {
        $advantage = new self();
        $advantage->title = $request['title'];
        $advantage->sub_title = $request['sub_title'];
        if ($request->hasFile('image_url')) {
            $advantage->uploadImage($request->file('image_url', 'image_url'));
        }
        $advantage->save();
        return $advantage;
    }

    public static function updateInfo($advantage, $request)
    {
        $advantage->title = $request['title'];
        $advantage->sub_title = $request['sub_title'];
        if ($request->hasFile('image_url')) {
            $advantage->uploadImage($request->file('image_url', 'image_url'));
        }
        $advantage->save();
        return $advantage;
    }


}
