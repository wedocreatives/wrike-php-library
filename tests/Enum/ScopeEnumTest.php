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

use wedocreatives\WrikePhpLibrary\Enum\ScopeEnum;

/**
 * Scope Enum Test.
 */
class ScopeEnumTest extends EnumTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = ScopeEnum::class;

    /**
     * @var int
     */
    protected $enumCount = 11;
}
