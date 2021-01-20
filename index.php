<?php
require "src/Contact.php";
require "src/Agenda.php";
$contact = new Contact();
$contact->dni = "78716585M";
$contact->name = "totaso";
$contact->phone = "+34608870693";
$contact1 = new Contact("78716585M", "uno ahi", "000000000");
$agenda = new Agenda();
$agenda->add($contact);
$agenda->add($contact1);
$agenda->add(new Contact("12457877N", "hola", "numero de telefono"));
foreach ($agenda->contacts as $contact3){
    echo $contact3."<br>";
}