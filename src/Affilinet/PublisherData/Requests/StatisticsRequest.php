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
class StatisticsRequest extends AbstractSoapRequest
{

    /**
     * @var $affilinetClient AffilinetPublisherClient
     */
    protected $affilinetClient;

    /**
     * CategoriesRequest constructor.
     * @param AffilinetPublisherClient $affilinetClient
     */
    public function __construct(AffilinetPublisherClient $affilinetClient)
    {
        parent::init($affilinetClient);
        $this->setToken($this->affilinetClient->getAffilinetToken($this->getToken()));
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return 'https://api.affili.net/V2.0/PublisherStatistics.svc?wsdl';
    }

    /**
     * @param string $subId The subId to request - default empty (all)
     * @param string $maxRecords Maximum Records to request, default is 1000
     *
     * @return SubIdStatisticResponse
     */
    public function getSubIdStatistics($subId = "", $maxRecords = '1000')
    {

        $startDate = strtotime("-2 weeks");
        $endDate = strtotime("today");
        $programIds = array('0');
        $params = array(
            'StartDate' => $startDate,
            'EndDate' => $endDate,
            'ProgramIds' => $programIds,
            'ProgramTypes' => 'All',
            'SubId' => $subId,
            'MaximumRecords' => $maxRecords,
            'TransactionStatus' => 'All',
            'ValuationType' => 'DateOfRegistration',
        );

        $stats = $this->send(
            "GetSubIdStatistics",
            array(
                'GetSubIdStatisticsRequestMessage' => $params,
            )
        );

        return new SubIdStatisticResponse($stats);
    }


}
