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

namespace wedocreatives\WrikePhpLibrary\Transformer\Response\Psr;

use Psr\Http\Message\ResponseInterface;

/**
 * Psr Response Transformer for PSR Response from HTTP Client.
 */
class PsrResponseTransformer extends AbstractPsrResponseTransformer
{
    /**
     * @param ResponseInterface $response
     * @param string            $resourceClass
     *
     * @throws \InvalidArgumentException
     *
     * @return ResponseInterface
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function transform(ResponseInterface $response, $resourceClass): ResponseInterface
    {
        return $this->transformToPsrResponse($response);
    }
}
