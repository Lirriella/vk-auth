<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {
    /* ПОЛЯ */

    private $_id; // id авторизаванного пользователя

    /* ДОПОЛНИТЕЛЬНЫЕ ПОЛЯ */

    // id авторизаванного пользователя
    public function getId() {
        return $this->_id;
    }

    public function setId($value) {
        $this->_id = $value;
    }

    /* ДЕЙСТВИЯ */

    // авторизация пользователя
    public function authenticate() {
        $username = mb_strtolower($this->username, "utf-8");
        $user = User::model()->find('login=:username', array(':username' => $username));

        if ($user === null) { // пользователь не найден
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else if (!$user->validatePassword($this->password)) { // пароли не совпадают
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else { // всё верно
            $this->Id = $user->id;
            $this->setState('username', $username);
            $this->username = $user->login;
            $this->errorCode = self::ERROR_NONE;
        }
        return $this->errorCode == self::ERROR_NONE;
    }

}