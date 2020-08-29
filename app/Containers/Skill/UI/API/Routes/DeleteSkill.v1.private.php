<?php

/**
 * @apiGroup           Skill
 * @apiName            deleteSkill
 *
 * @api                {DELETE} /v1/users/:user_id/skills/:skill_id Delete Skill
 * @apiDescription     Delete a Skill from User
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->delete('users/{user_id}/skills/{skill_id}', [
    'as' => 'api_skill_delete_skill',
    'uses'  => 'Controller@deleteSkill',
    'middleware' => [
      'auth:api',
    ],
]);
