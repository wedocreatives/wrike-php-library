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

namespace wedocreatives\WrikePhpLibrary\Tests\Enum\Api;

use wedocreatives\WrikePhpLibrary\Enum\Api\RequestPathFormatEnum;
use wedocreatives\WrikePhpLibrary\Tests\Enum\EnumTestCase;

/**
 * Request Path Format Enum Test.
 */
class RequestPathFormatEnumTest extends EnumTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = RequestPathFormatEnum::class;

    /**
     * @var int
     */
    protected $enumCount = 51;
}
