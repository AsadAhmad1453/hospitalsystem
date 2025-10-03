<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Form extends Model
{
    use HasFactory;
    protected $table = 'forms';
    protected $guarded = [];


    public function questions()
    {
        return $this->hasMany(Question::class, 'form_id');
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class, 'form_sections', 'form_id', 'section_id');
    }

    /**
     * Clear dashboard cache when form data changes
     */
    protected static function boot()
    {
        parent::boot();
        
        static::created(function () {
            Cache::forget('dashboard_stats');
        });
        
        static::updated(function () {
            Cache::forget('dashboard_stats');
        });
        
        static::deleted(function () {
            Cache::forget('dashboard_stats');
        });
    }
}
