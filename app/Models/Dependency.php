<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependency extends Model
{
    use HasFactory;
    
    protected $table = 'dependencies';
    protected $guarded = [];

    // Relationships
    public function option()
    {
        return $this->belongsTo(Option::class, 'option_id');
    }

    public function relatedQuestion()
    {
        return $this->belongsTo(Question::class, 'dependent_question_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
