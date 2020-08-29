<?php

/**
 * @apiGroup           Users
 * @apiName            registerUser
 * @api                {post} /v1/register Register User (create client)
 * @apiDescription     Register users as (client).
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

$router->post('/register', [
    'as' => 'api_user_register_user',
    'uses' => 'Controller@registerUser',
]);
