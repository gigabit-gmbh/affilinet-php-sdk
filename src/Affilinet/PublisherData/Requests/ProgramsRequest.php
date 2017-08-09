<?php

namespace Affilinet\PublisherData\Requests;

use Affilinet\PublisherData\AffilinetPublisherClient;
use Affilinet\PublisherData\Requests\Traits\PaginationTrait;
use Affilinet\PublisherData\Requests\Traits\ProgramsQueryTrait;
use Affilinet\PublisherData\Responses\ProgramCategoriesResponse;
use Affilinet\PublisherData\Responses\ProgramRatesResponse;
use Affilinet\PublisherData\Responses\ProgramsResponse;
use Affilinet\Requests\AbstractSoapRequest;

/**
 * Class ProgramRequest
 *
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class ProgramsRequest extends AbstractSoapRequest {

    use PaginationTrait;
    use ProgramsQueryTrait;

    /**
     * @var $affilinetClient AffilinetPublisherClient
     */
    protected $affilinetClient;

    /** @var array $displaySettings */
    protected $displaySettings;

    /** @var array $programsQuery */
    protected $programsQuery;

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
        return 'https://api.affili.net/V2.0/PublisherProgram.svc?wsdl';
    }

    /**
     * @return ProgramsResponse
     */
    public function getPrograms() {

        $this->setPageSize();
        $this->setPage();

        $programs = $this->send("GetPrograms", array(
            'DisplaySettings' => $this->displaySettings,
            'GetProgramsQuery' => $this->programsQuery,
        ));

        return new ProgramsResponse($programs);
    }

    /**
     * @return ProgramCategoriesResponse
     */
    public function getProgramCategories() {
        $programs = $this->send("GetProgramCategories");

        return new ProgramCategoriesResponse($programs);
    }


    /**
     * @param int $programId The Id of the Programm to get the rates for
     * @param int|null $publisherId The Publishers ID
     *
     * @return ProgramRatesResponse
     */
    public function getProgramRates($programId, $publisherId = null) {

        if ($publisherId == null) {
            $publisherId = $this->affilinetClient->getPublisherId();
        }

        $programs = $this->send("GetProgramRates", array(
            'PublisherId' => $publisherId,
            'ProgramId' => $programId,
        ));

        return new ProgramRatesResponse($programs);
    }

}
