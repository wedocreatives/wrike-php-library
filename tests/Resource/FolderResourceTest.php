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
use wedocreatives\WrikePhpLibrary\Resource\FolderResource;

/**
 * Folder Resource Test.
 */
class FolderResourceTest extends ResourceTestCase
{
    /**
     * @var string
     */
    protected $sourceClass = FolderResource::class;

    /**
     * @return array
     */
    public function methodsProvider(): array
    {
        $baseData = [
            'body' => sprintf('{"data":[{"id":"%s"}]}', self::VALID_ID),
            'resourceClass' => FolderResource::class,
            'propertyValue' => self::VALID_ID,
        ];

        return [
            [
                [
                    'requestMethod' => RequestMethodEnum::GET,
                    'methodName' => ResourceMethodEnum::GET_ALL,
                    'endpointPath' => 'folders',
                    'additionalParams' => [],
                ] + $baseData,
            ],
            [
                [
                    'requestMethod' => RequestMethodEnum::GET,
                    'methodName' => ResourceMethodEnum::GET_ALL_FOR_FOLDER,
                    'endpointPath' => sprintf('folders/%s/folders', self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ] + $baseData,
            ],
            [
                [
                    'requestMethod' => RequestMethodEnum::GET,
                    'methodName' => ResourceMethodEnum::GET_BY_ID,
                    'endpointPath' => sprintf('folders/%s', self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ] + $baseData,
            ],
            [
                [
                    'requestMethod' => RequestMethodEnum::GET,
                    'methodName' => ResourceMethodEnum::GET_BY_IDS,
                    'endpointPath' => sprintf('folders/%s', implode(',', [self::UNIQUE_ID])),
                    'additionalParams' => [[self::UNIQUE_ID]],
                ] + $baseData,
            ],
            [
                [
                    'requestMethod' => RequestMethodEnum::POST,
                    'methodName' => ResourceMethodEnum::CREATE_FOR_FOLDER,
                    'endpointPath' => sprintf('folders/%s/folders', self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ] + $baseData,
            ],
            [
                [
                    'requestMethod' => RequestMethodEnum::POST,
                    'methodName' => ResourceMethodEnum::COPY,
                    'endpointPath' => sprintf('copy_folder/%s', self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ] + $baseData,
            ],
            [
                [
                    'requestMethod' => RequestMethodEnum::PUT,
                    'methodName' => ResourceMethodEnum::UPDATE,
                    'endpointPath' => sprintf('folders/%s', self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ] + $baseData,
            ],
            [
                [
                    'requestMethod' => RequestMethodEnum::DELETE,
                    'methodName' => ResourceMethodEnum::DELETE,
                    'endpointPath' => sprintf('folders/%s', self::UNIQUE_ID),
                    'additionalParams' => [self::UNIQUE_ID],
                ] + $baseData,
            ],
        ];
    }
}
