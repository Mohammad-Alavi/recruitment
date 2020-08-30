<?php

/**
 * @apiGroup           DesiredJob
 * @apiName            getAllDesiredJobs
 *
 * @api                {GET} /v1/users/:user_id/desired_jobs Get All Desired Jobs
 * @apiDescription     Get All Desired Jobs of a User
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated
 *
 * @apiUse             DesiredJobsSuccessMultipleResponse
 */

/** @var Route $router */
$router->get('users/{user_id}/desired_jobs', [
    'as' => 'api_desired_job_get_all_desired_jobs',
    'uses' => 'Controller@getAllDesiredJobs',
    'middleware' => [
        'auth:api',
    ],
]);
