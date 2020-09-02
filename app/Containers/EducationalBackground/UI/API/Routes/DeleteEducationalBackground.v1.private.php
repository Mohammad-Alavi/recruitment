<?php

/**
 * @apiGroup           EducationalBackground
 * @apiName            deleteEducationalBackground
 *
 * @api                {DELETE} /v1/users/:user_id/educational-backgrounds/:educational_background_id Delete Educational Background
 * @apiDescription     Delete Educational Background
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 204 No Content
 * {
 * }
 */

/** @var Route $router */
$router->delete('users/{user_id}/educational-backgrounds/{educational_background_id}', [
    'as' => 'api_educational_background_delete_educational_background',
    'uses'  => 'Controller@deleteEducationalBackground',
    'middleware' => [
      'auth:api',
    ],
]);
