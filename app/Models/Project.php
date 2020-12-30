<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use QCod\ImageUp\HasImageUploads;

/**
 * Class Project
 * @package App\Models
 * @version December 30, 2020, 7:54 am UTC
 *
 * @property string $title
 * @property string $img
 * @property string $description
 */
class Project extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'projects';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = [''];



    public $fillable = [
        'title',
        'img',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'img' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:255',
        'img' => 'nullable|image',
        'description' => 'required|string',
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
        $projects = new self();
        $projects->title = $request['title'];
        $projects->description = $request['description'];
        if ($request->hasFile('img')) {
            $projects->uploadImage($request->file('img', 'img'));
        }
        $projects->save();
        return $projects;
    }

    public function updateInfo($projects, $request)
    {
        $projects->title = $request['title'];
        $projects->description = $request['description'];
        if ($request->hasFile('img')) {
            $projects->uploadImage($request->file('img', 'img'));
        }
        $projects->save();
        return $projects;
    }
}
