<?php

namespace Core\User;

class Session extends \Core\User\Abstracts\Session {

    public function __construct(\Core\User\Repository $repo) {
        $this->repo = $repo;
        $this->is_logged_in = false;
        session_start();
    }

    public function getUser(): Abstracts\User {
        
    }

    public function isLoggedIn() {
        return $this->is_logged_in;
    }

    public function login($email, $password): int {
        $user = $this->repo->load($email);

        if ($user) {
            if ($user->getPassword() === $password) {
                if ($user->getIsActive()) {
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $this->user = $user;
                    $this->isLoggedIn() = true;
                    
                    return self::LOGIN_SUCCESS;
                }

                return self::LOGIN_ERR_NOT_ACTIVE;
            }
        }

        return self::LOGIN_ERR_CREDENTIALS;
    }

    public function loginViaCookie() {
        if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
            return $this->login($_SESSION['email'], $_SESSION['password']);
        }

        return self::LOGIN_ERR_CREDENTIALS;
    }

    /**
     * Išvalyti $_SESSION
     * užbaigti sesiją (Google)
     * ištrinti sesijos cookie (Google)
     * nustatyti is_logged_in
     * nustatyti $this->user
     */
    public function logout() {
        $_SESSION = [];
        setcookie(session_name(), "", time() - 3600);
        session_destroy();
        $this->isLoggedIn() = false;
        $this->user = null;
    }

}
