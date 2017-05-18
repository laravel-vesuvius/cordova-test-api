<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
    /**
     * @inheritdoc
     */
    protected $fillable = [
        'lat',
        'lng',
        'user_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
