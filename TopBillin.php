<?php

/**
 * fetch Topbillin’ feeds
 * http://www.topbillin.nl/xml/feeds.php
 *
 * @author Jurriaan <jurriaan@iksi.cc>
 * @version 1.1
 */

namespace Iksi;

class TopBillin {

  public $feed = 'http://www.topbillin.nl/xml/feed.php';
  public $query;

  public function __construct($artist, $hash) {
    $this->query = http_build_query(compact('artist', 'hash'));
  }

  public function feed() {
    $handle = curl_init();

    curl_setopt($handle, CURLOPT_URL, "{$this->feed}?{$this->query}");
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_HEADER, false);

    $response = curl_exec($handle);
    $httpcode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

    curl_close($handle);

    if ($httpcode !== 200) {
      return false;
    }

    $object = simplexml_load_string($response, null, LIBXML_NOCDATA);

    $array = json_decode(json_encode($object), true);

    if(empty($array)) {
      return false;
    }

    return $array;
  }

}
