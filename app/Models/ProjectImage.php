<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProjectImage extends Model
{
    protected $fillable = ['project_id', 'image_url', 'mime_type', 'is_main', 'image_data'];
    
    protected $appends = ['image_src'];

    

    protected static function booted()
    {
        static::deleted(function ($image) {
            // Supprime le fichier physique lorsque l'image est supprimée de la base
            Storage::disk('public')->delete($image->image_url);
        });
    }

      public function project()
    {
        return $this->belongsTo(Project::class);
    }
    // Accesseur pour obtenir l'URL des données base64
    public function getImageSrcAttribute()
    {
        if ($this->image_data) {
            return 'data:' . $this->mime_type . ';base64,' . $this->image_data;
        }
        return $this->image_url; // Retourne l'URL normale si image_data n'existe pas
    }
}