<?php

/**
 * @apiGroup           DesiredJob
 * @apiName            updateDesiredJob
 *
 * @api                {PATCH} /v1/users/:user_id/desired_jobs/:desired_job_id Update Desired Job
 * @apiDescription     Update Desired Job
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated
 *
 * @apiParam           {String} activity_domain_id exists:activity_domains,id
 * @apiParam           {String} activity_domain_job_id exists:activity_domain_jobs,id
 * @apiParam           {String} ready_date date_format:Ymd
 *
 * @apiUse             DesiredJobSuccessSingleResponse
 */

/** @var Route $router */
$router->patch('users/{user_id}/desired_jobs/{desired_job_id}', [
    'as' => 'api_desired_job_update_desired_job',
    'uses' => 'Controller@updateDesiredJob',
    'middleware' => [
        'auth:api',
    ],
]);
