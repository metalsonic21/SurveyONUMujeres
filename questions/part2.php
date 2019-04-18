<!-- PHP (Validaciones) -->
<?php
    include_once 'answers.php';
        $f1="";
        $f2="";
        $f3="";
        $check = false;
        $a = new answers();

        if (isset($_GET['submitbttn'])) {
            $f1 = $_GET['t1'];
            $f2 = $_GET['t2'];
            $f2 = $_GET['t3'];
            if ((strlen($f1)>0) && (strlen($f1)<=30))
                if ((strlen($f2)>0) && (strlen($f2)<=30))
                    if ((strlen($f3)>0) && (strlen($f3)<=30)){
                $a->setNine($f1,$f2,$f3);
                header("Location: part2.php"); 
                exit();
            }
            }?>

<!doctype html>
<html>
    <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> ONU MUJERES & PROCOMER </title>
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="css/iCheck/custom.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/questions.css">
        <link rel="stylesheet" href="css/animate.css">		
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
        <div id="main" class="main-container animated fadeInRightBig" style="height:460px;max-width:1000px;width:900px;background:#fffff;" >	
					
            <div class="m-scene main-content animated fadeInRightBig">

				<div class="panel panel-default">

        <!-- Pregunta 1 -->
			<div class="panel-heading">&nbsp;PI.1.3 Dirección:</div>
			<div class="panel-body">
            <div class="hr-line-dashed"></div>
            <form action="" method="get">
            <div class="form-group row"><label class="col-sm-2 col-form-label">Provincia</label>
            <div class="col-sm-10"><textarea onkeyup="charcountupdate(this.value)" input type="text" id="t1" name="t1" class="form-control" style="width:680px;height:50px;float:right" ></textarea></div> 
            <span id="charcount" class="form-text m-b-none" style="position:absolute;top:26%;left:82%">0 de 30 caracteres</span>
            </div>
            </div>
            </div>

            
        <!-- Pregunta 2 -->
            <div class="panel panel-default">
			<div class="panel-body">
            <div class="hr-line-dashed"></div>
            <div class="form-group row"><label class="col-sm-2 col-form-label">Cantón</label>
            <div class="col-sm-10"><textarea onkeyup="charcountupdateh(this.value)" input type="text" id="t2" name="t2" class="form-control" style="width:680px;height:50px;float:right"></textarea></div> 
            <span id="charcount2" class="form-text m-b-none" style="position:absolute;top:53%;left:82%">0 de 30 caracteres</span>            
            </div>
            </div>
            </div>

        <!-- Pregunta 3 -->
            <div class="panel panel-default">
			<div class="panel-body">
            <div class="hr-line-dashed"></div>
            <div class="form-group row"><label class="col-sm-2 col-form-label">Distrito</label>
            <div class="col-sm-10"><textarea onkeyup="charcountupdatek(this.value)" input type="text" id="t3" name="t3" class="form-control" style="width:680px;height:50px;float:right"></textarea></div> 
            <span id="charcount3" class="form-text m-b-none" style="position:absolute;top:80%;left:82%">0 de 30 caracteres</span>            
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
	    document.getElementById("charcount").innerHTML = lng + ' de 30 caracteres';
        document.getElementById("charcount").style.position = "absolute";
        document.getElementById("charcount").style.left = "82%";
        document.getElementById("charcount").style.top = "26%";

        $('#t1').keyup(function(){
        var thetext = $(this).val();

        if ((thetext.length > 30) || (thetext.length < 1)) {
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
	    document.getElementById("charcount2").innerHTML = lng + ' de 30 caracteres';
        document.getElementById("charcount2").style.position = "absolute";
        document.getElementById("charcount2").style.left = "82%";
        document.getElementById("charcount2").style.top = "53%";

        $('#t2').keyup(function(){
            var thetext = $(this).val();
            if ((thetext.length > 30) || (thetext.length < 1)) {
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

<script>
        function charcountupdatek(str) {
	    var lng = str.length;
	    document.getElementById("charcount3").innerHTML = lng + ' de 30 caracteres';
        document.getElementById("charcount3").style.position = "absolute";
        document.getElementById("charcount3").style.left = "82%";
        document.getElementById("charcount3").style.top = "80%";

        $('#t3').keyup(function(){
            var thetext = $(this).val();
            if ((thetext.length > 30) || (thetext.length < 1)) {
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