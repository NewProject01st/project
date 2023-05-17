<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $table = 'test';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title','marathi_title','english_description','marathi_description','english_image','marathi_image'];
}
