<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoundResponses extends Model
{
    use HasFactory;

    public $table = 'found_responses';
    protected $primarykey = 'id';
    protected $fillable = ['user_id','police_id','found_id','relation','address','circumstances'];
}
