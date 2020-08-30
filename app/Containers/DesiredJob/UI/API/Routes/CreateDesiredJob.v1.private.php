<?php

/**
 * @apiGroup           DesiredJob
 * @apiName            createDesiredJob
 *
 * @api                {POST} /v1/users/:user_id/desired-jobs Create Desired Job
 * @apiDescription     Create and Add a Desired Job to user
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated
 *
 * @apiParam           {String} activity_domain_id required|exists:activity_domains,id
 * @apiParam           {String} activity_domain_job_id required|exists:activity_domain_jobs,id
 * @apiParam           {String} ready_date required|date_format:Ymd
 *
 * @apiUse             DesiredJobSuccessSingleResponse
 */

/** @var Route $router */
$router->post('users/{user_id}/desired-jobs', [
    'as' => 'api_desired_job_create_desired_job',
    'uses' => 'Controller@createDesiredJob',
    'middleware' => [
        'auth:api',
    ],
]);
