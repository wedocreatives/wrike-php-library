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

use wedocreatives\WrikePhpLibrary\Enum\CustomFieldTypeEnum;

/**
 * Custom Field Type Enum Test.
 */
class CustomFieldTypeEnumTest extends EnumTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = CustomFieldTypeEnum::class;

    /**
     * @var int
     */
    protected $enumCount = 10;
}
