# zip2city

A PHP library for converting zip codes to city and state.

Uses the Google Maps API w/out the need for an API key.

## Install

Normal install via composer.

## Usage

```php
$response = Travis\Zip2City::run(22202);
```

Will return an array like this:

```
Array
(
    [zip] => Array
        (
            [long] => 22202
            [short] => 22202
        )

    [city] => Array
        (
            [long] => Arlington
            [short] => Arlington
        )

    [state] => Array
        (
            [long] => Virginia
            [short] => VA
        )

)
```

This is designed for addresses in the United States.