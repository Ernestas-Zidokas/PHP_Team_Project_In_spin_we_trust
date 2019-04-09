<?php

namespace Core\User;

class Session extends \Core\User\Abstracts\Session {

    public function __construct(\Core\User\Repository $repo) {
        $this->repo = $repo;
        $this->is_logged_in = false;
    }

    public function getUser(): Abstracts\User {
        
    }

    public function isLoggedIn() {
        return $this->is_logged_in;
    }

    /**
     * Bando user'į priloginti per $email ir $password
     * 
     * Jeigu blogas passwordas/email, return'inti
     * LOGIN_ERR_CREDENTIALS
     * 
     * Jeigu useris not active, return'inti
     * LOGIN_ERR_NOT_ACTIVE
     * 
     * Jeigu viskas gerai: 
     * 1# į $_SESSION išsaugoti email ir password
     * 2# nusettinti $this->user
     * 3# return'inti LOGIN_SUCCESS
     * 
     *      * 
     * @param type $email
     * @param type $password
     * @return int
     */
    public function login($email, $password): int {
        $user = $this->repo->load($email);
        if ($user) {
            if ($user->getEmail() == $email && $user->getPassword() == $password) {
                if (!$user->getIsActive()) {
                    return self::LOGIN_ERR_NOT_ACTIVE;
                }
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $this->user = $user;
                
                return self::LOGIN_SUCCESS;
            } else {
                return self::LOGIN_ERR_CREDENTIALS;
            }
        }
    }

    public function loginViaCookie() {
        
    }

    public function logout() {
        
    }

}
