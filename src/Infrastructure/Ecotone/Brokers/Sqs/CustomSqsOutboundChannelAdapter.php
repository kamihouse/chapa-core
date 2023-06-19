<?php

declare(strict_types=1);

namespace Chapa\Core\Infrastructure\Ecotone\Brokers\Sqs;

use Chapa\Core\Infrastructure\Ecotone\Brokers\CustomEnqueueOutboundChannelAdapter;
use Chapa\Core\Infrastructure\Ecotone\Brokers\MessageBrokerHeaders\IHeaderMessage;
use Ecotone\Enqueue\{CachedConnectionFactory, OutboundMessageConverter};
use Enqueue\Sqs\SqsDestination;

final class CustomSqsOutboundChannelAdapter extends CustomEnqueueOutboundChannelAdapter
{
    public function __construct(CachedConnectionFactory $connectionFactory, private string $queueName, bool $autoDeclare, OutboundMessageConverter $outboundMessageConverter, IHeaderMessage $messageBrokerHeaders)
    {
        parent::__construct(
            $connectionFactory,
            new SqsDestination($queueName),
            $autoDeclare,
            $outboundMessageConverter,
            $messageBrokerHeaders
        );
    }

    public function initialize(): void
    {
        $context = $this->connectionFactory->createContext();
        // @phpstan-ignore-next-line
        $context->declareQueue($context->createQueue($this->queueName));
    }
}
