<?php

/**
 * @apiGroup           Skill
 * @apiName            createSkill
 *
 * @api                {POST} /v1/users/:user_id/skills Create Skill
 * @apiDescription     Add Skill to User
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated
 *
 * @apiParam           {String} name required|min:4|max:50,
 * @apiParam           {String="low,medium,high"} skill_level required|min:4|max:50,
 * @apiParam           {String} from_date required|date_format:Ymd,
 * @apiParam           {String} to_date required|date_format:Ymd,
 *
 * @apiUse             SkillSuccessSingleResponse
 */

/** @var Route $router */
$router->post('users/{user_id}/skills', [
    'as' => 'api_skill_create_skill',
    'uses'  => 'Controller@createSkill',
    'middleware' => [
      'auth:api',
    ],
]);
