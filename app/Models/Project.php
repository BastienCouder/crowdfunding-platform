<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Project extends Model
{
    protected $fillable = [
        'user_id', 'title', 'description', 'summary', 'goal_amount', 'current_amount',
        'start_date', 'end_date', 'status', 'category_id', 'is_draft', 'risks',
        'video_url', 'funding_tiers', 'faqs'
    ];

    protected $dates = ['start_date', 'end_date'];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_draft' => 'boolean',
        'funding_tiers' => 'array',
        'faqs' => 'array',
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

    public function commentsCount()
    {
        return $this->comments()->count();
    }
    // Accesseur pour les paliers de financement
    protected function fundingTiers(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                $tiers = json_decode($value, true) ?? [];
                // Convertir chaque tableau tier en objet stdClass
                return array_map(function($tier) {
                    return (object)$tier;
                }, $tiers);
            },
            set: fn ($value) => is_string($value) ? $value : json_encode($value),
        );
    }

    // Accesseur pour les FAQ
    protected function faqs(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true) ?? [],
            set: fn ($value) => json_encode($value),
        );
    }

    // Vérifie si le projet est actif (non brouillon et date non expirée)
    public function getIsActiveAttribute()
    {
        return !$this->is_draft && $this->end_date > now();
    }

    // Calcule le pourcentage de financement
    public function getFundingPercentageAttribute()
    {
        return ($this->current_amount / $this->goal_amount) * 100;
    }

    public function isActive()
{
    return !$this->is_draft && $this->end_date >= now();
}

public function progressPercentage()
{
    if ($this->goal_amount == 0) return 0;
    return min(100, round(($this->current_amount / $this->goal_amount) * 100));
}

public function daysLeft()
{
    $days = now()->diffInDays($this->end_date, false);
    return number_format(max(0, $days), 0); // Formatage sans décimales
}
}