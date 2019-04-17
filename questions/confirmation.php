<?php
    include_once 'answers.php';
?>

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
            <div class= "topnav">
                <ul>
                    <li class="active">
                        <a href="#">Principal</a>
                    </li>
                </ul>
            </div>
    
        <!-- Container de las preguntas -->
        <div id="main" class="main-container" style="height:500px;max-width:1000px;width:900px;background:#f3ecec;" >	
					
            <div class="m-scene main-content animated fadeInRightBig">

				<div class="panel panel-default">

        <!-- Pregunta 1 -->
				  <div class="panel-heading" style="background-color:#d0adaf">&nbsp;FI.1. ¿Sería usted tan amable de regalarnos unos minutos para responder algunas preguntas?.Por favor considere que no hay respuestas buenas ni malas, y que la información será tratada de manera generalizada para fines estadísticos.</div>
				  <div class="panel-body">
                  <div class="hr-line-dashed"></div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label"><br/>
                                    <small class="text-navy"></small></label>
                                    <div class="col-sm-10">
                                        <form action = "" method ="post">
                                        <div><label> <input type="radio" value="si" id="optionsRadios1" name="optionsRadios" > Sí </label></div>
                                        <div><label> <input type="radio" value="no" id="optionsRadios2" name="optionsRadios" 
                                            >  No </label></div>
                                    </div>
                                </div>
                    <div id="TopNav" style="background:#fff">
				        <a class="hide-links" href="http://www.corporacionjsk.es">
					        <button class="btn btn-default" style="float:right;">&nbsp;Cancelar</button>
				    </a>	
					
				    <a class="hide-links" href="negotiation.php">
					<button class="btn btn-default" style="float:right;">&nbsp;Continuar</button>
				</a>	
			</div>				
        </div>		
                  </div>		  
                </div>	
            </div>
</header>
<body>    
        <!-- Slider -->
        
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>		
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
		<script type="text/javascript" src="scripts/jquery.smoothState.js"></script>		
        <script type="text/javascript" src="scripts/functions.js"></script>		
        

        <!-- PHP -->

        <?php
            $a = new answers();
            $a->constructor($a->getOne(),$a->getTwo(),$a->getThree(),$a->getFour(),$a->getFive(),$a->getSix()); 
           /* var_dump($_POST);

                if (isset($_POST['optionRadios'])) {
                    $foo = $_POST['optionRadios'];
                }

                if (isset($_POST['submitBttn'])) {
                    $a->setOne($foo);
                    echo $a->getOne();
                }

                if ($a->checkYN($a->getOne()) == 0){
                    readfile('terminate.html');
                }*/
        ?>
		
    </body>
</html>