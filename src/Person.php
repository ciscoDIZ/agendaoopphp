<?php


class Person extends Contact
{
    private $dni;
    private $birth;

    public function __construct()
    {
        parent::__construct();
        $params = func_get_args();
        $num_params = func_num_args();
        $function_constructor = '__construct' . $num_params;
        if (method_exists($this, $function_constructor)) {
            call_user_func_array(array($this, $function_constructor), $params);
        }
    }

    public function __construct4($dni, $name, $phone, $birth)
    {
        $this->dni = $dni;
        $this->birth = $birth;
        $this->name = $name;
        $this->phone = $phone;
    }

    public function __toString()
    {
        return "$this->dni ".parent::__toString()." $this->birth";
    }

    /**
     * @inheritDoc
     */

    public function equals($contact)
    {
        if($contact instanceof Person){
            return hash_equals($this->dni, $contact->dni);
        }else{
            return false;
        }
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

}