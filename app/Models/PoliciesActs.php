<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliciesActs extends Model
{
    use HasFactory;
    protected $table = 'policies_acts';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title', 'marathi_title', 'english_description', 'marathi_description', 'english_pdf', 'marathi_pdf'];
}

