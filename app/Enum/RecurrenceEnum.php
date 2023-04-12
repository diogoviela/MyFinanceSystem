<?php

namespace App\Enum;

enum RecurrenceEnum: string
{
    case Monthly = 'Monthly';

    case Weekly = 'Weekly';

    case Daily = 'Daily';

    public static function values(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }
}
