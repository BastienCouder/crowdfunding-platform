<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    protected $fillable = ['project_id', 'image_data', 'mime_type', 'is_main'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // Accesseur pour obtenir l'URL des données base64
    public function getImageSrcAttribute()
    {
        return 'data:' . $this->mime_type . ';base64,' . $this->image_data;
    }
}