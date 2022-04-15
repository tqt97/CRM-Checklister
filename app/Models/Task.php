<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'checklist_id','position'];

    public function checklist()
    {
        return $this->belongsTo(Checklist::class);
    }
}
