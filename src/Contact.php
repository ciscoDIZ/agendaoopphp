<?php

class Contact
{
    private $dni;
    private $name;
    private $phone;

    public function __construct()
    {
        $params = func_get_args();
        $num_params = func_num_args();
        $function_constructor = '__construct' . $num_params;
        if (method_exists($this, $function_constructor)) {
            call_user_func_array(array($this, $function_constructor), $params);
        }
    }

    public function __construct0()
    {
        $this->dni = null;
        $this->name = null;
        $this->phone = null;
    }

    public function __construct1($dni)
    {
        $this->dni = $dni;
        $this->name = null;
        $this->phone = null;
    }

    public function __construct2($dni, $name)
    {
        $this->dni = $dni;
        $this->name = $name;
        $this->phone = null;
    }

    public function __construct3($dni, $name, $phone)
    {
        $this->dni = $dni;
        $this->name = $name;
        $this->phone = $phone;
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
    public function equals($contact)
    {
        if ($contact instanceof Contact) {
            return hash_equals($this->dni, $contact->dni);
        } else {
            return false;
        }
    }
}