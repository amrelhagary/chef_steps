<?php
declare(strict_types=1);
namespace libs;

final class RemoveDuplicates
{

    public static function filter($list) {
        $unique_list = array();
        foreach($list as $x) {
            $unique_list[$x] = true;
        }

        return array_keys($unique_list);
    }
}
