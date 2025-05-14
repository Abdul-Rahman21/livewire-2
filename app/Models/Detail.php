<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'key', 'value', 'icon', 'status', 'type', 'user_id'
    ];

     /**
     * Get the user that owns the details.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
