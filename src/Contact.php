<?php

abstract class Contact
{
    protected $name;
    protected $phone;

    public function __construct()
    {
        $this->name = null;
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
        return " $this->name $this->phone ";
    }

    /**
     * Determina si un contacto es identico a otro. Siendo identico cualquier contacto que tenga un dni
     * exactamente igual a otro.
     * @param $contact Contact
     * @return bool
     */
    public abstract function equals($contact);
}