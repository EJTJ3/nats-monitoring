## WORK IN PROGRESS!!
# Nats monitoring

```php
use EJTJ3\NatsMonitoring\Jms\Serializer\Handler\NatsDateImmutableHandler;
use EJTJ3\NatsMonitoring\Jms\Serializer\Handler\NatsDateIntervalHandler;
use EJTJ3\NatsMonitoring\Model\ConnectionRequest;
use EJTJ3\NatsMonitoring\NatsMonitoringClient;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpClient\Psr18Client;

$serializerBuilder = new SerializerBuilder();
$serializerBuilder->configureHandlers(static function (HandlerRegistry $registry): void {
    $registry->registerSubscribingHandler(new NatsDateIntervalHandler());
    $registry->registerSubscribingHandler(new NatsDateImmutableHandler());
});
$serializer = $serializerBuilder->build();

$client = new NatsMonitoringClient(
    serializer: $serializer,
    client: new Psr18Client(),
);

$requestOptions = new ConnectionRequest();
$requestOptions->setAuth(true);

$connections = $client->getConnections('https://demo.nats.io:8222', $requestOptions);

```