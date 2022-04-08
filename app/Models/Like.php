<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Like extends Model
{
    use HasFactory;

    protected $table = 'picture_user';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id','picture_id'
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
}
