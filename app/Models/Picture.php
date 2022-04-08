<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Picture
 * @package App\Models
 */
class Picture extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title','description','image', 'user_id'
    ];

    /**
     * @var string[]
     */
    protected $with = [
        'user'
    ];


    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function likes(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
