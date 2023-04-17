<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenders extends Model
{
    use HasFactory;
    protected $table = 'tenders';
    protected $primaryKey = 'id';
    protected $fillable = ['tender_date','english_title', 'marathi_title', 'english_description', 'marathi_description','start_date','end_date','open_date','tender_number', 'tender_pdf'];
}
