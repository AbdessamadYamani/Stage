<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservation';
    protected $primaryKey = 'Revervation_id';
    protected $fillable = ['id_Periodique', 'id_Agent', 'Date_reservation'];
    

    // Relationships
    public function periodique()
    {
        return $this->belongsTo(Periodique::class, 'id_Periodique', 'id_periodique');
    }
    public function livre()
    {
        return $this->belongsTo(Livre::class, 'id_Periodique', 'id_Livre');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'id_Agent', 'id_Agent');
    }
    public function preter()
    {
        return $this->hasOne(Preter::class, 'id_reserver', 'Revervation_id');
    }
}
