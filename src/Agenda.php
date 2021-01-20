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
     * Agrega contacto a la agenda.
     * @param $contact - instancia de clase Contact
     * @return bool - true si consigue agregar false en caso de duplicados
     * @throws Exception - en caso de que el parametro contact no sea instancia de clase Contact
     */
    public function add($contact)
    {
        if($contact instanceof Contact) {
            $result = null;
            if (!$this->contains($contact)) {
                $this->contacts->append($contact);
                $result = true;
            } else {
                $result = false;
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
        $result = false;
        while ($iterator->valid() && !$result){
            if(hash_equals($iterator->current()->name, $name_str)){
                $iterator->offsetUnset($iterator->key());
                $result = true;
            }
            $iterator->next();
        }
        return $result;
    }

    /**
     * Busca todos los contactos construye una tabla y los mestra en pantalla
     */
    public function findAll()
    {
        $result = "<table border='1'><tr><td>DNI</td><td>Nombre</td><td>Teléfono</td></tr>";
        foreach ($this->contacts as $contact){
            $result .= "<tr><td>$contact->dni</td><td>$contact->name</td><td>$contact->phone</td></tr>";
        }
        $result .= "</table>";
        echo $result;
    }

    /**
     * Determina si un contacto existe
     * @param $name_str string nombre del contacto
     * @return bool en caso de existir true false de lo contrario.
     */
    public function existContact($name_str)
    {
        $result = false;
        $iterator = $this->contacts->getIterator();
        while($iterator->valid() && !$result){
            $result = hash_equals($iterator->current()->name, $name_str);
            $iterator->next();
        }
        return $result;
    }

    /**
     * Busca un contacto.
     * @param $name_str string nombre del contacto
     * @return int posicion del contacto en caso de no existir, devuleve número negativo.
     */
    public function findByName($name_str)
    {
        $result = -1;
        $iterator = $this->contacts->getIterator();
        while ($iterator->valid() && $result < 0){
            if(hash_equals($iterator->current()->name,$name_str)){
                $result = $iterator->key();
            }
            $iterator->next();
        }
        return $result;
    }

    public function __get($name){
        return $this->$name;
    }
}