<?php

namespace basics;

use InvalidArgumentException;

class BasicsValidator implements BasicsValidatorInterface
{
    /**
     * @param int $minute
     * @throws InvalidArgumentException
     */
    public function isMinutesException(int $minute): void
    {
        if ($minute < 0 or $minute > 59) {
            throw new InvalidArgumentException('Invalid');
        }
    }

    /**
     * @param int $year
     * @return boolean
     * @throws \InvalidArgumentException
     */
    public function isYearException(int $year): void
    {
        if ($year < 1900) {
            throw new InvalidArgumentException('Invalid');
        }
    }

    /**
     * @param string $input
     * @throws \InvalidArgumentException
     */
    public function isValidStringException(string $input): void
    {
        if (strlen($input) < 6) {
            throw new InvalidArgumentException('Invalid');
        }
    }
}
