<!-- PHP (Validaciones) -->
<?php
    include_once 'answers.php';
        $f1="";
        $f2="";
        $check = false;
        $a = new answers();
        $a->constructorf1("", "", "", "", "", "", "", "", ""); 

        if (isset($_GET['submitbttn'])) {
            $f1 = $_GET['t1'];
            $f2 = $_GET['t2'];
            if ((strlen($f1)>0) && (strlen($f1)<=70))
                if ((strlen($f2)>0) && (strlen($f2)<=70)){
                $a->setSeven($f1);
                $a->setEight($f2);
                readfile("part1.php");
            }
            }?>

<!doctype html>
<html>
    <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> ONU MUJERES & PROCOMER </title>
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/iCheck/custom.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/questions.css">
        <link rel="stylesheet" href="css/animate.css">		
        <link href="css/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/pageTransitions.css?v=2"> 	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 					
    </head>
    <header style="padding-top: 0px;">
    <!-- Inicio --> 
    <div class= "title">
                    <h1>ONU MUJERES & PROCOMER</h1>
            </div>
    <br></br><br></br><br></br><br></br>
        <!-- Container de las preguntas -->
        <div id="main" class="main-container animated fadeInRightBig" style="background:#fffff;" >	
					
            <div class="m-scene main-content animated fadeInRightBig">

				<div class="panel panel-default">

        <!-- Pregunta 1 -->
			<div class="panel-heading">&nbsp;PI.1. Datos básicos del negocio:</div>
			<div class="panel-body">
            <div class="hr-line-dashed"></div>
            <form action="" method="get">
            <div class="form-group row"><label class="col-sm-2 col-form-label">Nombre o Razón Social de la Empresa/Negocio</label>
            <div class="col-sm-10"><textarea onkeyup="charcountupdate(this.value)" input type="text" id="t1" name="t1" class="form-control" style="float:right" ></textarea></div> 
            <span id="charcount" class="form-text m-b-none" style="position:absolute;top:35%;left:82%">0 de 70 caracteres</span>
            </div>
            </div>
            </div>

            
        <!-- Pregunta 2 -->
            <div class="panel panel-default">
			<div class="panel-body">
            <div class="hr-line-dashed"></div>
            <div class="form-group row"><label class="col-sm-2 col-form-label">Cédula Jurídica o Física</label>
            <div class="col-sm-10"><textarea onkeyup="charcountupdateh(this.value)" input type="text" id="t2" name="t2" class="form-control" style="float:right">Por favor no utilice puntos, comas ni guiones, solo letras y/o números</textarea></div> 
            <span id="charcount2" class="form-text m-b-none" style="position:absolute;top:78%;left:82%">0 de 120 caracteres</span>            
            </div>
            </div>
            </div>

        <!-- Aceptar/Cancelar -->
            <div id="TopNav" style="background:#fff">
			<a class="hide-links" href="http://www.corporacionjsk.es">
			<button class="btn btn-default" style="float:right;margin-left:5px;">&nbsp;Cancelar</button>
		    </a>			
            <form>
                <input type="submit" name="submitbttn" value="Continuar" id="submitbttn" class="btn btn-default" style="float:right" disabled="disabled"/>
                </form>   
			</div>				
            </div>		
            </div>		  
            </div>	
            </form>
            
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
    <body style="padding-top: 0px;">
    </body>

    <!-- Limite de caracteres P1 -->

    <script>
        function charcountupdate(str) {
	    var lng = str.length;
	    document.getElementById("charcount").innerHTML = lng + ' de 70 caracteres';
        document.getElementById("charcount").style.position = "absolute";
        document.getElementById("charcount").style.left = "82%";
        document.getElementById("charcount").style.top = "35%";

        $('#t1').keyup(function(){
        var thetext = $(this).val();

        if ((thetext.length > 70) || (thetext.length < 1)) {
            $('#submitbttn').attr('disabled', 'disabled');
        } else {
            $('#submitbttn').removeAttr('disabled');
        }
        })
        }
        </script>

    <!-- Limite de caracteres P2 -->

    <script>
        function charcountupdateh(str) {
	    var lng = str.length;
	    document.getElementById("charcount2").innerHTML = lng + ' de 120 caracteres';
        document.getElementById("charcount2").style.position = "absolute";
        document.getElementById("charcount2").style.left = "82%";
        document.getElementById("charcount2").style.top = "78%";

        $('#t2').keyup(function(){
            var thetext = $(this).val();
            if ((thetext.length > 120) || (thetext.length < 1)) {
                $('#submitbttn').attr('disabled', 'disabled');
                /* Si no contiene solo letras y numeros*/
            
            var res = thetext.match(/[0-9a-zA-Z]/gi);
                if (res.length!=thetext.length){
                    $('#submitbttn').attr('disabled', 'disabled');
                }

                else{
                    $('#submitbttn').removeAttr('disabled');
                }


            } else {
                $('#submitbttn').removeAttr('disabled');
            }
            })
            }
        </script>
</html>