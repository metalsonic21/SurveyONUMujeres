<!-- PHP (Validaciones) -->
<?php
    include_once 'answers.php';
        $f1="nulo";
        $f2;
        $a = new answers();
        $a->constructor("testone","testtwo","testthree","testfour","testfive","testsix"); 

        if(isset($_POST['radio'])){
        $f1 = $_POST['radio'];
        $a->setTwo($f1);
        }

        if(isset($_POST['radio2'])){
            $f2 = $_POST['radio2'];
            $a->setThree($f2);}

        if (isset($_POST['submitbttn'])) {
            if ($a->checkYN($a->getThree())==0){
                readfile("terminate.html");
            }
            else if($a->checkYN($a->getThree())==1) {
                header("Location: filter3.php"); 
                exit();
            }
            }?>


<!doctype html>
<html>
    <head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />		
        <title> ONU MUJERES & PROCOMER </title>
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="css/iCheck/custom.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/questions.css">
		<link rel="stylesheet" href="css/animate.css">		
        <link rel="stylesheet" href="css/pageTransitions.css?v=2"> 	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 					
    </head>
    <header>
    <!-- Inicio --> 
    <div class= "title">
                    <h1>ONU MUJERES & PROCOMER</h1>
            </div>
    <br></br><br></br><br></br>
        <!-- Container de las preguntas -->
        <div id="main" class="main-container animated fadeInRightBig" style="height:380px;max-width:1000px;width:900px;background:#fffff" >	
					
            <div class="m-scene main-content animated fadeInRightBig">

				<div class="panel panel-default">

        <!-- Pregunta 1 -->
		    <div class="panel-heading">&nbsp;FI.2. ¿Acepta usted que sus datos de identificación formen parte del Directorio de negocios de mujeres?</div>
			<div class="panel-body">
            <div class="hr-line-dashed"></div>
            <div class="form-group row"><label class="col-sm-2 col-form-label"><br/>
            <small class="text-navy"></small></label>
            <div class="col-sm-10">
            <form action = "" method ="post">
            <div><label> <input type="radio" value="si" name="radio" > Sí </label></div>
            <div><label> <input type="radio" value="no" name="radio"> No </label></div>
            </div>
            </div>
            </div>
        </div>


        <!-- Pregunta 2 -->
            <div class="panel panel-default">
            <div class="panel-heading" style="background-color:#fffff">&nbsp;FI.3. ¿Tiene usted o está usted involucrada en algún negocio?</div>
			<div class="panel-body">
            <div class="hr-line-dashed"></div>
            <div class="form-group row"><label class="col-sm-2 col-form-label"><br/>
            <small class="text-navy"></small></label>
            <div class="col-sm-10">
            <div><label> <input type="radio" value="si" name="radio2"> Sí </label></div>
            <div><label> <input type="radio" value="no" name="radio2"> No</label></div>
            </div>
            </div>

            <!-- Aceptar/Cancelar -->
            <div id="TopNav" style="background:#fff">
                <a class="hide-links" href="http://www.corporacionjsk.es">
					        <button class="btn btn-default" style="float:right;">&nbsp;Cancelar</button>
                </a>
                <form>
                <input type="submit" name="submitbttn" value="Continuar" id="submitbttn" class="btn btn-default" style="float:right"/>
                </form>    
            </div>
            </div>
            </div>
            </div>
                </form>
                </header>
            <!-- PHP -->
    <body>
        <!-- Slider -->
        
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>		
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
		<script type="text/javascript" src="scripts/jquery.smoothState.js"></script>		
        <script type="text/javascript" src="scripts/functions.js"></script>		
        
        

        
      <!-- Imágenes --> 
      <div class="container text-center" style="width:100%;">
            <img src="https://i.imgur.com/KAs344v.jpg" alt="inn_logo" class="img-thumbail img-fluid" style="width:220px;height:150px;">
          <img src="https://i.imgur.com/SKxuaq5.jpg" alt="ccs_logo" class="img-thumbail img-fluid" style="width:280px;height:150px;">
          <img src="https://i.imgur.com/QjCmXZa.png" alt="ccs_logo" class="img-thumbail img-fluid" style="width:280px;height:150px;">
        </div>
        <br></br>
            </body>
</html>