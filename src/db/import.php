<?php
/**
 * TODO
 *  Open web/airports.php file
 *  Go through all airports in a loop and INSERT airports/cities/states to equivalent DB tables
 *  (make sure, that you do not INSERT the same values to the cities and states i.e. name should be unique i.e. before INSERTing check if record exists)
 */

/** @var \PDO $pdo */
require_once './pdo_ini.php';

function getInstanceId(\PDO $pdo, array $item, string $item_key, string $table, string $field, string $return_field): string
{
    $sth = $pdo->prepare("SELECT id FROM $table WHERE $field = :$field");
    $sth->setFetchMode(\PDO::FETCH_ASSOC);
    $sth->execute([$field => $item[$item_key]]);
    $record = $sth->fetch();

    if (!$record) {
        $sth = $pdo->prepare("INSERT INTO $table ($field) VALUES (:$field)");
        $sth->execute([$field => $item[$item_key]]);

        return $pdo->lastInsertId();
    }

    return $record[$return_field];
}

foreach (require_once('../web/airports.php') as $item) {
    $cityInstanceId = getInstanceId($pdo, $item, 'city', 'cities', 'name', 'id');
    $stateInstanceId = getInstanceId($pdo, $item, 'state', 'states', 'name', 'id');

    $sth = $pdo->prepare('INSERT INTO airports (name, code, address, timezone, city_id, state_id) VALUES (:name, :code, :address, :timezone, :city_id, :state_id)');
    $sth->execute([
        'name'     => $item['name'],
        'code'     => $item['code'],
        'address'  => $item['address'],
        'timezone' => $item['timezone'],
        'city_id'  => $cityInstanceId,
        'state_id' => $stateInstanceId,
    ]);
}