<?php
/**
 * ExecuteApi
 * PHP version 7.4
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Proxy API
 *
 * Welcome to the Proxy API.  You can use this API to access all Proxy API endpoints.  ## Base URL  The base URL for all API requests is `https://unify.apideck.com`  ## Headers  Custom headers that are expected as part of the request. Note that [RFC7230](https://tools.ietf.org/html/rfc7230) states header names are case insensitive.  | Name                               | Type   | Required | Description | | ---------------------------------- | ------ | -------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | | Authorization                      | String | Yes      | Bearer API KEY | | x-apideck-app-id                   | String | Yes      | The application id of your Unify application. Available at https://app.apideck.com/unify/api-keys. | | x-apideck-consumer-id              | String | Yes      | The id of the customer stored inside Apideck Vault. This can be a user id, account id, device id or whatever entity that can have integration within your app.                       | | x-apideck-downstream-url           | String | Yes      | Downstream URL to forward the request too | | x-apideck-downstream-authorization | String | No       | Downstream authorization header. This will skip the Vault token injection. | | x-apideck-downstream-method        | String | No       | Downstream method. If not provided the upstream method will be inherited, depending on the verb/method of the request this will contain the request body you want to POST/PATCH/PUT. | | x-apideck-service-id               | String | No       | Describe the service you want to call (e.g., pipedrive). Only needed when a customer has activated multiple integrations for the same Unified API.                                   |  ## Authorization  You can interact with the API through the authorization methods below.  ### apiKey  To use API you have to sign up and get your own API key. Unify API accounts have sandbox mode and live mode API keys. To change modes just use the appropriate key to get a live or test object. You can find your API keys on the unify settings of your Apideck app. Your Apideck application_id can also be found on the same page.  Authenticate your API requests by including your test or live secret API key in the request header.  - Bearer authorization header: Authorization: Bearer <your-apideck-api-key> - Application id header: x-apideck-app-id: <your-apideck-app-id>   You should use the public keys on the SDKs and the secret keys to authenticate API requests.  **Do not share or include your secret API keys on client side code.** Your API keys carry significant privileges. Please ensure to keep them 100% secure and be sure to not share your secret API keys in areas that are publicly accessible like GitHub.  Learn how to set the Authorization header inside Postman https://learning.postman.com/docs/postman/sending-api-requests/authorization/#api-key  Go to Unify to grab your API KEY https://app.apideck.com/unify/api-keys  | Security Scheme Type      | HTTP   | | ------------------------- | ------ | | HTTP Authorization Scheme | bearer |  ### applicationId  The ID of your Unify application  | Security Scheme Type  | API Key          | | --------------------- | ---------------- | | Header parameter name | x-apideck-app-id |  ## Static IP  Some of the APIs you want to use can require a static IP. Apideck's static IP feature allows you to the Proxy API with a fixed IP avoiding the need for you to set up your own infrastructure. This feature is currently available to all Apideck customers. To use this feature, the API Vendor will need to whitelist the associated static IP addresses. The provided static IP addresses are fixed to their specified region and shared by all customers who use this feature.  - EU Central 1: **18.197.244.247** - Other: upcoming    More info about our data security can be found at [https://compliance.apideck.com/](https://compliance.apideck.com/)  ## Limitations  ### Timeout  The request timeout is set at 30 seconds.  ### Response Size  The Proxy API has no response size limit. For responses larger than 2MB, the Proxy API will redirect to a temporary URL. In this case the usual Apideck response headers will be returned in the redirect response. Most HTTP clients will handle this redirect automatically.  ``` GET /proxy < 301 Moved Permanently < x-apideck-request-id: {{requestId}} < Location: {{temporaryUrl}}  GET {{temporaryUrl}} < {{responseBody}} ```  ## SDKs and API Clients  Upcoming. [Request the SDK of your choice](https://integrations.apideck.com/request).  ## Errors  The API returns standard HTTP response codes to indicate success or failure of the API requests. For errors, we also return a customized error message inside the JSON response. You can see the returned HTTP status codes below.  | Code | Title                | Description | | ---- | -------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | | 200  | OK                   | The request message has been successfully processed, and it has produced a response. The response message varies, depending on the request method and the requested data.                                | | 201  | Created              | The request has been fulfilled and has resulted in one or more new resources being created. | | 204  | No Content           | The server has successfully fulfilled the request and that there is no additional content to send in the response payload body. | | 400  | Bad Request          | The receiving server cannot understand the request because of malformed syntax. Do not repeat the request without first modifying it; check the request for errors, fix them and then retry the request. | | 401  | Unauthorized         | The request has not been applied because it lacks valid authentication credentials for the target resource. | | 402  | Payment Required     | Subscription data is incomplete or out of date. You'll need to provide payment details to continue. | | 403  | Forbidden            | You do not have the appropriate user rights to access the request. Do not repeat the request. | | 404  | Not Found            | The origin server did not find a current representation for the target resource or is not willing to disclose that one exists. | | 409  | Conflict             | The request could not be completed due to a conflict with the current state of the target resource. | | 422  | Unprocessable Entity | The server understands the content type of the request entity, and the syntax of the request entity is correct but was unable to process the contained instructions.                                     | | 429  | Too Many Requests    | You sent too many requests in a given amount of time (\"rate limit\"). Try again later. | | 5xx  | Server Errors        | Something went wrong with the Unify API. These errors are logged on our side. You can contact our team to resolve the issue. |  ### Handling errors  The Unify API and SDKs can produce errors for many reasons, such as a failed requests due to misconfigured integrations, invalid parameters, authentication errors, and network unavailability.  ### Error Types  #### RequestValidationError  Request is not valid for the current endpoint. The response body will include details on the validation error. Check the spelling and types of your attributes, and ensure you are not passing data that is outside of the specification.  #### UnsupportedFiltersError  Filters in the request are valid, but not supported by the connector. Remove the unsupported filter(s) to get a successful response.  #### InvalidCursorError  Pagination cursor in the request is not valid for the current connector. Make sure to use a cursor returned from the API, for the same connector.  #### ConnectorExecutionError  A Unified API request made via one of our downstream connectors returned an unexpected error. The `status_code` returned is proxied through to error response along with their original response via the error detail.  #### UnauthorizedError  We were unable to authorize the request as made. This can happen for a number of reasons, from missing header params to passing an incorrect authorization token. Verify your Api Key is being set correctly in the authorization header. ie: `Authorization: 'Bearer sk_live_***'`  #### ConnectorCredentialsError  A request using a given connector has not been authorized. Ensure the connector you are trying to use has been configured correctly and been authorized for use.  #### ConnectorDisabledError  A request has been made to a connector that has since been disabled. This may be temporary - You can contact our team to resolve the issue.  #### RequestLimitError  You have reached the number of requests included in your Free Tier Subscription. You will no be able to make further requests until this limit resets at the end of the month, or talk to us about upgrading your subscription to continue immediately.  #### EntityNotFoundError  You've made a request for a resource or route that does not exist. Verify your path parameters or any identifiers used to fetch this resource.  #### OAuthCredentialsNotFoundError  When adding a connector integration that implements OAuth, both a `client_id` and `client_secret` must be provided before any authorizations can be performed. Verify the integration has been configured properly before continuing.  #### IntegrationNotFoundError  The requested connector integration could not be found associated to your `application_id`. Verify your `application_id` is correct, and that this connector has been added and configured for your application.  #### ConnectionNotFoundError  A valid connection could not be found associated to your `application_id`. Something _may_ have interrupted the authorization flow. You may need to start the connector authorization process again.  #### ConnectorNotFoundError  A request was made for an unknown connector. Verify your `service_id` is spelled correctly, and that this connector is enabled for your provided `unified_api`.  #### OAuthRedirectUriError  A request was made either in a connector authorization flow, or attempting to revoke connector access without a valid `redirect_uri`. This is the url the user should be returned to on completion of process.  #### OAuthInvalidStateError  The state param is required and is used to ensure the outgoing authorization state has not been altered before the user is redirected back. It also contains required params needed to identify the connector being used. If this has been altered, the authorization will not succeed.  #### OAuthCodeExchangeError  When attempting to exchange the authorization code for an `access_token` during an OAuth flow, an error occurred. This may be temporary. You can reattempt authorization or contact our team to resolve the issue.  #### OAuthConnectorError  It seems something went wrong on the connector side. It's possible this connector is in `beta` or still under development. We've been notified and are working to fix this issue.  #### MappingError  There was an error attempting to retrieve the mapping for a given attribute. We've been notified and are working to fix this issue.  #### ConnectorMappingNotFoundError  It seems the implementation for this connector is incomplete. It's possible this connector is in `beta` or still under development. We've been notified and are working to fix this issue.  #### ConnectorResponseMappingNotFoundError  We were unable to retrieve the response mapping for this connector. It's possible this connector is in `beta` or still under development. We've been notified and are working to fix this issue.  #### ConnectorOperationMappingNotFoundError  Connector mapping has not been implemented for the requested operation. It's possible this connector is in `beta` or still under development. We've been notified and are working to fix this issue.  #### ConnectorWorkflowMappingError  The composite api calls required for this operation have not been mapped entirely. It's possible this connector is in `beta` or still under development. We've been notified and are working to fix this issue.  #### PaginationNotSupportedError  Pagination is not yet supported for this connector, try removing limit and/or cursor from the query. It's possible this connector is in `beta` or still under development. We've been notified and are working to fix this issue.  ## API Design  ### API Styles and data formats  #### REST API  The API is organized around [REST](https://restfulapi.net/), providing simple and predictable URIs to access and modify objects. Requests support standard HTTP methods like GET, PUT, POST, and DELETE and standard status codes. JSON is returned by all API responses, including errors. In all API requests, you must set the content-type HTTP header to application/json. All API requests must be made over HTTPS. Calls made over HTTP will fail.  ### Request IDs  Each API request has an associated request identifier. You can find this value in the response headers, under Request-Id. You can also find request identifiers in the URLs of individual request logs in your Dashboard. If you need to contact us about a specific request, providing the request identifier will ensure the fastest possible resolution.  ## Support  If you have problems or need help with your case, you can always reach out to our Support.
 *
 * The version of the OpenAPI document: 8.57.0
 * Contact: hello@apideck.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace OpenAPI\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use OpenAPI\Client\ApiException;
use OpenAPI\Client\Configuration;
use OpenAPI\Client\HeaderSelector;
use OpenAPI\Client\ObjectSerializer;

/**
 * ExecuteApi Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ExecuteApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation deleteProxy
     *
     * DELETE
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return mixed|\OpenAPI\Client\Model\GetProxy401Response|mixed
     */
    public function deleteProxy($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null)
    {
        list($response) = $this->deleteProxyWithHttpInfo($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization);
        return $response;
    }

    /**
     * Operation deleteProxyWithHttpInfo
     *
     * DELETE
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of mixed|\OpenAPI\Client\Model\GetProxy401Response|mixed, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteProxyWithHttpInfo($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null)
    {
        $request = $this->deleteProxyRequest($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('mixed' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('mixed' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'mixed', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\GetProxy401Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetProxy401Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetProxy401Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                default:
                    if ('mixed' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('mixed' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'mixed', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = 'mixed';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'mixed',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetProxy401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'mixed',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation deleteProxyAsync
     *
     * DELETE
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteProxyAsync($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null)
    {
        return $this->deleteProxyAsyncWithHttpInfo($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteProxyAsyncWithHttpInfo
     *
     * DELETE
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteProxyAsyncWithHttpInfo($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null)
    {
        $returnType = 'mixed';
        $request = $this->deleteProxyRequest($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'deleteProxy'
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deleteProxyRequest($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null)
    {
        // verify the required parameter 'x_apideck_consumer_id' is set
        if ($x_apideck_consumer_id === null || (is_array($x_apideck_consumer_id) && count($x_apideck_consumer_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_apideck_consumer_id when calling deleteProxy'
            );
        }
        // verify the required parameter 'x_apideck_app_id' is set
        if ($x_apideck_app_id === null || (is_array($x_apideck_app_id) && count($x_apideck_app_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_apideck_app_id when calling deleteProxy'
            );
        }
        // verify the required parameter 'x_apideck_service_id' is set
        if ($x_apideck_service_id === null || (is_array($x_apideck_service_id) && count($x_apideck_service_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_apideck_service_id when calling deleteProxy'
            );
        }
        // verify the required parameter 'x_apideck_downstream_url' is set
        if ($x_apideck_downstream_url === null || (is_array($x_apideck_downstream_url) && count($x_apideck_downstream_url) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_apideck_downstream_url when calling deleteProxy'
            );
        }

        $resourcePath = '/proxy';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($x_apideck_consumer_id !== null) {
            $headerParams['x-apideck-consumer-id'] = ObjectSerializer::toHeaderValue($x_apideck_consumer_id);
        }
        // header params
        if ($x_apideck_app_id !== null) {
            $headerParams['x-apideck-app-id'] = ObjectSerializer::toHeaderValue($x_apideck_app_id);
        }
        // header params
        if ($x_apideck_service_id !== null) {
            $headerParams['x-apideck-service-id'] = ObjectSerializer::toHeaderValue($x_apideck_service_id);
        }
        // header params
        if ($x_apideck_downstream_url !== null) {
            $headerParams['x-apideck-downstream-url'] = ObjectSerializer::toHeaderValue($x_apideck_downstream_url);
        }
        // header params
        if ($x_apideck_downstream_authorization !== null) {
            $headerParams['x-apideck-downstream-authorization'] = ObjectSerializer::toHeaderValue($x_apideck_downstream_authorization);
        }



        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getProxy
     *
     * GET
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return mixed|\OpenAPI\Client\Model\GetProxy401Response|mixed
     */
    public function getProxy($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null)
    {
        list($response) = $this->getProxyWithHttpInfo($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization);
        return $response;
    }

    /**
     * Operation getProxyWithHttpInfo
     *
     * GET
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of mixed|\OpenAPI\Client\Model\GetProxy401Response|mixed, HTTP status code, HTTP response headers (array of strings)
     */
    public function getProxyWithHttpInfo($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null)
    {
        $request = $this->getProxyRequest($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('mixed' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('mixed' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'mixed', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\GetProxy401Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetProxy401Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetProxy401Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                default:
                    if ('mixed' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('mixed' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'mixed', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = 'mixed';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'mixed',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetProxy401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'mixed',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getProxyAsync
     *
     * GET
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getProxyAsync($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null)
    {
        return $this->getProxyAsyncWithHttpInfo($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getProxyAsyncWithHttpInfo
     *
     * GET
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getProxyAsyncWithHttpInfo($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null)
    {
        $returnType = 'mixed';
        $request = $this->getProxyRequest($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getProxy'
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getProxyRequest($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null)
    {
        // verify the required parameter 'x_apideck_consumer_id' is set
        if ($x_apideck_consumer_id === null || (is_array($x_apideck_consumer_id) && count($x_apideck_consumer_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_apideck_consumer_id when calling getProxy'
            );
        }
        // verify the required parameter 'x_apideck_app_id' is set
        if ($x_apideck_app_id === null || (is_array($x_apideck_app_id) && count($x_apideck_app_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_apideck_app_id when calling getProxy'
            );
        }
        // verify the required parameter 'x_apideck_service_id' is set
        if ($x_apideck_service_id === null || (is_array($x_apideck_service_id) && count($x_apideck_service_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_apideck_service_id when calling getProxy'
            );
        }
        // verify the required parameter 'x_apideck_downstream_url' is set
        if ($x_apideck_downstream_url === null || (is_array($x_apideck_downstream_url) && count($x_apideck_downstream_url) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_apideck_downstream_url when calling getProxy'
            );
        }

        $resourcePath = '/proxy';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($x_apideck_consumer_id !== null) {
            $headerParams['x-apideck-consumer-id'] = ObjectSerializer::toHeaderValue($x_apideck_consumer_id);
        }
        // header params
        if ($x_apideck_app_id !== null) {
            $headerParams['x-apideck-app-id'] = ObjectSerializer::toHeaderValue($x_apideck_app_id);
        }
        // header params
        if ($x_apideck_service_id !== null) {
            $headerParams['x-apideck-service-id'] = ObjectSerializer::toHeaderValue($x_apideck_service_id);
        }
        // header params
        if ($x_apideck_downstream_url !== null) {
            $headerParams['x-apideck-downstream-url'] = ObjectSerializer::toHeaderValue($x_apideck_downstream_url);
        }
        // header params
        if ($x_apideck_downstream_authorization !== null) {
            $headerParams['x-apideck-downstream-authorization'] = ObjectSerializer::toHeaderValue($x_apideck_downstream_authorization);
        }



        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation optionsProxy
     *
     * OPTIONS
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return mixed|\OpenAPI\Client\Model\GetProxy401Response|mixed
     */
    public function optionsProxy($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null)
    {
        list($response) = $this->optionsProxyWithHttpInfo($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization);
        return $response;
    }

    /**
     * Operation optionsProxyWithHttpInfo
     *
     * OPTIONS
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of mixed|\OpenAPI\Client\Model\GetProxy401Response|mixed, HTTP status code, HTTP response headers (array of strings)
     */
    public function optionsProxyWithHttpInfo($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null)
    {
        $request = $this->optionsProxyRequest($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('mixed' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('mixed' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'mixed', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\GetProxy401Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetProxy401Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetProxy401Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                default:
                    if ('mixed' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('mixed' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'mixed', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = 'mixed';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'mixed',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetProxy401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'mixed',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation optionsProxyAsync
     *
     * OPTIONS
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function optionsProxyAsync($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null)
    {
        return $this->optionsProxyAsyncWithHttpInfo($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation optionsProxyAsyncWithHttpInfo
     *
     * OPTIONS
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function optionsProxyAsyncWithHttpInfo($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null)
    {
        $returnType = 'mixed';
        $request = $this->optionsProxyRequest($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'optionsProxy'
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function optionsProxyRequest($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null)
    {
        // verify the required parameter 'x_apideck_consumer_id' is set
        if ($x_apideck_consumer_id === null || (is_array($x_apideck_consumer_id) && count($x_apideck_consumer_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_apideck_consumer_id when calling optionsProxy'
            );
        }
        // verify the required parameter 'x_apideck_app_id' is set
        if ($x_apideck_app_id === null || (is_array($x_apideck_app_id) && count($x_apideck_app_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_apideck_app_id when calling optionsProxy'
            );
        }
        // verify the required parameter 'x_apideck_service_id' is set
        if ($x_apideck_service_id === null || (is_array($x_apideck_service_id) && count($x_apideck_service_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_apideck_service_id when calling optionsProxy'
            );
        }
        // verify the required parameter 'x_apideck_downstream_url' is set
        if ($x_apideck_downstream_url === null || (is_array($x_apideck_downstream_url) && count($x_apideck_downstream_url) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_apideck_downstream_url when calling optionsProxy'
            );
        }

        $resourcePath = '/proxy';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($x_apideck_consumer_id !== null) {
            $headerParams['x-apideck-consumer-id'] = ObjectSerializer::toHeaderValue($x_apideck_consumer_id);
        }
        // header params
        if ($x_apideck_app_id !== null) {
            $headerParams['x-apideck-app-id'] = ObjectSerializer::toHeaderValue($x_apideck_app_id);
        }
        // header params
        if ($x_apideck_service_id !== null) {
            $headerParams['x-apideck-service-id'] = ObjectSerializer::toHeaderValue($x_apideck_service_id);
        }
        // header params
        if ($x_apideck_downstream_url !== null) {
            $headerParams['x-apideck-downstream-url'] = ObjectSerializer::toHeaderValue($x_apideck_downstream_url);
        }
        // header params
        if ($x_apideck_downstream_authorization !== null) {
            $headerParams['x-apideck-downstream-authorization'] = ObjectSerializer::toHeaderValue($x_apideck_downstream_authorization);
        }



        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'OPTIONS',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation patchProxy
     *
     * PATCH
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     * @param  \OpenAPI\Client\Model\PostProxyRequest $post_proxy_request Depending on the verb/method of the request this will contain the request body you want to POST/PATCH/PUT. (optional)
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return mixed|\OpenAPI\Client\Model\GetProxy401Response|mixed
     */
    public function patchProxy($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null, $post_proxy_request = null)
    {
        list($response) = $this->patchProxyWithHttpInfo($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization, $post_proxy_request);
        return $response;
    }

    /**
     * Operation patchProxyWithHttpInfo
     *
     * PATCH
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     * @param  \OpenAPI\Client\Model\PostProxyRequest $post_proxy_request Depending on the verb/method of the request this will contain the request body you want to POST/PATCH/PUT. (optional)
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of mixed|\OpenAPI\Client\Model\GetProxy401Response|mixed, HTTP status code, HTTP response headers (array of strings)
     */
    public function patchProxyWithHttpInfo($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null, $post_proxy_request = null)
    {
        $request = $this->patchProxyRequest($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization, $post_proxy_request);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('mixed' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('mixed' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'mixed', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\GetProxy401Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetProxy401Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetProxy401Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                default:
                    if ('mixed' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('mixed' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'mixed', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = 'mixed';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'mixed',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetProxy401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'mixed',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation patchProxyAsync
     *
     * PATCH
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     * @param  \OpenAPI\Client\Model\PostProxyRequest $post_proxy_request Depending on the verb/method of the request this will contain the request body you want to POST/PATCH/PUT. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchProxyAsync($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null, $post_proxy_request = null)
    {
        return $this->patchProxyAsyncWithHttpInfo($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization, $post_proxy_request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation patchProxyAsyncWithHttpInfo
     *
     * PATCH
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     * @param  \OpenAPI\Client\Model\PostProxyRequest $post_proxy_request Depending on the verb/method of the request this will contain the request body you want to POST/PATCH/PUT. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchProxyAsyncWithHttpInfo($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null, $post_proxy_request = null)
    {
        $returnType = 'mixed';
        $request = $this->patchProxyRequest($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization, $post_proxy_request);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'patchProxy'
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     * @param  \OpenAPI\Client\Model\PostProxyRequest $post_proxy_request Depending on the verb/method of the request this will contain the request body you want to POST/PATCH/PUT. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function patchProxyRequest($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null, $post_proxy_request = null)
    {
        // verify the required parameter 'x_apideck_consumer_id' is set
        if ($x_apideck_consumer_id === null || (is_array($x_apideck_consumer_id) && count($x_apideck_consumer_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_apideck_consumer_id when calling patchProxy'
            );
        }
        // verify the required parameter 'x_apideck_app_id' is set
        if ($x_apideck_app_id === null || (is_array($x_apideck_app_id) && count($x_apideck_app_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_apideck_app_id when calling patchProxy'
            );
        }
        // verify the required parameter 'x_apideck_service_id' is set
        if ($x_apideck_service_id === null || (is_array($x_apideck_service_id) && count($x_apideck_service_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_apideck_service_id when calling patchProxy'
            );
        }
        // verify the required parameter 'x_apideck_downstream_url' is set
        if ($x_apideck_downstream_url === null || (is_array($x_apideck_downstream_url) && count($x_apideck_downstream_url) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_apideck_downstream_url when calling patchProxy'
            );
        }

        $resourcePath = '/proxy';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($x_apideck_consumer_id !== null) {
            $headerParams['x-apideck-consumer-id'] = ObjectSerializer::toHeaderValue($x_apideck_consumer_id);
        }
        // header params
        if ($x_apideck_app_id !== null) {
            $headerParams['x-apideck-app-id'] = ObjectSerializer::toHeaderValue($x_apideck_app_id);
        }
        // header params
        if ($x_apideck_service_id !== null) {
            $headerParams['x-apideck-service-id'] = ObjectSerializer::toHeaderValue($x_apideck_service_id);
        }
        // header params
        if ($x_apideck_downstream_url !== null) {
            $headerParams['x-apideck-downstream-url'] = ObjectSerializer::toHeaderValue($x_apideck_downstream_url);
        }
        // header params
        if ($x_apideck_downstream_authorization !== null) {
            $headerParams['x-apideck-downstream-authorization'] = ObjectSerializer::toHeaderValue($x_apideck_downstream_authorization);
        }



        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($post_proxy_request)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($post_proxy_request));
            } else {
                $httpBody = $post_proxy_request;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'PATCH',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation postProxy
     *
     * POST
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     * @param  \OpenAPI\Client\Model\PostProxyRequest $post_proxy_request Depending on the verb/method of the request this will contain the request body you want to POST/PATCH/PUT. (optional)
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return mixed|\OpenAPI\Client\Model\GetProxy401Response|mixed
     */
    public function postProxy($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null, $post_proxy_request = null)
    {
        list($response) = $this->postProxyWithHttpInfo($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization, $post_proxy_request);
        return $response;
    }

    /**
     * Operation postProxyWithHttpInfo
     *
     * POST
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     * @param  \OpenAPI\Client\Model\PostProxyRequest $post_proxy_request Depending on the verb/method of the request this will contain the request body you want to POST/PATCH/PUT. (optional)
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of mixed|\OpenAPI\Client\Model\GetProxy401Response|mixed, HTTP status code, HTTP response headers (array of strings)
     */
    public function postProxyWithHttpInfo($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null, $post_proxy_request = null)
    {
        $request = $this->postProxyRequest($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization, $post_proxy_request);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('mixed' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('mixed' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'mixed', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\GetProxy401Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetProxy401Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetProxy401Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                default:
                    if ('mixed' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('mixed' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'mixed', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = 'mixed';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'mixed',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetProxy401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'mixed',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation postProxyAsync
     *
     * POST
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     * @param  \OpenAPI\Client\Model\PostProxyRequest $post_proxy_request Depending on the verb/method of the request this will contain the request body you want to POST/PATCH/PUT. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postProxyAsync($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null, $post_proxy_request = null)
    {
        return $this->postProxyAsyncWithHttpInfo($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization, $post_proxy_request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation postProxyAsyncWithHttpInfo
     *
     * POST
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     * @param  \OpenAPI\Client\Model\PostProxyRequest $post_proxy_request Depending on the verb/method of the request this will contain the request body you want to POST/PATCH/PUT. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postProxyAsyncWithHttpInfo($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null, $post_proxy_request = null)
    {
        $returnType = 'mixed';
        $request = $this->postProxyRequest($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization, $post_proxy_request);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'postProxy'
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     * @param  \OpenAPI\Client\Model\PostProxyRequest $post_proxy_request Depending on the verb/method of the request this will contain the request body you want to POST/PATCH/PUT. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function postProxyRequest($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null, $post_proxy_request = null)
    {
        // verify the required parameter 'x_apideck_consumer_id' is set
        if ($x_apideck_consumer_id === null || (is_array($x_apideck_consumer_id) && count($x_apideck_consumer_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_apideck_consumer_id when calling postProxy'
            );
        }
        // verify the required parameter 'x_apideck_app_id' is set
        if ($x_apideck_app_id === null || (is_array($x_apideck_app_id) && count($x_apideck_app_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_apideck_app_id when calling postProxy'
            );
        }
        // verify the required parameter 'x_apideck_service_id' is set
        if ($x_apideck_service_id === null || (is_array($x_apideck_service_id) && count($x_apideck_service_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_apideck_service_id when calling postProxy'
            );
        }
        // verify the required parameter 'x_apideck_downstream_url' is set
        if ($x_apideck_downstream_url === null || (is_array($x_apideck_downstream_url) && count($x_apideck_downstream_url) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_apideck_downstream_url when calling postProxy'
            );
        }

        $resourcePath = '/proxy';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($x_apideck_consumer_id !== null) {
            $headerParams['x-apideck-consumer-id'] = ObjectSerializer::toHeaderValue($x_apideck_consumer_id);
        }
        // header params
        if ($x_apideck_app_id !== null) {
            $headerParams['x-apideck-app-id'] = ObjectSerializer::toHeaderValue($x_apideck_app_id);
        }
        // header params
        if ($x_apideck_service_id !== null) {
            $headerParams['x-apideck-service-id'] = ObjectSerializer::toHeaderValue($x_apideck_service_id);
        }
        // header params
        if ($x_apideck_downstream_url !== null) {
            $headerParams['x-apideck-downstream-url'] = ObjectSerializer::toHeaderValue($x_apideck_downstream_url);
        }
        // header params
        if ($x_apideck_downstream_authorization !== null) {
            $headerParams['x-apideck-downstream-authorization'] = ObjectSerializer::toHeaderValue($x_apideck_downstream_authorization);
        }



        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($post_proxy_request)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($post_proxy_request));
            } else {
                $httpBody = $post_proxy_request;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation putProxy
     *
     * PUT
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     * @param  \OpenAPI\Client\Model\PutProxyRequest $put_proxy_request Depending on the verb/method of the request this will contain the request body you want to POST/PATCH/PUT. (optional)
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return mixed|\OpenAPI\Client\Model\GetProxy401Response|mixed
     */
    public function putProxy($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null, $put_proxy_request = null)
    {
        list($response) = $this->putProxyWithHttpInfo($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization, $put_proxy_request);
        return $response;
    }

    /**
     * Operation putProxyWithHttpInfo
     *
     * PUT
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     * @param  \OpenAPI\Client\Model\PutProxyRequest $put_proxy_request Depending on the verb/method of the request this will contain the request body you want to POST/PATCH/PUT. (optional)
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of mixed|\OpenAPI\Client\Model\GetProxy401Response|mixed, HTTP status code, HTTP response headers (array of strings)
     */
    public function putProxyWithHttpInfo($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null, $put_proxy_request = null)
    {
        $request = $this->putProxyRequest($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization, $put_proxy_request);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('mixed' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('mixed' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'mixed', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPI\Client\Model\GetProxy401Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPI\Client\Model\GetProxy401Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\GetProxy401Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                default:
                    if ('mixed' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('mixed' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, 'mixed', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = 'mixed';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'mixed',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\GetProxy401Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'mixed',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation putProxyAsync
     *
     * PUT
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     * @param  \OpenAPI\Client\Model\PutProxyRequest $put_proxy_request Depending on the verb/method of the request this will contain the request body you want to POST/PATCH/PUT. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function putProxyAsync($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null, $put_proxy_request = null)
    {
        return $this->putProxyAsyncWithHttpInfo($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization, $put_proxy_request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation putProxyAsyncWithHttpInfo
     *
     * PUT
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     * @param  \OpenAPI\Client\Model\PutProxyRequest $put_proxy_request Depending on the verb/method of the request this will contain the request body you want to POST/PATCH/PUT. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function putProxyAsyncWithHttpInfo($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null, $put_proxy_request = null)
    {
        $returnType = 'mixed';
        $request = $this->putProxyRequest($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization, $put_proxy_request);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'putProxy'
     *
     * @param  string $x_apideck_consumer_id ID of the consumer which you want to get or push data from (required)
     * @param  string $x_apideck_app_id The ID of your Unify application (required)
     * @param  string $x_apideck_service_id Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. (required)
     * @param  string $x_apideck_downstream_url Downstream URL (required)
     * @param  string $x_apideck_downstream_authorization Downstream authorization header. This will skip the Vault token injection. (optional)
     * @param  \OpenAPI\Client\Model\PutProxyRequest $put_proxy_request Depending on the verb/method of the request this will contain the request body you want to POST/PATCH/PUT. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function putProxyRequest($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization = null, $put_proxy_request = null)
    {
        // verify the required parameter 'x_apideck_consumer_id' is set
        if ($x_apideck_consumer_id === null || (is_array($x_apideck_consumer_id) && count($x_apideck_consumer_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_apideck_consumer_id when calling putProxy'
            );
        }
        // verify the required parameter 'x_apideck_app_id' is set
        if ($x_apideck_app_id === null || (is_array($x_apideck_app_id) && count($x_apideck_app_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_apideck_app_id when calling putProxy'
            );
        }
        // verify the required parameter 'x_apideck_service_id' is set
        if ($x_apideck_service_id === null || (is_array($x_apideck_service_id) && count($x_apideck_service_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_apideck_service_id when calling putProxy'
            );
        }
        // verify the required parameter 'x_apideck_downstream_url' is set
        if ($x_apideck_downstream_url === null || (is_array($x_apideck_downstream_url) && count($x_apideck_downstream_url) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $x_apideck_downstream_url when calling putProxy'
            );
        }

        $resourcePath = '/proxy';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($x_apideck_consumer_id !== null) {
            $headerParams['x-apideck-consumer-id'] = ObjectSerializer::toHeaderValue($x_apideck_consumer_id);
        }
        // header params
        if ($x_apideck_app_id !== null) {
            $headerParams['x-apideck-app-id'] = ObjectSerializer::toHeaderValue($x_apideck_app_id);
        }
        // header params
        if ($x_apideck_service_id !== null) {
            $headerParams['x-apideck-service-id'] = ObjectSerializer::toHeaderValue($x_apideck_service_id);
        }
        // header params
        if ($x_apideck_downstream_url !== null) {
            $headerParams['x-apideck-downstream-url'] = ObjectSerializer::toHeaderValue($x_apideck_downstream_url);
        }
        // header params
        if ($x_apideck_downstream_authorization !== null) {
            $headerParams['x-apideck-downstream-authorization'] = ObjectSerializer::toHeaderValue($x_apideck_downstream_authorization);
        }



        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($put_proxy_request)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($put_proxy_request));
            } else {
                $httpBody = $put_proxy_request;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
