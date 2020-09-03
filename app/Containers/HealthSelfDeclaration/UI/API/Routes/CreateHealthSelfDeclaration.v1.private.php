<?php

/**
 * @apiGroup           HealthSelfDeclaration
 * @apiName            createHealthSelfDeclaration
 *
 * @api                {POST} /v1/users/:user_id/health-self-declarations Create Health Self Declaration
 * @apiDescription     Create Health Self Declaration
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated
 *
 * @apiParam           {String="A+,A-,B+,B-,O+,O-,AB+,AB-"} blood_type required
 * @apiParam           {String} health_options required
 *
 * @apiUse             HealthSelfDeclarationSuccessSingleResponse
 */

/** @var Route $router */
$router->post('users/{user_id}/health-self-declarations', [
    'as' => 'api_health_self_declaration_create_health_self_declaration',
    'uses' => 'Controller@createHealthSelfDeclaration',
    'middleware' => [
        'auth:api',
    ],
]);
