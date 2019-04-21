<!-- PHP (Validaciones) -->
<?php
$cont = $_POST['cont'];
if ($cont == 1){
$q1 = "FI.1. ¿Sería usted tan amable de regalarnos unos minutos para responder algunas preguntas? Por favor considere que no hay respuestas buenas ni malas, y que la información será tratada de manera generalizada para fines estadísticos.";
$one = $_POST['one'];
}

else if ($cont == 2){
$q2 = "FI.2. ¿Acepta usted que sus datos de identificación formen parte del Directorio de negocios de mujeres?";
$r2 = $_POST['r2'];
$q3 = "FI.3. ¿Tiene usted o está usted involucrada en algún negocio?";
$r3 = $_POST['r3'];
}



else if ($cont == 3){
    $q4 = "FI.4.¿Usted diría que este negocio es un emprendimiento, MiPyme, o una actividad como profesional independiente?";
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
    }

else if ($cont == 4){
    $q5 = "FI.5.1 El principal propietario del negocio es:";
    $r5 = $_POST['r5'];
    $q6 = "FI.5.2¿La Gerencia General y/o toma de decisiones estratégicas de este negocio es manejada por:";
    $r6 = $_POST['r6'];
    }

else if ($cont == 5){
    $q7 = "Nombre o Razón Social:";
    $r7 = $_POST['r7'];
    $q8 = "Cédula Jurídica o Física:";
    $r8 = $_POST['r8'];
    }

else if ($cont == 6){
    $q9 = "Dirección";
    $r9 = array("Distrito"=>"", "Canton"=>"", "Provincia"=>"");
    $r9["Distrito"] = $_POST['distrito'];
    $r9["Canton"] = $_POST['canton'];    
    $r9["Provincia"] = $_POST['provincia'];
    }

else if ($cont == 7){
    $q10 = "Teléfono";
    $r10 = array("Movil"=>"", "Fijo"=>"");
    $r10["Movil"] = $_POST['movil'];
    $r10["Fijo"] = $_POST['fijo'];    
    }

else if ($cont == 8){
    $q11 = "PI.1.4 Correos electrónicos (al menos uno)";
    $r11 = array("Correo1"=>"", "Correo2"=>"");
    $r11["Correo1"] = $_POST['correo1'];
    $r11["Correo2"] = $_POST['correo2'];    
    }

else if ($cont == 9){
    $q12 = "Nombre de fantasía";
    $r12 = $_POST['r12'];
    $q13 = "¿Con cuántos colaboradores cuenta su empresa actualmente?";
    $r13 = $_POST['r13'];    
    }

else if ($cont == 10){
    $q14 = "Año de inicio de operaciones";
    $r14 = $_POST['r14'];
    }

else if ($cont == 11){
    $q15 = "PII.1. ¿A qué sector diría que pertenece su negocio? Puede seleccionar varios";
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
    }

else if ($cont == 12){
    $q16 = "PII.2 ¿Ofrece su empresa productos o servicios de elaboración propia, originales?";
    $r16 = $_POST['r16'];
    $q17 = "PII.3 Por favor, describa detalladamente qué produce su negocio";
    $r17 = $_POST['r17'];
    }


else if ($cont == 13){
    $q18 = "PII.4 ¿Diría que sus principales productos o servicios se podrían ubicar en alguna de las siguientes categorías?";
    $r18 = array("Alimentos funcionales"=>"","Agricultura sostenible"=>"","Manufactura avanzada"=>"","Servicios como biotecnología"=>"","TI Aplicada"=>""
    ,"Servicios sostenibles"=>"","Otros"=>"");

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
        $r18["Servicios como biotecnología"] = "No";
    else $r18["Servicios como biotecnología"] = "Si";
    
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
        $r18["Otros"] = "No";
    else $r18["Otros"] = "Si";
    }

else if ($cont == 14){
    $q19 = "¿Su empresa está registrada como PYME ante el MEIC?";
    $r19 = $_POST['r18'];
    $q20 = "PII.6 ¿Qué le motivó a empezar la empresa o negocio?";
    $r20 = $_POST['r19'];
    }


else if ($cont == 16){
    $q24 = "PII.10 ¿Cuenta su empresa, lista o en trámite, con alguna de las siguientes certificaciones?";
    $r24 = array("BPA (Buenas Prácticas Alimenticias)"=>"","BPM (Buenas Prácticas de Manufactura)"=>"","Manipulación de alimentos"=>"","HACCP(Análisis de Riesgo y Puntos Críticos de Control)"=>""
    ,"Otra"=>"");
    
    $r24["BPA (Buenas Prácticas Alimenticias)"] = $_POST['bpa'];
    $r24["BPM (Buenas Prácticas de Manufactura)"] = $_POST['bpm'];
    $r24["Manipulación de alimentos"] = $_POST['manipulacion'];
    $r24["HACCP(Análisis de Riesgo y Puntos Críticos de Control)"] = $_POST['haccp'];
    $r24["Otra"] = $_POST['otra'];
    }

