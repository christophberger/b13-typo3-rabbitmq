<?php

use Site\Distribution\Queue\Message\MyMessage;
use TYPO3\CMS\Core\Messaging\WebhookMessageInterface;

defined('TYPO3') || die();

// Unset the default, so that it no longer applies
unset($GLOBALS['TYPO3_CONF_VARS']['SYS']['messenger']['routing']['*']);

// Set Webhook-Messages and MyMessage to asynchronous transport via amqp (RabbitMQ)
foreach ([WebhookMessageInterface::class, MyMessage::class] as $className) {
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['messenger']['routing'][$className] = 'amqp';
}
