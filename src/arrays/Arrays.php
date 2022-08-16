<?php

namespace arrays;

class Arrays implements ArraysInterface
{
    /**
     * @inheritDoc
     */
    public function repeatArrayValues(array $input) : array
    {
        $result = [];

        foreach ($input as $inp) {
            $result += array_fill(count($result), $inp, $inp);
            var_dump($result);
        }

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function getUniqueValue(array $input) : int
    {
        $result = array_diff($input, array_diff_key($input, array_unique($input)));
        return $result ? min($result) : 0;
    }

    /**
     * @inheritDoc
     */
    public function groupByTag(array $input) : array
    {
        $result = [];

        sort($input);

        foreach ($input as $inp) {
            foreach ($inp['tags'] as $tag) {
                $result[$tag][] = $inp['name'];
            }
        }

        ksort($result);

        return $result;
    }
}
