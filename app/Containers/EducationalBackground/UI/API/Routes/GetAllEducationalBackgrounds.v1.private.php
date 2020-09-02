<?php

/**
 * @apiGroup           EducationalBackground
 * @apiName            getAllEducationalBackgrounds
 *
 * @api                {GET} /v1/users/:user_id/educational-backgrounds Get All Educational Backgrounds
 * @apiDescription     Get All Educational Backgrounds
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated
 *
 * @apiUse             EducationalBackgroundsSuccessMultipleResponse
 */

/** @var Route $router */
$router->get('users/{user_id}/educational-backgrounds', [
    'as' => 'api_educational_background_get_all_educational_backgrounds',
    'uses'  => 'Controller@getAllEducationalBackgrounds',
    'middleware' => [
      'auth:api',
    ],
]);
