<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_document
 * @property string $lang
 * @property string $categorie
 * @property string $theme
 * @property integer $id_periodique
 * @property string $auteur
 * @property integer $annee_edition
 * @property string $volume
 * @property string $maison_edition
 * @property string $preface
 * @property string $table_matieres
 * @property string $cote
 * @property string $resume
 * @property integer $nombre_exemplaires
 * @property integer $annee_publication
 * @property string $titre
 * @property integer $id_enregistrement
 * @property string $collection
 * @property string $editeur
 * @property string $collation
 * @property string $isbn
 * @property string $edition_mmsp
 * @property string $edition
 * @property string $issn
 * @property string $volume_aquisition
 */
class Document extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'document';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_document';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['lang', 'categorie', 'theme', 'id_periodique', 'auteur', 'annee_edition', 'volume', 'maison_edition', 'preface', 'table_matieres', 'cote', 'resume', 'nombre_exemplaires', 'annee_publication', 'titre', 'id_enregistrement', 'collection', 'editeur', 'collation', 'isbn', 'edition_mmsp', 'edition', 'issn', 'volume_aquisition'];
}
