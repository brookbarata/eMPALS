<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliceVolunteerFoundPerson extends Model
{
    use HasFactory;

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
