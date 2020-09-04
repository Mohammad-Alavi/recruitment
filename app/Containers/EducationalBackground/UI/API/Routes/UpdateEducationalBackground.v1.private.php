<?php

/**
 * @apiGroup           EducationalBackground
 * @apiName            updateEducationalBackground
 *
 * @api                {PATCH} /v1/users/:user_id/educational-backgrounds/:educational_background_id Update Educational Background
 * @apiDescription     Update Educational Background
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated
 *
 * @apiParam           {String} field_of_study min:2|max:50
 * @apiParam           {String} graduation_place min:2|max:50
 * @apiParam           {String="diploma,associate_degree,bachelor_degree,master_degree,doctorate"} degree
 * @apiParam           {String} grade_point_average numeric|min:0|max:20
 * @apiParam           {image}  [photo]
 *
 * @apiUse             EducationalBackgroundSuccessSingleResponse
 */

/** @var Route $router */
$router->patch('users/{user_id}/educational-backgrounds/{educational_background_id}', [
    'as' => 'api_educational_background_update_educational_background',
    'uses' => 'Controller@updateEducationalBackground',
    'middleware' => [
        'auth:api',
    ],
]);
