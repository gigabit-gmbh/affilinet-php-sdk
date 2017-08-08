<?php

namespace Affilinet\PublisherData\Requests;

use Affilinet\PublisherData\AffilinetPublisherClient;
use Affilinet\PublisherData\Requests\Traits\CreativeQueryTrait;
use Affilinet\PublisherData\Requests\Traits\PaginationTrait;
use Affilinet\PublisherData\Responses\CreativeCategoryResponse;
use Affilinet\PublisherData\Responses\CreativesResponse;
use Affilinet\Requests\AbstractSoapRequest;

/**
 * Class CreativeRequest
 *
 * @author Thomas Helmrich <thomas@gigabit.de>
 */
class CreativeRequest extends AbstractSoapRequest {

    use PaginationTrait;
    use CreativeQueryTrait;

    /**
     * @var $affilinetClient AffilinetPublisherClient
     */
    protected $affilinetClient;

    /** @var array $displaySettings */
    protected $displaySettings;

    /** @var array $searchCreativeQuery */
    protected $searchCreativeQuery;

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
        return 'https://api.affili.net/V2.0/PublisherCreative.svc?wsdl';
    }


    /**
     * @param int $programId
     *
     * @return CreativeCategoryResponse
     */
    public function getCreativeCategories($programId) {
        $creativeCategory = $this->send("GetCreativeCategories", array('ProgramId' => $programId));

        return new CreativeCategoryResponse($creativeCategory);
    }

    /**
     * @return CreativesResponse
     */
    public function searchCreatives() {

        $this->setPage();
        $this->setPageSize();

        try{
            $creatives = $this->send("SearchCreatives", array(
                'SearchCreativesQuery' => $this->searchCreativeQuery,
                'DisplaySettings' => $this->displaySettings,
            ));
        }catch(\SoapFault $x){
           var_dump( $x->detail);
            die("ERROR");
            // SoapFault
        }


        return new CreativesResponse($creatives);
    }


}
