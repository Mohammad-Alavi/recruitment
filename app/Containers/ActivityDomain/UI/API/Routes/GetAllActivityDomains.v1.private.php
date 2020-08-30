<?php

/**
 * @apiGroup           ActivityDomain
 * @apiName            getAllActivityDomains
 *
 * @api                {GET} /v1/activity-domains Get All Activity Domains
 * @apiDescription     Get all Activity Domains
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
 * {
 * // Insert the response of the request here...
 * }
 */

/** @var Route $router */
$router->get('activity-domains', [
    'as' => 'api_activity_domain_get_all_activity_domains',
    'uses' => 'Controller@getAllActivityDomains',
]);
