<?php

/**
 * @apiGroup           HealthSelfDeclaration
 * @apiName            findHealthSelfDeclarationById
 *
 * @api                {GET} /v1/users/:user_id/health-self-declarations/:health_self_declaration_id Find Health Self Declaration By Id
 * @apiDescription     Find Health Self Declaration By Id
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated
 *
 * @apiUse             HealthSelfDeclarationSuccessSingleResponse
 */

/** @var Route $router */
$router->get('users/{user_id}/health-self-declarations/{health_self_declaration_id}', [
    'as' => 'api_health_self_declaration_find_health_self_declaration_by_id',
    'uses' => 'Controller@findHealthSelfDeclarationById',
    'middleware' => [
        'auth:api',
    ],
]);
