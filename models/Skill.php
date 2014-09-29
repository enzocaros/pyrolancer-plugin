<?php namespace Responsiv\Pyrolancer\Models;

use Model;

/**
 * Skill Model
 */
class Skill extends Model
{

    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'responsiv_pyrolancer_skills';

    /**
     * @var array Guarded fields
     */
    protected $guarded = [];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /*
     * Validation
     */
    public $rules = [
        'name' => 'required',
        'category' => 'required',
    ];

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'category' => ['Responsiv\Pyrolancer\Models\SkillCategory', 'foreignKey' => 'category_id']
    ];

}