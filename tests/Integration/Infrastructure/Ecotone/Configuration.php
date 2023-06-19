<?php

declare(strict_types=1);

namespace Tests\Integration\Infrastructure\Ecotone;

use Chapa\Core\Infrastructure\Ecotone\Brokers\Kafka\KafkaBackedMessageChannelBuilder;
use Ecotone\Messaging\Attribute\ServiceContext;
use Ecotone\Messaging\Conversion\MediaType;

class MessagingConfiguration
{
    #[ServiceContext]
    public function enableKafka()
    {
        return KafkaBackedMessageChannelBuilder::create($_ENV['KAFKA_TOPIC'])
            ->withDefaultConversionMediaType(MediaType::APPLICATION_JSON);
    }
}
