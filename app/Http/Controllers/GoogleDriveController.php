<?php

namespace App\Http\Controllers;

use Exception;
use Google_Client;
use Google_Service_Exception;
use Illuminate\Http\Request;
require_once '../public/api-google/vendor/autoload.php';
class GoogleDriveController extends Controller{

  //METODO ENCARGADO DE CREAR UN ARCHIVO EN LA CARPETA DE GOOGLE DRIVE
  public function googleDriveFileUpload($archivo, $tipo, $nombre) {
    putenv('GOOGLE_APPLICATION_CREDENTIALS=../public/json/soportespqrs-b184d062e113.json');
      $client = new Google_Client();
      $client->useApplicationDefaultCredentials();
      $client->setScopes(['https://www.googleapis.com/auth/drive.file', 'https://www.googleapis.com/auth/drive.appdata']);
      try {
        $service = new \Google_Service_Drive($client);
        $file_path =  $archivo;
        $file = new \Google_Service_Drive_DriveFile();
        $file->setName($nombre);
        $file->setParents(array("1xztn-H9PeuYaorKvEeJI9vaqY_z6uww_"));
        //$file->setDescription("archivo cargado");
        $file->setMimeType($tipo);
        $result = $service->files->create(
          $file,
          array(
            'data' => file_get_contents($file_path),
            'mimeType' => $tipo,
            'uploadType' =>  "media"
          )
        );
        return $result->id ;
      }
      catch(Google_Service_Exception $gs) {
        $mensaje = json_decode($gs->getMessage());
        echo $mensaje->error->message();
      }
      catch(Exception $e){
        echo $e->getMessage();
      }
  }
}

?>

