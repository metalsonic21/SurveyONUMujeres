<!-- PHP (Validaciones) -->
<?php
$cont = $_POST['cont'];
if ($cont == 1){
$q1 = "FI.1. ¿Sería usted tan amable de regalarnos unos minutos para responder algunas preguntas? Por favor considere que no hay respuestas buenas ni malas, y que la información será tratada de manera generalizada para fines estadísticos.";
$one = $_POST['one'];
echo $one;
//No esta leyendo nada en la primera
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
    $qex1 = "¿Contrata otros trabajadores para proyectos ocasionales?";
    $rex1 = $_POST['ex'];
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
        $otroex["Otros"] = "No";
    else {
        $otroex["Respuesta"] = "Si";
        $otroex["Detalle"] = $_POST['otroex'];
    }
    }

else if ($cont == 14){
    $q19 = "¿Su empresa está registrada como PYME ante el MEIC?";
    $r19 = $_POST['r18'];
    $q20 = "PII.6 ¿Qué le motivó a empezar la empresa o negocio?";
    $r20 = $_POST['r19'];
    }

else if ($cont == 15){
    $q21 = "¿Cuánto tiempo tiene de producir para el mercado nacional?";
    $r21 = $_POST['fi1'];
    $q22 = "¿Cuánto tiempo de producir para el mercado internacional?";
    $r22 = $_POST['fi2'];
    $q23 = "¿Cómo visualiza a su empresa en un período de 5 años? ";
    $r23 = $_POST['fi3'];
    }


else if ($cont == 16){
    $q24 = "PII.10 ¿Cuenta su empresa, lista o en trámite, con alguna de las siguientes certificaciones?";
    $r24 = array("BPA (Buenas Prácticas Alimenticias)"=>"","BPM (Buenas Prácticas de Manufactura)"=>"","Manipulación de alimentos"=>"","HACCP(Análisis de Riesgo y Puntos Críticos de Control)"=>""
    ,"Certificación Orgánica"=>"","Fair Trade"=>"","Rain Forest Alliance"=>"","Esencial Costa Rica"=>"",
    "ISO 9001"=>"","ISO 14001"=>"");
    $otroex2 = array("Respuesta"=>"", "Detalle"=>"");
    
    $r24["BPA (Buenas Prácticas Alimenticias)"] = $_POST['bpa'];
    $r24["BPM (Buenas Prácticas de Manufactura)"] = $_POST['bpm'];
    $r24["Manipulación de alimentos"] = $_POST['manipulacion'];
    $r24["HACCP(Análisis de Riesgo y Puntos Críticos de Control)"] = $_POST['haccp'];
    $r24["Certificación Orgánica"] = $_POST['co'];
    $r24["Fair Trade"] = $_POST['ft'];
    $r24["Rain Forest Alliance "] = $_POST['rfa'];
    $r24["Esencial Costa Rica"] = $_POST['ecrc'];
    $r24["ISO 9001"] = $_POST['iso9001'];
    $r24["ISO 14001"] = $_POST['iso14001'];

    $otroex2["Respuesta"] = $_POST['otra'];
        if ($otroex2["Respuesta"] == "si" || $otroex["Respuesta"] == "et") {
            $otroex2["Detalle"] = $_POST['detalle2'];
        }
    }

else if ($cont == 17){
     $q25 = "PII.11.¿Cuál es el principal problema que enfrentó la empresa en los últimos 12 meses?";
     $r25 = $_POST['t12'];
     $q26 = "PII.12. ¿Durante los últimos 5 años se ha asociado con otra empresa o empresas para lograr algún objetivo comercial?";
     $r26 = $_POST['r26'];
    }

else if ($cont == 40){
    $q27 = "PII.13.¿Cuál o cuáles?¿Con qué objetivo?";
    $r27 = $_POST['t13'];
}

