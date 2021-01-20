<?php
class Agenda
{
    private $contacts;

    /**
     * Agenda constructor.
     */
    public function __construct()
    {
        $this->contacts = new ArrayObject();
    }

    /**
     * Agenda constructor.
     */
    public function add($data)
    {
        $result = null;
        if($this->contains($data)){
            $this->contacts->append($data);
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    public function contains($data)
    {
        $result = true;

        foreach ($this->contacts as $contact)
        {
            if ($data->equals($contact)) {
                $result = false;
            }else{
                $result = $data->dni != null;
            }
        }
        return $result;
    }

    public function __get($name){
        return $this->$name;
    }
}