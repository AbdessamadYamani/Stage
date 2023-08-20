<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_operation
 * @property string $date_saisie
 * @property integer $id_user
 * @property integer $id_document
 * @property string $type
 */
class operation extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'operation';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_operation';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['date_saisie', 'id_user', 'id_document', 'type'];
}
