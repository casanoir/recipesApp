<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class FavoriteRecipes extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'recipe_id'
    ];

    public function likes()
    {
        return $this->belongsToMany(User::class,'favorite_recipes');
    }

}
