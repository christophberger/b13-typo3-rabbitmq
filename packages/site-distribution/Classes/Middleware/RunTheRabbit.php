<?php

declare(strict_types=1);

namespace Site\Distribution\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Site\Distribution\Queue\Message\MyMessage;
use Symfony\Component\Messenger\MessageBusInterface;

class RunTheRabbit implements MiddlewareInterface
{
    public function __construct(private readonly MessageBusInterface $bus)
    {
    }

    public function process(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler
    ): ResponseInterface {
        $content = 'Some important content';
        $this->bus->dispatch(new MyMessage($content));

        return $handler->handle($request);
    }
}
