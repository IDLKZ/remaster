<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use QCod\ImageUp\HasImageUploads;

/**
 * Class Main
 * @package App\Models
 * @version December 29, 2020, 5:37 pm UTC
 *
 * @property string $title
 * @property string $subtitle
 * @property string $background
 */
class Main extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'mains';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    use HasImageUploads;

    // assuming `users` table has 'cover', 'avatar' columns
    // mark all the columns as image fields
    protected static $imageFields = [
        'background' => [
            // what disk you want to upload, default config('imageup.upload_disk')
            'disk' => 'local',

            // a folder path on the above disk, default config('imageup.upload_directory')
            'path' => 'uploads',
        ]
    ];


    public $fillable = [
        'title',
        'subtitle',
        'background'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'subtitle' => 'string',
        'background' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:255',
        'subtitle' => 'nullable|string|max:255',
        'background' => 'nullable|image',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function add($request)
    {
        $main = new self();
        $main->title = $request['title'];
        $main->subtitle = $request['subtitle'];
        if ($request->hasFile('background')) {
            $main->uploadImage($request->file('background', 'background'));
        }
        $main->save();

        return $main;
    }

    public function updateInfo($main, $request)
    {
        $main->title = $request['title'];
        $main->subtitle = $request['subtitle'];
        if ($request->hasFile('background')) {
            $main->uploadImage($request->file('background', 'background'));
        }
        $main->save();

        return $main;
    }
}
