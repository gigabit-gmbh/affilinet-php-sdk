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

    const TYPE_Banner = "Banner";
    const TYPE_Text = "Text";
    const TYPE_Html = "HTML";
    const TYPE_Rotation = "Rotation";

    const HTML_TYPE_HtmlBanner = "HTMLBanner";
    const HTML_TYPE_FlashBanner = "FlashBanner";
    const HTML_TYPE_MicroSite = "Microsite";
    const HTML_TYPE_PopUp = "PopUp";
    const HTML_TYPE_PopUnder = "PopUnder";
    const HTML_TYPE_IFrame = "IFrame";
    const HTML_TYPE_HtmlForm = "HTMLForm";
    const HTML_TYPE_FlashForm = "FlashForm";
    const HTML_TYPE_VideoAd = "VideoAd";
    const HTML_TYPE_ProductLink = "ProductLink";
    const HTML_TYPE_BannerRotation = "BannerRotation";
    const HTML_TYPE_PagePeel = "PagePeel";
    const HTML_TYPE_Other = "Other";

    const TEXT_TYPE_TextLink = "TextLink";
    const TEXT_TYPE_LinkGenerator = "LinkGenerator";
    const TEXT_TYPE_MicroSite = "Microsite";
    const TEXT_TYPE_Other = "Other";
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

        try {
            $creatives = $this->send("SearchCreatives", array(
                'SearchCreativesQuery' => $this->searchCreativeQuery,
                'DisplaySettings' => $this->displaySettings,
            ));
        } catch (\SoapFault $x) {
            var_dump($x->detail);
            die("ERROR");
            // SoapFault
        }


        return new CreativesResponse($creatives);
    }


}
