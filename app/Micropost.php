<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = ['content', 'user_id'];

    public function user()
    {
        // Micropostのインスタンスが所属している唯一のUserを取得
        return $this->belongsTo(User::class);
    }
}
