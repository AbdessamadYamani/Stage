<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class agent extends Model
{
    use HasFactory;

    protected $table = 'agent';
    protected $primaryKey = 'id_Agent';
    protected $fillable = ['Fullname', 'Direction','EmailAdd', 'created_at'];

    // Relationships
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'id_Agent', 'id_Agent');
    }
    public $timestamps = false;

}
