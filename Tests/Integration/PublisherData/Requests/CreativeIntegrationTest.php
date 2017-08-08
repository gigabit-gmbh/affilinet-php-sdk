<?php


/**
 * @group integration
 */
class CreativeIntegrationTest extends \PHPUnit_Framework_TestCase {


    /**
     * @var $affilinetClient \Affilinet\PublisherData\AffilinetPublisherClient
     */
    protected $affilinetClient;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $log = new \Monolog\Logger('testlog');
        $log->pushHandler(new \Monolog\Handler\TestHandler());

        $this->affilinetClient = new \Affilinet\PublisherData\AffilinetPublisherClient(
            [
                'log' => $log,
                'publisher_id' => \Affilinet\Tests\AffilinetTestCredentials::$publisherId,
                'webservice_password' => \Affilinet\Tests\AffilinetTestCredentials::$webservicePassword,
            ]
        );
    }

    public function testGetCreativeCategoriesSuccess() {
        $this->setUp();
        $search = new \Affilinet\PublisherData\Requests\CreativeRequest($this->affilinetClient);
        $categories = $search->getCreativeCategories(3073);

        $this->assertInstanceOf(\Affilinet\PublisherData\Responses\CreativeCategoryResponse::class, $categories);
        $this->assertNotNull($categories);
        $this->assertNotNull($categories->getCreativeCategories());
    }

    public function testGetSearchCreativesSuccess() {
        $this->setUp();
        $search = new \Affilinet\PublisherData\Requests\CreativeRequest($this->affilinetClient);
        $search->setCreativeTypes(array("Banner"));
        $search->setProgramIds(array("0"));
        $creatives = $search->searchCreatives();

        $this->assertInstanceOf(\Affilinet\PublisherData\Responses\CreativesResponse::class, $creatives);
        $this->assertNotNull($creatives);
        $this->assertNotNull($creatives->getCreatives());
    }

}
