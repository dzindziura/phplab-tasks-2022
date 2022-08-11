<?php

namespace basics;

class Basics implements BasicsInterface
{

    private $validator;

    public function __construct($validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param int $minute
     * @return string
     * @throws \InvalidArgumentException
     */
    public function getMinuteQuarter(int $minute): string
    {
        $this->validator->isMinutesException($minute);

        if ($minute <= 15 && $minute >= 1) {
            return 'first';
        } elseif ($minute >= 16 && $minute <= 30) {
            return 'second';
        } elseif ($minute >= 31 && $minute <= 45) {
            return 'third';
        } elseif (($minute >= 46 && $minute <= 59) || $minute == 0) {
            return 'fourth';
        }
    }

    /**
     * @param int $year
     * @return boolean
     * @throws \InvalidArgumentException
     */
    public function isLeapYear(int $year): bool
    {
        $result = false;
        $this->validator->isYearException($year);
        if (0 == $year % 4 && 0 != $year % 100 || 0 == $year % 400) {
            $result = true;
        }
        return $result;
    }

    /**
     * @param string $input
     * @return boolean
     * @throws \InvalidArgumentException
     */
    public function isSumEqual(string $input): bool
    {
        $this->validator->isValidStringException($input);
        $firstHalfString = str_split(mb_substr($input, 0, 3));
        $secondHalfString = str_split(mb_substr($input, 3, 3));

        $sumFirstHalfString = 0;
        $secondFirstHalfString = 0;

        for ($i = 0; $i < count($firstHalfString); $i++) {
            $sumFirstHalfString = $sumFirstHalfString + $firstHalfString[$i];
            $secondFirstHalfString = $secondFirstHalfString + $secondHalfString[$i];
        }

        return $sumFirstHalfString == $secondFirstHalfString;
    }
}