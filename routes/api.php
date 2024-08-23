<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TerreniController;
use App\Http\Controllers\ColtureColtivatesController;
use App\Http\Controllers\ProdottiController;
use App\Http\Controllers\ClientiFornitoriController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MagazziniController;
use App\Http\Controllers\MacchineEAttrezziController;
use App\Http\Controllers\LottiDiCampoController;
use App\Http\Controllers\AttivitaColturaliController;
use App\Http\Controllers\StellaController;
use App\Http\Controllers\AnimaliController;
use App\Http\Controllers\AlimentiController;
use App\Http\Controllers\AssistenzaSanitariaController;
use App\Http\Controllers\AlimentazioneController;
use App\Http\Controllers\FarmsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\CheckListController;
use App\Http\Controllers\ManualiController;
use App\Http\Controllers\FattureController;
use App\Http\Controllers\CapettiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['cors'])->group(function () {
    Route::post('/auth/register', [AuthController::class, 'register']);
    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::post('/forget-password', [AuthController::class, 'forgetPassword']);

    Route::group(['middleware' => ['auth:sanctum']], function () {

        Route::post('/auth/changePassword', [AuthController::class, 'changePassword']);
        Route::get('/auth/logout', [AuthController::class, 'logout']);

        //Manage Terreni's
        Route::post('/terreni', [TerreniController::class, 'store']);
        Route::get('/terreni', [TerreniController::class, 'get']);
        Route::get('/terreni/{id}', [TerreniController::class, 'show']);
        Route::delete('/terreni/{id}', [TerreniController::class, 'delete']);
        Route::put('/terreni/{id}', [TerreniController::class, 'update']);
        
        //Manage ColtureColtivates
        Route::post('/colturecoltivates', [ColtureColtivatesController::class, 'store']);
        Route::get('/colturecoltivates', [ColtureColtivatesController::class, 'get']);
        Route::get('/colturecoltivates/{id}', [ColtureColtivatesController::class, 'show']);
        Route::delete('/colturecoltivates/{id}', [ColtureColtivatesController::class, 'delete']);
        Route::put('/colturecoltivates/{id}', [ColtureColtivatesController::class, 'update']);

        //Manage Prodotti's
        Route::post('/prodotties', [ProdottiController::class, 'store']);
        Route::get('/prodotties', [ProdottiController::class, 'get']);
        Route::get('/prodotties/{id}', [ProdottiController::class, 'show']);
        Route::delete('/prodotties/{id}', [ProdottiController::class, 'delete']);
        Route::put('/prodotties/{id}', [ProdottiController::class, 'update']);
        Route::get('/prodotties-outofstock', [ProdottiController::class, 'getOutOfStock']); 

        //Manage ClientiFornitori's
        Route::post('/clientifornitori', [ClientiFornitoriController::class, 'store']);
        Route::get('/clientifornitori/{type}', [ClientiFornitoriController::class, 'get']);
        Route::get('/clienti-fornitori/{id}', [ClientiFornitoriController::class, 'show']);
        Route::delete('/clientifornitori/{id}', [ClientiFornitoriController::class, 'delete']);
        Route::put('/clientifornitori/{id}', [ClientiFornitoriController::class, 'update']); 

        //Manage Team's
        Route::post('/team', [TeamController::class, 'store']);
        Route::get('/team', [TeamController::class, 'get']);
        Route::get('/teamByFarm/{id}', [TeamController::class, 'getByFarmId']);
        Route::get('/team/{id}', [TeamController::class, 'show']);
        Route::delete('/team/{id}', [TeamController::class, 'delete']);
        Route::put('/team/{id}', [TeamController::class, 'update']); 
        Route::put('/updateContract/{id}', [TeamController::class, 'updateContract']);
        Route::get('/teamStatistics', [TeamController::class, 'getTeamStatistic']);


        //Manage Magazzini's
        Route::post('/magazzini', [MagazziniController::class, 'store']);
        Route::get('/magazzini', [MagazziniController::class, 'get']);
        Route::get('/magazzini/{id}', [MagazziniController::class, 'show']);
        Route::delete('/magazzini/{id}', [MagazziniController::class, 'delete']);
        Route::put('/magazzini/{id}', [MagazziniController::class, 'update']); 
        
        //Manage Situazione's & Movimenti
        Route::get('/situazione', [ProdottiController::class, 'getSituaziones']);
        Route::get('/movimenti', [ProdottiController::class, 'getMovimenti']);
        Route::patch('/carico/{id}', [ProdottiController::class, 'updateCaricoScarico']);
        Route::patch('/scarico/{id}', [ProdottiController::class, 'updateCaricoScarico']);
        Route::patch('/updateQuantity/{id}', [ProdottiController::class, 'updateQuantity']);

        //Manage Macchine e attrezzi's
        Route::post('/macchine-e-attrezzi', [MacchineEAttrezziController::class, 'store']);
        Route::get('/macchine-e-attrezzi', [MacchineEAttrezziController::class, 'get']);
        Route::get('/macchine-e-attrezzi/{id}', [MacchineEAttrezziController::class, 'show']);
        Route::delete('/macchine-e-attrezzi/{id}', [MacchineEAttrezziController::class, 'delete']);
        Route::post('/macchine-e-attrezzi/{id}', [MacchineEAttrezziController::class, 'update']);
        Route::get('/get-carburantes', [MacchineEAttrezziController::class, 'getCarburantes']);
        //update multiple macchine
        Route::put('/macchine-e-attrezzi', [MacchineEAttrezziController::class, 'updateMacchines']);

        // manage LottiDiCampo's
        Route::post('/lotti-di-campo', [LottiDiCampoController::class, 'store']);
        Route::get('/lotti-di-campo', [LottiDiCampoController::class, 'get']);
        Route::get('/lotti-di-campo/{id}', [LottiDiCampoController::class, 'show']);
        Route::delete('/lotti-di-campo/{id}', [LottiDiCampoController::class, 'delete']);
        Route::put('/lotti-di-campo/{id}', [LottiDiCampoController::class, 'update']);
        Route::get('/lotti-di-campo-statistics', [LottiDiCampoController::class, 'getSpecieColtivateStatistics']);
        Route::get('/lotti-di-campo/require/water', [LottiDiCampoController::class, 'requireWaterAction']);
        Route::get('/lotti-di-campo/require/fertilizer', [LottiDiCampoController::class, 'requireFertilizerAction']);
        
        // manage AttivitaColturali's
        Route::post('/attivita-colturali', [AttivitaColturaliController::class, 'store']);
        Route::get('/attivita-colturali', [AttivitaColturaliController::class, 'get']);
        Route::get('/attivita-colturali/{id}', [AttivitaColturaliController::class, 'show']);
        Route::delete('/attivita-colturali/{id}', [AttivitaColturaliController::class, 'delete']);
        Route::put('/attivita-colturali/{id}', [AttivitaColturaliController::class, 'update']);
        Route::get('/get-stato/{stato}', [AttivitaColturaliController::class, 'getStato']);

        // manage Stella's
        Route::post('/stellas', [StellaController::class, 'store']);
        Route::get('/stellas', [StellaController::class, 'get']);
        Route::get('/stellas/{id}', [StellaController::class, 'show']);
        Route::delete('/stellas/{id}', [StellaController::class, 'delete']);
        Route::put('/stellas/{id}', [StellaController::class, 'update']);
        Route::get('/stalleStatistics', [StellaController::class, 'getStalleStatistic']);

        // manage Animalis
        Route::post('/animalis', [AnimaliController::class, 'store']);
        Route::get('/animalis', [AnimaliController::class, 'get']);
        Route::get('/animalis/{id}', [AnimaliController::class, 'show']);
        Route::delete('/animalis/{id}', [AnimaliController::class, 'delete']);
        Route::put('/animalis/{id}', [AnimaliController::class, 'update']);
        Route::get('/animaliStatistics', [AnimaliController::class, 'getAnimaliStatistic']);

        // manage Alimentis
        Route::post('/alimentis', [AlimentiController::class, 'store']);
        Route::get('/alimentis', [AlimentiController::class, 'get']);
        Route::get('/alimentis/{id}', [AlimentiController::class, 'show']);
        Route::delete('/alimentis/{id}', [AlimentiController::class, 'delete']);
        Route::put('/alimentis/{id}', [AlimentiController::class, 'update']);

        // manage AssistenzaSanitarias
        Route::post('/assistenza-sanitarias', [AssistenzaSanitariaController::class, 'store']);
        Route::get('/assistenza-sanitarias', [AssistenzaSanitariaController::class, 'get']);
        Route::get('/assistenza-sanitarias/{id}', [AssistenzaSanitariaController::class, 'show']);
        Route::delete('/assistenza-sanitarias/{id}', [AssistenzaSanitariaController::class, 'delete']);
        Route::put('/assistenza-sanitarias/{id}', [AssistenzaSanitariaController::class, 'update']);

        // manage Alimentazione
        Route::post('/alimentazione', [AlimentazioneController::class, 'store']);

        // manage Farms
        Route::post('/farms', [FarmsController::class, 'store']);
        Route::get('/farms', [FarmsController::class, 'get']);
        Route::get('/farms/{id}', [FarmsController::class, 'show']);
        Route::delete('/farms/{id}', [FarmsController::class, 'delete']);
        Route::put('/farms/{id}', [FarmsController::class, 'update']);
    
        // Manage Users
        Route::resource('users', UserController::class, [
            'except' => ['index']
        ]);

        Route::get('/users-list/{farmId?}', [UserController::class, 'get']);

        //Manage Documents
        Route::post('/documents', [DocumentController::class, 'store']);
        Route::get('/getAllegati', [DocumentController::class, 'getAllegati']);
        Route::get('/getNormative', [DocumentController::class, 'getNormative']);
        Route::get('/getDocumenti', [DocumentController::class, 'getDocumenti']);
        Route::get('/documents/{id}', [DocumentController::class, 'show']);
        Route::delete('/documents/{id}', [DocumentController::class, 'delete']);
        Route::post('/documents/{id}', [DocumentController::class, 'update']);

        //Manage Checklists
        Route::post('/checklists', [CheckListController::class, 'store']);
        Route::get('/checklists', [CheckListController::class, 'get']);

        //Manage Fatture
        Route::post('/fatture', [FattureController::class, 'store']);
        Route::get('/getFatture', [FattureController::class, 'getFatture']);
        Route::get('/fatture/{id}', [FattureController::class, 'show']);
        Route::delete('/fatture/{id}', [FattureController::class, 'delete']);
        Route::post('/fatture/{id}', [FattureController::class, 'update']);

        //Manage Manuali
        Route::post('/manuali', [ManualiController::class, 'store']);
        Route::get('/getManuali', [ManualiController::class, 'getManuali']);
        Route::get('/manuali/{id}', [ManualiController::class, 'show']);
        Route::delete('/manuali/{id}', [ManualiController::class, 'delete']);
        Route::post('/manuali/{id}', [ManualiController::class, 'update']);

        //Manage sonde
        Route::post('/sonde-capetti', [CapettiController::class, 'store']);
        Route::get('/sonde-capetti', [CapettiController::class, 'get']);
        Route::get('/sonde-capetti/{id}', [CapettiController::class, 'show']);
        Route::delete('/sonde-capetti/{id}', [CapettiController::class, 'delete']);
        Route::put('/sonde-capetti/{id}', [CapettiController::class, 'update']);
    }); 
});