<!-- PHP (Validaciones) -->
<?php
$id;
$cont = $_POST['cont'];

$servername = "localhost";
$username = "FrankHesse";
$password = "metalsonic21";
$dbname = "surveyonumujeres";

if ($cont == 0){
$conn = new mysqli($servername, $username, $password, $dbname);
$q1 = "FI.1. Seria usted tan amable de regalarnos unos minutos para responder algunas preguntas? Por favor considere que no hay respuestas buenas ni malas, y que la informacion sera tratada de manera generalizada para fines estadisticos";
$one = $_POST['one'];
$id = $_POST['id'];

$sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q1', '$one')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
}

else if ($cont == 2){
$id = $_POST['id'];
$conn = new mysqli($servername, $username, $password, $dbname);
$q2 = "FI.2. Acepta usted que sus datos de identificacion formen parte del Directorio de negocios de mujeres?";
$r2 = $_POST['r2'];
$sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q2', '$r2')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);

$conn = new mysqli($servername, $username, $password, $dbname);
$q3 = "FI.3. Tiene usted o esta usted involucrada en algun negocio?";
$r3 = $_POST['r3'];
$sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q3', '$r3')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
}



else if ($cont == 3){
    $id = $_POST['id'];
    $q4 = "FI.4.Usted diria que este negocio es un emprendimiento, MiPyme, o una actividad como profesional independiente?";
    $r4 = $_POST['r4'];


    if ($r4 == "1"){
        $r4 = "Emprendimiento";
    }
    else if ($r4 == "2"){
        $r4 = "MiPyme";
    }
    else if ($r4 == "3"){
        $r4 = "Independiente";
    }
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q4', '$r4')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    }

else if ($cont == 4){
    $id = $_POST['id'];
    $q5 = "FI.5.1 El principal propietario del negocio es";
    $r5 = $_POST['r5'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q5', '$r5')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

    $q6 = "FI.5.2 La Gerencia General y/o toma de decisiones estrategicas de este negocio es manejada por";
    $r6 = $_POST['r6'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q6', '$r6')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    }

else if ($cont == 5){
    $id = $_POST['id'];
    $q7 = "Nombre o Razon Social:";
    $r7 = $_POST['r7'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q7', '$r7')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);


    $q8 = "Cedula Juridica o Fisica:";
    $r8 = $_POST['r8'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q8', '$r8')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    }

else if ($cont == 6){
    $id = $_POST['id'];
    $q9 = "Direccion";
    $r9 = array("Distrito"=>"", "Canton"=>"", "Provincia"=>"");
    $r9["Distrito"] = $_POST['distrito'];
    $r9["Canton"] = $_POST['canton'];    
    $r9["Provincia"] = $_POST['provincia'];

    foreach($r9 as $item => $value){
        $serializedArray .= $item . ":" . $value .";";
    }

    $serializedArray = substr ($serializedArray, 0, strlen($serializedArray) - 1);

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q9', '$serializedArray')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    }

else if ($cont == 7){
    $id = $_POST['id'];
    $q10 = "Telefono";
    $r10 = array("Movil"=>"", "Fijo"=>"");
    $r10["Movil"] = $_POST['movil'];
    $r10["Fijo"] = $_POST['fijo'];    

    $conn = new mysqli($servername, $username, $password, $dbname);

    
    foreach($r10 as $item => $value){
        $serializedArray .= $item . ":" . $value .";";
    }

    $serializedArray = substr ($serializedArray, 0, strlen($serializedArray) - 1);

    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q10', '$serializedArray')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

mysqli_close($conn);
    }

else if ($cont == 8){
    $id = $_POST['id'];
    $q11 = "PI.1.4 Correos electronicos (al menos uno)";
    $r11 = array("Correo1"=>"", "Correo2"=>"");
    $r11["Correo1"] = $_POST['correo1'];
    $r11["Correo2"] = $_POST['correo2'];    

    $conn = new mysqli($servername, $username, $password, $dbname);

    
    foreach($r11 as $item => $value){
        $serializedArray .= $item . ":" . $value .";";
    }

    $serializedArray = substr ($serializedArray, 0, strlen($serializedArray) - 1);

    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q11', '$serializedArray')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    }

else if ($cont == 9){
    $id = $_POST['id'];
    $q12 = "Nombre de fantasia";
    $r12 = $_POST['r12'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q12', '$r12')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    $q13 = "Con cuantos colaboradores cuenta su empresa actualmente?";
    $r13 = $_POST['r13'];  
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q13', '$r13')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    }

else if ($cont == 10){
    $id = $_POST['id'];
    $q14 = "Inicio de operaciones";
    $r14 = $_POST['r14'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q14', '$r14')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);


    $qex1 = "Contrata otros trabajadores para proyectos ocasionales?";
    $rex1 = $_POST['ex'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$qex1', '$rex1')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    }

else if ($cont == 11){
    $id = $_POST['id'];
    $q15 = "PII.1. A que sector diria que pertenece su negocio? Puede seleccionar varios";
    $r15 = array("Agricola"=>"","Alimentaria"=>"","Pecuario y lacteos"=>"","Pesca"=>"","Plantas flores y follajes"=>""
    ,"Industria-Plastico"=>"","Industria-Metalmecanica"=>"","Industria-Farmaceutica"=>"","Industria-Cuidado personal y limpieza"=>""
    ,"Industria-Agroquimicos y fertilizantes"=>"","Industria-Manufactura avanzada"=>"","Industria-Dispositivos medicos"=>"",
    "Industria-Aerospacial y aeronautica"=>"","Industria-Construccion y ferreteria"=>"","Industria-Empaque y embalaje"=>"",
    "Industria-Maderera"=>"","Animacion digital"=>"","Biotecnologia"=>"","Filmico-Audiovisual"=>"","Moda"=>"","Servicios ambientales"=>"",
    "Servicios de diseno y construccion"=>"","Servicios de salud"=>"","Servicios educativos"=>"");
    $placeholder = $_POST['c1'];
    if ($placeholder == "false")
        $r15["Agricola"] = "No";
    else $r15["Agricola"] = "Si";

    $placeholder = $_POST['c2'];
    if ($placeholder == "false")
    $r15["Alimentaria"] = "No";
    else $r15["Alimentaria"] = "Si";

    $placeholder = $_POST['c3'];
    if ($placeholder == "false")
    $r15["Pecuario y lacteos"] = "No";
    else $r15["Pecuario y lacteos"] = "Si";

    $placeholder = $_POST['c4'];
    if ($placeholder == "false")
    $r15["Pesca"] = "No";
    else $r15["Pesca"] = "Si";

    $placeholder = $_POST['c5'];
    if ($placeholder == "false")
    $r15["Plantas flores y follajes"] = "No";
    else $r15["Plantas flores y follajes"] = "Si";

    $placeholder = $_POST['c6'];
    if ($placeholder == "false")
    $r15["Industria-Plastico"] = "No";
    else $r15["Industria-Plastico"] = "Si";

    $placeholder = $_POST['c7'];
    if ($placeholder == "false")
    $r15["Industria-Metalmecanica"] = "No";
    else $r15["Industria-Metalmecanica"] = "Si";

    $placeholder = $_POST['c8'];
    if ($placeholder == "false")
    $r15["Industria-Farmaceutica"] = "No";
    else $r15["Industria-Farmaceutica"] = "Si";

    $placeholder = $_POST['c9'];
    if ($placeholder == "false")
    $r15["Industria-Cuidado personal y limpieza"] = "No";
    else $r15["Industria-Cuidado personal y limpieza"] = "Si";

    $placeholder = $_POST['c10'];
    if ($placeholder == "false")
    $r15["Industria-Agroquimicos y fertilizantes"] = "No";
    else $r15["Industria-Agroquimicos y fertilizantes"] = "Si";

    $placeholder = $_POST['c11'];
    if ($placeholder == "false")
    $r15["Industria-Manufactura avanzada"] = "No";
    else $r15["Industria-Manufactura avanzada"] = "Si";

    $placeholder = $_POST['c12'];
    if ($placeholder == "false")
    $r15["Industria-Dispositivos medicos"] = "No";
    else $r15["Industria-Dispositivos medicos"] = "Si";

    $placeholder = $_POST['c13'];
    if ($placeholder == "false")
    $r15["Industria-Aerospacial y aeronautica"] = "No";
    else $r15["Industria-Aerospacial y aeronautica"] = "Si";

    $placeholder = $_POST['c14'];
    if ($placeholder == "false")
    $r15["Industria-Construccion y ferreteria"] = "No";
    else $r15["Industria-Construccion y ferreteria"] = "Si";

    $placeholder = $_POST['c15'];
    if ($placeholder == "false")
    $r15["Industria-Empaque y embalaje"] = "No";
    else $r15["Industria-Empaque y embalaje"] = "Si";

    $placeholder = $_POST['c16'];
    if ($placeholder == "false")
    $r15["Industria-Maderera"] = "No";
    else $r15["Industria-Maderera"] = "Si";

    $placeholder = $_POST['c17'];
    if ($placeholder == "false")
    $r15["Animacion digital"] = "No";
    else $r15["Animacion digital"] = "Si";

    $placeholder = $_POST['c18'];
    if ($placeholder == "false")
    $r15["Biotecnologia"] = "No";
    else $r15["Biotecnologia"] = "Si";

    $placeholder = $_POST['c19'];
    if ($placeholder == "false")
    $r15["Filmico-Audiovisual"] = "No";
    else $r15["Filmico-Audiovisual"] = "Si";

    $placeholder = $_POST['c20'];
    if ($placeholder == "false")
    $r15["Moda"] = "No";
    else $r15["Moda"] = "Si";

    $placeholder = $_POST['c21'];
    if ($placeholder == "false")
    $r15["Servicios ambientales"] = "No";
    else $r15["Servicios ambientales"] = "Si";

    $placeholder = $_POST['c22'];
    if ($placeholder == "false")
    $r15["Servicios de diseno y construccion"] = "No";
    else $r15["Servicios de diseno y construccion"] = "Si";

    $placeholder = $_POST['c23'];
    if ($placeholder == "false")
    $r15["Servicios de salud"] = "No";
    else $r15["Servicios de salud"] = "Si";

    $placeholder = $_POST['c24'];
    if ($placeholder == "false")
    $r15["Servicios educativos"] = "No";
    else $r15["Servicios educativos"] = "Si";

    $conn = new mysqli($servername, $username, $password, $dbname);

    foreach($r15 as $item => $value){
        $serializedArray .= $item . ":" . $value .";";
    }

    $serializedArray = substr ($serializedArray, 0, strlen($serializedArray) - 1);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q15', '$serializedArray')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    
    }

else if ($cont == 12){
    $id = $_POST['id'];
    $q16 = "PII.2 Ofrece su empresa productos o servicios de elaboracion propia, originales?";
    $r16 = $_POST['r16'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q16', '$r16')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

    $q17 = "PII.3 Por favor, describa detalladamente que produce su negocio";
    $r17 = $_POST['r17'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q17', '$r17')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    }


else if ($cont == 13){
    $id = $_POST['id'];
    $q18 = "PII.4 Diria que sus principales productos o servicios se podrian ubicar en alguna de las siguientes categorias?";
    $r18 = array("Alimentos funcionales"=>"","Agricultura sostenible"=>"","Manufactura avanzada"=>"","Servicios como biotecnologia"=>"","TI Aplicada"=>""
    ,"Servicios sostenibles"=>"");
    $otroex = array("Respuesta"=>"", "Detalle"=>"");

    $placeholder = $_POST['c25'];
    if ($placeholder == "false")
        $r18["Alimentos funcionales"] = "No";
    else $r18["Alimentos funcionales"] = "Si";
    
    $placeholder = $_POST['c26'];
    if ($placeholder == "false")
        $r18["Agricultura sostenible"] = "No";
    else $r18["Agricultura sostenible"] = "Si";

    $placeholder = $_POST['c27'];
    if ($placeholder == "false")
        $r18["Manufactura avanzada"] = "No";
    else $r18["Manufactura avanzada"] = "Si";
    
    $placeholder = $_POST['c28'];
    if ($placeholder == "false")
        $r18["Servicios como biotecnologia"] = "No";
    else $r18["Servicios como biotecnologia"] = "Si";
    
    $placeholder = $_POST['c29'];
    if ($placeholder == "false")
        $r18["TI Aplicada"] = "No";
    else $r18["TI Aplicada"] = "Si";
    
    $placeholder = $_POST['c30'];
    if ($placeholder == "false")
        $r18["Servicios sostenibles"] = "No";
    else $r18["Servicios sostenibles"] = "Si";
    
    $placeholder = $_POST['c31'];
    if ($placeholder == "false")
        $otroex["Otros"] = "No";
    else {
        $otroex["Respuesta"] = "Si";
        $otroex["Detalle"] = $_POST['otroex'];
    }

    $conn = new mysqli($servername, $username, $password, $dbname);

    foreach($r18 as $item => $value){
        $serializedArray .= $item . ":" . $value .";";
    }

    $serializedArray = substr ($serializedArray, 0, strlen($serializedArray) - 1);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q18', '$serializedArray')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

    $conn = new mysqli($servername, $username, $password, $dbname);

    foreach($otroex as $item => $value){
        $serializedArray2 .= $item . ":" . $value .";";
    }

    $serializedArray2 = substr ($serializedArray2, 0, strlen($serializedArray2) - 1);

    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', 'Otros', '$serializedArray2')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);


    }

else if ($cont == 14){
    $id = $_POST['id'];
    $q19 = "Su empresa esta registrada como PYME ante el MEIC?";
    $r19 = $_POST['r18'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q19', '$r19')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

    $q20 = "PII.6 Que le motivo a empezar la empresa o negocio?";
    $r20 = $_POST['r19'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q20', '$r20')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    }

else if ($cont == 15){
    $id = $_POST['id'];
    $q21 = "Cuanto tiempo tiene de producir para el mercado nacional?";
    $r21 = $_POST['fi1'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q21', '$r21')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

    $q22 = "Cuanto tiempo de producir para el mercado internacional?";
    $r22 = $_POST['fi2'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q22', '$r22')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);


    $q23 = "Ccmo visualiza a su empresa en un periodo de 5 años? ";
    $r23 = $_POST['fi3'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q23', '$r23')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    }


else if ($cont == 16){
    $id = $_POST['id'];
    $q24 = "PII.10 Cuenta su empresa, lista o en tramite, con alguna de las siguientes certificaciones?";
    $r24 = array("BPA (Buenas Practicas Alimenticias)"=>"","BPM (Buenas Practicas de Manufactura)"=>"","Manipulacion de alimentos"=>"","HACCP(Analisis de Riesgo y Puntos Criticos de Control)"=>""
    ,"Certificacion Organica"=>"","Fair Trade"=>"","Rain Forest Alliance"=>"","Esencial Costa Rica"=>"",
    "ISO 9001"=>"","ISO 14001"=>"");
    $otroex2 = array("Respuesta"=>"", "Detalle"=>"");
    
    $r24["BPA (Buenas Practicas Alimenticias)"] = $_POST['bpa'];
    $r24["BPM (Buenas Practicas de Manufactura)"] = $_POST['bpm'];
    $r24["Manipulacion de alimentos"] = $_POST['manipulacion'];
    $r24["HACCP(Analisis de Riesgo y Puntos Criticos de Control)"] = $_POST['haccp'];
    $r24["Certificacion Organica"] = $_POST['co'];
    $r24["Fair Trade"] = $_POST['ft'];
    $r24["Rain Forest Alliance "] = $_POST['rfa'];
    $r24["Esencial Costa Rica"] = $_POST['ecrc'];
    $r24["ISO 9001"] = $_POST['iso9001'];
    $r24["ISO 14001"] = $_POST['iso14001'];

    $otroex2["Respuesta"] = $_POST['otra'];
        if ($otroex2["Respuesta"] == "si" || $otroex["Respuesta"] == "et") {
            $otroex2["Detalle"] = $_POST['detalle2'];
        }

    $conn = new mysqli($servername, $username, $password, $dbname);

    foreach($r24 as $item => $value){
        $serializedArray .= $item . ":" . $value .";";
    }

    $serializedArray = substr ($serializedArray, 0, strlen($serializedArray) - 1);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q24', '$serializedArray')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

    $conn = new mysqli($servername, $username, $password, $dbname);

    foreach($otroex2 as $item => $value){
        $serializedArray2 .= $item . ":" . $value .";";
    }

    $serializedArray2 = substr ($serializedArray2, 0, strlen($serializedArray2) - 1);


    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', 'Otro', '$serializedArray2')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    }

else if ($cont == 17){
    $id = $_POST['id'];
     $q25 = "PII.11. Cual es el principal problema que enfrento la empresa en los ultimos 12 meses?";
     $r25 = $_POST['t12'];

     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q25', '$r25')";
     if ($conn->query($sql) === TRUE) {
         echo "New record created successfully";
     } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
     }
 
     mysqli_close($conn);

     $q26 = "PII.12. Durante los ultimos 5 años se ha asociado con otra empresa o empresas para lograr algun objetivo comercial?";
     $r26 = $_POST['r26'];

     $conn = new mysqli($servername, $username, $password, $dbname);
     $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q26', '$r26')";
     if ($conn->query($sql) === TRUE) {
         echo "New record created successfully";
     } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
     }
 
     mysqli_close($conn);
    }

else if ($cont == 40){
    $id = $_POST['id'];
    $q27 = "PII.13. Cual o cuales? Con que objetivo?";
    $r27 = $_POST['t13'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q27', '$r27')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
}

else if ($cont == 41){
    $id = $_POST['id'];
    $q28 = "PII.14. El recurso financiero con el que opera o trabaja la empresa (capital) es principalmente nacional o extranjero?";
    $r28 = $_POST['r28'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q28', '$r28')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
}

else if ($cont == 18){
    $id = $_POST['id'];
    $q29 = "PIII.1. En lo que respecta a la formalizacion e internacionalizacion, su empresa o negocio cuenta con?";
    $r29 = array("Inscripcion de la empresa en el Registro Nacional"=>"","Inscripcion de marcas en el Registro Nacional"=>"","Inscripcion en el Ministerio de Hacienda"=>"","Patente municipal"=>""
    ,"Inscripcion como patrono ante la CCSS"=>"","Inscripcion y pago de poliza de RT en el INS"=>"");
        
    $r29["Inscripcion de la empresa en el Registro Nacional"] = $_POST['rn'];
    $r29["Inscripcion de marcas en el Registro Nacional"] = $_POST['mrn'];
    $r29["Inscripcion en el Ministerio de Hacienda"] = $_POST['mh'];
    $r29["Patente municipal"] = $_POST['pm'];
    $r29["Inscripcion como patrono ante la CCSS"] = $_POST['ccss'];
    $r29["Inscripcion y pago de poliza de RT en el INS"] = $_POST['rt'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    foreach($r29 as $item => $value){
        $serializedArray .= $item . ":" . $value .";";
    }

    $serializedArray = substr ($serializedArray, 0, strlen($serializedArray) - 1);


    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q29', '$serializedArray')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    }

else if ($cont == 19){
    $id = $_POST['id'];
    $q30 = "PIII.2. Tiene cuentas bancarias a nombre de la empresa?";
    $r30 = $_POST['r30'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q30', '$r30')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

    $q31 = "PIII.3. Durante los ultimos 12 meses, ha realizado la empresa alguna venta fuera del pais?";
    $r31 = $_POST['r31'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q31', '$r31')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    }


else if ($cont == 42){
    $id = $_POST['id'];
    $qex2 = "Que producto o servicio exporto?";
    $rex2 = $_POST['tex'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$qex2', '$rex2')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
}


else if ($cont == 43){
    $id = $_POST['id'];
    $qex3 = "Hacen alianzas con otras empresas o negocios para vender fuera del pais?";
    $rex3 = $_POST['al'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$qex3', '$rex3')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
}

else if ($cont == 44){
    $id = $_POST['id'];
    $qex4 = "PIII.3.4. Por favor detalle, que tipo de alianzas realizan?";
    $rex4 = $_POST['es'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$qex4', '$rex4')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
}

else if ($cont == 21){
    $id = $_POST['id'];
    $q34 = "PIII.4. A que mercados vende estos productos?";
    $r34 = array("Centroamerica"=>"","Panama"=>"","Caribe"=>"","Otros paises latinoamericanos"=>"","Europa"=>""
    ,"Asia"=>"","Canada"=>"","EEUU"=>"");

    $placeholder = $_POST['c32'];
    if ($placeholder == "false")
        $r34["Centroamerica"] = "No";
    else $r34["Centroamerica"] = "Si";
    
    $placeholder = $_POST['c33'];
    if ($placeholder == "false")
        $r34["Panama"] = "No";
    else $r34["Panama"] = "Si";
    
    $placeholder = $_POST['c34'];
    if ($placeholder == "false")
        $r34["Caribe"] = "No";
    else $r34["Caribe"] = "Si";
    
    $placeholder = $_POST['c35'];
    if ($placeholder == "false")
        $r34["Otros paises latinoamericanos"] = "No";
    else $r34["Otros paises latinoamericanos"] = "Si";
    
    $placeholder = $_POST['c36'];
    if ($placeholder == "false")
        $r34["Europa"] = "No";
    else $r34["Europa"] = "Si";
    
    $placeholder = $_POST['c37'];
    if ($placeholder == "false")
        $r34["Asia"] = "No";
    else $r34["Asia"] = "Si";
    
    $placeholder = $_POST['c38'];
    if ($placeholder == "false")
        $r34["Canada"] = "No";
    else $r34["Canada"] = "Si";
    
    $placeholder = $_POST['c39'];
    if ($placeholder == "false")
        $r34["EEUU"] = "No";
    else $r34["EEUU"] = "Si";

    $conn = new mysqli($servername, $username, $password, $dbname);

    foreach($r34 as $item => $value){
        $serializedArray .= $item . ":" . $value .";";
    }

    $serializedArray = substr ($serializedArray, 0, strlen($serializedArray) - 1);


    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q34', '$serializedArray')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

}

else if ($cont == 22){
    $id = $_POST['id'];
    $q35 = "PIII.4.2 Es su producto o servicio un insumo de otra empresa que exporta o es exportado a otra empresa?";
    $r35 = $_POST['r35'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q35', '$r35')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    $q36 = "PIII.4.2. Que porcentaje aproximado representan las ventas fuera del pais del monto total de ventas de la empresa?";
    $placeholder = $_POST['r36'];
    $r36 = "nulo";

    if ($placeholder == "m10"){
        $r36 = "Menos del 10 %";    
    }
    else if ($placeholder == "1140"){
        $r36 = "Entre 11 y 40 %"; 
    }
    else if ($placeholder == "4170"){
        $r36 = "Entre 41 y 70 %"; 
    }
    else if ($placeholder == "71"){
        $r36 = "Mas del 71 %"; 
    }

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q36', '$r36')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    }


else if ($cont == 23){
    $id = $_POST['id'];
    $q37 = "Por favor, detalle";
    $r37 = $_POST['tr13'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q37', '$r37')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    }


else if ($cont == 24){
    $id = $_POST['id'];
    $q38 = "PIII.4.4. Durante los proximos 12 meses, piensa realizar la empresa alguna venta fuera del pais?";
    $r38 = $_POST['r38'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q38', '$r38')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
}


else if ($cont == 45){
    $id = $_POST['id'];
    $q381 = "PIII.4.5. Cual seria el principal producto o servicio que estan pensando en vender?";
    $q382 = "PIII.4.6. A que mercado planean vender?";
    $associate = array("PIII.4.5. Cual seria el principal producto o servicio que estan pensando en vender?",
    "PIII.4.6. A que mercado planean vender?");

    foreach($associate as $item => $value){
        $serializedArray .= $item . ":" . $value .";";
    }

    $serializedArray = substr ($serializedArray, 0, strlen($serializedArray) - 1);


    $rez = array("Producto"=>"","Mercado"=>"");
    $rez["Producto"] = $_POST['producto'];
    $rez["Mercado"] = $_POST['mercado'];


    foreach($rez as $item => $value){
        $serializedArray2 .= $item . ":" . $value .";";
    }

    $serializedArray2 = substr ($serializedArray2, 0, strlen($serializedArray2) - 1);


    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$serializedArray', '$serializedArray2')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
}

else if ($cont == 25){
    $id = $_POST['id'];
    $q39 = "PIII.4.7 Cuales considera ud que son las principales limitaciones al momento de exportar?";
    $r39 = array("Hay preferencia por enfocarse en el mercadolocal"=>"","Considera el riesgo muy alto, tiene temor"=>"",
    "El volumen solicitado puede superar sucapacidad productiva"=>"","Falta de informacion sobre el mercado destino"=>""
    ,"Falta de contactos comerciales"=>"","Desconocimiento de instituciones de apoyo"=>"","Desconocimiento de tramites de exportacion y logistica"=>"",
    "Problemas con tramites especificos"=>"","Falta de opciones de financiamiento"=>"","Desconocimiento de los requisitos del comprador"=>"",
    "Altos costos de produccion"=>"","Altos costos de logistica"=>"","Tipo de cambio"=>"","Escasez de materia prima o insumos"=>"",
    "Alto numero de competidores"=>"","Competencia con mejores precios"=>"");

    $otro = array("Respuesta"=>"", "Detalle"=>"");
            
    $r39["Hay preferencia por enfocarse en el mercadolocal"] = $_POST['m1'];
    $r39["Considera el riesgo muy alto, tiene temor"] = $_POST['m2'];
    $r39["El volumen solicitado puede superar sucapacidad productiva"] = $_POST['m3'];
    $r39["Falta de informacion sobre el mercado destino"] = $_POST['m4'];
    $r39["Falta de contactos comerciales"] = $_POST['m5'];
    $r39["Desconocimiento de instituciones de apoyo"] = $_POST['m6'];
    $r39["Desconocimiento de tramites de exportacion y logistica"] = $_POST['m7'];
    $r39["Problemas con tramites especificos"] = $_POST['m8'];
    $r39["Falta de opciones de financiamiento"] = $_POST['m9'];
    $r39["Desconocimiento de los requisitos del comprador"] = $_POST['m10'];
    $r39["Altos costos de produccion"] = $_POST['m11'];
    $r39["Altos costos de logistica"] = $_POST['m12'];
    $r39["Tipo de cambio"] = $_POST['m13'];
    $r39["Escasez de materia prima o insumos"] = $_POST['m14'];
    $r39["Alto numero de competidores"] = $_POST['m15'];
    $r39["Competencia con mejores precios"] = $_POST['m16'];

    $otro["Respuesta"] = $_POST['m17'];
    $otro["Detalle"] = $_POST['o1'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    foreach($r39 as $item => $value){
        $serializedArray .= $item . ":" . $value .";";
    }

    $serializedArray = substr ($serializedArray, 0, strlen($serializedArray) - 1);

    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q39', '$serializedArray')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

    $conn = new mysqli($servername, $username, $password, $dbname);
    foreach($otro as $item => $value){
        $serializedArray2 .= $item . ":" . $value .";";
    }

    $serializedArray2 = substr ($serializedArray2, 0, strlen($serializedArray2) - 1);


    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', 'Otro', '$serializedArray2')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    }

else if ($cont == 26){
    $id = $_POST['id'];
    $factoresr = $_POST['trrr13'];
    $factoresq = "PIII.4.8. Con base en su experiencia, cuales diria usted que son los tres (3) factores claves para que una empresa sea exitosa exportando?";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$factoresq', '$factoresr')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

    $q40 = "PIV.1 Ha requerido algun financiamiento para operar la empresa o negocio durante 2017 o 2018?";
    $r40 = $_POST['f'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q40', '$r40')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    }

else if ($cont == 46){
    $id = $_POST['id'];
    $q41 = "PIV.1.1 Que tipo de financiamiento?";
    $r41 = array("Recursos propios"=>"","Prestamos informales"=>"",
    "Bancos Publicos"=>"","Prestamos de otras empresas"=>""
    ,"Bancos privados"=>"","Tarjetas de credito"=>"","Proveedores"=>"",
    "Parientes/amigos"=>"","Emision de acciones"=>"","Cooperativas"=>"",
    "Org de microfinanzas"=>"","Fondos Propyme"=>"","FINADE"=>"","Programa banca para el desarrollo"=>"",
    "FOMujeres"=>"","Otras asociaciones"=>"");
        
    $otro2 = array("Respuesta"=>"", "Detalle"=>"");
                    
    $r41["Recursos propios"] = $_POST['s1'];
    $r41["Prestamos informales"] = $_POST['s2'];
    $r41["Bancos Publicos"] = $_POST['s3'];
    $r41["Prestamos de otras empresas"] = $_POST['s4'];
    $r41["Bancos privados"] = $_POST['s5'];
    $r41["Tarjetas de credito"] = $_POST['s6'];
    $r41["Proveedores"] = $_POST['s7'];
    $r41["Parientes/amigos"] = $_POST['s8'];
    $r41["Emision de acciones"] = $_POST['s9'];
    $r41["Cooperativas"] = $_POST['s10'];
    $r41["Org de microfinanzas"] = $_POST['s11'];
    $r41["Fondos Propyme"] = $_POST['s12'];
    $r41["FINADE"] = $_POST['s13'];
    $r41["Programa banca para el desarrollo"] = $_POST['s14'];
    $r41["FOMujeres"] = $_POST['s15'];
    $r41["Otras asociaciones"] = $_POST['s16'];
      
    $otro2["Respuesta"] = $_POST['s17'];
    $otro2["Detalle"] = $_POST['otro2'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    foreach($r41 as $item => $value){
        $serializedArray .= $item . ":" . $value .";";
    }

    $serializedArray = substr ($serializedArray, 0, strlen($serializedArray) - 1);


    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q41', '$serializedArray')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

    $conn = new mysqli($servername, $username, $password, $dbname);
    foreach($otro2 as $item => $value){
        $serializedArray2 .= $item . ":" . $value .";";
    }

    $serializedArray2 = substr ($serializedArray2, 0, strlen($serializedArray2) - 1);


    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', 'Otro', '$serializedArray2')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    
    $fq = "Para que fines ha utilizado el financiamiento?";
    $f1 = array("Compra de materia prima o insumos"=>"","Compra de maquinaria"=>"",
    "Obtener certificaciones"=>"","Mejoras a las instalaciones de la empresa"=>""
    ,"Pago de Planillas"=>"");
    
    $f1["Compra de materia prima o insumos"] = $_POST['f1'];
    $f1["Compra de maquinaria"] = $_POST['f2'];
    $f1["Obtener certificaciones"] = $_POST['f3']; 
    $f1["Mejoras a las instalaciones de la empresa"] = $_POST['f4'];
    $f1["Pago de Planillas"] = $_POST['f5'];
    
    $otro3 = array("Respuesta"=>"", "Detalle"=>"");
    
    $otro3["Respuesta"] = $_POST['f6'];
    $otro3["Detalle"] = $_POST ['t15'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    foreach($f1 as $item => $value){
        $serializedArray3 .= $item . ":" . $value .";";
    }

    $serializedArray3 = substr ($serializedArray3, 0, strlen($serializedArray3) - 1);

    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$fq', '$serializedArray3')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

    $conn = new mysqli($servername, $username, $password, $dbname);
    foreach($otro3 as $item => $value){
        $serializedArray4 .= $item . ":" . $value .";";
    }

    $serializedArray4 = substr ($serializedArray4, 0, strlen($serializedArray4) - 1);

    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', 'Otro', '$serializedArray4')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    }

else if ($cont == 27){
    $id = $_POST['id'];
    $q43 = "PIV.1 Ha utilizado alguna vez el apoyo de PROCOMER?";
    $r43 = $_POST['r43'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q43', '$r43')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    }

else if ($cont == 47){
    $id = $_POST['id'];
    $especifico = "PV.1.1 En cual o cuales areas?";
    $re = array("Ferias, misiones comerciales"=>"","Asesoria logistica"=>"",
    "Asesoria en el CACEX"=>"","Acceso a estudios"=>""
    ,"Capacitaciones"=>"","Tramites"=>"","Encadenamientos"=>"");

    $re["Ferias, misiones comerciales"] = $_POST['z1'];
    $re["Asesoria logistica"] = $_POST['z2'];
    $re["Asesoria en el CACEX"] = $_POST['z3'];
    $re["Acceso a estudios"] = $_POST['z4'];
    $re["Capacitaciones"] = $_POST['z5'];
    $re["Tramites"] = $_POST['z6'];
    $re["Encadenamientos"] = $_POST['z7'];

    $otro4 = array("Respuesta"=>"", "Detalle"=>"");
    $otro4["Respuesta"] = $_POST['z8'];
    $otro4["Detalle"] = $_POST ['otro4'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    foreach($re as $item => $value){
        $serializedArray .= $item . ":" . $value .";";
    }

    $serializedArray = substr ($serializedArray, 0, strlen($serializedArray) - 1);


    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$especifico', '$serializedArray')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

    $conn = new mysqli($servername, $username, $password, $dbname);
    foreach($otro4 as $item => $value){
        $serializedArray2 .= $item . ":" . $value .";";
    }

    $serializedArray2 = substr ($serializedArray2, 0, strlen($serializedArray2) - 1);

    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', 'Otro', '$serializedArray2')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
}

else if ($cont == 28){
    $id = $_POST['id'];
    $q44 = "PV.2. Pertenece usted a alguna de las siguientes asociaciones o redes de empresas?";
    $r44 = array("La Red Violeta"=>"","Mujeres en Beta"=>"",
    "De.Mentes"=>"","SulaBatsu"=>""
    ,"Voces Vitales"=>"","Foro de Mujeres Empresarias"=>"","WeConnect"=>"",
    "Nosotras WeConnecting"=>"","AED"=>"");
    
    $r44["La Red Violeta"] = $_POST['sub1'];
    $r44["Mujeres en Beta"] = $_POST['sub2'];
    $r44["De.Mentes"] = $_POST['sub3'];
    $r44["SulaBatsu"] = $_POST['sub4'];
    $r44["Voces Vitales"] = $_POST['sub5'];
    $r44["Foro de Mujeres Empresarias"] = $_POST['sub6'];
    $r44["WeConnect"] = $_POST['sub7'];
    $r44["Nosotras WeConnecting"] = $_POST['sub8'];
    $r44["AED"] = $_POST['sub9'];

    $otro5 = array("Respuesta"=>"", "Detalle"=>"");
    $otro5["Respuesta"] = $_POST['sub10'];
    $otro5["Detalle"] = $_POST ['otro5'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    foreach($r44 as $item => $value){
        $serializedArray .= $item . ":" . $value .";";
    }

    $serializedArray = substr ($serializedArray, 0, strlen($serializedArray) - 1);

    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q44', '$serializedArray')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

    $conn = new mysqli($servername, $username, $password, $dbname);
    foreach($otro5 as $item => $value){
        $serializedArray2 .= $item . ":" . $value .";";
    }

    $serializedArray2 = substr ($serializedArray2, 0, strlen($serializedArray2) - 1);

    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', 'Otro', '$serializedArray2')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

    $q45 = "PV.3. Ha participado su empresa en eventos, ferias, ruedas de negocio, en los ultimos 3 años?";
    $r45 = $_POST['r45'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q45', '$r45')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    }
    

else if ($cont == 29){
    $id = $_POST['id'];
    $q46 = "PV.3.1. Para los que respondieron SI en PV.3. En cuales?";
    $r46 = $_POST['r46'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q46', '$r46')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    }

else if ($cont == 30){
    $id = $_POST['id'];
    $q47 = "PV.4. Ha recibido usted y/o su personal capacitacion en? ";
    $r47 = array("Aspectos tecnicos del trabajo"=>"","Asistencia profesional"=>"",
    "Habilidades blandas"=>"");
    
    $r47["Aspectos tecnicos del trabajo"] = $_POST['sec1'];
    $r47["Asistencia profesional"] = $_POST['sec2'];
    $r47["Habilidades blandas"] = $_POST['sec3'];
    
    $otro6 = array("Respuesta"=>"", "Detalle"=>"");
    $otro6["Respuesta"] = $_POST['sec4'];
    $otro6["Detalle"] = $_POST ['otro6'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    foreach($r47 as $item => $value){
        $serializedArray .= $item . ":" . $value .";";
    }

    $serializedArray = substr ($serializedArray, 0, strlen($serializedArray) - 1);


    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q47', '$serializedArray')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

    $conn = new mysqli($servername, $username, $password, $dbname);
    foreach($otro6 as $item => $value){
        $serializedArray2 .= $item . ":" . $value .";";
    }

    $serializedArray2 = substr ($serializedArray2, 0, strlen($serializedArray2) - 1);


    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', 'Otro', '$serializedArray2')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

    $q48 = "PV.5. Ha recibido usted y/o su personal capacitacion en Programas de fortalecimiento de capacidades para emprendedores o PYMES?";
    $r48 = $_POST['p1'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q48', '$r48')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    }
    
else if ($cont == 31){
    $id = $_POST['id'];
    $q49 = "PV.5.1. Para los que respondieron SI en PV.5. En cuales?";
    $r49 = array("Mujeres Emprendedoras MEIC"=>"","Avanzamos INAMU"=>"",
    "Feria Mujeres Empresarias INAMU"=>"","FoMujeres INAMU"=>""
    ,"Programa para el Desarrollo de la Mujer Emprendedora - Camara de Comercio de Costa Rica"=>"","Al Invest"=>"",
    "Programa de Liderazgo Ejecutivo de la Mujer INCAE"=>"",
    "Programa Acelera BAC Credomatic"=>"","Mujer 360 Banco Nacional"=>"","VV Grow"=>"",
    "Proyecto Emprende Inamu, MEIC, INAMU"=>"","Proyecto MADC"=>"","Proyecto Procalidad"=>""); 
    
    $otro7 = array("Respuesta"=>"", "Detalle"=>"");
                
    $r49["Mujeres Emprendedoras MEIC"] = $_POST['p2'];
    $r49["Avanzamos INAMU"] = $_POST['p3'];
    $r49["Feria Mujeres Empresarias INAMU"] = $_POST['p4'];
    $r49["FoMujeres INAMU"] = $_POST['p5'];
    $r49["Programa para el Desarrollo de la Mujer Emprendedora - Camara de Comercio de Costa Rica"] = $_POST['p6'];
    $r49["Al Invest"] = $_POST['p7'];
    $r49["Programa de Liderazgo Ejecutivo de la Mujer INCAE"] = $_POST['p8'];
    $r49["Programa Acelera BAC Credomatic"] = $_POST['p9'];
    $r49["Mujer 360 Banco Nacional"] = $_POST['p10'];
    $r49["VV Grow"] = $_POST['p11'];
    $r49["Proyecto Emprende Inamu, MEIC, INAMU"] = $_POST['p12'];
    $r49["Proyecto MADC"] = $_POST['p13'];
    $r49["Proyecto Procalidad"] = $_POST['p14'];
    
    $otro7["Respuesta"] = $_POST['p15'];
    $otro7["Detalle"] = $_POST['otro7'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    foreach($r49 as $item => $value){
        $serializedArray .= $item . ":" . $value .";";
    }

    $serializedArray = substr ($serializedArray, 0, strlen($serializedArray) - 1);

    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q49', '$serializedArray')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);


    $conn = new mysqli($servername, $username, $password, $dbname);
    foreach($otro7 as $item => $value){
        $serializedArray2 .= $item . ":" . $value .";";
    }

    $serializedArray2 = substr ($serializedArray2, 0, strlen($serializedArray2) - 1);


    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', 'Otro', '$serializedArray2')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    }

else if ($cont == 32){
    $id = $_POST['id'];
    $q50 = "PVI.1 Cuenta su empresa con?";
    $r50 = array("Sitio web propio"=>"","Logo original"=>"",
    "Email corporativo"=>"","Redes sociales"=>""); 
                    
    $r50["Sitio web propio"] = $_POST['re1'];
    $r50["Logo original"] = $_POST['re2'];
    $r50["Email corporativo"] = $_POST['re3'];
    $r50["Redes sociales"] = $_POST['re4'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    foreach($r50 as $item => $value){
        $serializedArray .= $item . ":" . $value .";";
    }

    $serializedArray = substr ($serializedArray, 0, strlen($serializedArray) - 1);

    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q50', '$serializedArray')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

    $q501 = "Estudios de mercado";
    $estudios = array("Competencia"=>"","Plan"=>"",
    "Libro"=>"","Canal de ventas"=>"");
                    
    $estudios["Competencia"] = $_POST['d1'];
    $estudios["Plan"] = $_POST['d2'];
    $estudios["Libro"] = $_POST['d3'];
    $estudios["Canal de ventas"] = $_POST['d4'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    foreach($estudios as $item => $value){
        $serializedArray2 .= $item . ":" . $value .";";
    }

    $serializedArray2 = substr ($serializedArray2, 0, strlen($serializedArray2) - 1);

    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q501', '$serializedArray2')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

    $q502 = "Estrategias a canales de venta";
    $cv = array("Digital"=>"","Detal"=>"",
    "Mayor"=>"","Domicilio"=>"");
                    
    $cv["Digital"] = $_POST['v1'];
    $cv["Detal"] = $_POST['v2'];
    $cv["Mayor"] = $_POST['v3'];
    $cv["Domicilio"] = $_POST['v4'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    foreach($cv as $item => $value){
        $serializedArray3 .= $item . ":" . $value .";";
    }

    $serializedArray3 = substr ($serializedArray3, 0, strlen($serializedArray3) - 1);

    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q502', '$serializedArray3')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

    $q503 = "Proyeccion de ventas por periodos";
    $p = array("Anuales"=>"","Semestrales"=>"",
    "Trimestrales"=>"");
                    
    $p["Anuales"] = $_POST['pe1'];
    $p["Semestrales"] = $_POST['pe2'];
    $p["Trimestrales"] = $_POST['pe3'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    foreach($p as $item => $value){
        $serializedArray4 .= $item . ":" . $value .";";
    }

    $serializedArray4 = substr ($serializedArray4, 0, strlen($serializedArray4) - 1);

    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q503', '$serializedArray4')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    }

else if ($cont == 33){
    $id = $_POST['id'];
    $q52 = "PVI.3. Cual diria usted que es el mejor aproximado de su volumen de ventas anual actualmente (en colones)?";
    $r52 = array("Nacionales"=>"","Internacionales"=>"");

    $placeholder = $_POST['nacional'];
    if ($placeholder == "0"){
        $r52["Nacionales"]= "No hubo ventas";
    }
    if ($placeholder == "5"){
        $r52["Nacionales"]= "Menos de 5 millones";
    }
    else if ($placeholder == "610"){
        $r52["Nacionales"]= "Entre 6 y 10 millones";
    }
    else if ($placeholder == "1120"){
        $r52["Nacionales"]= "Entre 11 y 20 millones";
    }
    else if ($placeholder == "2140"){
        $r52["Nacionales"]= "Entre 21 y 40 millones";
    }
    else if ($placeholder == "41100"){
        $r52["Nacionales"]= "Entre 41 y 100 millones";
    }
    else if ($placeholder == "101250"){
        $r52["Nacionales"]= "Entre 101 y 250 millones";
    }
    else if ($placeholder == "250"){
        $r52["Nacionales"]= "Mas de 250 millones";
    }

    $placeholder = $_POST['internacional'];
    if ($placeholder == "0"){
        $r52["Internacionales"]= "No hubo ventas";
    }
    if ($placeholder == "5"){
        $r52["Internacionales"]= "Menos de 5 millones";
    }
    else if ($placeholder == "610"){
        $r52["Internacionales"]= "Entre 6 y 10 millones";
    }
    else if ($placeholder == "1120"){
        $r52["Internacionales"]= "Entre 11 y 20 millones";
    }
    else if ($placeholder == "2140"){
        $r52["Internacionales"]= "Entre 21 y 40 millones";
    }
    else if ($placeholder == "41100"){
        $r52["Internacionales"]= "Entre 41 y 100 millones";
    }
    else if ($placeholder == "101250"){
        $r52["Internacionales"]= "Entre 101 y 250 millones";
    }
    else if ($placeholder == "250"){
        $r52["Internacionales"]= "Mas de 250 millones";
    }

    $conn = new mysqli($servername, $username, $password, $dbname);
    foreach($r52 as $item => $value){
        $serializedArray .= $item . ":" . $value .";";
    }

    $serializedArray = substr ($serializedArray, 0, strlen($serializedArray) - 1);

    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q52', '$serializedArray')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    
    $q53 = "PVI.4. Diria usted que las ventas del 2018 fueron superiores a las de 2017? En que proporcion?  (%)";
    $r53 = array("Respuesta"=>"","Porcentaje"=>"");

    $placeholder = $_POST['rr59'];

        if ($placeholder == "no"){
            $r53["Respuesta"] = "no";
            $r53["Porcentaje"] = "N/A";
        }

    $conn = new mysqli($servername, $username, $password, $dbname);
    $temp = $r53["Respuesta"];
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q53', '$temp')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

    }

else if ($cont == 48){
    $id = $_POST['id'];
    $r53["Porcentaje"] = $_POST['r59'];
    $temp = $r53["Porcentaje"];

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', 'Porcentaje', '$temp')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
}

else if ($cont == 34){
    $id = $_POST['id'];
    $q54 = "PVII.1.A continuacion se le presentan un conjunto de frases y le pedimos que indique que tan de acuerdo esta con cada una de esas frases(Favor utilizar la siguiente escala: 1. Muy en desacuerdo 2. Algo en desacuerdo 3. Algo de acuerdo 4. Muy de acuerdo)";
    $r54 = array("Nadie puede velar por mis intereses, a excepcion de mis familiares"=>"","Uno debe tener amistades en todas partes para resolver los problemas"=>"",
    "Unirse con la gente lo que trae es problemas"=>"","Las leyes las hacen los poderosos para su beneficio"=>""); 

    $r54["Nadie puede velar por mis intereses, a excepcion de mis familiares"]= $_POST['g1'];
    $r54["Uno debe tener amistades en todas partes para resolver los problemas"]= $_POST['g2'];
    $r54["Unirse con la gente lo que trae es problemas"]= $_POST['g3'];
    $r54["Las leyes las hacen los poderosos para su beneficio"]= $_POST['g4'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    foreach($r54 as $item => $value){
        $serializedArray .= $item . ":" . $value .";";
    }

    $serializedArray = substr ($serializedArray, 0, strlen($serializedArray) - 1);

    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q54', '$serializedArray')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

    $q55 = "PVIII.1.A continuacion se le presentan un conjunto de frases y le pedimos que indique que tan de acuerdo esta con cada una de esas frases(Favor utilizar la siguiente escala: 1. Muy en desacuerdo 2. Algo en desacuerdo 3. Algo de acuerdo 4. Muy de acuerdo)";
    $r55 = array("El rumbo de la vida esta escrito y uno no puede cambiarlo"=>"","La suerte es un factor muy importante para lograr el exito"=>"",
    "Hay gente con suerte y por eso se le dan las cosas"=>"","Casi siempre el fracaso es por culpa de fuerzas que no controlamos"=>""); 

    $r55["El rumbo de la vida esta escrito y uno no puede cambiarlo"]= $_POST['q1'];
    $r55["La suerte es un factor muy importante para lograr el exito"]= $_POST['q2'];
    $r55["Hay gente con suerte y por eso se le dan las cosas."]= $_POST['q3'];
    $r55["Casi siempre el fracaso es por culpa de fuerzas que no controlamos"]= $_POST['q4'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    foreach($r55 as $item => $value){
        $serializedArray2 .= $item . ":" . $value .";";
    }

    $serializedArray2 = substr ($serializedArray2, 0, strlen($serializedArray2) - 1);

    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q54', '$serializedArray2')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    }

else if ($cont == 35){
    $id = $_POST['id'];
    $q56 = "PIX.1.A continuacion se le presentan un conjunto de frases y le pedimos que indique que tan de acuerdo esta con cada una de esas frases(Favor utilizar la siguiente escala: 1. Muy en desacuerdo 2. Algo en desacuerdo 3. Algo de acuerdo 4. Muy de acuerdo)";
    $r56 = array("Puedo superar momentos dificiles porque ya he pasado por dificultades anteriormente"=>"","Generalmente me las arreglo de una manera u otra"=>"",
    "Me considero una persona muy optimista y persistente"=>"","Las situaciones estresantes me afectan fisica y emocionalmente"=>""); 
    
    $r56["Puedo superar momentos dificiles porque ya he pasado por dificultades anteriormente"]= $_POST['k1'];
    $r56["Generalmente me las arreglo de una manera u otra"]= $_POST['k2'];
    $r56["Me considero una persona muy optimista y persistente"]= $_POST['k3'];
    $r56["Las situaciones estresantes me afectan fisica y emocionalmente"]= $_POST['k4'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    foreach($r56 as $item => $value){
        $serializedArray .= $item . ":" . $value .";";
    }

    $serializedArray = substr ($serializedArray, 0, strlen($serializedArray) - 1);

    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q56', '$serializedArray')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
}

else if ($cont == 36){
    $id = $_POST['id'];
    $q57 = "PIX.1. A continuacion se le presentan un conjunto de frases y le pedimos que las ordene jerarquicamente del 1 al 4, segun su prioridad (asignando 1 al mas importante y 4 al menos importante)";
    $r57 = array("Dar sustento a mi familia y un beneficio a mis empleados"=>"","Posicionar mi establecimiento como el mejor en su ramo"=>""
    ,"Que los demas valoren mi esfuerzo y me consideren un experto en mi trabajo"=>"","Lograr cada vez mayor crecimiento de mi negocio"=>""); 
    
    $r57["Dar sustento a mi familia y un beneficio a mis empleados"]= $_POST['t18'];
    $r57["Posicionar mi establecimiento como el mejor en su ramo"]= $_POST['t19'];
    $r57["Que los demas valoren mi esfuerzo y me consideren un experto en mi trabajo"]= $_POST['t20'];
    $r57["Lograr cada vez mayor crecimiento de mi negocio"]= $_POST['t21'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    foreach($r57 as $item => $value){
        $serializedArray .= $item . ":" . $value .";";
    }

    $serializedArray = substr ($serializedArray, 0, strlen($serializedArray) - 1);


    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q57', '$serializedArray')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    

}

else if ($cont == 37){
    $id = $_POST['id'];
    $q58 = "PARTE XI.  DATOS DEL ENTREVISTADO (PARA VALIDACION)";
    $r58 = array("Nombre"=>"","Apellido"=>"","Edad"=>"","Etnia"=>"","Propietario"=>"",
    "Educacion"=>"","Correo"=>"","Posicion"=>"","Provincia"=>"","Canton"=>"","Distrito"=>""); 
    
    $r58["Nombre"]= $_POST['t22'];
    $r58["Apellido"]= $_POST['t23'];
    $r58["Edad"]= $_POST['t24'];
    $r58["Etnia"]= $_POST['etnia'];   
    $r58["Correo"]= $_POST['tr25'];
    $r58["Posicion"]= $_POST['t26'];
    $r58["Provincia"]= $_POST['t27'];
    $r58["Canton"]= $_POST['t28'];
    $r58["Distrito"]= $_POST['t29'];
    $r58["Educacion"]= $_POST['educacion'];
    $r58["Propietario"]= $_POST['propi'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    foreach($r58 as $item => $value){
        $serializedArray .= $item . ":" . $value .";";
    }

    $serializedArray = substr ($serializedArray, 0, strlen($serializedArray) - 1);

    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '$q58', '$serializedArray')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }



    mysqli_close($conn); 

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO encuesta (id, pregunta, respuesta) VALUES ('$id', '1', '1')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn); 
}

else if ($cont == 38){
    $id = $_POST['id'];
    echo $id."\n";
}
?>