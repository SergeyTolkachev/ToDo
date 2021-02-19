<?php
$connect = new mysqli('127.0.0.1', 'root', 'root', 'todo' );
$sql = 'create table if not exists list (
    id int auto_increment,
    text varchar (255),
    primary key (id)
)';
try {
    $connect->query($sql);
} catch (Exception $error) {
    die('Cannot create list table. Reason: ' . $error->getMessage());
};