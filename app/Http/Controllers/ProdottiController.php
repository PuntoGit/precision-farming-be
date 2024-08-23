<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Prodotti;
use App\Models\ConcimePercentage;
use App\Models\ConcimeExtra;
use App\Models\Movementi;
use Illuminate\Support\Facades\Auth;

class ProdottiController extends Controller
{
    use ApiResponser;
    public function store(Request $request) {
        $prodotti =  new Prodotti();
        $prodotti->user_id = Auth::user()->id;
        $prodotti->farm_id = Auth::user()->farm_id;
        $prodotti->descrizione = $request->descrizione;
        $prodotti->tipologia = $request->tipologia;
        $prodotti->iva = $request->iva;
        $prodotti->categoria = $request->categoria;
        $prodotti->udm = $request->udm;
        $prodotti->p_netto = $request->p_netto;
        $prodotti->p_lordo = $request->p_lordo;
        $prodotti->note = $request->note;
        $prodotti->magazzino_di_stoccaggio = $request->magazzino_di_stoccaggio;
        $prodotti->giacenza_iniziale = $request->giacenza_iniziale;
        $prodotti->soglia_minima = $request->soglia_minima;
        $prodotti->tipologia_prodotto = $request->tipologia_prodotto;
        $prodotti->autorizzato_biologico = $request->autorizzato_biologico;
        $prodotti->concime_tipologia = $request->concime_tipologia;
        $prodotti->save();
        $prodotti->codice = $prodotti->id;
        $prodotti->nome_prodotto = $prodotti->id."-".$request->nome_prodotto;
        $prodotti->save();

        if(isset($request->concime_percentage)) {
            $concimePercentage = $request->concime_percentage;
            $perfectage = new ConcimePercentage();
            $perfectage->prodotti_id = $prodotti->id;
            $perfectage->azoto = $concimePercentage['azoto'];
            $perfectage->fosforo = $concimePercentage['fosforo'];
            $perfectage->potassio = $concimePercentage['potassio'];
            $perfectage->calcio = $concimePercentage['calcio'];
            $perfectage->magnesio = $concimePercentage['magnesio'];
            $perfectage->zolfo = $concimePercentage['zolfo'];
            $perfectage->save();
        }

        if(isset($request->concime_extras)) {
            $concimeExtras = $request->concime_extras;
            $perfectage = new ConcimeExtra();
            $perfectage->prodotti_id = $prodotti->id;
            $perfectage->ferro = $concimeExtras['ferro'];
            $perfectage->manganese = $concimeExtras['manganese'];
            $perfectage->molibdeno = $concimeExtras['molibdeno'];
            $perfectage->rame = $concimeExtras['rame'];
            $perfectage->boro = $concimeExtras['boro'];
            $perfectage->zinco = $concimeExtras['zinco'];
            $perfectage->nichel = $concimeExtras['nichel'];
            $perfectage->sodio = $concimeExtras['sodio'];
            $perfectage->selenio = $concimeExtras['selenio'];
            $perfectage->alluminio = $concimeExtras['alluminio'];
            $perfectage->silicio = $concimeExtras['silicio'];
            $perfectage->save();
        }

        $prodottiObj = Prodotti::where('id', '=', $prodotti->id)->with('concimePercentage')->with('concimeExtras')->first();

        return $this->success($prodottiObj , 'Record Save successfully.', 201);
    }

    public function get() {
        $records = Prodotti::where('farm_id', Auth::user()->farm_id)->orderBy('id', 'DESC')->with('concimePercentage')->with('concimeExtras')->get();
        return $this->success($records , 200);
    }

    public function show($id) {
        $record = Prodotti::where('farm_id', Auth::user()->farm_id)->where('id', '=', $id)->with('concimePercentage')->with('concimeExtras')->first();
    
        if($record) { 
            return $this->success($record, 'Record found', 200);
        }
        if(!isset($record)){
            return response()->json([
                'status' => false,
                'message' => 'Record not Found',
                'data' => '',
                'status_code' => 404
            ], 200);
        }   
    }

    public function delete($id){
        $record = Prodotti::where('farm_id', Auth::user()->farm_id)->where('id', '=', $id)->with('concimePercentage')->with('concimeExtras')->first();
        if($record) {
            $record->concimePercentage()->delete();
            $record->concimeExtras()->delete();
            $record->delete();
            return $this->success('Record Delete Successfully', 200);
        }
        if(!isset($record)){
            return response()->json([
                'status' => false,
                'message' => 'Record not Found',
                'data' => '',
                'status_code' => 404
            ], 200);
        } 
    }

