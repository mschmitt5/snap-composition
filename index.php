<?php
/**
 * Created by PhpStorm.
 * User: schmi
 * Date: 1/31/2018
 * Time: 8:25 AM
 **/

class car {
    protected $wheels;
    protected $body;
}

trait brake {
    public function stop(){
        echo "Watch where you're going!";
    }
}

class sedan extends car {
    protected $fourDoors;
    use brake;
}

class twoDoor extends car {
    use brake;
}