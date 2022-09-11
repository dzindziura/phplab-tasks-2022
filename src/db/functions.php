<?php
/**
 * @param PDO $pdo
 * @return array
 */
function getUniqueFirstLetters(\PDO $pdo): array
{
    $sth = $pdo->prepare('SELECT LEFT(name, 1) AS first_letter FROM airports GROUP BY first_letter ORDER BY first_letter ASC');
    $sth->setFetchMode(\PDO::FETCH_ASSOC);
    $sth->execute();

    return array_column($sth->fetchAll(), 'first_letter');
}

/**
 * @param \PDO $pdo
 * @param string $additionalQuery
 * @return int
 */
function getAirportsCount(\PDO $pdo, string $additionalQuery): int
{
    $sql = <<<SQL
        SELECT 
            COUNT(*) AS airports_count 
        FROM 
            airports 
        INNER JOIN states ON airports.state_id = states.id
        INNER JOIN cities ON airports.city_id = cities.id
        $additionalQuery;   
    SQL;

    $query = $pdo->prepare($sql);
    $query->setFetchMode(\PDO::FETCH_ASSOC);
    $query->execute();

    return $query->fetchColumn();
}

/**
 * @param \PDO $pdo
 * @param string $additionalQuery
 * @param array $pagination
 * @return array
 */
function getAirports(\PDO $pdo, string $additionalQuery, array $pagination): array
{
    $limit = $pagination['perPage'];
    $offset = $pagination['offset'];

    $sql = <<<SQL
		SELECT
			airports.name, 
			airports.code, 
			airports.address, 
			airports.timezone,
			states.name AS state_name, 
			cities.name AS city_name
		FROM 
			airports
		INNER JOIN states ON airports.state_id = states.id
		INNER JOIN cities ON airports.city_id = cities.id
		$additionalQuery
		LIMIT $limit
		OFFSET $offset;
	SQL;

    $sth = $pdo->prepare($sql);
    $sth->setFetchMode(\PDO::FETCH_ASSOC);
    $sth->execute();

    return $sth->fetchAll();
}