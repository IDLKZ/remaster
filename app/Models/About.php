<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class About
 * @package App\Models
 * @version December 29, 2020, 7:21 pm UTC
 *
 * @property string $title
 * @property string $subtitle
 * @property integer $skill
 * @property string $skill_title
 * @property integer $projects
 * @property string $projects_title
 * @property string $warranty
 * @property string $warranty_title
 */
class About extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'abouts';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = [''];



    public $fillable = [
        'title',
        'subtitle',
        'skill',
        'skill_title',
        'projects',
        'projects_title',
        'warranty',
        'warranty_title'
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
        'skill' => 'integer',
        'skill_title' => 'string',
        'projects' => 'integer',
        'projects_title' => 'string',
        'warranty' => 'string',
        'warranty_title' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:255',
        'subtitle' => 'nullable|string|max:255',
        'skill' => 'required|integer',
        'skill_title' => 'required|string|max:255',
        'projects' => 'required|integer',
        'projects_title' => 'required|string|max:255',
        'warranty' => 'required|string|max:255',
        'warranty_title' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
