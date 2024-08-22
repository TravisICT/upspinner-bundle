<?php

namespace Upspinner\ConnectBundle\Transport;

use Symfony\Component\Mailer\Exception\UnsupportedSchemeException;
use Symfony\Component\Mailer\Transport\AbstractTransportFactory;
use Symfony\Component\Mailer\Transport\Dsn;
use Symfony\Component\Mailer\Transport\TransportInterface;

class UpspinnerMailerTransportFactory extends AbstractTransportFactory
{
    public function create(Dsn $dsn): TransportInterface
    {
        if ('upspinner' !== $dsn->getScheme()) {
            throw new UnsupportedSchemeException($dsn, 'upspinner', $this->getSupportedSchemes());
        }

        /** @var string $authKey */
        $authKey = $dsn->getOption('key', '');
        /** @var string $environment */
        $environment = $dsn->getOption('environment', '');
        $host = 'default' === $dsn->getHost() ? null : $dsn->getHost();
        $port = $dsn->getPort();

        return (new UpspinnerMailerTransport(
            client: $this->client,
            dispatcher: $this->dispatcher,
            logger: $this->logger,
            key: $authKey,
            environmentId: $environment
        ))
            ->setHost($host)
            ->setPort($port);
    }

    /**
     * @return string[]
     */
    protected function getSupportedSchemes(): array
    {
        return ['upspinner'];
    }
}
