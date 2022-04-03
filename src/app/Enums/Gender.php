<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Gender extends Enum
{
    const Male = 0;
    const Female = 1;
    const Neither = 2;
    const NoAnswer = 3;

    /**
     * Get the description for an enum value
     *
     * @param $value
     * @return string
     */
    public static function getDescription($value): string
    {
        switch ($value){
            case self::Male:
                return '男性';
                brake;
            case self::Female:
                return '女性';
                brake;
            case self::Neither:
                return 'どちらでもない';
                brake;
            case self::NoAnswer:
                return '解答しない';
                brake;
            default:
                return self::getKey($value);
        }
    }
}
