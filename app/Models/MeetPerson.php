<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetPerson extends Model
{
    use HasFactory;

    public $table='meet_person';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function police()
    {
        return $this->belongsTo(PoliceVolunteer::class);
    }
}
