<?php

$host = "mysql"; // nombre del servicio en docker-compose.yml
$dbname = "my-wonderful-website";
$charset = "utf8";
$port = "3306";

try {
    $pdo = new PDO(
        dsn: "mysql:host=$host;dbname=$dbname;charset=$charset;port=$port",
        username: "root",
        password: "super-secret-password",
    );

    $persons = $pdo->query("SELECT * FROM Persons");

	echo '<h1>Hola Sergio</H1>';

	print(rand());

    echo '<pre>';
    foreach ($persons->fetchAll(PDO::FETCH_ASSOC) as $person) {
        print_r($person);
    }
    echo '</pre>';

} catch (PDOException $e) {
    throw new PDOException(
        message: $e->getMessage(),
        code: (int)$e->getCode()
    );
}