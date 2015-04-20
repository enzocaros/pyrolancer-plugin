<?php namespace Ahoy\Pyrolancer\Models;

use Model;

/**
 * Skill Model
 */
class Skill extends Model
{

    use \October\Rain\Database\Traits\Sluggable;
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'ahoy_pyrolancer_skills';

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
     * @var array List of attributes to automatically generate unique URL names (slugs) for.
     */
    protected $slugs = ['slug' => 'name'];

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'category' => ['Ahoy\Pyrolancer\Models\SkillCategory', 'foreignKey' => 'category_id']
    ];

    public function scopeIsVisible($query)
    {
        return $query
            ->whereNotNull('is_visible')
            ->where('is_visible', '=', 1)
        ;
    }

}