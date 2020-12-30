<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use QCod\ImageUp\HasImageUploads;

/**
 * Class Service
 * @package App\Models
 * @version December 30, 2020, 7:05 am UTC
 *
 * @property string $title
 * @property string $description
 * @property string $price
 * @property string $img
 */
class Service extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'services';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = [''];



    public $fillable = [
        'title',
        'description',
        'price',
        'img'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'price' => 'string',
        'img' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|string|max:255',
        'img' => 'nullable|image',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];
    use HasImageUploads;

    // assuming `users` table has 'cover', 'avatar' columns
    // mark all the columns as image fields
    protected static $imageFields = [
        'img' => [
            // what disk you want to upload, default config('imageup.upload_disk')
            'disk' => 'local',

            // a folder path on the above disk, default config('imageup.upload_directory')
            'path' => 'uploads',
        ]
    ];

    public function add($request)
    {
        $service = new self();
        $service->title = $request['title'];
        $service->description = $request['description'];
        $service->price = $request['price'];
        if ($request->hasFile('img')) {
            $service->uploadImage($request->file('img', 'img'));
        }
        $service->save();
        return $service;
    }

    public function updateInfo($service, $request)
    {
        $service->title = $request['title'];
        $service->description = $request['description'];
        $service->price = $request['price'];
        if ($request->hasFile('img')) {
            $service->uploadImage($request->file('img', 'img'));
        }
        $service->save();
        return $service;
    }

}
