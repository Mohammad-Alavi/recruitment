<?php

/**
 * @apiGroup           HealthSelfDeclaration
 * @apiName            updateHealthSelfDeclaration
 *
 * @api                {PATCH} /v1/users/:user_id/health-self-declarations/:health_self_declaration_id Update Health Self Declaration
 * @apiDescription     Update Health Self Declaration
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated
 *
 * @apiParam           {String="A+,A-,B+,B-,O+,O-,AB+,AB-"} blood_type
 * @apiParam           {String} health_options
 *
 * @apiUse             HealthSelfDeclarationSuccessSingleResponse
 */

/** @var Route $router */
$router->patch('users/{user_id}/health-self-declarations/{health_self_declaration_id}', [
    'as' => 'api_health_self_declaration_update_health_self_declaration',
    'uses' => 'Controller@updateHealthSelfDeclaration',
    'middleware' => [
        'auth:api',
    ],
]);
