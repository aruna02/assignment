<?php

namespace App\Modules\Assignments\Entities;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
     const FILE_PATH = '/uploads/assignments/';
    protected $fillable = [
    	'class',
        'section',
        'session',
        'title',
        'description',
        'subject',
        'docs',
        'created_by',
        'submission_date',
    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }
}
