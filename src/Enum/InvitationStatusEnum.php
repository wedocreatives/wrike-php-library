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
 * Invitation Status Enum.
 */
class InvitationStatusEnum extends AbstractEnum
{
    public const PENDING = 'Pending';
    public const ACCEPTED = 'Accepted';
    public const DECLINED = 'Declined';
    public const CANCELLED = 'Cancelled';
}
