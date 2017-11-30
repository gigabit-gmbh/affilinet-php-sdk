<?php

namespace Affilinet\PublisherData\Requests;

use Affilinet\PublisherData\AffilinetPublisherClient;
use Affilinet\PublisherData\Responses\SubIdStatisticResponse;
use Affilinet\Requests\AbstractSoapRequest;

/**
 * Class StatisticsRequest
 *
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class StatisticsRequest extends AbstractSoapRequest {

    /**
     * @var $affilinetClient AffilinetPublisherClient
     */
    protected $affilinetClient;

    /**
     * CategoriesRequest constructor.
     * @param AffilinetPublisherClient $affilinetClient
     */
    public function __construct(AffilinetPublisherClient $affilinetClient) {
        parent::init($affilinetClient);
        $this->setToken($this->affilinetClient->getAffilinetToken($this->getToken()));
    }

    /**
     * @return string
     */
    public function getEndpoint() {
        return 'https://api.affili.net/V2.0/PublisherStatistics.svc?wsdl';
    }

    /**
     * @return SubIdStatisticResponse
     */
    public function getSubIdStatistics() {

        $startDate = strtotime("-2 weeks");
        $endDate = strtotime("today");
        $programIds = array('0');
        $params = array(
            'StartDate' => $startDate,
            'EndDate' => $endDate,
            'ProgramIds' => $programIds,
            'ProgramTypes' => 'All',
            'SubId' => '',
            'MaximumRecords' => '100',
            'TransactionStatus' => 'All',
            'ValuationType' => 'DateOfRegistration',
        );

        $programs = $this->send("GetPrograms", array(
            'GetSubIdStatisticsRequestMessage' => $params,
        ));

        return new SubIdStatisticResponse($programs);
    }


}
