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

    public function scopeFilter($query, $filter){
        $query->when($filter['search']??false, function($query, $search){
            $query->where(function($query) use ($search){
                $query->where('title', 'LIKE' ,'%'.request('search').'%')
                ->orWhere('body', 'LIKE', '%'.request('search').'%');
            });
        });
        $query->when($filter['category']??false, function($query, $slug){
           $query->whereHas('category', function ($query) use ($slug){
            $query->where('slug', $slug);
           });
        });
        $query->when($filter['author']??false, function($query, $username){
            $query->whereHas('author', function ($query) use ($username){
             $query->where('username', $username);
            });
         });
    }

    public function author(){
        //belogsTo hasMany hasOne
        return $this->belongsTo(User::class, 'user_id');
    }
}