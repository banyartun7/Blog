<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = ['id']; // id ko ignore loke
    //protected $fillable = ['title', 'intro', 'body'];
    protected $with = ['author', 'category'];
    public function category(){
        //belogsTo hasMany hasOne
        return $this->belongsTo(Category::class);
    }

    public function author(){
        //belogsTo hasMany hasOne
        return $this->belongsTo(User::class, 'user_id');
    }
}