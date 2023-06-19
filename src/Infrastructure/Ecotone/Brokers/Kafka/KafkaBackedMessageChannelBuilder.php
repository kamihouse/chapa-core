<?php

declare(strict_types=1);

namespace Chapa\Core\Infrastructure\Ecotone\Brokers\Kafka;

use Chapa\Core\Infrastructure\Ecotone\Brokers\Kafka\Configuration\KafkaTopicConfiguration;
use Chapa\Core\Infrastructure\Ecotone\Brokers\Kafka\Connection\KafkaConnectionFactory;
use Chapa\Core\Infrastructure\Ecotone\Brokers\MessageBrokerHeaders\DefaultMessageHeader;
use Ecotone\Enqueue\EnqueueMessageChannelBuilder;

final class KafkaBackedMessageChannelBuilder extends EnqueueMessageChannelBuilder
{
    private function __construct(string $topicName, string $connectionReferenceName, string $messageBrokerHeadersReferenceName, ?KafkaTopicConfiguration $topicConfig)
    {
        parent::__construct(
            KafkaInboundChannelAdapterBuilder::createWith(
                $topicName,
                $topicName,
                null,
                $connectionReferenceName,
                $topicConfig
            ),
            KafkaOutboundChannelAdapterBuilder::create(
                $topicName,
                $connectionReferenceName,
                $messageBrokerHeadersReferenceName,
                $topicConfig
            )
        );
    }

    public static function create(string $topicName, string $connectionReferenceName = KafkaConnectionFactory::class, string $messageBrokerHeadersReferenceName = DefaultMessageHeader::class, ?KafkaTopicConfiguration $topicConfig = null): self
    {
        return new self($topicName, $connectionReferenceName, $messageBrokerHeadersReferenceName, $topicConfig);
    }
}
