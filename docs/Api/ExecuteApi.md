# OpenAPI\Client\ExecuteApi

All URIs are relative to https://unify.apideck.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteProxy()**](ExecuteApi.md#deleteProxy) | **DELETE** /proxy | DELETE
[**getProxy()**](ExecuteApi.md#getProxy) | **GET** /proxy | GET
[**optionsProxy()**](ExecuteApi.md#optionsProxy) | **OPTIONS** /proxy | OPTIONS
[**patchProxy()**](ExecuteApi.md#patchProxy) | **PATCH** /proxy | PATCH
[**postProxy()**](ExecuteApi.md#postProxy) | **POST** /proxy | POST
[**putProxy()**](ExecuteApi.md#putProxy) | **PUT** /proxy | PUT


## `deleteProxy()`

```php
deleteProxy($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization): mixed
```

DELETE

Proxies a downstream DELETE request to a service and injects the necessary credentials into a request stored in Vault. This allows you to have an additional security layer and logging without needing to rely on Unify for normalization. **Note**: Vault will proxy all data to the downstream URL and method/verb in the headers.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new OpenAPI\Client\Api\ExecuteApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_apideck_consumer_id = 'x_apideck_consumer_id_example'; // string | ID of the consumer which you want to get or push data from
$x_apideck_app_id = 'x_apideck_app_id_example'; // string | The ID of your Unify application
$x_apideck_service_id = close; // string | Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API.
$x_apideck_downstream_url = https://api.close.com/api/v1/lead; // string | Downstream URL
$x_apideck_downstream_authorization = Bearer XXXXXXXXXXXXXXXXX; // string | Downstream authorization header. This will skip the Vault token injection.

try {
    $result = $apiInstance->deleteProxy($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ExecuteApi->deleteProxy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_apideck_consumer_id** | **string**| ID of the consumer which you want to get or push data from |
 **x_apideck_app_id** | **string**| The ID of your Unify application |
 **x_apideck_service_id** | **string**| Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. |
 **x_apideck_downstream_url** | **string**| Downstream URL |
 **x_apideck_downstream_authorization** | **string**| Downstream authorization header. This will skip the Vault token injection. | [optional]

### Return type

**mixed**

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getProxy()`

```php
getProxy($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization): mixed
```

GET

Proxies a downstream GET request to a service and injects the necessary credentials into a request stored in Vault. This allows you to have an additional security layer and logging without needing to rely on Unify for normalization. **Note**: Vault will proxy all data to the downstream URL and method/verb in the headers.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new OpenAPI\Client\Api\ExecuteApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_apideck_consumer_id = 'x_apideck_consumer_id_example'; // string | ID of the consumer which you want to get or push data from
$x_apideck_app_id = 'x_apideck_app_id_example'; // string | The ID of your Unify application
$x_apideck_service_id = close; // string | Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API.
$x_apideck_downstream_url = https://api.close.com/api/v1/lead; // string | Downstream URL
$x_apideck_downstream_authorization = Bearer XXXXXXXXXXXXXXXXX; // string | Downstream authorization header. This will skip the Vault token injection.

try {
    $result = $apiInstance->getProxy($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ExecuteApi->getProxy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_apideck_consumer_id** | **string**| ID of the consumer which you want to get or push data from |
 **x_apideck_app_id** | **string**| The ID of your Unify application |
 **x_apideck_service_id** | **string**| Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. |
 **x_apideck_downstream_url** | **string**| Downstream URL |
 **x_apideck_downstream_authorization** | **string**| Downstream authorization header. This will skip the Vault token injection. | [optional]

### Return type

**mixed**

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `optionsProxy()`

```php
optionsProxy($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization): mixed
```

OPTIONS

Proxies a downstream OPTION request to a service and injects the necessary credentials into a request stored in Vault. This allows you to have an additional security layer and logging without needing to rely on Unify for normalization. **Note**: Vault will proxy all data to the downstream URL and method/verb in the headers.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new OpenAPI\Client\Api\ExecuteApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_apideck_consumer_id = 'x_apideck_consumer_id_example'; // string | ID of the consumer which you want to get or push data from
$x_apideck_app_id = 'x_apideck_app_id_example'; // string | The ID of your Unify application
$x_apideck_service_id = close; // string | Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API.
$x_apideck_downstream_url = https://api.close.com/api/v1/lead; // string | Downstream URL
$x_apideck_downstream_authorization = Bearer XXXXXXXXXXXXXXXXX; // string | Downstream authorization header. This will skip the Vault token injection.

try {
    $result = $apiInstance->optionsProxy($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ExecuteApi->optionsProxy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_apideck_consumer_id** | **string**| ID of the consumer which you want to get or push data from |
 **x_apideck_app_id** | **string**| The ID of your Unify application |
 **x_apideck_service_id** | **string**| Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. |
 **x_apideck_downstream_url** | **string**| Downstream URL |
 **x_apideck_downstream_authorization** | **string**| Downstream authorization header. This will skip the Vault token injection. | [optional]

### Return type

**mixed**

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchProxy()`

```php
patchProxy($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization, $post_proxy_request): mixed
```

PATCH

Proxies a downstream PATCH request to a service and injects the necessary credentials into a request stored in Vault. This allows you to have an additional security layer and logging without needing to rely on Unify for normalization. **Note**: Vault will proxy all data to the downstream URL and method/verb in the headers.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new OpenAPI\Client\Api\ExecuteApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_apideck_consumer_id = 'x_apideck_consumer_id_example'; // string | ID of the consumer which you want to get or push data from
$x_apideck_app_id = 'x_apideck_app_id_example'; // string | The ID of your Unify application
$x_apideck_service_id = close; // string | Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API.
$x_apideck_downstream_url = https://api.close.com/api/v1/lead; // string | Downstream URL
$x_apideck_downstream_authorization = Bearer XXXXXXXXXXXXXXXXX; // string | Downstream authorization header. This will skip the Vault token injection.
$post_proxy_request = new \OpenAPI\Client\Model\PostProxyRequest(); // \OpenAPI\Client\Model\PostProxyRequest | Depending on the verb/method of the request this will contain the request body you want to POST/PATCH/PUT.

try {
    $result = $apiInstance->patchProxy($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization, $post_proxy_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ExecuteApi->patchProxy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_apideck_consumer_id** | **string**| ID of the consumer which you want to get or push data from |
 **x_apideck_app_id** | **string**| The ID of your Unify application |
 **x_apideck_service_id** | **string**| Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. |
 **x_apideck_downstream_url** | **string**| Downstream URL |
 **x_apideck_downstream_authorization** | **string**| Downstream authorization header. This will skip the Vault token injection. | [optional]
 **post_proxy_request** | [**\OpenAPI\Client\Model\PostProxyRequest**](../Model/PostProxyRequest.md)| Depending on the verb/method of the request this will contain the request body you want to POST/PATCH/PUT. | [optional]

### Return type

**mixed**

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postProxy()`

```php
postProxy($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization, $post_proxy_request): mixed
```

POST

Proxies a downstream POST request to a service and injects the necessary credentials into a request stored in Vault. This allows you to have an additional security layer and logging without needing to rely on Unify for normalization. **Note**: Vault will proxy all data to the downstream URL and method/verb in the headers.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new OpenAPI\Client\Api\ExecuteApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_apideck_consumer_id = 'x_apideck_consumer_id_example'; // string | ID of the consumer which you want to get or push data from
$x_apideck_app_id = 'x_apideck_app_id_example'; // string | The ID of your Unify application
$x_apideck_service_id = close; // string | Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API.
$x_apideck_downstream_url = https://api.close.com/api/v1/lead; // string | Downstream URL
$x_apideck_downstream_authorization = Bearer XXXXXXXXXXXXXXXXX; // string | Downstream authorization header. This will skip the Vault token injection.
$post_proxy_request = new \OpenAPI\Client\Model\PostProxyRequest(); // \OpenAPI\Client\Model\PostProxyRequest | Depending on the verb/method of the request this will contain the request body you want to POST/PATCH/PUT.

try {
    $result = $apiInstance->postProxy($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization, $post_proxy_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ExecuteApi->postProxy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_apideck_consumer_id** | **string**| ID of the consumer which you want to get or push data from |
 **x_apideck_app_id** | **string**| The ID of your Unify application |
 **x_apideck_service_id** | **string**| Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. |
 **x_apideck_downstream_url** | **string**| Downstream URL |
 **x_apideck_downstream_authorization** | **string**| Downstream authorization header. This will skip the Vault token injection. | [optional]
 **post_proxy_request** | [**\OpenAPI\Client\Model\PostProxyRequest**](../Model/PostProxyRequest.md)| Depending on the verb/method of the request this will contain the request body you want to POST/PATCH/PUT. | [optional]

### Return type

**mixed**

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `putProxy()`

```php
putProxy($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization, $put_proxy_request): mixed
```

PUT

Proxies a downstream PUT request to a service and injects the necessary credentials into a request stored in Vault. This allows you to have an additional security layer and logging without needing to rely on Unify for normalization. **Note**: Vault will proxy all data to the downstream URL and method/verb in the headers.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiKey
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new OpenAPI\Client\Api\ExecuteApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$x_apideck_consumer_id = 'x_apideck_consumer_id_example'; // string | ID of the consumer which you want to get or push data from
$x_apideck_app_id = 'x_apideck_app_id_example'; // string | The ID of your Unify application
$x_apideck_service_id = close; // string | Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API.
$x_apideck_downstream_url = https://api.close.com/api/v1/lead; // string | Downstream URL
$x_apideck_downstream_authorization = Bearer XXXXXXXXXXXXXXXXX; // string | Downstream authorization header. This will skip the Vault token injection.
$put_proxy_request = new \OpenAPI\Client\Model\PutProxyRequest(); // \OpenAPI\Client\Model\PutProxyRequest | Depending on the verb/method of the request this will contain the request body you want to POST/PATCH/PUT.

try {
    $result = $apiInstance->putProxy($x_apideck_consumer_id, $x_apideck_app_id, $x_apideck_service_id, $x_apideck_downstream_url, $x_apideck_downstream_authorization, $put_proxy_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ExecuteApi->putProxy: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_apideck_consumer_id** | **string**| ID of the consumer which you want to get or push data from |
 **x_apideck_app_id** | **string**| The ID of your Unify application |
 **x_apideck_service_id** | **string**| Provide the service id you want to call (e.g., pipedrive). Only needed when a consumer has activated multiple integrations for a Unified API. |
 **x_apideck_downstream_url** | **string**| Downstream URL |
 **x_apideck_downstream_authorization** | **string**| Downstream authorization header. This will skip the Vault token injection. | [optional]
 **put_proxy_request** | [**\OpenAPI\Client\Model\PutProxyRequest**](../Model/PutProxyRequest.md)| Depending on the verb/method of the request this will contain the request body you want to POST/PATCH/PUT. | [optional]

### Return type

**mixed**

### Authorization

[apiKey](../../README.md#apiKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
