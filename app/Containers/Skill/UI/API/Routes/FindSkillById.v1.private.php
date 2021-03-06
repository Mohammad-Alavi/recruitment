<?php

/**
 * @apiGroup           Skill
 * @apiName            findSkillById
 *
 * @api                {GET} /v1/users/:user_id/skills/:skill_id Find Skill By ID
 * @apiDescription     Find Skill by Id
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated
 *
 * @apiUse             SkillSuccessSingleResponse
 */

/** @var Route $router */
$router->get('users/{user_id}/skills/{skill_id}', [
    'as' => 'api_skill_find_skill_by_id',
    'uses' => 'Controller@findSkillById',
    'middleware' => [
        'auth:api',
    ],
]);
