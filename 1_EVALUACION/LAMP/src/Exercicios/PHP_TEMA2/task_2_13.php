<?php
declare(strict_types=1);

/* Create a class Alien with an attribute called name and a constructor.

Add an attribute numberOfAliens so that we can know the number of objects of this class have been created.

Create a method getNumberOfAliens that returns that information.

Write the code that creates several objects of Alien and shows the value returned by the numberOfAliens method. */

class Alien{

    private static $numberOfAliens = 0;

    private $name;

    public function __construct($name){
        $this->$name = $name;
        self::$numberOfAliens++;
    }
    
    public static function getNumberOfAliens(){
        return self::$numberOfAliens;
    }
        
}

?>
<?php 

$alien1 = new Alien("Miguelito");
$alien2 = new Alien("Antonio");
$alien3 = new Alien("Juan");
$alien4 = new Alien("Rubén");


echo "Número de Aliens: ".Alien::getNumberOfAliens()

?>