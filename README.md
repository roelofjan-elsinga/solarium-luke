# Luke request handler for Solarium

![StyleCI status](https://github.styleci.io/repos/193693688/shield)
[![Latest Stable Version](https://poser.pugx.org/roelofjan-elsinga/solarium-luke/v/stable)](https://packagist.org/packages/roelofjan-elsinga/solarium-luke)
[![Total Downloads](https://poser.pugx.org/roelofjan-elsinga/solarium-luke/downloads)](https://packagist.org/packages/roelofjan-elsinga/solarium-luke)
[![License](https://poser.pugx.org/roelofjan-elsinga/solarium-luke/license)](https://packagist.org/packages/roelofjan-elsinga/solarium-luke)

## Notes about this forked version
This is a fork of the package: cpliakas/solarium-luke, but since it seems inactive, I'm maintaining a version here. 
The namespaces are still the same, so the only thing you have to do to migrate to this package, 
is replacing the installation like so:

```bash
composer remove cpliakas/solarium-luke \
    && composer require roelofjan-elsinga/solarium-luke
```

## Overview

A Luke request handler to [Solarium](https://github.com/solariumphp/solarium).

This package currently supports Solarium 5.x.

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
