<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_periodique
 * @property string $Numero_Edition
 * @property string $Date_Edition
 * @property string $Collection
 * @property string $Theme
 * @property string $Annee
 * @property string $Titre
 * @property string $Auteur
 * @property string $Langue
 * @property string $ISSN
 * @property string $Cote
 * @property string $Nombre_Exemplaire
 * @property string $Edition_MMSP
 * @property string $Nouvelle_Aq
 * @property string $Collation
 */

class Periodique extends Model
{
    use HasFactory;

    protected $table = 'periodique';
    protected $primaryKey = 'id_periodique';
    protected $fillable = [
        'Numero_Edition',
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
        'Collation',
    ];

    // Relationships
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'id_Periodique', 'id_periodique');
    }
}

