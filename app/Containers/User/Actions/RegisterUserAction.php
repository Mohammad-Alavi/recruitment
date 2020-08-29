<?php

namespace App\Containers\User\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\User\Events\UserRegisteredEvent;
use App\Containers\User\Mails\UserRegisteredMail;
use App\Containers\User\Models\User;
use App\Containers\User\Notifications\UserRegisteredNotification;
use App\Ship\Parents\Actions\Action;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

/**
 * Class RegisterUserAction.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class RegisterUserAction extends Action
{
    public function run(DataTransporter $data): User
    {
        $user = Apiato::call('User@CreateUserByCredentialsTask', [
            $isClient = true,
            $data->email,
            $data->password,
            $data->country_id,
            $data->name,
            $data->national_code,
            $data->foreign_national_code,
            $data->gender,
            $data->birth
        ]);

        Mail::send(new UserRegisteredMail($user));

        Notification::send($user, new UserRegisteredNotification($user));

        App::make(Dispatcher::class)->dispatch(New UserRegisteredEvent($user));

        return $user;
    }
}
