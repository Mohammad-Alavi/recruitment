<?php

/**
 * @apiGroup           Users
 * @apiName            updateUser
 * @api                {put} /v1/users/:id Update User
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiParam           {String}  [password] min:6|max:40
 * @apiParam           {String}  [name] min:2|max:50
 * @apiParam           {String}  [last_name] min:2|max:50
 * @apiParam           {String}  [birth] date_format:Ymd
 * @apiParam           {String="male,female"}  [gender]
 * @apiParam           {String="done,due,underage,exempt"}  [military_service_status]
 * @apiParam           {String="married,unmarried"}  [marital_status]
 * @apiParam           {String="social_media,website,friend,street_ads,divar"}  [method_of_introduction]
 * @apiParam           {String="none,diploma,associate_degree,bachelor_degree,master_degree,doctorate"}  [last_educational_certificate]
 * @apiParam           {String}  [field_of_study] min:2|max:150
 *
 * @apiUse             UserSuccessSingleResponse
 */

$router->put('users/{id}', [
    'as' => 'api_user_update_user',
    'uses' => 'Controller@updateUser',
    'middleware' => [
        'auth:api',
    ],
]);
