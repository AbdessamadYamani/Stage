<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emails extends Model
{
    use HasFactory;
    protected $fillable = [ 'subject', 'content', 'receiver_id', 'created_at'];

    public function receiver()
    {
        return $this->belongsTo(Agent::class, 'receiver_id');
    }
    public $timestamps = false;
}
