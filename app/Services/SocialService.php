<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use App\Contracts\Social;
use Laravel\Socialite\Contracts\User as BaseContract;

class SocialService implements Social
{

    /**
     * @param BaseContract $socialUser
     * @param string $network
     * @return string
     * @throws \Exception
     */
    public function loginUser(BaseContract $socialUser, string $network): string
    {
        $user = User::where('email', $socialUser->getEmail())->first();
        if ($user) {
            $user->name = $socialUser->getName();
            $user->avatar = $socialUser->getAvatar();

            if ($user->save()) {
                \Auth::loginUsingId($user->id);
                return route('account');
            }
        } else {
            //TODO: сделать регистрацию
            return route('register');
        }
        throw new \Exception('Ошибка с подключением' . $network);

    }
}
