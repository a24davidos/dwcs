<?php
 
    class Calculator {
        private $num1;
        private $num2;


        public function __construct($num1, $num2){
            $this->num1 = $num1;
            $this->num2 = $num2;
        }
        
    
        /**
         * Get the value of num1
         */ 
        public function getNum1()
        {
                return $this->num1;
        }

        /**
         * Set the value of num1
         *
         * @return  self
         */ 
        public function setNum1($num1)
        {
                $this->num1 = $num1;

                return $this;
        }

        /**
         * Get the value of num2
         */ 
        public function getNum2()
        {
                return $this->num2;
        }

        /**
         * Set the value of num2
         *
         * @return  self
         */ 
        public function setNum2($num2)
        {
                $this->num2 = $num2;

                return $this;
        }


        public function multiplier(){
                return $this->num1 * $this->num2;
        }

        public function add(){
                return $this->num1 + $this->num2;

        }

        public function __toString()
        {
                return "num1 -> ".$this->num1. " num2 -> ".$this->num2;
        }

    }


?>


<?php 

// EXERCICIO 1
// Crear o obxecto firstCalcule
$firstCalcule = new Calculator(4,3);
// Modifico os seus valore para que se vexa como funcionan os setter:
$firstCalcule->setNum1(10);
$firstCalcule->setNum2(5);
//Mostro os valores co getter
echo "num1 -> ".$firstCalcule->getNum1(). " num2 -> ". $firstCalcule->getNum2()."<br><br>";

// EXERCICIO 2
// Creo o obxeto
$secondCalcule = new Calculator(4, 3);
//Chamo ás funcións creadas
echo "Método toString: ".$secondCalcule->__toString()."<br>";
echo "Multiplicación: ".$secondCalcule->multiplier()."<br>";
echo "Add: ".$secondCalcule->add();

?>