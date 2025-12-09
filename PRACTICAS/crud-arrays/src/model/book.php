<?php
declare(strict_types=1);

function createBook(int $id, string $title, string $author,string $publisher, float $pvp,string $img): array {
    return [
        "id" => $id,
        "title" => $title,
        "publisher" => $publisher,
        "author" => $author,
        "price" => $pvp,
        "image" => $img,
    ];
}

// Getters 
function getId(array $book): int {
    return $book["id"] ?? 0;
}
function getTitle(array $book): string {
    return $book["title"] ?? "";
}
function getAuthor(array $book): string {
    return $book["author"] ?? "";
}

function getPublisher(array $book): string {
    return $book["publisher"] ?? "";
}
function getPrice(array $book): float {
    return $book["price"] ?? 0.0;
}

function getImg(array $book) {
    return $book["image"] ?? "";
}

function SetId(array $books, int $id): void{ 
    $books["id"] = $id; 
} 
function SetPublisher(array $books, string $publisher): void{ 
    $books["publisher"] = $publisher; 
} 
function SetTitle(array $books, string $title): void{ 
    $books["title"] = $title; 
} function SetAuthor(array $books, string $author): void{ 
    $books["author"] = $author; } 
function SetPrice(array $books, float $price): void{
     $books["price"] = $price; }

function SetImg(array $books,$img): void{
     $books["img"] = $img; }