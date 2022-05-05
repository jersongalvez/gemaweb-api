<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//CARGAR LOS CONTROLADORES PARA SER UTILIZADOS EN LAS RUTAS
use App\Http\Controllers\PqrsController;
use App\Http\Controllers\GenericController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\GoogleDriveController;

/*
|--------------------------<------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//RUTAS PARA LOS MODELOS GENERICOS Y REUTILIZAR EN EL PROYECTO
Route::controller(GenericController::class)->group(function () {
   Route::get('/tipodocumentos', 'tipoDocumentos');
   Route::get('/grupopoblacion', 'grupoPoblacion');
   Route::get('/grupoetnico', 'grupoEtnico');
   Route::get('/departamentos', 'departamentos');
   Route::get('/ciudades', 'ciudades');
   Route::get('/areas', 'areas');
   Route::get('/prestadores', 'prestadores');
   Route::get('/sexos', 'tiposSexos');
   Route::get('/zonas', 'zonas');
   Route::get('/ultimoconsecutivo', 'ultimoConsecutivo');
});

//RUTAS PARA LAS PQRS
Route::controller(PqrsController::class)->group(function () {
    Route::get("/buscar/{tpdocumento}/{documento}", "search");
    Route::get("/buscarpqrs/{tpdocumento}/{documento}/{radicado}","searchPqrs");
    Route::post("/crearpqrs", "create");
    Route::post("/subirdrive","subirArchivoDrive");
});
//RUTAS PARA LOS PDF
Route::controller(PdfController::class)->group(function () {
    Route::get("/respuestapqrs", "pdfRespuestaPqrs");
});

// Route::controller(GoogleDriveController::class)->group(function () {
//     Route::get("/drive", "googleDriveFileUpload");
// });
