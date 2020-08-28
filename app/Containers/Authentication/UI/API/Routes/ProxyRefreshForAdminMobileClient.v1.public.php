<?php

/**
 * @apiGroup           OAuth2
 * @apiName            ClientAdminMobileAppRefreshProxy
 * @api                {post} /v1/clients/mobile/admin/refresh Refresh
 * @apiDescription     If `refresh_token` is not provided the we'll try to get it from the http cookie.
 *
 * @apiVersion         1.0.0
 *
 * @apiParam           {String}  [refresh_token] The refresh Token
 *
 * @apiSuccessExample  {json}       Success-Response:
 * HTTP/1.1 200 OK
 * {
 * "token_type": "Bearer",
 * "expires_in": 315360000,
 * "access_token": "eyJ0eXAiOiJKV1QiLCJhbG...",
 * "refresh_token": "ZFDPA1S7H8Wydjkjl+xt+hPGWTagX..."
 * }
 */
$router->post('clients/mobile/admin/refresh', [
  'as' => 'api_authentication_client_admin_mobile_app_refresh_proxy',
  'uses' => 'Controller@proxyRefreshForAdminMobileClient',
]);
