<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Attributes\Description;
use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TravelCategoryEnum extends Enum
{
    #[Description('Event')]
    const Event = 1;

    #[Description('Holaday')]
    const Holaday = 2;
}
