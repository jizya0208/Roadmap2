<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Age extends Enum
{
    const Teens = 0;
    const Twenties = 1;
    const Thirties = 2;
    const Forties = 3;
    const Fifties = 4;
    const Sixties = 5;

    /**
     * Get the description for an enum value
     *
     * @param $value
     * @return string
     */
    public static function getDescription($value): string
    {
        switch ($value){
            case self::Teens:
                return '10代以下';
                brake;
            case self::Twenties:
                return '20代';
                brake;
            case self::Thirties:
                return '30代';
                brake;
            case self::Forties:
                return '40代';
                brake;
            case self::Fifties:
                return '50代';
                brake;
            case self::Sixties:
                return '60代以上';
                brake;
            default:
                return self::getKey($value);
        }
    }
}

