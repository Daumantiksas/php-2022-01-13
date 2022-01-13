<?php
$validationErrors = [];
    function saveMessage($data){
        $file = 'data/messages.txt';
        $content = file_get_contents($file);
        $formData = implode(', ', $data); //konvertuojam masyva i stringa
        $content .=$formData. "\n";
        file_put_contents($file, $content);
        echo "informacija issaugota";
    }


function getData(){
    $messages = file_get_contents('data/messages.txt');
    $messages = explode("\n", $messages);   //konvertuojam i masyva is stringo
    return $messages;
}
function validate($data){
    global $validationErrors;
    if(empty($data['name']) & !preg_match('/^[A-Z ]/', $data['name']) ){
        $validationErrors[]= "Neivestas arba neteisingas ivestas vardas";
    }
    if(empty($data['lname']) & !preg_match('/^[A-Z]/', $data['lname']) ){
        $validationErrors[]= "Neivestas arba neteisingas ivesta pavarde";
    }
    if(empty($data['email']) & !preg_match('/^[^@]+@[^@]+\.[a-z]{2,6}$/', $data['email']) ){
        $validationErrors[]= "Neteisingai ivestas el pastas";
    }
    if(empty($data['message']) & !preg_match('/^[A-Za-z0-9]{1-200}$/', $data['message']) ){
        $validationErrors[]= "Neteisingi arba per daug simboliu";
    }
    

    return $validationErrors;
}
?>