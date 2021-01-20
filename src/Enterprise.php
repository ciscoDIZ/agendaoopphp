<?php


class Enterprise extends Contact
{
    private $cial;
    private $website;

    public function __construct()
    {
        parent::__construct();
        $params = func_get_args();
        $num_params = func_num_args();
        $function_construct = '__construct'.$num_params;
        if(method_exists($this, $function_construct)){
            call_user_func_array(array($this, $function_construct), $params);
        }
    }
    public function __construct1($cial, $name, $phone, $website){
        $this->cial = $cial;
        $this->name = $name;
        $this->phone = $phone;
        $this->website = $website;
    }
    /**
     * @inheritDoc
     */
    public function equals($contact)
    {
        $equal = false;
        if($contact instanceof Enterprise){
            if(hash_equals($this->cial,$contact->cial)){
                $equal = true;
            }
        }
        return $equal;
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