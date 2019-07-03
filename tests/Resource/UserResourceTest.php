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

namespace wedocreatives\WrikePhpLibrary\Tests\Resource;

use wedocreatives\WrikePhpLibrary\Enum\Api\RequestMethodEnum;
use wedocreatives\WrikePhpLibrary\Enum\Api\ResourceMethodEnum;
use wedocreatives\WrikePhpLibrary\Resource\UserResource;

/**
 * User Resource Test.
 */
class UserResourceTest extends ResourceTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = UserResource::class;

    /**
     * @return array
     */
    public function methodsProvider(): array
    {
        $baseData = [
            'body' => sprintf('{"data":[{"id":"%s"}]}', self::VALID_ID),
            'resourceClass' => UserResource::class,
            'propertyValue' => self::VALID_ID,
        ];

        return [
            [
                [
                    'requestMethod' => RequestMethodEnum::GET,
                    'methodName' => ResourceMethodEnum::GET_BY_ID,
                    'endpointPath' => sprintf('users/%s', self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ] + $baseData,
            ],
            [
                [
                    'requestMethod' => RequestMethodEnum::PUT,
                    'methodName' => ResourceMethodEnum::UPDATE,
                    'endpointPath' => sprintf('users/%s', self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ] + $baseData,
            ],
        ];
    }
}
