# Luke request handler for Solarium

## Overview

A Luke request handler to [Solarium](https://github.com/basdenooijer/solarium).

## Usage

```php
use Solarium\Client;
use Solarium\QueryType\Luke\Query as LukeQuery;

$client->registerQueryType(LukeQuery::QUERY_LUKE, 'Solarium\\QueryType\\Luke\\Query');
$luke = $client->createQuery(LukeQuery::QUERY_LUKE);
$data = $client->execute($luke);

print 'Top terms: ';
var_dump($data->getTopTerms());
print PHP_EOL;
```

