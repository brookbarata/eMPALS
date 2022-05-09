<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoMissingDate extends Model
{

    use HasFactory;


    public $table = 'info_missing_date';
    protected $primarykey = 'id';
    protected $fillable = ['date','city','sub_city','skin_color','clothe','glass','shoes','health_condition','medical_problem'];
   

    public function missing()
    {
        return $this->belongsTo(Missing::class);
    }
    public function police_missing(){

        return $this->belongsTo(PoliceVolunteerMissingPerson::class, 'missing_id');
    }
}
