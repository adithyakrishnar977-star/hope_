<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'therapist_id',
        'patient_id',
        'app_date',
        'app_from',
        'app_to',
        'type',
        'fees',
        'status',        
        'created_by',
    ];
}
