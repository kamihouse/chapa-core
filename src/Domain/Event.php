<?php

declare(strict_types=1);

namespace Frete\Core\Domain;

abstract class Event implements \JsonSerializable
{
    public function __construct(
        private string|int $identifier,
        private readonly ?array $data = [],
        private string $schema = 'https://schema.org/',
        private string $version = '1.0',
        private \DateTimeImmutable $occurredOn = new \DateTimeImmutable(),
        private array $messageHeaders = []
    ) {
    }

    public function setMessageHeaders(array $messageHeaders): self
    {
        $this->messageHeaders = $messageHeaders;

        return $this;
    }

    public function getMessageHeaders(): array
    {
        return $this->messageHeaders;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function getData(): ?array
    {
        return $this->data;
    }

    public function getSchema(): string
    {
        return $this->schema;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getOccurredOn(): \DateTimeImmutable
    {
        return $this->occurredOn;
    }

    public function jsonSerialize(): array
    {
        return [
            'identifier' => $this->getIdentifier(),
            'data' => $this->getData(),
        ];
    }
}
