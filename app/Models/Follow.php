<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = ['follower_id', 'redactor_id'];

    public function follower()
    {
        return $this->belongsTo(User::class, 'follower_id');
    }

    public function redactor()
    {
        return $this->belongsTo(User::class, 'redactor_id');
    }
}
