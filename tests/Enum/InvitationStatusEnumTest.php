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

use wedocreatives\WrikePhpLibrary\Enum\InvitationStatusEnum;

/**
 * Invitation Status Enum Test.
 */
class InvitationStatusEnumTest extends EnumTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = InvitationStatusEnum::class;

    /**
     * @var int
     */
    protected $enumCount = 4;
}
