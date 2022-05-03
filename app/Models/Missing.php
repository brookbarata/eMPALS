<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Missing extends Model
{
    use HasFactory;

    protected $table = 'missing_person';
    protected $primarykey = 'id';
    protected $fillable = ['user_id','police_id','fname','mname','lname','age', 'gender', 'brith_place','nick_name','height','weight','region','city','sub_city','street_name','house_no','special_description','photo','confirmed'];
    //,'date','location','clothe','glass','shoes','health_condition','medical_problem','verfied'


    public function info_missing_date(){
        return $this->hasOne(InfoMissingDate::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function police()
    {
        return $this->belongsTo(PoliceVolunteer::class);
    }
}
