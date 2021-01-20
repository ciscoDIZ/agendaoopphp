<?php
class Agenda
{
    private $contacts;

    /**
     * Agenda constructor.
     */
    public function __construct()
    {
        $params = func_get_args();
        $num_params = func_num_args();
        $function_constructor = '__construct' . $num_params;
        if (method_exists($this, $function_constructor)) {
            call_user_func_array(array($this, $function_constructor), $params);
        }

    }
    public function __construct0(){
        $this->contacts = new ArrayObject();
    }

    public function __construct1($data)
    {
        $this->contacts = new ArrayObject($data);
    }
    /**
     * Agrega contacto a la agenda.
     * @param $contact Contact instancia de clase Contact
     * @return bool - true si consigue agregar false en caso de duplicados
     * @throws Exception - en caso de que el parametro contact no sea instancia de clase Contact
     */
    public function add($contact)
    {
        if($contact instanceof Contact) {
            $result = false;
            if (!$this->contains($contact)) {
                $this->contacts->append($contact);
                $result = true;
            }
        }else{
            throw new Exception("este metodo solo opera con un objeto de la clase Contact");
        }
        return $result;
    }

    /**
     * Valida que un contacto es único
     * @param $contact Contact
     * @return bool - true si el contacto se encuentra en la agenda, false en caso contrario
     */
    public function contains($contact)
    {
        $result = false;
        $iterator =$this->contacts->getIterator();
        while($iterator->valid() && !$result){
            if($iterator->current()->equals($contact)){
                $result = true;
            }
            $iterator->next();
        }
        return $result;
    }

    /**
     * Borra un contacto de la agenda
     * @param $name_str string nombre del contacto
     * @return bool en caso de que ee haya podido borrar true, false de lo contrario
     */
    public function remove($name_str)
    {
        $iterator = $this->contacts->getIterator();
        $removed = false;
        while ($iterator->valid() && !$removed){
            if(hash_equals($iterator->current()->name, $name_str)){
                $iterator->offsetUnset($iterator->key());
                $removed = true;
            }
            $iterator->next();
        }
        return $removed;
    }

    /**
     * Busca todos los contactos construye una tabla y los mestra en pantalla
     */
    public function findAll()
    {
        $table = "<table border='1'><tr><td>DNI</td><td>Nombre</td><td>Teléfono</td></tr>";
        foreach ($this->contacts as $contact){
            $table .= "<tr><td>$contact->dni</td><td>$contact->name</td><td>$contact->phone</td></tr>";
        }
        $table .= "</table>";
        echo $table;
    }

    /**
     * Determina si un contacto existe
     * @param $name_str string nombre del contacto
     * @return bool en caso de existir true false de lo contrario.
     */
    public function existContact($name_str)
    {
        $exist = false;
        $iterator = $this->contacts->getIterator();
        while($iterator->valid() && !$exist){
            $exist = hash_equals($iterator->current()->name, $name_str);
            $iterator->next();
        }
        return $exist;
    }

    /**
     * Busca un contacto.
     * @param $name_contact string nombre del contacto
     * @return int posicion del contacto en caso de no existir, devuleve número negativo.
     */
    public function findByName($name_contact)
    {
        $encontrado = -1;
        $iterator = $this->contacts->getIterator();
        while ($iterator->valid() && $encontrado < 0){
            if(hash_equals($iterator->current()->name,$name_contact)){
                $encontrado = $iterator->key();
            }
            $iterator->next();
        }
        return $encontrado;
    }

    public function __get($name){
        return $this->$name;
    }
}