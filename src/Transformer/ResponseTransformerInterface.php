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

namespace wedocreatives\WrikePhpLibrary\Transformer;

use Psr\Http\Message\ResponseInterface;

/**
 * Response Transformer Interface.
 */
interface ResponseTransformerInterface
{
    /**
     * @param ResponseInterface $response
     * @param string            $resourceClass
     *
     * @return mixed
     */
    public function transform(ResponseInterface $response, $resourceClass);
}
