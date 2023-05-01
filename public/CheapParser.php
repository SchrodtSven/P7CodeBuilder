<?php
/**
 * @deprecated
 */


class CheapParser
{

    public function stringsBetween(string $string, string $start, string $end): array
    {
        //die($string);
        $pattern = "/{$start}(.*){$end}/U";
        $start = preg_quote($start);
        $end = preg_quote($end);
        preg_match_all($pattern, $string, $txt);
        return $txt;    
    }

    
    public function stripTypeDecl(string $str): string
    {
        return (
            str_replace(
            [
                'int',
                'float',
               // 'array',
                'string',
                'bool',
                ': string {}',
                ' {}',
                
                '?',
                '?int',
                '?float',
               // '?array',
                '?string',
                '?bool',
            
            ],
            '',
            $str
            )
        );
    }

    public function camelize(string $str): string
    {
        $tmp = explode('_', $str);

        $s = array_shift($tmp);
        foreach ($tmp as &$value) {
            $value = ucfirst($value);
        }

        return $s . implode('', $tmp);

    }
}