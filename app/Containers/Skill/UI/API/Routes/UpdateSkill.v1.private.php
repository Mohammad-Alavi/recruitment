<?php

/**
 * @apiGroup           Skill
 * @apiName            updateSkill
 *
 * @api                {PATCH} /v1/users/:user_id/skills/:skill_id Update Skill
 * @apiDescription     Update User Skill
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
 * {
 * // Insert the response of the request here...
 * }
 */

/** @var Route $router */
$router->patch('users/{user_id}/skills/{skill_id}', [
    'as' => 'api_skill_update_skill',
    'uses' => 'Controller@updateSkill',
    'middleware' => [
        'auth:api',
    ],
]);
