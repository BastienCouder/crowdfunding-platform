<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'user_id', 'title', 'description', 'goal_amount', 'current_amount',
        'start_date', 'end_date', 'status', 'category_id','is_draft'
    ];

    protected $dates = ['end_date'];

    protected $casts = [
        'end_date' => 'datetime',
    ];

    // Relation avec les images du projet
    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function contributions()
    {
        return $this->hasMany(Contribution::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}