    public function update(Request $request, $id){
        $prodotti = Prodotti::where('farm_id', Auth::user()->farm_id)->where('id', '=', $id)->with('concimePercentage')->with('concimeExtras')->first();
       
        if($prodotti) {
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $request->nome_prodotto))
            {
                $nome = explode("-", $request->nome_prodotto); 
                $prodotti->nome_prodotto = $prodotti->id."-".$nome[1];
            } else {
                $prodotti->nome_prodotto = $prodotti->id."-".$request->nome_prodotto;
            }
            $prodotti->descrizione = $request->descrizione;
            $prodotti->tipologia = $request->tipologia;
            $prodotti->iva = $request->iva;
            $prodotti->categoria = $request->categoria;
            $prodotti->udm = $request->udm;
            $prodotti->p_netto = $request->p_netto;
            $prodotti->p_lordo = $request->p_lordo;
            $prodotti->note = $request->note;
            $prodotti->magazzino_di_stoccaggio = $request->magazzino_di_stoccaggio;
            $prodotti->giacenza_iniziale = $request->giacenza_iniziale;
            $prodotti->soglia_minima = $request->soglia_minima;
            $prodotti->tipologia_prodotto = $request->tipologia_prodotto;
            $prodotti->autorizzato_biologico = $request->autorizzato_biologico;
            $prodotti->concime_tipologia = $request->concime_tipologia;
            $prodotti->update();

            if(isset($request->concime_percentage)) {
                ConcimePercentage::where('prodotti_id', '=', $prodotti->id)->delete();
                
                $concimePercentage = $request->concime_percentage;
                $perfectage = new ConcimePercentage();
                $perfectage->prodotti_id = $prodotti->id;
                $perfectage->azoto = $concimePercentage['azoto'];
                $perfectage->fosforo = $concimePercentage['fosforo'];
                $perfectage->potassio = $concimePercentage['potassio'];
                $perfectage->calcio = $concimePercentage['calcio'];
                $perfectage->magnesio = $concimePercentage['magnesio'];
                $perfectage->zolfo = $concimePercentage['zolfo'];
                $perfectage->save();
            }

            if(isset($request->concime_extras)) {
                ConcimeExtra::where('prodotti_id', '=', $prodotti->id)->delete();

                $concimeExtras = $request->concime_extras;
                $perfectage = new ConcimeExtra();
                $perfectage->prodotti_id = $prodotti->id;
                $perfectage->ferro = $concimeExtras['ferro'];
                $perfectage->manganese = $concimeExtras['manganese'];
                $perfectage->molibdeno = $concimeExtras['molibdeno'];
                $perfectage->rame = $concimeExtras['rame'];
                $perfectage->boro = $concimeExtras['boro'];
                $perfectage->zinco = $concimeExtras['zinco'];
                $perfectage->nichel = $concimeExtras['nichel'];
                $perfectage->sodio = $concimeExtras['sodio'];
                $perfectage->selenio = $concimeExtras['selenio'];
                $perfectage->alluminio = $concimeExtras['alluminio'];
                $perfectage->silicio = $concimeExtras['silicio'];
                $perfectage->save();
            }
            
            $prodottiObj = Prodotti::where('id', '=', $prodotti->id)->with('concimePercentage')->with('concimeExtras')->first();

