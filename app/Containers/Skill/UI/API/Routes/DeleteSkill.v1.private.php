<?php

/**
 * @apiGroup           Skill
 * @apiName            deleteSkill
 *
 * @api                {DELETE} /v1/skills/:id Endpoint title here..
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
$router->delete('skills/{id}', [
    'as' => 'api_skill_delete_skill',
    'uses'  => 'Controller@deleteSkill',
    'middleware' => [
      'auth:api',
    ],
]);
