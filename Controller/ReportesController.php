<?php
// importamos nuestro modelo
require_once 'Model/Reportes.php';
require_once 'assets/dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;
class ReportesController{
    // para accender al modelo y sus atributos
    private $model;
    private $materias;
    private $alumnos;

    // Constructos
    public function __CONSTRUCT(){
        $this->model = new Reportes();
    }

   /** Inicio de llamado de la vistas */
    public function Index(){
        require_once 'views/backend/header.php';
        require_once 'views/backend/notas/index.php';
        require_once 'views/backend/footer.php';
    }
  
    public function ReportePlazaDocente(){
       // para guardar el html donde mostramos los datos
       ob_start(); // no sirve para iniciar un buffer
       require_once 'views/backend/Reportes/tipoplaza.php';
       $html = ob_get_clean(); // creo la variable html la cual le borrafe el buffer anterior creado
       // instantiate and use the dompdf class
       $dompdf = new Dompdf();
       $dompdf->set_option('isHtml5ParserEnabled', true);
       $dompdf->set_option('isRemoteEnabled', true);
       $dompdf->loadHtml($html);
       // (Optional) Setup the paper size and orientation
       $dompdf->setPaper('letter', 'portrait');
       // Render the HTML as PDF
       $dompdf->render();
       // Output the generated PDF to Browser
      return $dompdf->stream("dompdf_tipoplazadocente.pdf", array("Attachment" => false,));
   }
    public function ReporteZonaRural(){
       // para guardar el html donde mostramos los datos
       ob_start(); // no sirve para iniciar un buffer
       require_once 'views/backend/Reportes/zonarural.php';
       $html = ob_get_clean(); // creo la variable html la cual le borrafe el buffer anterior creado
       // instantiate and use the dompdf class
       $dompdf = new Dompdf();
       $dompdf->set_option('isHtml5ParserEnabled', true);
       $dompdf->set_option('isRemoteEnabled', true);
       $dompdf->loadHtml($html);
       // (Optional) Setup the paper size and orientation
       $dompdf->setPaper('letter', 'portrait');
       // Render the HTML as PDF
       $dompdf->render();
       // Output the generated PDF to Browser
      return $dompdf->stream("dompdf_zonarural.pdf", array("Attachment" => false,));
   }

    public function ReporteAlumnosreprobados(){
       // para guardar el html donde mostramos los datos
       ob_start(); // no sirve para iniciar un buffer
       require_once 'views/backend/Reportes/alumonosreprobados.php';
       $html = ob_get_clean(); // creo la variable html la cual le borrafe el buffer anterior creado
       // instantiate and use the dompdf class
       $dompdf = new Dompdf();
       $dompdf->set_option('isHtml5ParserEnabled', true);
       $dompdf->set_option('isRemoteEnabled', true);
       $dompdf->loadHtml($html);
       // (Optional) Setup the paper size and orientation
       $dompdf->setPaper('letter', 'portrait');
       // Render the HTML as PDF
       $dompdf->render();
       // Output the generated PDF to Browser
      return $dompdf->stream("dompdf_alumnosreprobados.pdf", array("Attachment" => false,));
   }

    public function ReporteMejoresPromedios(){
       // para guardar el html donde mostramos los datos
       ob_start(); // no sirve para iniciar un buffer
       require_once 'views/backend/Reportes/mejorespromedios.php';
       $html = ob_get_clean(); // creo la variable html la cual le borrafe el buffer anterior creado
       // instantiate and use the dompdf class
       $dompdf = new Dompdf();
       $dompdf->set_option('isHtml5ParserEnabled', true);
       $dompdf->set_option('isRemoteEnabled', true);
       $dompdf->loadHtml($html);
       // (Optional) Setup the paper size and orientation
       $dompdf->setPaper('letter', 'portrait');
       // Render the HTML as PDF
       $dompdf->render();
       // Output the generated PDF to Browser
      return $dompdf->stream("dompdf_mejorespromedios.pdf", array("Attachment" => false,));
   }
   
    public function ReporteMateriasDocentes(){
       // para guardar el html donde mostramos los datos
       ob_start(); // no sirve para iniciar un buffer
       require_once 'views/backend/Reportes/materiadocente.php';
       $html = ob_get_clean(); // creo la variable html la cual le borrafe el buffer anterior creado
       // instantiate and use the dompdf class
       $dompdf = new Dompdf();
       $dompdf->set_option('isHtml5ParserEnabled', true);
       $dompdf->set_option('isRemoteEnabled', true);
       $dompdf->loadHtml($html);
       // (Optional) Setup the paper size and orientation
       $dompdf->setPaper('letter', 'portrait');
       // Render the HTML as PDF
       $dompdf->render();
       // Output the generated PDF to Browser
      return $dompdf->stream("dompdf_materiasdocentes.pdf", array("Attachment" => false,));
   }


  
}
?>