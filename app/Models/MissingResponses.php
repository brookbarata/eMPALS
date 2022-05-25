<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissingResponses extends Model
{
    use HasFactory;
    public $table = 'missing_responses';
    protected $primarykey = 'id';
    protected $fillable = ['user_id','police_id','missing_id','relation','address','circumstances'];
}