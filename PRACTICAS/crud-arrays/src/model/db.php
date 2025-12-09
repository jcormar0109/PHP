<?php
declare(strict_types=1);
require_once("book.php");

// aseguramos que la sesión esté inicializada
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$_SESSION["db"] ??= [];
$db = &$_SESSION["db"]; 

function checkBook(int $id): bool {
    global $db;
    foreach ($db as $book) {
        if (is_array($book) && isset($book["id"]) && $book["id"] === $id) {
            return true;
        }
    }
    return false;
}

function insertBook(array $book): void {
    global $db;
    $db[] = $book;
}

function removeBook(int $id): bool {
    global $db;

    foreach ($db as $i => $book) {
        if (checkBook($id)) {
            unset($db[$i]);
            $db = array_values($db); // reindexar
            return true;
        }
    }

    return false;
}

function updateBook(int $id, ?string $title = null, ?string $author = null,?string $publisher = null, ?float $pvp = null,?string $img = null,) :void{
     global $db; 
     
     if(checkBook($id)){ 
        foreach ($db as $i => $book){ 
            if ($title != null){ 
                
                if($id == $db[$i]["id"]) $db[$i]["title"] = $title; 
            } 

            if ($publisher != null){ 
                
                if($id == $db[$i]["id"]) $db[$i]["publisher"] = $publisher; 
            } 
            
            if ($author != null){ 
                    if($id == $db[$i]["id"]) $db[$i]["author"] = $author; 
            } 
                
            if ($pvp != null){ 
                if($id == $db[$i]["id"]) $db[$i]["price"] = $pvp; 
            } 

            if ($img != null){ 
                if($id == $db[$i]["id"]) $db[$i]["image"] = $img; 
            } 
        } 
    } 
}
