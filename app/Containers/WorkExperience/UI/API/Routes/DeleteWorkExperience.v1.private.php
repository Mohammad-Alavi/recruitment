<?php

/**
 * @apiGroup           WorkExperience
 * @apiName            deleteWorkExperience
 *
 * @api                {DELETE} /v1/users/:user_id/work-experiences/:work_experience_id Delete Work Experience
 * @apiDescription     Delete Work Experience
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
$router->delete('users/{user_id}/work-experiences/{work_experience_id}', [
    'as' => 'api_work_experience_delete_work_experience',
    'uses'  => 'Controller@deleteWorkExperience',
    'middleware' => [
      'auth:api',
    ],
]);
