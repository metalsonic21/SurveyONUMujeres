<?php
    include_once 'answers.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    </head>
    <title> ONU MUJERES& PROCOMER </title>
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<script src="js/jquery-3.1.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('body div').slideDown();
    });
</script>
    <body>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">

                        <!-- Pregunta 2 -->
                        <h5>Filtros iniciales<small><br>FI.2. ¿Acepta usted que sus datos de identificación formen parte del Directorio de negocios de mujeres?
                        </br></small></h5>

                        <div class="hr-line-dashed"></div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label"><br/>
                                    <small class="text-navy"></small></label>

                                    <div class="col-sm-10">
                                        <div><label> <input type="radio" checked="" value="si" id="optionsRadios1" name="optionsRadios"> Sí </label></div>
                                        <div><label> <input type="radio" value="no" id="optionsRadios2" name="optionsRadios" 
                                            >  No </label></div>
                                    </div>
                                </div>

                        <!-- Pregunta 3 -->

                        <br>FI.3. ¿Tiene usted o está usted involucrada en algún negocio?
                        </br>

                        <div class="hr-line-dashed"></div>
                                <div class="form-group row"><label class="col-sm-2 col-form-label"><br/>
                                    <small class="text-navy"></small></label>

                                    <div class="col-sm-10">
                                        <div><label> <input type="radio" checked="" value="si" id="optionsRadios3" name="optionsRadiosf2"> Sí </label></div>
                                        <div><label> <input type="radio" value="no" id="optionsRadios4" name="optionsRadiosf2" 
                                            >  No </label></div>
                                    </div>
                                </div>

                            <!-- Aceptar/Cancelar -->    

                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <div class="col-sm-4 col-sm-offset-2">
                                            <a href="filter3.html" class="btn btn-primary btn-sm" type="submit">Continuar</a>
                                        <a href="http://www.corporacionjsk.es" type="submit"class="btn btn-white btn-sm">Cancelar</a>
                                    </div>
                                </div>
</body>
</html> 