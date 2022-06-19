<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class IngredientsUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ingredient_id',
        'amount',
        'unit',
        'date',
        'added_at',
    ];
    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()
            ->where('ingredients.name', 'like', '%'.$search.'%');
    }
}
