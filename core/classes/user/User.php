<?php

namespace Core\User;

Class User extends Abstracts\User {

    public function __construct($data = null) {
        if (!$data) {
            $this->data = [
                'username' => null,
                'email' => null,
                'full_name' => null,
                'age' => null,
                'gender' => null,
                'orientation' => null,
                'photo' => null,
                'account_type' => null,
                'is_active' => null,
                'password' => null
            ];
        } else {
            $this->setData($data);
        }
    }

    public function getAccountType(): int {
        return $this->data['account_type'];
    }

    public function getIsActive(): bool {
        return $this->data['is_active'];
    }

    public function getPassword(): string {
        return $this->data['password'];
    }

    public function setAccountType(int $type) {
        $this->data['account_type'] = $type;
    }

    public function setIsActive(bool $active) {
        $this->data['is_active'] = $active;
    }

    public function setPassword(string $password) {
        $this->data['password'] = $password;
    }

}
