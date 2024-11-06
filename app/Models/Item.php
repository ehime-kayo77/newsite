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
    ];

    /**
     * 商品一覧の項目データの取得
     */
    public static function Item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * 商品のタイプを取得する
     */

    public function getTypeNameAttribute()
    {
        switch ($this->type) {
            case 1:
                return '主菜';
            case 2:
                return '副菜';
            case 3:
                return '汁物';
            case 4:
                return 'めん類';
            case 5:
                return 'スイーツ';
            case 6:
                return 'その他';
        }
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];
}
