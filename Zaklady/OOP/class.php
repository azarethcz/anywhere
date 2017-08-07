<?php

class SimpleClass {
    
    //constant declaration - visibility from 7.1.0 PHP
    // public const CONSTANT = 'constant value';
   
    // property declaration
    public $var = 'a default value';
    public $int = 5;
    public $float = 3.5;
    public $var2 = 'hello'.'world';  
    
    //constructor declaration
    public function __construct() {
        $this->var = 'SimpleClass <br />';
    }
    
    //method declaration
    public function displayVar() {
        echo $this->var;
    }
    
    function showConstant() {
        echo self::CONSTANT;
    }
    
}

// echo SimpleClass::CONSTANT;
$class = new SimpleClass();
$class->displayVar();

class SimpleSecondClass extends SimpleClass {
    
    // overrided constructor
    public function __construct() {
        parent::__construct();
        $this->var = 'SimpleSecondClass <br />';
    } 
}

$class2 = new SimpleSecondClass();
$class2->displayVar();
