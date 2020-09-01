<?php

/**
 * @apiGroup           WorkExperience
 * @apiName            findWorkExperienceById
 *
 * @api                {GET} /v1/users/:user_id/work-experiences/:work_experience_id Find Work Experience By ID
 * @apiDescription     Find Work Experience By Id
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiUse             WorkExperienceSuccessSingleResponse
 */

/** @var Route $router */
$router->get('users/{user_id}/work-experiences/{work_experience_id}', [
    'as' => 'api_work_experience_find_work_experience_by_id',
    'uses'  => 'Controller@findWorkExperienceById',
    'middleware' => [
      'auth:api',
    ],
]);
