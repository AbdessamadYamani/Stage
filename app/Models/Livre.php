<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
   
    use HasFactory;

    protected $table = 'Livre'; // Make sure the table name matches your database table
    protected $primaryKey = 'id_Livre'; // Make sure the primary key matches your database column
    protected $fillable = [ 'Numero_Edition',
    'Date_Edition',
    'Collection',
    'Theme',
    'Annee',
    'Titre',
    'Auteur',
    'Langue',
    'ISSN',
    'Cote',
    'Nombre_Exemplaire',
    'Edition_MMSP',
    'Nouvelle_Aq',
    'Collation',];

    // Relationships
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'id_Periodique', 'id_Livre');
    }
    public $timestamps = false;

}
