<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_direction
 * @property string $libelle_direction
 */
class direction extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'direction';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_direction';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['libelle_direction'];
}
