<?php

declare(strict_types=1);

namespace Site\Distribution\Queue\Message;

final class MyMessage
{
	public function __construct(
    	public readonly string $content
	) {
	}
}
