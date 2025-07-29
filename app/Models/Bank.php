<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Bank extends Model
{
    use HasFactory;
    
    protected $table = 'banks';
    protected $guarded = [];
    
    /**
     * Get the full URL for the bank logo
     */
    public function getLogoUrlAttribute()
    {
        if ($this->bank_logo && Storage::disk('public')->exists($this->bank_logo)) {
            return Storage::disk('public')->url($this->bank_logo);
        }
        
        return null;
    }
    
    /**
     * Check if bank has a logo
     */
    public function hasLogo()
    {
        return !empty($this->bank_logo) && Storage::disk('public')->exists($this->bank_logo);
    }
}
