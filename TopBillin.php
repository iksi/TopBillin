<?php

/**
 * Simple class to fetch Topbillin’ feeds
 * - http://www.topbillin.nl/xml/feeds.php
 *
 * @author Iksi <info@iksi.cc>
 * @version 1.0
 */

namespace Iksi;

class TopBillin
{
    public function request($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);

        $response = curl_exec($ch);
        $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if ($responseCode !== 200) {
            return false;
        }

        return simplexml_load_string($response, null, LIBXML_NOCDATA);
    }
}
