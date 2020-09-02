<?php

/**
 * @apiGroup           EducationalBackground
 * @apiName            findEducationalBackgroundById
 *
 * @api                {GET} /v1/users/:user_id/educational-backgrounds/:educational_background_id Find Educational Background By ID
 * @apiDescription     Find Educational Background By Id
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated
 *
 * @apiUse             EducationalBackgroundSuccessSingleResponse
 */

/** @var Route $router */
$router->get('users/{user_id}/educational-backgrounds/{educational_background_id}', [
    'as' => 'api_educational_background_find_educational_background_by_id',
    'uses' => 'Controller@findEducationalBackgroundById',
    'middleware' => [
        'auth:api',
    ],
]);
