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
 * User Type Enum.
 */
class UserTypeEnum extends AbstractEnum
{
    /**
     * Person.
     */
    public const PERSON = 'Person';

    /**
     * Group of users.
     *
     * Group userId can be used in folder/task sharing requests only. It has no effect in other operations.
     */
    public const GROUP = 'Group';
}
