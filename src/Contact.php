<?php

abstract class Contact
{
    protected $name;
    protected $phone;

    protected function __construct()
    {
        $params = func_get_args();
        $num_params = func_num_args();
        $function_constructor = '__construct' . $num_params;
        if (method_exists($this, $function_constructor)) {
            call_user_func_array(array($this, $function_constructor), $params);
        }
    }

    protected function __construct0()
    {
        $this->name = null;
        $this->phone = null;
    }

    protected function __construct1($dni)
    {
        $this->name = null;
        $this->phone = null;
    }

    protected function __construct2($dni, $name)
    {
        $this->name = $name;
        $this->phone = null;
    }


    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        return $this->$name = $value;
    }

    public function __toString()
    {
        return "$this->dni $this->name $this->phone";
    }

    /**
     * Determina si un contacto es identico a otro. Siendo identico cualquier contacto que tenga un dni
     * exactamente igual a otro.
     * @param $contact Contact
     * @return bool
     */
    public abstract function equals($contact);
}