else if ($cont == 17){
     $q25 = "PII.11.¿Cuál es el principal problema que enfrentó la empresa en los últimos 12 meses?";
     $r25 = $_POST['t12'];
     $q26 = "PII.12. ¿Durante los últimos 5 años se ha asociado con otra empresa o empresas para lograr algún objetivo comercial?";
     $r26 = $_POST['r26'];
     $q27 = "PII.13.¿Cuál o cuáles?¿Con qué objetivo?";
     $r27 = $_POST['t13'];
     $q28 = "PII.14. ¿El recurso financiero con el que opera o trabaja la empresa (capital) es principalmente nacional o extranjero?";
     $r28 = $_POST['r28'];
    }

else if ($cont == 18){
    $q29 = "PIII.1.¿En lo que respecta a la formalización e internacionalización, su empresa o negocio cuenta con?";
    $r29 = array("Inscripción de la empresa en el Registro Nacional"=>"","Inscripción de marcas en el Registro Nacional"=>"","Inscripción en el Ministerio de Hacienda"=>"","Patente municipal"=>""
    ,"Inscripción como patrono ante la CCSS"=>"","Inscripción y pago de póliza de RT en el INS"=>"");
        
    $r29["Inscripción de la empresa en el Registro Nacional"] = $_POST['rn'];
    $r29["Inscripción de marcas en el Registro Nacional"] = $_POST['mrn'];
    $r29["Inscripción en el Ministerio de Hacienda"] = $_POST['mh'];
    $r29["Patente municipal"] = $_POST['pm'];
    $r29["Inscripción como patrono ante la CCSS"] = $_POST['ccss'];
    $r29["Inscripción y pago de póliza de RT en el INS"] = $_POST['rt'];
    }

else if ($cont == 19){
    $q30 = "PIII.2. ¿Tiene cuentas bancarias a nombre de la empresa?";
    $r30 = $_POST['r30'];
    $q31 = "PIII.3. Durante los últimos 12 meses ¿ha realizado la empresa alguna venta fuera del país?";
    $r31 = $_POST['r31'];
    }

else if ($cont == 21){
    $q34 = "PIII.4. ¿A qué mercados vende estos productos?";
    $r34 = array("Centroamérica"=>"","Panamá"=>"","Caribe"=>"","Otros países latinoamericanos"=>"","Europa"=>""
    ,"Asia"=>"","Canadá"=>"","EEUU"=>"");

    $placeholder = $_POST['c32'];
    if ($placeholder == "false")
        $r34["Centroamérica"] = "No";
    else $r34["Centroamérica"] = "Si";
    
    $placeholder = $_POST['c33'];
    if ($placeholder == "false")
        $r34["Panamá"] = "No";
    else $r34["Panamá"] = "Si";
    
    $placeholder = $_POST['c34'];
    if ($placeholder == "false")
        $r34["Caribe"] = "No";
    else $r34["Caribe"] = "Si";
    
    $placeholder = $_POST['c35'];
    if ($placeholder == "false")
        $r34["Otros países latinoamericanos"] = "No";
    else $r34["Otros países latinoamericanos"] = "Si";
    
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
        $r34["Canadá"] = "No";
    else $r34["Canadá"] = "Si";
    
    $placeholder = $_POST['c39'];
    if ($placeholder == "false")
        $r34["EEUU"] = "No";
    else $r34["EEUU"] = "Si";
}

else if ($cont == 22){
    $q35 = "PIII.4.1¿Hacen alianzas con otras empresas o negocios para vender fuera del país?";
    $r35 = $_POST['r35'];
    $q36 = "PIII.4.2. ¿Qué porcentaje aproximado representan las ventas fuera del país del monto total de ventas de la empresa?";
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
        $r36 = "Más del 71 %"; 
    }
    }


else if ($cont == 23){
    $q37 = "PIII.4.3¿Es su producto o servicio un insumo de otra empresa que exporta o es exportado a otra empresa?";
    $r37 = array("Respuesta"=>"","Detalles"=>"");
    $r37["Respuesta"] = $_POST['r37'];
    $r37["Detalles"] = $_POST['tr13'];
    }

else if ($cont == 24){
    $q38 = "PIII.4.4. Durante los próximos 12 meses ¿Piensa realizar la empresa alguna venta fuera del país?";
    $q381 = "PIII.4.5. ¿Cuál sería el principal producto o servicio que están pensando en vender?";
    $q382 = "PIII.4.6. ¿A qué mercado planean vender?";
    $r38 = array("Venta"=>"","Producto"=>"","Mercado"=>"");
    $r38["Venta"] = $_POST['r38'];
    $r38["Producto"] = $_POST['producto'];
    $r38["Mercado"] = $_POST['mercado'];

    echo $r38["Venta"];
    echo $r38["Producto"] ;
    echo $r38["Mercado"] ;
    }

