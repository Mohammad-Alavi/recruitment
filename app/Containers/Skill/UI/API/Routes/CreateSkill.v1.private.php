<?php

/**
 * @apiGroup           Skill
 * @apiName            createSkill
 *
 * @api                {POST} /v1/users/:user_id/skills Add Skill
 * @apiDescription     Add Skill to User
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated
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
$router->post('users/{user_id}/skills', [
    'as' => 'api_skill_create_skill',
    'uses'  => 'Controller@createSkill',
    'middleware' => [
      'auth:api',
    ],
]);
