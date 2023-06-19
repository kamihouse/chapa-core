<?php

declare(strict_types=1);

namespace Chapa\Core\Infrastructure\Ecotone\Brokers\Kafka\Configuration;

use Chapa\Core\Infrastructure\Ecotone\Brokers\Kafka\KafkaInboundChannelAdapterBuilder;
use Ecotone\Enqueue\EnqueueMessageConsumerConfiguration;
use Enqueue\RdKafka\RdKafkaConnectionFactory;

final class KafkaMessageConsumerConfiguration extends EnqueueMessageConsumerConfiguration
{
    private bool $declareOnStartup = KafkaInboundChannelAdapterBuilder::DECLARE_ON_STARTUP_DEFAULT;

    public static function create(string $endpointId, string $queueName, string $amqpConnectionReferenceName = RdKafkaConnectionFactory::class): self
    {
        return new self($endpointId, $queueName, $amqpConnectionReferenceName);
    }

    public function withDeclareOnStartup(bool $declareOnStartup): self
    {
        $this->declareOnStartup = $declareOnStartup;

        return $this;
    }

    public function isDeclaredOnStartup(): bool
    {
        return $this->declareOnStartup;
    }
}
