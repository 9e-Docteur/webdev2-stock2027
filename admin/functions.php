<?php
//require_once "../config/connexion.php";

/**
 * Undocumented function
 *
 * @param PDO $pdo
 * @param string $sql
 * @param array $params
 * @return PDOStatement
 */
function dbQuery(PDO $pdo, string $sql, array $params = []): PDOStatement
{
    if(empty($params)){
        return $pdo->query($sql);
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt;
}

function fetchAll(PDO $pdo, string $sql, array $params = []): array
{
    return dbQuery($pdo, $sql, $params)->fetchAll(PDO::FETCH_ASSOC);
}

function fetchOne(PDO $pdo, string $sql, array $params = []): ?array
{
    $result = dbQuery($pdo, $sql, $params)->fetch(PDO::FETCH_ASSOC);
    return $result ?: null;
}

/*
    écriture ternaire

(condition) ? "si vrai" : "si faux"

if(condition){
    return "si vrai";
}else{
    return "si faux";
}
*/

function insert(PDO $pdo, string $sql, array $params = []): string
{
    dbQuery($pdo, $sql, $params);
    return $pdo->lastInsertId();
}

function execute(PDO $pdo, string $sql, array $params = []): int
{
    return dbQuery($pdo, $sql, $params)->rowCount();
}