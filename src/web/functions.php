<?php
/**
 * The $airports variable contains array of arrays of airports (see airports.php)
 * What can be put instead of placeholder so that function returns the unique first letter of each airport name
 * in alphabetical order
 *
 * Create a PhpUnit test (GetUniqueFirstLettersTest) which will check this behavior
 *
 * @param array $airports
 * @return string[]
 * @throws Exception
 */
function getUniqueFirstLetters(array $airports): array
{
    $unique_letters = [];

    foreach ($airports as $airport) {
        if (!isset($airport['name'])) {
            throw new Exception('Name field is required in Airport');
        }

        if (!is_string($airport['name'][0])) {
            throw new Exception('Name must be string');
        }

        if (!in_array($airport['name'][0], $unique_letters)) {
            $unique_letters[] = $airport['name'][0];
        }
    }

    sort($unique_letters);

    return $unique_letters;
}
