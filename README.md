# Luke request handler for Solarium

## Overview

A Luke request handler to [Solarium](https://github.com/basdenooijer/solarium).

## Usage

```php
use Solarium\Client;
use Solarium\QueryType\Luke\Query;

$client = new Client();
$client->registerQueryType(Query::QUERY_LUKE, Query::class);
$luke = $client->createQuery(Query::QUERY_LUKE);
$data = $client->execute($luke);

print 'Top terms: ';
var_dump($data->getTopTerms());
print PHP_EOL;
```

