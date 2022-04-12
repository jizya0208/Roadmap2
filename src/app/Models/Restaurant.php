<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


// class Restaurant extends Model
class Restaurant extends Authenticatable
{
    use HasFactory;
    /**
     * ブログポストのコメントを取得
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'image_id',
        'description',
        'address',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // protected $fillable = ['name','price','number']; //　保存したいカラム名をホワイトリストに登録
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getReviews()
    {
        return $this
            ->find(1)
            ->reviews()
            ->get();
    }

}

