# affilinet PHP SDK
Grab the <b>PHP SDK</b> and have access to our webservice within minutes.    

This is a fork from [Official affilinet Product SDK](https://github.com/affilinet/productdata-php-sdk). It doesn´t had any possiblities to access to other webservice endpoints. 

//TODO: extend original documentation
Refer to our documentation in order to get started: https://affilinet.github.io/productdata-php-sdk

## Installation
This SDK can be installed with composer

```sh
composer require gigabit/affilinet-php-sdk
```
> **Please note:** This packages requires PHP 5.6 or greater.


## Examples

```php
$config = [
    'publisher_id' => {PUBLISHER ID},
    'product_webservice_password' => {PRODUCT WEBSERVICE PASSWORD}
]

$affilinet = new \Affilinet\ProductData\AffilinetClient($config);

// simple search for t-shirts (using the product webservice)
try {
    $search = new \Affilinet\ProductData\Requests\ProductsRequest($affilinet);
    $query = new \Affilinet\ProductData\Requests\Helper\Query();
    
    $query->where($query->expr()->exactly('T-Shirt'));
    
    $search
        ->query( $query)
        ->onlyWithImage()
        ->minPrice(1)
        ->maxPrice(100)
        ->page(1)
        ->pageSize(20);
    
    $response = $search->send();
}
catch (\Affilinet\ProductData\Exceptions\AffilinetProductWebserviceException $e) {
    // There is an error within your $search
    echo 'Error: ' . $e->getMessage();
}

echo 'Total results : ' . $response->totalRecords() ;

foreach ($response->getProducts() as $product) {
    echo $product->getProductName();
    echo $product->getPriceInformation()->getDisplayPrice();
}

```


## Tests

All tests rely on composer. Please `composer install` before running the tests. 
phpunit tests include some integration tests. To run these tests you need to provide an publisherId and productWebservicePassword. 
Copy `Tests/AffilinetTestCredentials.php.dist` to `Tests/AffilinetTestCredentials.php` and enter your PUBLISHER_ID and PRODUCT_WEBSERVICE_PASSWORD

To run only the unit tests use this command:
```sh
phpunit --exclude-group integration
```


## License

Please see the [license file](https://github.com/affilinet/php-sdk/blob/master/LICENSE) for more information.
