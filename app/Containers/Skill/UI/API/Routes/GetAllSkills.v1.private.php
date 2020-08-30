<?php

/**
 * @apiGroup           Skill
 * @apiName            getAllSkills
 *
 * @api                {GET} /v1/users/:user_id/skills Get All Skills
 * @apiDescription     Get all Skills of the specified User
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated
 *
 * @apiUse             SkillsSuccessMultipleResponse
 */

/** @var Route $router */
$router->get('users/{user_id}/skills', [
    'as' => 'api_skill_get_all_skills',
    'uses' => 'Controller@getAllSkills',
    'middleware' => [
        'auth:api',
    ],
]);
