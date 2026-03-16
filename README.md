# webazon/ipapi

### IP Geolocation API. Fast, accurate, reliable. Free for non-commercial use.

##### Example usage in your code.

```php
use Webazon\Ipapi\Ip;
$ip = new Ip([IP-address]);	## Optional. Leave blank for visitor's IP.
```

------

**Example return object.**

```json
{
    "status": true,
    "ip": "77.91.69.93",
    "sip": "31.222.204.114",
    "locale": "he_IL",
    "locales": [
        {
            "id": 10,
            "locale": "ar_IL",
            "language": "العربية",
            "flag": "🇮🇱"
        },
        {
            "id": 203,
            "locale": "he_IL",
            "language": "עברית",
            "flag": "🇮🇱"
        }
    ],
    "exception": false,
    "ipapi": {
        "status": "success",
        "country": "Israel",
        "countryCode": "IL",
        "region": "TA",
        "regionName": "Tel Aviv",
        "city": "Tel Aviv",
        "zip": "",
        "lat": 32.0804,
        "lon": 34.7807,
        "timezone": "Asia\/Jerusalem",
        "isp": "Webhost LLC",
        "org": "Foton Telecom CJSC",
        "as": "AS206446 CLOUD LEASE Ltd",
        "query": "77.91.69.93"
    }
}
```
