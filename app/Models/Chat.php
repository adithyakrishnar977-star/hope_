<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    const UPDATED_AT = null; 
    const UPDATED_BY = null; 
   /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'therapist_id',
        'patient_id',
        'chat_content',              
        'created_at',
        'created_by',
    ];

        public function therapist()
    {
        return $this->belongsTo(User::class, 'therapist_id');
    }

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
