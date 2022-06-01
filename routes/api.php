<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//CARGAR LOS CONTROLADORES PARA SER UTILIZADOS EN LAS RUTAS
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PqrsController;
use App\Http\Controllers\GenericController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\GoogleDriveController;
use App\Http\Controllers\EmailController;

/******************************************************
 *         RUTAS PARA LOS METODOS GLOBALES
*******************************************************/

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

 //RUTAS PARA LOS PDF
 Route::controller(PdfController::class)->group(function () {
     Route::get("/respuestapqrs", "pdfRespuestaPqrs");
 });

 //RUTAS PARA ANEXAR RUTAS PARA EL GOOGLE DRIVE
 Route::controller(GoogleDriveController::class)->group(function () {
     Route::get("/drive", "googleDriveCreateFolder");
 });

 /*
  RUTAS PARA EL ENVIO DE CORREO ELECTRONICOS RECOMENDABLE USAR
  MAILTRAP HERRAMIENTA QUE FUNCIONA COMO RECEPCION DE EMAIL
 */
 Route::controller(EmailController::class)->group(function () {
     Route::post('/notificaciones', 'sendEmailNotification');
 });

 /******************************************************
  *     RUTAS PARA LOS MODULOS DE LOS PRESTADORES
 *******************************************************/

 //RUTAS PARA LAS PQRS
 Route::controller(PqrsController::class)->group(function () {
     Route::get("/buscar/{tpdocumento}/{documento}", "search");
     Route::get("/buscarpqrs/{tpdocumento}/{documento}/{radicado}","searchPqrs");
     Route::post("/crearpqrs", "create");
     Route::post("/subirdrive","subirArchivoDrive");
 });


 /******************************************************
  *         RUTAS PARA LOS MODULOS INTERNOS
 *******************************************************/
Route::controller(LoginController::class)->group(function () {
    Route::get("/recuperarcontrasena", "RecuperarContrasena");
});
