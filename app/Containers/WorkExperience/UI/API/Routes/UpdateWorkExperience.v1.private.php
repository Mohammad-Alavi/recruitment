<?php

/**
 * @apiGroup           WorkExperience
 * @apiName            updateWorkExperience
 *
 * @api                {PATCH} /v1/users/:user_id/work-experiences/:work_experience_id Update Work Experience
 * @apiDescription     Update Work Experience
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated
 *
 * @apiParam           {String} work_place_name min:2|max:50
 * @apiParam           {String} type_of_work min:2|max:50
 * @apiParam           {String} work_duration_year integer|min:0|max:40
 * @apiParam           {String} work_duration_month integer|min:0|max:12
 * @apiParam           {String} insurance_duration_year integer|min:0|max:40
 * @apiParam           {String} insurance_duration_month integer|min:0|max:12
 * @apiParam           {String="end_of_contract,resignation,lay_off"} activity_termination_reason
 * @apiParam           {String} employer_name min:2|max:50
 * @apiParam           {String} employer_number string
 *
 * @apiUse             WorkExperienceSuccessSingleResponse
 */

/** @var Route $router */
$router->patch('users/{user_id}/work-experiences/{work_experience_id}', [
    'as' => 'api_work_experience_update_work_experience',
    'uses'  => 'Controller@updateWorkExperience',
    'middleware' => [
      'auth:api',
    ],
]);
