<?php

/*
 * This file is part of the affilinet Product Data PHP SDK.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Affilinet\PublisherData;

use Affilinet\ProductData\HttpClient\GuzzleClient;
use Affilinet\ProductData\HttpClient\HttpClientInterface;
use Affilinet\PublisherData\Exceptions\AffilinetPublisherWebserviceException;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Monolog\Handler\SyslogHandler;
use Monolog\Logger;

/**
 * Client to send requests to the API
 */
class AffilinetClient
{

    /**
     * @const string The name of the environment variable that contains your Affilinet Publisher ID
     */
    const PUBLISHER_ID_ENV_NAME = 'AFFILINET_PUBLISHER_ID';

    /**
     * @const string The name of the environment variable that contains your Affilinet Publisher Webservice Password
     */
    const PUBLISHER_WEBSERVICE_PASSWORD_ENV_NAME = 'AFFILINET_PUBLISHER_WEBSERVICE_PASSWORD';

    /**
     * @var $publisherId string
     */
    public $publisherId;

    /**
     * @var $publisherDataWebservicePassword string
     */
    public $publisherDataWebservicePassword;

    /**
     * @var $httpClient HttpClientInterface
     */
    public $httpClient;

    /**
     * @var Logger
     */
    private $log;

    /**
     * PublisherClient constructor.
     * @param  array $config
     * @throws AffilinetPublisherWebserviceException
     */
    public function __construct(array $config = [])
    {
        $config = array_merge([
            'publisher_id' => getenv(static::PUBLISHER_ID_ENV_NAME),
            'publisher_webservice_password' => getenv(static::PUBLISHER_WEBSERVICE_PASSWORD_ENV_NAME)
        ], $config);

        if (!$config['publisher_id']) {
            throw new AffilinetPublisherWebserviceException('Required "publisher_id" key not supplied in config and could not find fallback environment variable "' . static::PUBLISHER_ID_ENV_NAME . '"');
        }
        if (!$config['publisher_webservice_password']) {
            throw new AffilinetPublisherWebserviceException('Required "publisher_webservice_password" key not supplied in config and could not find fallback environment variable "' . static::PUBLISHER_WEBSERVICE_PASSWORD_ENV_NAME . '"');
        }
        if (isset($config['log'])) {
            $this->log = $config['log'];
        } else {
            $this->log = new Logger('affilinet-publisher-sdk');
            $this->log->pushHandler(new SyslogHandler('affilinet'));
        }

        if (isset($config['http_client'])) {
            if ($config['http_client'] instanceof ClientInterface) {
                $this->httpClient = new GuzzleClient($config['http_client']);
            } elseif (!$config['http_client'] instanceof HttpClientInterface) {
                throw new \InvalidArgumentException('Config parameter "http_client" has to implement Affilinet\HttpClient\HttpClientInterface');
            } else {
                $this->httpClient = $config['http_client'];
            }

        } else {
            $this->httpClient = new GuzzleClient(new Client());
        }

        $this->publisherId = $config['publisher_id'];
        $this->publisherDataWebservicePassword = $config['publisher_webservice_password'];

    }

    /**
     * @return string
     */
    public function getPublisherId()
    {
        return $this->publisherId;
    }

    /**
     * @return string
     */
    public function getPublisherDataWebservicePassword()
    {
        return $this->publisherDataWebservicePassword;
    }

    /**
     * @return Logger
     */
    public function getLog()
    {
        return $this->log;
    }

    /**
     * @return HttpClientInterface
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * @param  RequestInterface            $request
     * @return Responses\ResponseInterface
     */
    public function send(RequestInterface $request)
    {
        return $request->send();

    }

}
