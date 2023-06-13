<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitizenFeedbackSuggestionModal extends Model
{
    use HasFactory;
    protected $table = 'citizen_feedback_suggestion_modals';
    protected $primaryKey = 'id';
    protected $fillable = ['incident', 'location', 'datetime', 'mobile_number', 'media_upload','description'];

}