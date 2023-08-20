<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_auteur
 * @property string $nom
 * @property string $prenom
 * @property string $nationalite
 * @property string $date_naissance
 * @property string $date_deces
 * @property string $biographie
 */
class auteur extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'auteur';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_auteur';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['nom', 'prenom', 'nationalite', 'date_naissance', 'date_deces', 'biographie'];
}
