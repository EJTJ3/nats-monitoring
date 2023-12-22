<h1 align="center">Nats monitoring</h1>

<p align="center">
	<img src="https://www.gitbook.com/cdn-cgi/image/width=36,dpr=2,height=36,fit=contain,format=auto/https%3A%2F%2F683899388-files.gitbook.io%2F~%2Ffiles%2Fv0%2Fb%2Fgitbook-legacy-files%2Fo%2Fspaces%252F-LqMYcZML1bsXrN3Ezg0%252Favatar.png%3Fgeneration%3D1571848018902627%26alt%3Dmedia">
</p>

<p align="center">
	<img src="http://poser.pugx.org/ejtj3/nats-monitoring/v" alt="Latest Stable Version">
	<img src="http://poser.pugx.org/ejtj3/nats-monitoring/downloads" alt="Total Downloads">
	<img src="http://poser.pugx.org/ejtj3/nats-monitoring/license" alt="License">
</p>

# Nats monitoring

```shell
$ composer require ejtj
```

```php
use EJTJ3\NatsMonitoring\Jms\Serializer\Handler\NatsDateImmutableHandler;
use EJTJ3\NatsMonitoring\Jms\Serializer\Handler\NatsDateIntervalHandler;
use EJTJ3\NatsMonitoring\Model\ConnectionRequest;
use EJTJ3\NatsMonitoring\NatsMonitoringClient;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpClient\Psr18Client;

// build serializer
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

## Available methods

| Name          |   Route   |                                                     Method |
|---------------|:---------:|-----------------------------------------------------------:|
| General       |   /varz   | `$client->getGeneralSettings('https://demo.nats.io:8222')` |
| Jetstream     |   /jsz    |       `$client->getJetstream('https://demo.nats.io:8222')` |
| Connections   |  /connz   |     `$client->getConnections('https://demo.nats.io:8222')` |
| Accounts      | /accountz |        `$client->getAccounts('https://demo.nats.io:8222')` |
| Account stats | /accstatz |    `$client->getAccountStats('https://demo.nats.io:8222')` |
| Subscriptions |  /subsz   |   `$client->getSubscriptions('https://demo.nats.io:8222')` |
| Routes        |  /routez  |          `$client->getRoutez('https://demo.nats.io:8222')` |
| Leafnodes     |  /leafz   |       `$client->getLeafnodes('https://demo.nats.io:8222')` |
| Gateways      | /gatewayz |                                        Not yet implemented |
| HealthProbe   |  /leafz   |          `$client->getHealth('https://demo.nats.io:8222')` |

