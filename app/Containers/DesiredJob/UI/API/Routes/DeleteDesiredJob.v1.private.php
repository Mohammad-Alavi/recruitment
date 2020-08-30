<?php

/**
 * @apiGroup           DesiredJob
 * @apiName            deleteDesiredJob
 *
 * @api                {DELETE} /v1/users/:user_id/desired_jobs/:desired_job_id Delete Desired Job
 * @apiDescription     Delete Desired Job of a User
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
$router->delete('users/{user_id}/desired_jobs/{desired_job_id}', [
    'as' => 'api_desired_job_delete_desired_job',
    'uses' => 'Controller@deleteDesiredJob',
    'middleware' => [
        'auth:api',
    ],
]);