            return $this->success($prodottiObj , 'Record update successfully.', 200);
            
        }
        if(!isset($prodotti)){
            return response()->json([
                'status' => false,
                'message' => 'No Found',
                'data' => 'Record not Found',
                'status_code' => 404
            ], 200);
        } 
    }

    public function getSituaziones() {
        $records = Prodotti::where('farm_id', Auth::user()->farm_id)->orderBy('id', 'DESC')->select('id', 'codice', 'nome_prodotto', 'tipologia', 'magazzino_di_stoccaggio', 'giacenza_iniziale', 'udm', 'soglia_minima', 'q_ta_scaricata', 'q_ta_caricata', 'data_ultimo_carico', 'data_ultimo_scarico', 'rif_fattura', 'causale', 'cliente_fornitore')->get();
        return $this->success($records , 200);
    }

    public function updateCaricoScarico(Request $request, $id) {

        $prodotti = Prodotti::where('id', $id)->where('farm_id', Auth::user()->farm_id)->first();
        if($prodotti) {
            if(isset($request->giacenza_iniziale)) {
                $prodotti->giacenza_iniziale = $request->giacenza_iniziale;
            }
    
            if(isset($request->giacenza_iniziale)) {
                $prodotti->q_ta_caricata = $request->q_ta_caricata;
            }
    
            if(isset($request->data_ultimo_carico)) {
                $prodotti->data_ultimo_carico = $request->data_ultimo_carico;
            }
    
            if(isset($request->rif_fattura)) {
                $prodotti->rif_fattura = $request->rif_fattura;
            }
    
            if(isset($request->causale)) {
                $prodotti->causale = $request->causale;
            }
    
            if(isset($request->q_ta_scaricata)) {
                $prodotti->q_ta_scaricata = $request->q_ta_scaricata;
            }
    
            if(isset($request->data_ultimo_scarico)) {
                $prodotti->data_ultimo_scarico = $request->data_ultimo_scarico;
            }
    
            if(isset($request->cliente_fornitore)) {
                $prodotti->cliente_fornitore = $request->cliente_fornitore;
            } 

            if(isset($request->magazzino_di_stoccaggio)) {
                $prodotti->magazzino_di_stoccaggio = $request->magazzino_di_stoccaggio;
            } 
    
            $prodotti->update();
    
            if( isset($request->movementi) ) {
                $movementi = new Movementi();
    
                $movementi->user_id = Auth::user()->id;
                $movementi->farm_id = Auth::user()->farm_id;
                if(isset($request->movementi['nome_prodotto'])) {
                    $movementi->nome_prodotto = $request->movementi['nome_prodotto'];
                }
    
                if(isset($request->movementi['magazzino_di_stoccaggio'])) {
                    $movementi->magazzino_di_stoccaggio = $request->movementi['magazzino_di_stoccaggio'];
                }
    
                if(isset($request->movementi['q_ta_caricata'])) {
                    $movementi->q_ta_caricata = $request->movementi['q_ta_caricata'];
                }
                
                if(isset($request->movementi['data'])) {
                    $movementi->data = $request->movementi['data'];
                }
                
                if(isset($request->movementi['rif_fattura'])) {
                    $movementi->rif_fattura = $request->movementi['rif_fattura'];
                }
                
                if(isset($request->movementi['causale'])) {
                    $movementi->causale = $request->movementi['causale'];
                }
    
                if(isset($request->movementi['q_ta_scaricata'])) {
                    $movementi->q_ta_scaricata = $request->movementi['q_ta_scaricata'];
                }
    
                if(isset($request->movementi['cliente_fornitore'])) {
                    $movementi->cliente_fornitore = $request->movementi['cliente_fornitore'];
                }
    
                $movementi->save();
            }

            return $this->success($prodotti , 'Record update successfully.', 200);
        }
        if(!isset($prodotti)){
            return response()->json([
                'status' => false,
                'message' => 'No Found',
                'data' => 'Record not Found',
                'status_code' => 404
            ], 200);
        } 
    }

    public function updateQuantity(Request $request, $id) {
        $prodotti = Prodotti::where('id', $id)->where('farm_id', Auth::user()->farm_id)->first();

        if($prodotti) {
            $prodotti->soglia_minima = $request->soglia_minima;
            $prodotti->update();
            return $this->success($prodotti , 'Quantity update successfully.', 200);
        }
        if(!isset($prodotti)){
            return response()->json([
                'status' => false,
                'message' => 'No Found',
                'data' => 'Record not Found',
                'status_code' => 404
            ], 200);
        } 
    }

    public function getMovimenti() {
        $movimentis = Movementi::where('farm_id', Auth::user()->farm_id)->orderBy('id', 'DESC')->get();
        return $this->success($movimentis , 200);
    }

    public function getOutOfStock() {
        $outofstock = array();
        $records = Prodotti::where('farm_id', Auth::user()->farm_id)->orderBy('id', 'DESC')->select('id', 'codice', 'nome_prodotto', 'tipologia', 'magazzino_di_stoccaggio', 'giacenza_iniziale', 'udm', 'soglia_minima', 'data_ultimo_carico', 'data_ultimo_scarico')->withCasts(['giacenza_iniziale' => 'decimal:2', 'soglia_minima' => 'decimal:2'])->get();
        foreach ($records as $prodotto) {
            if($prodotto->giacenza_iniziale < $prodotto->soglia_minima){
                $outofstock[]= $prodotto;
            }
        }
        return $this->success($outofstock , 200);
    }
}
