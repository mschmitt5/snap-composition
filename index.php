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
    protected $licensePlate;

    public function __constructor(string $newLicensePlate) {
        try {
            $this->setLicensePlate($newLicensePlate);
        } catch (\InvalidArgumentException | \Exception | \TypeError $exception) {
            $exceptionType = get_class($exception);
            throw (new $exceptionType($exception->getMessage(), 0, $exception));
        }
    }

    public function getLicensePlate() : string {
        return($this->licensePlate);
    }

    public function setLicensePlate($newLicensePlate) : void {
        $newLicensePlate = filter_var($newLicensePlate,FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $newLicensePlate = strtoupper(trim($newLicensePlate));

        if(preg_match("/^[A-Z]{3}\d{3}$/", $newLicensePlate) !==1) {
            throw (new InvalidArgumentException("bad plate number"));
        }
    }
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