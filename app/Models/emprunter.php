<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_emprunt
 * @property string $date_commande
 * @property string $date_emprunt
 * @property integer $id_user
 * @property integer $id_document
 */
class emprunter extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'emprunter';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_emprunt';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['date_commande', 'date_emprunt', 'id_user', 'id_document'];
}
