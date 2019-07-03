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

namespace wedocreatives\WrikePhpLibrary\Resource;

use wedocreatives\WrikePhpLibrary\Enum\Api\RequestPathFormatEnum;
use wedocreatives\WrikePhpLibrary\Enum\Api\ResourceMethodEnum;
use wedocreatives\WrikePhpLibrary\Resource\Traits\CreateTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\GetAllTrait;
use wedocreatives\WrikePhpLibrary\Resource\Traits\UpdateTrait;

/**
 * Workflow Resource.
 */
class WorkflowResource extends AbstractResource
{
    use GetAllTrait;
    use CreateTrait;
    use UpdateTrait;

    /**
     * Return connection array ResourceMethod => RequestPathFormat.
     *
     * @see \wedocreatives\WrikePhpLibrary\Enum\Api\ResourceMethodEnum
     * @see \wedocreatives\WrikePhpLibrary\Enum\Api\RequestPathFormatEnum
     *
     * @return array
     */
    protected function getResourceMethodConfiguration(): array
    {
        return [
            ResourceMethodEnum::GET_ALL => RequestPathFormatEnum::WORKFLOWS,
            ResourceMethodEnum::CREATE => RequestPathFormatEnum::WORKFLOWS,
            ResourceMethodEnum::UPDATE => RequestPathFormatEnum::WORKFLOWS_BY_ID,
        ];
    }
}
