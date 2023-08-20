<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_editeur
 * @property string $nom
 * @property string $adresse
 * @property string $email
 * @property string $telephone
 */
class editeur extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'editeur';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_editeur';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['nom', 'adresse', 'email', 'telephone'];
}
