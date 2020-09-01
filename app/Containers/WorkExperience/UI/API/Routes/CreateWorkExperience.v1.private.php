<?php

/**
 * @apiGroup           WorkExperience
 * @apiName            createWorkExperience
 *
 * @api                {POST} /v1/users/:user_id/work-experiences Create Work Experience
 * @apiDescription     Create Work Experience
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated
 *
 * @apiParam           {String} work_place_name required|min:2|max:50
 * @apiParam           {String} type_of_work required|min:2|max:50
 * @apiParam           {String} work_duration_year required|integer|min:0|max:40
 * @apiParam           {String} work_duration_month required|integer|min:0|max:12
 * @apiParam           {String} insurance_duration_year required|integer|min:0|max:40
 * @apiParam           {String} insurance_duration_month required|integer|min:0|max:12
 * @apiParam           {String="end_of_contract,resignation,lay_off"} activity_termination_reason required
 * @apiParam           {String} employer_name required|min:2|max:50
 * @apiParam           {String} employer_number required|string
 *
 * @apiUse             WorkExperienceSuccessSingleResponse
 */

/** @var Route $router */
$router->post('users/{user_id}/work-experiences', [
    'as' => 'api_work_experience_create_work_experience',
    'uses'  => 'Controller@createWorkExperience',
    'middleware' => [
      'auth:api',
    ],
]);
