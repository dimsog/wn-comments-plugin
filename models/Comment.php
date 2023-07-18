<?php

declare(strict_types=1);

namespace Dimsog\Comments\Models;

use Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Winter\Storm\Database\Traits\SoftDelete;
use Winter\Storm\Database\Traits\Validation;

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
 * @property bool $is_backend_viewed
 */
final class Comment extends Model
{
    use Validation;
    use SoftDelete;

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
    protected $casts = [
        'is_backend_viewed' => 'boolean'
    ];

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


    public static function findCommentsFromGroupId(int $groupId): Collection
    {
        return static::where('group_id', $groupId)
            ->where('active', 1)
            ->orderBy('id')
            ->get();
    }

    public static function countActiveCommentsByUrl(string $url): int
    {
        return DB::selectOne('
            SELECT COUNT(*) as total
            FROM `dimsog_comments` c
            INNER JOIN `dimsog_comments_groups` g ON g.id = c.group_id
            WHERE g.url = :url AND c.active = 1 AND c.deleted_at is null
        ', [
            ':url' => $url
        ])->total;
    }

    public function markCommentAsBackendViewed(): void
    {
        $this->is_backend_viewed = true;
        $this->save();
    }
}