else if ($cont == 41){
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


else if ($cont == 42){
    $qex2 = "¿Qué producto o servicio exportó?";
    $rex2 = $_POST['tex'];
}


else if ($cont == 43){
    $qex3 = "¿Hacen alianzas con otras empresas o negocios para vender fuera del país?";
    $rex3 = $_POST['al'];
}

else if ($cont == 44){
    $qex4 = "PIII.3.4. Por favor detalle ¿qué tipo de alianzas realizan?";
    $rex4 = $_POST['es'];
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
    $q35 = "PIII.4.2 ¿Es su producto o servicio un insumo de otra empresa que exporta o es exportado a otra empresa?";
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
    $q37 = "Por favor, detalle";
    $r37 = $_POST['tr13'];
    }


else if ($cont == 24){
    $q38 = "PIII.4.4. Durante los próximos 12 meses ¿Piensa realizar la empresa alguna venta fuera del país?";
    $r38 = $_POST['r38'];
}


else if ($cont == 45){
    $q381 = "PIII.4.5. ¿Cuál sería el principal producto o servicio que están pensando en vender?";
    $q382 = "PIII.4.6. ¿A qué mercado planean vender?";
    $rez = array("Producto"=>"","Mercado"=>"");
    $rez["Producto"] = $_POST['producto'];
    $rez["Mercado"] = $_POST['mercado'];
    $re = array("Producto"=>"","Mercado"=>"");
    $re["Producto"] = $_POST['producto'];
    $re["Mercado"] = $_POST['mercado'];

    print_r($re);
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

    print_r($r39);
    }

else if ($cont == 26){
    $factoresr = $_POST['trrr13'];
    $factoresq = "PIII.4.8. ¿Con base en su experiencia, cuáles diría usted que son los tres (3) factores claves para que una empresa sea exitosa exportando?";
    $q40 = "PIV.1¿Ha requerido algún financiamiento para operar la empresa o negocio durante 2017 o 2018?";
    $r40 = $_POST['f'];
    }

else if ($cont == 46){
    $q41 = "PIV.1.1 ¿Qué tipo de financiamiento?";
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
      
    $otro2["Respuesta"] = $_POST['s17'];
    $otro2["Detalle"] = $_POST['otro2'];
    
    $fq = "¿Para qué fines ha utilizado el financiamiento?";
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
    }

else if ($cont == 27){
    $q43 = "PIV.1 ¿Ha utilizado alguna vez el apoyo de PROCOMER?";
    $r43 = $_POST['r43'];
    }

else if ($cont == 47){
    $especifico = "PV.1.1 ¿En cuál o cuáles áreas?";
    $re = array("Ferias, misiones comerciales"=>"","Asesoría logística"=>"",
    "Asesoría en el CACEX"=>"","Acceso a estudios"=>""
    ,"Capacitaciones"=>"","Trámites"=>"","Encadenamientos"=>"");

    $re["Ferias, misiones comerciales"] = $_POST['z1'];
    $re["Asesoría logística"] = $_POST['z2'];
    $re["Asesoría en el CACEX"] = $_POST['z3'];
    $re["Acceso a estudios"] = $_POST['z4'];
    $re["Capacitaciones"] = $_POST['z5'];
    $re["Trámites"] = $_POST['z6'];
    $re["Encadenamientos"] = $_POST['z7'];

    $otro4 = array("Respuesta"=>"", "Detalle"=>"");
    $otro4["Respuesta"] = $_POST['z8'];
    $otro4["Detalle"] = $_POST ['otro4'];
}

else if ($cont == 28){
    $q44 = "PV.2. ¿Pertenece usted a alguna de las siguientes asociaciones o redes de empresas?";
    $r44 = array("La Red Violeta"=>"","Mujeres en Beta"=>"",
    "De.Mentes"=>"","SuláBatsu"=>""
    ,"Voces Vitales"=>"","Foro de Mujeres Empresarias"=>"","WeConnect"=>"",
    "Nosotras WeConnecting"=>"","AED"=>"");
    
    $r44["La Red Violeta"] = $_POST['sub1'];
    $r44["Mujeres en Beta"] = $_POST['sub2'];
    $r44["De.Mentes"] = $_POST['sub3'];
    $r44["SuláBatsu"] = $_POST['sub4'];
    $r44["Voces Vitales"] = $_POST['sub5'];
    $r44["Foro de Mujeres Empresarias"] = $_POST['sub6'];
    $r44["WeConnect"] = $_POST['sub7'];
    $r44["Nosotras WeConnecting"] = $_POST['sub8'];
    $r44["AED"] = $_POST['sub9'];

    $otro5 = array("Respuesta"=>"", "Detalle"=>"");
    $otro5["Respuesta"] = $_POST['sub10'];
    $otro5["Detalle"] = $_POST ['otro5'];

    $q45 = "PV.3. ¿Ha participado su empresa en eventos, ferias, ruedas de negocio, en los últimos 3 años?";
    $r45 = $_POST['r45'];
    }
    

else if ($cont == 29){
    $q46 = "PV.3.1. Para los que respondieron SÍ en PV.3. ¿En cuáles?";
    $r46 = $_POST['r46'];
    }

else if ($cont == 30){
    $q47 = "PV.4. ¿Ha recibido usted y/o su personal capacitación en? ";
    $r47 = array("Aspectos técnicos del trabajo"=>"","Asistencia profesional"=>"",
    "Habilidades blandas"=>"");
    
    $r47["Aspectos técnicos del trabajo"] = $_POST['sec1'];
    $r47["Asistencia profesional"] = $_POST['sec2'];
    $r47["Habilidades blandas"] = $_POST['sec3'];
    
    $otro6 = array("Respuesta"=>"", "Detalle"=>"");
    $otro6["Respuesta"] = $_POST['sec4'];
    $otro6["Detalle"] = $_POST ['otro6'];

    $q48 = "PV.5. ¿Ha recibido usted y/o su personal capacitación en Programas de fortalecimiento de capacidades para emprendedores o PYMES?";
    $r48 = $_POST['p1'];
    }
    
else if ($cont == 31){
    $q49 = "PV.5.1. Para los que respondieron SÍ en PV.5. ¿En cuáles?";
    $r49 = array("Mujeres Emprendedoras MEIC"=>"","Avanzamos INAMU"=>"",
    "Feria Mujeres Empresarias INAMU"=>"","FoMujeres INAMU"=>""
    ,"Programa para el Desarrollo de la Mujer Emprendedora - Cámara de Comercio de Costa Rica"=>"","Al Invest"=>"",
    "Programa de Liderazgo Ejecutivo de la Mujer INCAE"=>"",
    "Programa Acelera BAC Credomatic"=>"","Mujer 360 Banco Nacional"=>"","VV Grow"=>"",
    "Proyecto Emprende Inamu, MEIC, INAMU"=>"","Proyecto MADC"=>"","Proyecto Procalidad"=>""); 
    
    $otro7 = array("Respuesta"=>"", "Detalle"=>"");
                
    $r49["Mujeres Emprendedoras MEIC"] = $_POST['p2'];
    $r49["Avanzamos INAMU"] = $_POST['p3'];
    $r49["Feria Mujeres Empresarias INAMU"] = $_POST['p4'];
    $r49["FoMujeres INAMU"] = $_POST['p5'];
    $r49["Programa para el Desarrollo de la Mujer Emprendedora - Cámara de Comercio de Costa Rica"] = $_POST['p6'];
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
    }

else if ($cont == 32){
    $q50 = "PVI.1¿Cuenta su empresa con?";
    $r50 = array("Sitio web propio"=>"","Logo original"=>"",
    "Email corporativo"=>"","Redes sociales"=>""); 
                    
    $r50["Sitio web propio"] = $_POST['re1'];
    $r50["Logo original"] = $_POST['re2'];
    $r50["Email corporativo"] = $_POST['re3'];
    $r50["Redes sociales"] = $_POST['re4'];

    $q501 = "Estudios de mercado";
    $estudios = array("Competencia"=>"","Plan"=>"",
    "Libro"=>"","Canal de ventas"=>"");
                    
    $estudios["Competencia"] = $_POST['d1'];
    $estudios["Plan"] = $_POST['d2'];
    $estudios["Libro"] = $_POST['d3'];
    $estudios["Canal de ventas"] = $_POST['d4'];

    $q502 = "Estrategias a canales de venta";
    $cv = array("Digital"=>"","Detal"=>"",
    "Mayor"=>"","Domicilio"=>"");
                    
    $cv["Digital"] = $_POST['v1'];
    $cv["Detal"] = $_POST['v2'];
    $cv["Mayor"] = $_POST['v3'];
    $cv["Domicilio"] = $_POST['v4'];

    $q503 = "Proyección de ventas por períodos";
    $p = array("Anuales"=>"","Semestrales"=>"",
    "Trimestrales"=>"");
                    
    $p["Anuales"] = $_POST['pe1'];
    $p["Semestrales"] = $_POST['pe2'];
    $p["Trimestrales"] = $_POST['pe3'];
    }

else if ($cont == 33){
    $q52 = "PVI.3.¿Cuál diría usted que es el mejor aproximado de su volumen de ventas anual actualmente (en colones)?";
    $r52 = array("Nacionales"=>"","Internacionales"=>"");

    $placeholder = $_POST['nacional'];

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
        $r52["Nacionales"]= "Más de 250 millones";
    }

    $placeholder = $_POST['internacional'];

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
        $r52["Internacionales"]= "Más de 250 millones";
    }
    
    $q53 = "PVI.4. ¿Diría usted que las ventas del 2018 fueron superiores a las de 2017? ¿En qué proporción?  (%)";
    $r53 = array("Respuesta"=>"","Porcentaje"=>"");

    $placeholder = $_POST['rr59'];

        if ($placeholder == "no"){
            $r53["Respuesta"] = "no";
            $r53["Porcentaje"] = "N/A";
        }

    }

