<?php
$servername = "localhost";
$username = "root";
$password = "metalsonic21";
$dbname = "surveyonumujeres";
$filler = 1;

$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "DELETE FROM encuesta
WHERE id NOT IN (
  SELECT id FROM (
    SELECT id FROM encuesta WHERE pregunta = '1' AND respuesta = '1'
  ) t
)";

if ($conn->query($sql) === TRUE) {
    $filler = 2;
    //echo "Record deleted successfully";
} else {
    $filler = 3;
    //echo "Error deleting record: " . $conn->error;
}

/* vars for export */
// database record to be exported
$db_record = 'encuesta';
// optional where query
$where = 'WHERE 1 ORDER BY 1';
// filename for export
$csv_filename = "output.txt";
// database variables

// create empty variable to be filled with export data
$csv_export = '';
// query to get data from database
$query = mysqli_query($conn, "SELECT * FROM ".$db_record." ".$where);
$field = mysqli_field_count($conn);
// create line with field names
for($i = 0; $i < $field; $i++) {
    $csv_export.= mysqli_fetch_field_direct($query, $i)->name.';';
}
// newline (seems to work both on Linux & Windows servers)
$csv_export.= '
';
// loop through database query and fill export variable
while($row = mysqli_fetch_array($query)) {
    // create line with field values
    for($i = 0; $i < $field; $i++) {
        $csv_export.= '"'.$row[mysqli_fetch_field_direct($query, $i)->name].'";';
    }
    $csv_export.= '
';
}
// Export the data and prompt a csv file for download

// Export the data and prompt a csv file for download
header('Content-Encoding: UTF-8');
header('Content-type: text/txt; charset=UTF-8');
header("Content-Disposition: attachment; filename=".$csv_filename."");
echo "\xEF\xBB\xBF"; // UTF-8 BOM
echo($csv_export);


mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MUJERES ONU - PROCOMER</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Plugin CSS -->
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/freelancer.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <header class="masthead bg-primary text-white text-center" style="padding-top: 15px;">
    <div class="container">
      <h1 class="text-uppercase mb-0" >ONU MUJERES & PROCOMER</h1>
      <h2 class="font-weight-light mb-0"><b>Estudio sobre emprendimientos y negocios de mujeres</h2>
      <hr class="star-light">
      <h2 class="font-weight-light mb-0">

ONU Mujeres y PROCOMER están realizando una encuesta sobre aspectos relacionados con la oferta de productos y servicios y las necesidades que tienen los negocios liderados por mujeres en Costa Rica. Por esta razón estamos solicitando su apoyo para contestar unas preguntas al respecto. <br><br>

Cientos de negocios de mujeres están participando en esta iniciativa ya que con la información recabada, además de desarrollar un Directorio de Negocios liderados por Mujeres, se espera conocer las necesidades puntuales de las empresarias con el objetivo de generar programas y proyectos que nos permitan cerrar las brechas para promover mayores oportunidades para las mujeres emprendedoras y empresarias. <br><br>

ONU Mujeres y PROCOMER cuidarán de la confidencialidad de sus respuestas y publicaremos los datos agregados y no respuestas individuales de las empresas, utilizándola únicamente con fines investigativos a lo interno de las organizaciones. De antemano se le agradece su colaboración. </h2>
    </div>
  </header>

  <!-- Portfolio Grid Section -->
  <section class="portfolio" id="portfolio">
    <div class="container">
      <hr class="star-dark mb-5">
      <div class="row">
        <div class="col-md-6 col-lg-4">
          
            <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
              <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
            
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/pro.jpg" alt="">
         
        </div>
        <div class="col-md-6 col-lg-4">
          
            <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
              <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
            
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/esencial.jpg" alt="">
          
        </div>
        <div class="col-md-6 col-lg-4">
         
            <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
              <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
            
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/onu.png" alt="">
         
        </div>
        
      </div>
    </div>
  </section>

              <!-- Botones --> 
              <br></br>
              <div class="container text-center">
                  <a href="index_1.php" class="btn btn-info btn-lg" role="button" style="background: #62b539; width:140px; height: 52px;">Empezar</a>
                  <a href="http://www.corporacionjsk.es" class="btn btn-info btn-lg" role="button" style="background: #62b539; width:140px; height: 52px;">Cancelar</a>
                  <br></br>
              </div>
          

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>

</body>

</html>
