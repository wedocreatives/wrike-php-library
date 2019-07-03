<?php

declare(strict_types=1);

/*
 * This file is part of the wedocreatives/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace wedocreatives\WrikePhpLibrary\Enum;

/**
 * Custom Field Type Enum.
 */
class CustomFieldTypeEnum extends AbstractEnum
{
    public const TEXT = 'Text';
    public const DROP_DOWN = 'DropDown';
    public const NUMERIC = 'Numeric';
    public const CURRENCY = 'Currency';
    public const PERCENTAGE = 'Percentage';
    public const DATE = 'Date';
    public const DURATION = 'Duration';
    public const CHECKBOX = 'Checkbox';
    public const CONTACTS = 'Contacts';
    public const MULTIPLE = 'Multiple';
}
