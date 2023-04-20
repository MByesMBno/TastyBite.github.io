<?php


    $link = mysqli_connect('localhost','g95051xg_tastyb', 'Roots1','g95051xg_tastyb');
    if($link){
        
        $link->set_charset('utf8');
       
    }
    else{
        echo('Ошибка подключения к БД');
        exit;
    }
    
    
    
?>