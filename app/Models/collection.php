<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_collection
 * @property string $nom
 * @property string $description
 */
class collection extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'collection';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_collection';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['nom', 'description'];
}
