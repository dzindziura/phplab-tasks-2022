<?php

namespace strings;

class Strings implements StringsInterface
{

    public function snakeCaseToCamelCase(string $input): string
    {
        $strnew = '';
        for($i=0;$i<mb_strlen($input);$i++){
            if($input[$i] == '_'){
                $i++;
                $input[$i] = mb_strtoupper($input[$i]);
            }
            $strnew = $strnew . $input[$i];
        }
        return $strnew;
    }

    public function mirrorMultibyteString(string $input): string
    {
        $inp = explode(" ",$input);
        $result = '';
        for($i=0;$i<count($inp);$i++){
            $res = preg_split('//u', $inp[$i], null, PREG_SPLIT_NO_EMPTY);
            $reverse = array_reverse($res);
            $implode = implode('', $reverse);
            $result = $result . ' ' . $implode;
        }
        return ltrim($result, ' ');
    }

    public function getBrandName(string $noun): string
    {
        if($noun[0] == $noun[-1]){
            return  ucfirst($noun) . substr($noun, 1);
        }else{
            return 'The' .' '. ucfirst($noun);
        }
    }
}