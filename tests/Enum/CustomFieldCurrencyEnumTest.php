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

namespace wedocreatives\WrikePhpLibrary\Tests\Enum;

use wedocreatives\WrikePhpLibrary\Enum\CustomFieldCurrencyEnum;

/**
 * Custom Field Currency Enum Test.
 */
class CustomFieldCurrencyEnumTest extends EnumTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = CustomFieldCurrencyEnum::class;

    /**
     * @var int
     */
    protected $enumCount = 42;
}
