<?php

class Animal implements Singable {
  const PI = "3.14159";

  protected $name;
  protected $favorite_food;
  protected $sound;
  protected $id;

  public static $number_of_animals = 0;

  function __construct($name, $favorite_food, $sound)
  {
    $this->name = $name;
    $this->favorite_food = $favorite_food;
    $this->sound = $sound;
    $this->id = rand(100, 1000000);
    echo "$this->id has been assigned<br />";
    Animal::$number_of_animals++;
  }

  public function __destruct()
  {
    echo "$this->name is being destroyed :(<br />";
  }

  function __get($name)
  {
    echo "Asked for $name";
    return $this->$name;
  }

  function __set($name, $value)
  {
    switch($name){
      case "name":
        $this->name = $value;
        break;
      case "favorite_food":
        $this->favorite_food = $value;
        break;
      case "sound":
        $this->sound = $value;
        break;
      default:
        echo "$name Not Found";
    }
    echo "Set $name to $value <br />";
  }

  function getName()
  {
    return $this->name;
  }

  function run()
  {
    echo "$this->name runs<br />";
  }

  final function what_is_good()
  {
    echo "Running is good<br />";
  }

  function __toString()
  {
    return "$this->name loves to eat $this->favorite_food <br /><br />";
  }

  function sing()
  {
    echo "$this->name sings like an animal<br />";
  }

  static function add_these($num1, $num2)
  {
    return ($num1 + $num2) . "<br />";
  }
}

class Dog extends Animal implements Singable {
  function run()
  {
    echo "$this->name runs like crazy!<br />";
  }

  function sing()
  {
    echo "$this->name sings like a dog<br />";
  }
}

interface Singable {
  public function sing();
}

$animal_one = new Animal('Fluffy', 'Fish', 'Meow');
$fluffy = $animal_one->name;
$animal_one->run();
echo $animal_one;

$dog_one = new Dog('Scruffy', 'Meat', 'Grr');
$dog_one->run();
echo $dog_one;

function make_them_sing(Singable $singing_animal)
{
  $singing_animal->sing();
}

function sing_animal(Animal $singing_animal)
{
  $singing_animal->sing();
}
make_them_sing($animal_one);
make_them_sing($dog_one);

echo "3 + 5 = " . Animal::add_these(3, 5);

$is_it_an_animal = ($animal_one instanceof Animal) ? "True" : "False";

echo "It is " . $is_it_an_animal . " that $fluffy is an animal <br />";

$animal_clone = clone $animal_one;
