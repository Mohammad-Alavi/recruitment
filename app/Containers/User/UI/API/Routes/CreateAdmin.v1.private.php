<?php

/**
 * @apiGroup           Users
 * @apiName            createAdmin
 * @api                {post} /v1/admins Create Admin type Users
 * @apiDescription     Create non client users for the Dashboard.
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  email
 * @apiParam           {String}  password min:6|max:40
 * @apiParam           {integer}  country_id required|exists:countries,id,
 * @apiParam           {String}  national_code bail|requiredIf:country_id,1 | should be a valid national code. country_id 1 is Iran
 * @apiParam           {String}  foreign_national_code required_unless:country_id,1|size:13
 *
 * @apiUse             UserSuccessSingleResponse
 */

$router->post('admins', [
    'as' => 'api_user_create_admin',
    'uses'  => 'Controller@createAdmin',
    'middleware' => [
        'auth:api',
    ],
]);
