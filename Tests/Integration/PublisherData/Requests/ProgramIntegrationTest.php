<?php


/**
 * @group integration
 */
class ProgramIntegrationTest extends \PHPUnit_Framework_TestCase {


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

    public function testGetProgramsSuccess() {
        $this->setUp();
        $search = new \Affilinet\PublisherData\Requests\ProgramsRequest($this->affilinetClient);
        $search->setPartnerShipStatus(array("Active"));
        $programs = $search->getPrograms();

        $this->assertInstanceOf(\Affilinet\PublisherData\Responses\ProgramsResponse::class, $programs);
        $this->assertNotNull($programs);
        $this->assertNotNull($programs->getPrograms());
    }

    public function testGetProgramCategoriesSuccess() {
        $this->setUp();
        $search = new \Affilinet\PublisherData\Requests\ProgramsRequest($this->affilinetClient);
        $programCats = $search->getProgramCategories();
        $this->assertInstanceOf(\Affilinet\PublisherData\Responses\ProgramCategoriesResponse::class, $programCats);
        $this->assertNotNull($programCats);
    }
    public function testGetProgramRatesSuccess() {
        $this->setUp();
        $search = new \Affilinet\PublisherData\Requests\ProgramsRequest($this->affilinetClient);
        $programRates = $search->getProgramRates(6843);

        $this->assertInstanceOf(\Affilinet\PublisherData\Responses\ProgramRatesResponse::class, $programRates);
        $this->assertNotNull($programRates);
    }
}
