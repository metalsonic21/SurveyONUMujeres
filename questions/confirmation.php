<?php
    include_once 'answers.php';?>

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
        <div id="main" class="main-container animated fadeInRightBig" style="height:410px;max-width:1000px;width:900px;background:#fffff;" >	
					
            <div class="m-scene main-content animated fadeInRightBig">

				<div class="panel panel-default">


        <!-- Pregunta 1 -->

                <div class="panel-heading" style="background-color:#fffff">&nbsp;FI.1. ¿Sería usted tan amable de regalarnos unos minutos para responder algunas preguntas?.Por favor considere que no hay respuestas buenas ni malas, y que la información será tratada de manera generalizada para fines estadísticos.</div>
                <div class="panel-body" >
                <div class="hr-line-dashed"></div>   
                <div class="form-group row"><label class="col-sm-2 col-form-label"><br/>
                <small class="text-navy"></small></label>
                <form action="" method="post">
                <div class="col-sm-10">
                <div><label><input type="radio" name="radio" id="r1" value="si" >Sí</label></div>
                <div><label><input type="radio" name="radio" id="r2" value="no" >No</label></div>
                </div>
                </div>
                <br></br><br></br>

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
<!-- PHP -->
<?php
                    $f1="nulo";
                    $a = new answers();
                    $a->constructor("testone","testtwo","testthree","testfour","testfive","testsix"); 
                if(isset($_POST['radio']))
                {
                $f1 = $_POST['radio'];
                $a->setOne($f1);
                echo ($a->checkYN($a->getOne()));
                
                }?>


<body>    
        <!-- Slider -->
        
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>		
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
		<script type="text/javascript" src="scripts/jquery.smoothState.js"></script>		
        <script type="text/javascript" src="scripts/functions.js"></script>		
        
        
        </header>
        
      <!-- Imágenes --> 
      <div class="container text-center" style="width:100%;">
            <img src="https://i.imgur.com/KAs344v.jpg" alt="inn_logo" class="img-thumbail img-fluid" style="width:220px;height:150px;">
          <img src="https://i.imgur.com/SKxuaq5.jpg" alt="ccs_logo" class="img-thumbail img-fluid" style="width:280px;height:150px;">
          <img src="https://i.imgur.com/QjCmXZa.png" alt="ccs_logo" class="img-thumbail img-fluid" style="width:280px;height:150px;">
        </div>
        <br></br>

        <!-- PHP (Validaciones) -->
<?php
            if (isset($_POST['submitbttn'])) {
                if ($a->checkYN($a->getOne())==0){
                    readfile("terminate.html");
                }
                else if($a->checkYN($a->getOne())==1) {
                    header("Location: negotiation.php"); 
                    exit();
                }
            }
        ?>
    </body>


        <!-- Verificar si radios están seleccionados -->

        <script type="text/javascript" >
            function formValidation(oEvent) { 
            oEvent = oEvent || window.event; 
            var txtField = oEvent.target || oEvent.srcElement; 

            var t1ck=true;
            var msg=" ";
            if(!document.getElementById("r1").checked && !document.getElementById("r2").checked){ t1ck=false;}

            //alert(msg + t1ck);

            if(t1ck){document.getElementById("submitbttn").disabled = false;
            msg=msg+ " <b> Submit Button is enabled </b>";
            }
            else{document.getElementById("submitbttn").disabled = true; 
            msg=msg+ " <b> Submit Button is disabled </b>";
            }// end of if checking status of t1ck variable 
            } 

            window.onload = function () { 
            var btnSignUp = document.getElementById("submitbttn"); 

            var r1 = document.getElementById("r1"); 
            var r2 = document.getElementById("r2"); 

            var t1ck=false;
            document.getElementById("submitbttn").disabled = true;
            r1.onclick = formValidation; 
            r2.onclick = formValidation; 
}
    </script>
</html>