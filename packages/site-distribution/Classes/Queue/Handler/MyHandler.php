<?php

declare(strict_types=1);

namespace Site\Distribution\Queue\Handler;

use Site\Distribution\Queue\Message\MyMessage;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\DelayStamp;

final class MyHandler
{
	public function __construct(private readonly MessageBusInterface $bus)
	{
	}

	public function __invoke(MyMessage $message): void
	{
    	try {

        	// Process $message

    	} catch (\Exception $exception) {
        	// Workaround to support infinite retryable messages. So no message gets lost.
        	$envelope = new Envelope(new MyMessage($message->content), [new DelayStamp(5000)]);
        	$this->bus->dispatch($envelope);
    	}
	}
}
