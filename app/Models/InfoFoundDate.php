<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoFoundDate extends Model
{
    use HasFactory;
    public $table = 'info_found_date';
    protected $primarykey = 'id';
    protected $fillable = ['date','city','sub_city','clothe','glass','shoes','health_condition','medical_problem'];
   
    public function found()
    {
        return $this->belongsTo(Found::class);
    }
    public function PoliceFound(){
        return $this->belongsTo(PoliceVolunteerFoundPerson::class);
    }
}
