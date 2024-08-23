<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttivitaColturali extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'farm_id', 'codice', 'inizio', 'fine', 'durata', 'ora_di_inizio', 'stato', 'nascondi', 'descrizione', 'nome_processo', 'lotto_di_campo', 'area_lavorata', 'litri_per_ettaro', 'volume_acqua_utilizzata', 'aggiungi_i_prodotti', 'prodotto_utilizzato', 'quantià_utilizzata', 'gg', 'h_gg', 'macchinari_utilizzati', 'operai_o_addetti'];
}
