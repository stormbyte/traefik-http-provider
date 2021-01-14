<?php

namespace Traefik\Middleware\Config;

class BasicAuth implements MiddlewareInterface{

    protected array $users = [];
    protected string $usersFile;
    protected string $realm;
    protected bool $removeHeader;
    protected string $headerField;

    public function getMiddlewareClassName(): string {
        return \Traefik\Middleware\BasicAuth::class;
    }

    public static function bcrypt(string $password): string {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * @return string|null
     */
    public function getUsersFile(): ?string {
        return $this->usersFile ?? null;
    }

    /**
     * @param string $usersFile
     * @return $this
     */
    public function setUsersFile(string $usersFile): self {
        $this->usersFile = $usersFile;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRealm(): ?string {
        return $this->realm ?? null;
    }

    /**
     * @param string $realm
     * @return $this
     */
    public function setRealm(string $realm): self {
        $this->realm = $realm;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRemoveHeader(): ?bool {
        return $this->removeHeader ?? null;
    }

    /**
     * @param bool $removeHeader
     * @return $this
     */
    public function setRemoveHeader(bool $removeHeader): self {
        $this->removeHeader = $removeHeader;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getHeaderField(): ?string {
        return $this->headerField ?? null;
    }

    /**
     * @param string $headerField
     * @return $this
     */
    public function setHeaderField(string $headerField): self {
        $this->headerField = $headerField;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getUsers(): ?array {
        return $this->users ?? null;
    }

    /**
     * @param string $user
     * @param string $password
     * @return $this
     */
    public function addUserWithPassword(string $user, string $password): self {
        $userStr = $user . ':' . self::bcrypt($password);
        return $this->addUser($userStr);
    }

    /**
     * @param string $userStr
     * @return $this
     */
    public function addUser(string $userStr): self {
        $this->users[] = $userStr;
        return $this;
    }

}