else if ($cont == 48){
    $r53["Porcentaje"] = $_POST['r59'];
}

else if ($cont == 34){
    $q54 = "PVII.1.A continuación se le presentan un conjunto de frases y le pedimos que indique qué tan de acuerdo está con cada una de esas frases(Favor utilizar la siguiente escala: 1. Muy en desacuerdo 2. Algo en desacuerdo 3. Algo de acuerdo 4. Muy de acuerdo)";
    $r54 = array("1"=>"","2"=>"","3"=>"","4"=>""); 

    $r54["1"]= $_POST['g1'];
    $r54["2"]= $_POST['g2'];
    $r54["3"]= $_POST['g3'];
    $r54["4"]= $_POST['g4'];

    $q55 = "PVII.1.A continuación se le presentan un conjunto de frases y le pedimos que indique qué tan de acuerdo está con cada una de esas frases(Favor utilizar la siguiente escala: 1. Muy en desacuerdo 2. Algo en desacuerdo 3. Algo de acuerdo 4. Muy de acuerdo)";
    $r55 = array("1"=>"","2"=>"","3"=>"","4"=>""); 

    $r55["1"]= $_POST['q1'];
    $r55["2"]= $_POST['q2'];
    $r55["3"]= $_POST['q3'];
    $r55["4"]= $_POST['q4'];
    }

