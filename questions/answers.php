<?php
class answers {
    public $one, $two, $three; //Aceptar encuesta
    public $four; //Emprendimiento (1), MyPime (2), Independiente(3)
    public $five, $six; //Hombre, Mujer

    public function constructor($one, $two, $three, $four, $five, $six){
        /*Primer lote de preguntas*/
        $this->one = $one;
        $this->two = $two;
        $this->three = $three;
        $this->four = $four;
        $this->five = $five;
        $this->six = $six;
    }

    /*Getters y setters*/

    public function getOne(){
        return $this->one;
    }

    public function setOne($one){
        $this->one= $one;
    }

    public function getTwo(){
        return $this->two;
    }

    public function setTwo($two){
        $this->two= $two;
    }

    public function getThree(){
        return $this->three;
    }

    public function setThree($three){
        $this->three= $three;
    }

    public function getFour(){
        return $this->four;
    }

    public function setFour($four){
        $this->four= $four;
    }

    public function getFive(){
        return $this->five;
    }

    public function setFive($five){
        $this->five= $five;
    }

    public function getSix(){
        return $this->six;
    }

    public function setSix($six){
        $this->six= $six;
    }

    /*Filtros*/

    public function checkYN($value){
    //Chequear si se debe continuar con la encuesta
        if ($value == "no"){
            return 0;
        }
        //No continuar
        else 
        {
            return 1;
        }
    }

    public function checkFM($value){
        if ($value == "Hombre"){
            return 0;
        }
        else
        { 
            return 1;
        }
    }

    public function replace($value){
        if ($value == "1"){
            $this->setFour("Emprendimiento");
        }
        else if ($value == "2"){
            $this->setFour("MiPyme");
        }
        else if ($value == "3"){
            $this->setFour("Independiente");
        }

    }

}

?>