<?php

/*
 * This file is part of the affilinet Product Data PHP SDK.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * @group integration
 */
class CategoriesIntegrationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var $affilinetClient \Affilinet\ProductData\AffilinetProductClient
     */
    protected $affilinetClient;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $log = new \Monolog\Logger('testlog');
        $log->pushHandler(new \Monolog\Handler\TestHandler());

        $this->affilinetClient = new \Affilinet\ProductData\AffilinetProductClient(
            [
                'log' => $log,
                'publisher_id' => \Affilinet\Tests\AffilinetTestCredentials::$publisherId,
                'webservice_password' => \Affilinet\Tests\AffilinetTestCredentials::$productWebservicePassword,
            ]
        );

    }

    public function testSend()
    {
        $this->setUp();
        $search = new \Affilinet\ProductData\Requests\CategoriesRequest($this->affilinetClient);
        $search->setShopId(640);

        $response = $search->send();

        $this->assertInstanceOf(\Affilinet\ProductData\Responses\CategoriesResponse::class,$search->send());
        $this->assertEquals($response->jsonSerialize(), $response->toArray());
    }

    public function testSendViaClient()
    {
        $this->setUp();
        $search = new \Affilinet\ProductData\Requests\CategoriesRequest($this->affilinetClient);
        $search->setShopId(1);
        $response = $this->affilinetClient->send($search);
        $this->assertInstanceOf(\Affilinet\ProductData\Responses\CategoriesResponse::class,$search->send());
        $this->assertEquals($response->jsonSerialize(), $response->toArray());

    }

}
