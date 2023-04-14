<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstitutionHistoryModel extends Model
{
    use HasFactory;

    protected $table = 'constitution_history';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title', 'marathi_title', 'english_description', 'marathi_description'];
}
