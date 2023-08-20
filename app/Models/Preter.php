<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_preter
 * @property integer $id_reserver
 * @property string $date_Empruntant
 * @property integer $Nomber_jours
 * @property Reserver $reserver
 */
class Preter extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'preter';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_preter';

    /**
     * @var array
     */
    protected $fillable = ['id_reserver', 'date_Empruntant', 'Nomber_jours','Type'];

    /**
     * Get the associated Reserver record.
     */
    
     public function reservation()
     {
         return $this->belongsTo(Reservation::class, 'id_reserver', 'Revervation_id');
     }
    public $timestamps = false;
}
