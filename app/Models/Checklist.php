<?php

namespace App\Models;

use App\Traits\UseUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    use HasFactory, UseUUID;

    protected $table = 'checklist';

    protected $fillable = [
        'title',
        'description'
    ];
}
