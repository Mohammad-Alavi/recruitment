<?php

/**
 * @apiGroup           Skill
 * @apiName            updateSkill
 *
 * @api                {PATCH} /v1/skills/:id Endpoint title here..
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
$router->patch('skills/{id}', [
    'as' => 'api_skill_update_skill',
    'uses'  => 'Controller@updateSkill',
    'middleware' => [
      'auth:api',
    ],
]);
