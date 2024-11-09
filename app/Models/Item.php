<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'type',
        'season',
        'duration_in_minutes',
        'cost_per_meal',
        'detail',
        'link',
    ];

    /**
     * 商品一覧の項目データの取得
     */
    public static function Item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
   /*  protected $hidden = [
    ]; */

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
   /*  protected $casts = [
    ]; */
}
