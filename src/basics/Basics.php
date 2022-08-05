<?php

namespace basics;

class Basics implements BasicsInterface{

    private $validator;

    public function __construct($validator){
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

            if($minute <= 15 and $minute >= 1){
                return 'first';
            }else if($minute >= 16 and $minute <= 30){
                return 'second';
            }else if($minute >= 31 and $minute <= 45){
                return 'third';
            }else if(($minute >= 46 and $minute <= 59) or $minute == 0){
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
        $this->validator->isYearException($year);
        if($year%4==0){
            if($year % 100 != 0 || ( $year % 100 == 0 && $year % 400 == 0)){
                return true;
            }
        }

        return false;
    }
    /**
    * @param string $input
    * @return boolean
    * @throws \InvalidArgumentException
    */
    public function isSumEqual(string $input): bool
    {
        $this->validator->isValidStringException($input);
        $result = str_split(mb_substr($input, 0, 3));
        $result2 = str_split(mb_substr($input, 3, 3));

        $res1 = 0;
        foreach ($result as $res){
            $res1 += $res;
        }
        $res2 = 0;
        foreach ($result2 as $res){
            $res2 += $res;
        }
        if($res1 == $res2){
            return true;
        }

        return false;
    }
}