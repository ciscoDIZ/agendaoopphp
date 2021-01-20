<?php


class Person extends Contact
{
    var $dni;
    var $birth;

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
        parent::__construct();
    }

    public function __construct4($dni, $name, $phone, $birth)
    {
        parent::__construct($name, $phone);
        $this->dni = $dni;
        $this->birth = $birth;
    }
    /**
     * @inheritDoc
     */

    public function equals($contact)
    {
        // TODO: Implement equals() method.
    }

    public function __get($name)
    {
        return $this->$name;
    }

}