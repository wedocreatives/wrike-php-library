<?php

/*
 * This file is part of the zibios/wrike-php-library package.
 *
 * (c) Zbigniew Ślązak
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zibios\WrikePhpLibrary\Resource\Traits;

use Zibios\WrikePhpLibrary\Enum\Api\RequestMethodEnum;
use Zibios\WrikePhpLibrary\Enum\Api\ResourceMethodEnum;

/**
 * DownloadPreview Trait.
 */
trait DownloadPreviewTrait
{
    /**
     * @param string     $id
     * @param array|null $params
     *
     * @throws \Zibios\WrikePhpLibrary\Exception\Api\ApiException
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \Exception
     *
     * @return mixed
     */
    public function downloadPreview($id, array $params = [])
    {
        return $this->executeRequest(
            RequestMethodEnum::GET,
            ResourceMethodEnum::DOWNLOAD_PREVIEW,
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
     * @throws \Zibios\WrikePhpLibrary\Exception\Api\ApiException
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \Exception
     *
     * @return mixed
     */
    abstract protected function executeRequest(
        $requestMethod,
        $requestScope,
        array $params,
        $id
    );
}