else if ($cont == 25){
    $q39 = "PIII.4.7 ¿Cuáles considera ud que son las principales limitaciones al momento de exportar?";
    $r39 = array("Hay preferencia por enfocarse en el mercadolocal"=>"","Considera el riesgo muy alto, tiene temor"=>"",
    "El volumen solicitado puede superar sucapacidad productiva"=>"","Falta de información sobre el mercado destino"=>""
    ,"Falta de contactos comerciales"=>"","Desconocimiento de instituciones de apoyo"=>"","Desconocimiento de trámites de exportación y logística"=>"",
    "Problemas con trámites específicos"=>"","Falta de opciones de financiamiento"=>"","Desconocimiento de los requisitos del comprador"=>"",
    "Altos costos de producción"=>"","Altos costos de logística"=>"","Tipo de cambio"=>"","Escasez de materia prima o insumos"=>"",
    "Alto número de competidores"=>"","Competencia con mejores precios"=>"");

    $otro = array("Respuesta"=>"", "Detalle"=>"");
            
    $r39["Hay preferencia por enfocarse en el mercadolocal"] = $_POST['m1'];
    $r39["Considera el riesgo muy alto, tiene temor"] = $_POST['m2'];
    $r39["El volumen solicitado puede superar sucapacidad productiva"] = $_POST['m3'];
    $r39["Falta de información sobre el mercado destino"] = $_POST['m4'];
    $r39["Falta de contactos comerciales"] = $_POST['m5'];
    $r39["Desconocimiento de instituciones de apoyo"] = $_POST['m6'];
    $r39["Desconocimiento de trámites de exportación y logística"] = $_POST['m7'];
    $r39["Problemas con trámites específicos"] = $_POST['m8'];
    $r39["Falta de opciones de financiamiento"] = $_POST['m9'];
    $r39["Desconocimiento de los requisitos del comprador"] = $_POST['m10'];
    $r39["Altos costos de producción"] = $_POST['m11'];
    $r39["Altos costos de logística"] = $_POST['m12'];
    $r39["Tipo de cambio"] = $_POST['m13'];
    $r39["Escasez de materia prima o insumos"] = $_POST['m14'];
    $r39["Alto número de competidores"] = $_POST['m15'];
    $r39["Competencia con mejores precios"] = $_POST['m16'];

    $otro["Respuesta"] = $_POST['m17'];
    $otro["Detalle"] = $_POST['o1'];
    }

else if ($cont == 26){
    $q40 = "PIV.1¿Ha requerido algún financiamiento para operar la empresa o negocio durante 2017 o 2018?";
    $r40 = $_POST['f'];
    echo $r40."\n";
    $q41 = "PIV.1.1 ¿Qué tipo de financiamiento?";
    if ($r40 == "si"){
    
    $r41 = array("Recursos propios"=>"","Préstamos informales"=>"",
    "Bancos Públicos"=>"","Préstamos de otras empresas"=>""
    ,"Bancos privados"=>"","Tarjetas de crédito"=>"","Proveedores"=>"",
    "Parientes/amigos"=>"","Emisión de acciones"=>"","Cooperativas"=>"",
    "Org de microfinanzas"=>"","Fondos Propyme"=>"","FINADE"=>"","Programa banca para el desarrollo"=>"",
    "FOMujeres"=>"","Otras asociaciones"=>"");
    
    $otro2 = array("Respuesta"=>"", "Detalle"=>"");
                
    $r41["Recursos propios"] = $_POST['s1'];
    $r41["Préstamos informales"] = $_POST['s2'];
    $r41["Bancos Públicos"] = $_POST['s3'];
    $r41["Préstamos de otras empresas"] = $_POST['s4'];
    $r41["Bancos privados"] = $_POST['s5'];
    $r41["Tarjetas de crédito"] = $_POST['s6'];
    $r41["Proveedores"] = $_POST['s7'];
    $r41["Parientes/amigos"] = $_POST['s8'];
    $r41["Emisión de acciones"] = $_POST['s9'];
    $r41["Cooperativas"] = $_POST['s10'];
    $r41["Org de microfinanzas"] = $_POST['s11'];
    $r41["Fondos Propyme"] = $_POST['s12'];
    $r41["FINADE"] = $_POST['s13'];
    $r41["Programa banca para el desarrollo"] = $_POST['s14'];
    $r41["FOMujeres"] = $_POST['s15'];
    $r41["Otras asociaciones"] = $_POST['s16'];
    
    $otro["Respuesta"] = $_POST['s17'];
    $otro["Detalle"] = $_POST['trrr13'];
        }
    else $r41 = "N/A";
    }
    
?>