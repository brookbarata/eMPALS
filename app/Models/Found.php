<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Found extends Model
{
    use HasFactory;
    public $table = 'found_person';
    protected $primarykey = 'id';
    protected $fillable = ['fname','mname','lname','age', 'gender','height','weight','region','city','sub_city','street_name','house_no','special_description','photo','confirmed'];

    public function info_found_date(){
        return $this->hasOne(InfoFoundDate::class);
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

