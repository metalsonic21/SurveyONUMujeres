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

    public function constructorf1($seven, $eight, $nine, $ten, $eleven, $twelve, $thirteen, $fourteen, $fifteen){
        /*Primer lote de preguntas*/
        $this->seven = $seven;
        $this->eight = $eight;
        $this->nine = $nine;
        $this->ten = $ten;
        $this->eleven = $eleven;
        $this->twelve = $twelve;
        $this->thirteen = $thirteen;
        $this->fourteen = $fourteen;
        $this->fifteen = $fifteen;
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
    
    public function setSeven($seven){
        $this->seven= $seven;
    }

    public function getSeven(){
        return $this->seven;
    }

    public function setEight($eight){
        $this->eight= $eight;
    }

    public function getEight(){
        return $this->eight;
    }

    public function setNine($nine){
        $this->nine= $nine;
    }

    public function getNine(){
        return $this->nine;
    }

    public function getTen(){
        return $this->ten;
    }

    public function setTen($ten){
        $this->ten= $ten;
    }

    public function getEleven(){
        return $this->eleven;
    }

    public function setEleven($eleven){
        $this->eleven= $eleven;
    }


    public function getTwelve(){
        return $this->twelve;
    }

    public function setTwelve($twelve){
        $this->twelve= $twelve;
    }

    public function getThirteen(){
        return $this->thirteen;
    }

    public function setFourteen($fourteen){
        $this->fourteen= $fourteen;
    }

    public function getFifteen(){
        return $this->fifteen;
    }

    public function setFifteen($fifteen){
        $this->fifteen= $fifteen;
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