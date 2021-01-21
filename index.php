<?php
require "src/Contact.php";
require "src/Agenda.php";
require "src/Person.php";
require "src/Connection.php";
$contact = new Person();
$contact->dni = "78716585M";
$contact->name = "totaso";
$contact->phone = "+34608870693";
$contact1 = new Person("78716585M", "nombre", "00000000", null);
$agenda = new Agenda();

try {
    $agenda::add($contact);
    $agenda::add($contact1);
    $agenda::add(new Person("12457877N", "hola", "numero de telefono", null));
    //$agenda->add(2);
}catch (Exception $exception){
    echo $exception;
}
$agenda->findAll();
$agenda->remove("totaso");
echo $agenda->findByName("totaso");
echo $agenda->findByName("AA");
echo $agenda->existContact("hola");
$agenda->findAll();
$connection = Connection::getInstance();