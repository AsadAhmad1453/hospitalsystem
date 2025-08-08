<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;
    protected $table = 'medical_records';
    protected $guarded = [];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }


    public function extension()
    {
        return strtolower(pathinfo($this->report_file, PATHINFO_EXTENSION));
    }

    public function isPdf()
    {
        return $this->extension() === 'pdf';
    }

    public function isDoc()
    {
        return in_array($this->extension(), ['doc', 'docx']);
    }

    public function isImage()
    {
        return in_array($this->extension(), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp']);
    }

    public function fileUrl()
    {
        return asset($this->report_file);
    }

    public function modalId($index)
    {
        return 'imageModal' . $index;
    }


}
