<?php namespace Dimsog\Comments\Models;

use Illuminate\Database\Eloquent\Collection;
use Model;

/**
 * Comment Model
 * @property int $id
 * @property int $user_id
 * @property int $group_id
 * @property int $parent_id
 * @property string $user_name
 * @property string $user_email
 * @property string $comment
 * @property int $active
 */
class Comment extends Model
{
    use \Winter\Storm\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'dimsog_comments';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $hasOneThrough = [];
    public $hasManyThrough = [];
    public $belongsTo = [
        'group' => [CommentGroup::class]
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];


    public static function findCommentsFromGroupId(int $groupId, bool $onlyActive = false): Collection
    {
        $query = static::where('group_id', $groupId);
        if ($onlyActive) {
            $query->where('active', 1);
        }
        return $query
            ->orderBy('id')
            ->get();
    }
}
