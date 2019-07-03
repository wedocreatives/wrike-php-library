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

namespace wedocreatives\WrikePhpLibrary\Resource\Traits;

use wedocreatives\WrikePhpLibrary\Enum\Api\RequestMethodEnum;
use wedocreatives\WrikePhpLibrary\Enum\Api\ResourceMethodEnum;

/**
 * Download Trait.
 */
trait DownloadTrait
{
    /**
     * @param string     $id
     * @param array|null $params
     *
     * @throws \wedocreatives\WrikePhpLibrary\Exception\Api\ApiException
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \Throwable
     *
     * @return mixed
     */
    public function download(string $id, array $params = [])
    {
        return $this->executeRequest(
            RequestMethodEnum::GET,
            ResourceMethodEnum::DOWNLOAD,
            $params,
            $id
        );
    }

    /**
     * @param string       $requestMethod
     * @param string       $requestScope
     * @param array        $params
     * @param string|array $id
     *
     * @throws \wedocreatives\WrikePhpLibrary\Exception\Api\ApiException
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \Throwable
     *
     * @return mixed
     */
    abstract protected function executeRequest(
        string $requestMethod,
        string $requestScope,
        array $params,
        $id
    );
}
