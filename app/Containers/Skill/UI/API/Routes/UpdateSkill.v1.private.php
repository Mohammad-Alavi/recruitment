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
 * @apiParam           {String} name min:4|max:50,
 * @apiParam           {String="low,medium,high"} skill_level min:4|max:50,
 * @apiParam           {String} from_date date_format:Ymd,
 * @apiParam           {String} to_date date_format:Ymd,
 *
 * @apiUse             SkillSuccessSingleResponse
 */

/** @var Route $router */
$router->patch('users/{user_id}/skills/{skill_id}', [
    'as' => 'api_skill_update_skill',
    'uses' => 'Controller@updateSkill',
    'middleware' => [
        'auth:api',
    ],
]);
