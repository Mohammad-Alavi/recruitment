<?php

/**
 * @apiGroup           DesiredJob
 * @apiName            findDesiredJobById
 *
 * @api                {GET} /v1/users/:user_id/desired-jobs/:desired_job_id Find User By ID
 * @apiDescription     Find User By Id
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated
 *
 * @apiUse             DesiredJobSuccessSingleResponse
 */

/** @var Route $router */
$router->get('users/{user_id}/desired-jobs/{desired_job_id}', [
    'as' => 'api_desired_job_find_desired_job_by_id',
    'uses'  => 'Controller@findDesiredJobById',
    'middleware' => [
      'auth:api',
    ],
]);
