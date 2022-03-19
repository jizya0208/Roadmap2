<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    /**
     * ブログポストのコメントを取得
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
