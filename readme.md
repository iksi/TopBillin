# TopBillin

Class to fetch Topbillin’ feeds.
List of available feeds: http://www.topbillin.nl/xml/feeds.php

## Usage

```PHP
require __DIR__ . '/TopBillin.php';

$topbillin = new Iksi\TopBillin('177', '3cae13233d1b1b6b3249a23715fcd1dc');
$topbillin->feed();
```
