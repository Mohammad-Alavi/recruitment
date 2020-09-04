<?php

/**
 * @apiGroup           EducationalBackground
 * @apiName            createEducationalBackground
 *
 * @api                {POST} /v1/users/:user_id/educational-backgrounds Create Educational Background
 * @apiDescription     Create Educational Background
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated
 *
 * @apiParam           {String} field_of_study required|min:2|max:50
 * @apiParam           {String} graduation_place required|min:2|max:50
 * @apiParam           {String="diploma,associate_degree,bachelor_degree,master_degree,doctorate"} degree required
 * @apiParam           {String} grade_point_average required|numeric|min:0|max:20
 * @apiParam           {image}  [photo]
 *
 * @apiUse             EducationalBackgroundSuccessSingleResponse
 */

/** @var Route $router */
$router->post('users/{user_id}/educational-backgrounds', [
    'as' => 'api_educational_background_create_educational_background',
    'uses' => 'Controller@createEducationalBackground',
    'middleware' => [
        'auth:api',
    ],
]);
