<?php

/**
 * @apiGroup           WorkExperience
 * @apiName            getAllWorkExperiences
 *
 * @api                {GET} /v1/users/:user_id/work-experiences Get All Work Experiences
 * @apiDescription     Get All Work Experiences
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated
 *
 * @apiUse             WorkExperiencesSuccessMultipleResponse
 */

/** @var Route $router */
$router->get('users/{user_id}/work-experiences', [
    'as' => 'api_work_experience_get_all_work_experiences',
    'uses'  => 'Controller@getAllWorkExperiences',
    'middleware' => [
      'auth:api',
    ],
]);
