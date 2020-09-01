<?php

/**
 * @apiGroup           WorkExperience
 * @apiName            getAllWorkExperiences
 *
 * @api                {GET} /v1/users/:user_id/work-experiences Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->get('users/{user_id}/work-experiences', [
    'as' => 'api_workexperience_get_all_work_experiences',
    'uses'  => 'Controller@getAllWorkExperiences',
    'middleware' => [
      'auth:api',
    ],
]);
