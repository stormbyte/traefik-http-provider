<?php

namespace Traefik\Middleware\Config;

class DigestAuth implements MiddlewareInterface{

    protected array $users;
    protected string $usersFile;
    protected string $realm;
    protected bool $removeHeader;
    protected string $headerField;

    /**
     * @return string
     */
    public function getMiddlewareClassName(): string {
        return \Traefik\Middleware\DigestAuth::class;
    }

    public static function htdigest(string $username, string $realm, string $password): string {
        return md5(implode(':', [$username, $realm, $password]));
    }

    /**
     * @return array|null
     */
    public function getUsers(): ?array {
        return $this->users ?? null;
    }

    /**
     * @param string $user
     * @return $this
     */
    public function addUser(string $user): self {
        $this->users = $this->users ?? [];
        $this->users[] = $user;
        return $this;
    }

    /**
     * @param string $username
     * @param string $password
     * @param string|null $realm
     * @return $this
     */
    public function addUserWithPassword(string $username, string $password, ?string $realm = null): self {

        $user = $username . ':' . $password . ':' . self::htdigest($username, ($realm ?? $this->getRealm()), $password);
        return $this->addUser($user);
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
}
