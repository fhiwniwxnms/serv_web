<?php

namespace MyProject\Models\Users;
use MyProject\Models\ActiveRecordEntity;

class User extends ActiveRecordEntity
{
    protected $nickname;
    protected $email;
    protected $passwordHash;
    protected $authToken;
    protected $createdAt;

    public static function getTableName(): string {
        return 'users';
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }
}