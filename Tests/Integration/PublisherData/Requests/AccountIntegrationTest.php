<?php


/**
 * @group integration
 */
class AccountIntegrationTest extends \PHPUnit_Framework_TestCase {


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

    public function testGetLinkedAccountsSuccess() {
        $this->setUp();
        $search = new \Affilinet\PublisherData\Requests\AccountRequest($this->affilinetClient);
        $accounts = $search->getLinkedAccounts();

        $this->assertInstanceOf(\Affilinet\PublisherData\Responses\LinkedAccountResponse::class, $accounts);
        $this->assertNotNull($accounts);
    }

    public function testGetPaymentsSuccess() {
        $this->setUp();
        $search = new \Affilinet\PublisherData\Requests\AccountRequest($this->affilinetClient);
        $start = new \DateTime();
        $start = $start->modify("-1 year");

        $payments = $search->getPayments($start, new \DateTime());
        $this->assertInstanceOf(\Affilinet\PublisherData\Responses\PaymentResponse::class, $payments);
        $this->assertNotNull($payments);
    }
}
