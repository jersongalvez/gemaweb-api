<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

class PdfController extends Controller {

    //GENERACION DEL PDF DE LA RESPUESTA DE LOS PQRS PARA EL USUARIO
    public function pdfRespuestaPqrs() {
        if(date("n") == 1) {
          $mes = "Enero";
        }
        else if(date("n") == 2) {
          $mes = "Febrero";
        }
        else if(date("n") == 3) {
          $mes = "Marzo";
        }
        else if(date("n") == 4) {
          $mes = "Abril";
        }
        else if(date("n") == 5) {
          $mes = "Mayo";
        }
        else if(date("n") == 6) {
          $mes = "Junio";
        }
        else if(date("n") == 7) {
          $mes = "Julio";
        }
        else if(date("n") == 8) {
          $mes = "Agosto";
        }
        else if(date("n") == 9) {
          $mes = "Septiembre";
        }
        else if(date("n") == 10) {
          $mes = "Octubre";
        }
        else if(date("n") == 11) {
          $mes = "Noviembre";
        }
        else if(date("n") == 12) {
          $mes = "Diciembre";
        }
        $this->Fpdf = new Fpdf();
        $this->Fpdf->AliasNbPages();
        $this->Fpdf->SetAutoPageBreak(1,13);
        $this->Fpdf->AddPage('P','A4');
        $this->Fpdf->Image('https://www.pijaossalud.com/wp-content/uploads/2018/05/logo.png' , 22 ,10, 25 , 25,'png');
        //$this->Fpdf->Image('public/img/colposcopia/'.$colposcopias->imagen1 , 35 ,115, 60 , 40,'JPG');
        //$this->Fpdf->Image('public/img/colposcopia/'.$colposcopias->imagen2 , 120 ,115, 60 , 40,'JPG');
        $this->Fpdf->SetFont('Arial','b',20);
        $this->Fpdf->Ln(1);
        $this->Fpdf->Cell(45,6,'', '', 0,'L', false );
        $this->Fpdf->Cell(60,6,'PIJAOS SALUD EPS - INDIGENA', '', 0,'L', false );
        $this->Fpdf->SetFont('Arial','',7);
        $this->Fpdf->Ln(5);
        $this->Fpdf->Cell(52,6,'', '', 0,'L', false );
        $this->Fpdf->Cell(1,6,utf8_decode('RESOLUCIÓN  013 DE LA DIRECCIÓN GENERAL DE ASUNTOS INDÍGENAS DEL '), '', 0,'L', false );
        $this->Fpdf->Ln(4);
        $this->Fpdf->Cell(80,6,'', '', 0,'L', false );
        $this->Fpdf->Cell(7,6,'MINISTERIO DEL INTERIOR', '', 0,'L', false );
        $this->Fpdf->Ln(4);
        $this->Fpdf->Cell(85,6,'', '', 0,'L', false );
        $this->Fpdf->Cell(7,6,'NIT. 809.008.362-2', '', 0,'L', false );
        $this->Fpdf->SetFont('Arial','b',9);
        $this->Fpdf->Ln(5);
        $this->Fpdf->Cell(55,6,'', '', 0,'L', false );
        $this->Fpdf->Cell(7,6,utf8_decode('UN GRUPO QUE VELA POR LA SALUD DE SU FAMILIA'), '', 0,'L', false );
        $this->Fpdf->Ln(2);
        $this->Fpdf->SetFont('Arial','',10);
        $this->Fpdf->Ln(9);
        $this->Fpdf->Cell(120,6,utf8_decode('Ibagué, '.date("d").' de '.$mes.' de '.date("Y").''), '', 0,'', false );
        $this->Fpdf->Cell(70,6,'', '', 0,'', false );
        $this->Fpdf->Ln(6);
        $this->Fpdf->SetFont('Arial','B',10);
        $this->Fpdf->Cell(120,6,'SIAUEPSI200 - 123456', '', 0,'', false );
        $this->Fpdf->SetFont('Arial','',10);
        $this->Fpdf->Cell(70,6,'', '', 0,'', false );
        $this->Fpdf->Ln(7);
        $this->Fpdf->Cell(120,6,utf8_decode('Doctora'), '', 0,'', false );
        $this->Fpdf->Cell(70,6,utf8_decode(''), '', 0,'', false );
        $this->Fpdf->Ln(5);
        $this->Fpdf->Cell(120,6,utf8_decode('MONICA ARTUNDUAGA MEJIA'), '', 0,'', false );
        $this->Fpdf->Cell(70,6,utf8_decode(''), '', 0,'', false );
        $this->Fpdf->Ln(5);
        $this->Fpdf->Cell(120,6,utf8_decode('Enfermera'), '', 0,'', false );
        $this->Fpdf->Cell(70,6,utf8_decode(''), '', 0,'', false );
        $this->Fpdf->Ln(5);
        $this->Fpdf->Cell(120,6,utf8_decode('OFICINA DE ATENCION A COMUNIDADES'), '', 0,'', false );
        $this->Fpdf->Cell(70,6,utf8_decode(''), '', 0,'', false );
        $this->Fpdf->Ln(5);
        $this->Fpdf->Cell(120,6,utf8_decode('GOBERNACION DEPARTAMENTAL DE RISARALDA'), '', 0,'', false );
        $this->Fpdf->Cell(70,6,utf8_decode(''), '', 0,'', false );
        $this->Fpdf->Ln(5);
        $this->Fpdf->Cell(120,6,utf8_decode('Pereira, Risaralda'), '', 0,'', false );
        $this->Fpdf->Cell(70,6,utf8_decode(''), '', 0,'', false );
        $this->Fpdf->SetFont('Arial','B',10);
        $this->Fpdf->Ln(9);
        $this->Fpdf->MultiCell(190, 5,utf8_decode("REFERENCIA: RESPUESTA DE RADICADO DE PQRD N° 7871 SERIAL SNS N° 929292"), '', 'L', false);
        $this->Fpdf->SetFont('Arial','',10);
        $this->Fpdf->Ln(4);
        $this->Fpdf->MultiCell(190, 5,utf8_decode("Reciban un cordial saludo de la EPS Indígena Pijaos Salud, a través de este medio damos respuesta a su requerimiento en nombre del usuario  identificado con donde indica FALTA DE OPORTUNIDAD EN LA PROGRAMACION DE PROCEDIMIENTOS QUIRURGICOS por parte del HOSPITAL UNIVERSITARIO SAN JORGE DE PEREIRA; queremos informarles que todos los aspectos de su comunicado fueron revisados con detenimiento e interés. Por lo cual, nos permitimos informar:"),'','J','');
        $this->Fpdf->Ln(4);
        $this->Fpdf->MultiCell(190, 5,utf8_decode("1. Teniendo en cuenta el oficio de la referencia, Pijaos Salud EPS Indígena adelantó un conjunto de acciones administrativas y la investigación correspondiente para proceder a realizar el estudio del caso y emitir respuesta de fondo."), '', 'J', false);
        $this->Fpdf->Ln(4);
        $this->Fpdf->MultiCell(190, 5,utf8_decode("2. Por lo cual, se procedio a realizar notificación del caso a la IPS HOSPITAL UNIVERSITARIO SAN JORGE DE PEREIRA quienes informan programación de ADENOMECTOMIA O PROSTATECTOMIA TRANSVESICAL para el día 30/03/2022 a las 13:00 horas con el Dr. Guerrero. "), '', 'J', false);
        $this->Fpdf->Ln(4);
        $this->Fpdf->MultiCell(190, 5,utf8_decode("3. De antemano ofrecemos disculpas por la queja que nuestro prestador de servicios de salud le hubiera podido generar al usuario a quien se remite igualmente la respuesta. Pijaos Salud EPS-I a través de las auditorías de calidad que realiza a la red de prestadores de servicios de salud verificará que la accesibilidad y oportunidad se lleven acorde a lo convenido dentro del contrato."), '', 'J', false);
        $this->Fpdf->Ln(4);
        $this->Fpdf->MultiCell(190, 5,utf8_decode("4. De otra parte, es importante indicar, que se evidencia que Pijaos Salud EPS - /I, NO le ha negado ningún servicio médico, ya que este ha sido autorizado por cobertura del Plan de Beneficios en Salud con cargo a la UPC y en cumplimiento a lo dispuesto en la normatividad actual."), '', 'J', false);
        $this->Fpdf->Ln(4);
        $this->Fpdf->MultiCell(190, 5,utf8_decode("Para finalizar, reiteramos nuestro compromiso con nuestros usuarios y esperamos de esta forma haber dado respuesta satisfactoria a sus inquietudes, no obstante, de conformidad con los dispuesto en la Circular Externa 008 de 2018, esta EPS - I debe hacer la advertencia, que frente a cualquier desacuerdo con la decisión adoptada por la entidad ante la cual se elevó la respectiva PQR, se puede formular una PQR ante la Superintendencia Nacional de Salud. Asimismo, informamos que, de no obtener respuesta por parte de la entidad podrá elevar una PQR ante la Superintendencia Nacional de Salud. Adicionalmente, se informa que la podrá elevar ante la correspondiente Dirección de Salud Departamental, Distrital o Local."), '', 'J', false);
        $this->Fpdf->Ln(4);
        $this->Fpdf->MultiCell(190, 5,utf8_decode("En Pijaos Salud EPS - I estamos siempre dispuestos a resolver sus inquietudes y agradecemos nos confirme, por este medio o través de nuestras líneas de atención al usuario, cualquier inquietud o inconformidad que se presente con este o cualquier otro caso a través de nuestra Línea Gratuita Nacional 01-8000-186-754, Línea Directa (098) 2809090 Ext. 115, Buzones de Sugerencias ubicados en las oficinas de atención al usuario, enviándonos un mensaje al correo electrónico  siau.tolima@pijaossalud.com.co o en nuestra página web www.pijaossalud.com a través del link https://www.pijaossalud.com/preguntas-quejas-y-reclamos/."), '', 'J', false);
        $this->Fpdf->Ln(6);
        $this->Fpdf->Cell(120,6,utf8_decode('Cordialmente'), '', 0,'', false );
        $this->Fpdf->Cell(70,6,utf8_decode(''), '', 0,'', false );
        $this->Fpdf->Ln(6);
        $this->Fpdf->Cell(120,6,utf8_decode('NAID LISBETH GONZÁLEZ OSPINA'), '', 0,'', false );
        $this->Fpdf->Cell(70,6,utf8_decode(''), '', 0,'', false );
        $this->Fpdf->Ln(6);
        $this->Fpdf->Cell(120,6,utf8_decode('Profesional Sistema de Información y Atención al Usuario'), '', 0,'', false );
        $this->Fpdf->Cell(70,6,utf8_decode(''), '', 0,'', false );
        $this->Fpdf->Ln(6);
        $this->Fpdf->Cell(120,6,utf8_decode('PIJAOS SALUD EPS-I'), '', 0,'', false );
        $this->Fpdf->Cell(70,6,utf8_decode(''), '', 0,'', false );
        $this->Fpdf->SetFont('Arial','',8);
        $this->Fpdf->Ln(8);
        $this->Fpdf->MultiCell(190, 4,utf8_decode("Cumpliendo con la circular externa 047 de 2007 (Circular única) ante la Superintendencia Nacional De Salud, es nuestra obligación infórmale que frente a cualquier desacuerdo en la decisión tomada por la entidad, se puede elevar consulta ante la correspondiente dirección de salud, sea esta departamental distrital o local, sin perjuicio de la competencia prevalente y excluyente que le corresponde a la Superintendencia Nacional De Salud , como autoridad máxima en materia de inspección,  vigilancia y  control."), '', 'J', false);
        $this->Fpdf->SetFont('Arial','',10);
        $this->Fpdf->Output();
        exit;
      }
}
