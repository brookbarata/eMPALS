<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliceVolunteerMissingPerson extends Model
{
    use HasFactory;
    

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
