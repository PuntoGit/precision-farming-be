<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anagrafica extends Model
{
    use HasFactory;

    protected $fillable = ['cognome', 'nome', 'denominazione', 'indirizzo', 'citta', 'cap', 'prov', 'paese', 'cellulare', 'telefono', 'tipologia_persona', 'attivita_lavorativa', 'codice_destinatario_sdi', 'partita_iva', 'c_f', 'email', 'pec', 'note', 'responsabile_del_trattamento'];
}