else if ($cont == 35){
    $q56 = "PVII.1.A continuación se le presentan un conjunto de frases y le pedimos que indique qué tan de acuerdo está con cada una de esas frases(Favor utilizar la siguiente escala: 1. Muy en desacuerdo 2. Algo en desacuerdo 3. Algo de acuerdo 4. Muy de acuerdo)";
    $r56 = array("1"=>"","2"=>"","3"=>"","4"=>""); 
    
    $r56["1"]= $_POST['k1'];
    $r56["2"]= $_POST['k2'];
    $r56["3"]= $_POST['k3'];
    $r56["4"]= $_POST['k4'];
}

else if ($cont == 36){
    $q57 = "PVII.1.A continuación se le presentan un conjunto de frases y le pedimos que indique qué tan de acuerdo está con cada una de esas frases(Favor utilizar la siguiente escala: 1. Muy en desacuerdo 2. Algo en desacuerdo 3. Algo de acuerdo 4. Muy de acuerdo)";
    $r57 = array("1"=>"","2"=>"","3"=>"","4"=>""); 
    
    $r57["1"]= $_POST['t18'];
    $r57["2"]= $_POST['t19'];
    $r57["3"]= $_POST['t20'];
    $r57["4"]= $_POST['t21'];
}

else if ($cont == 37){
    $q58 = "PARTE XI.  DATOS DEL ENTREVISTADO (PARA VALIDACIÓN)";
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
}
?>