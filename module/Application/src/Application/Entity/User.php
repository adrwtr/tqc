<?php

namespace Application\Entity;

/**
 * User
 */
class User
{
    /**
     * @var integer
     */
    private $cd_usuario;

    /**
     * @var string
     */
    private $ds_nome;

    /**
     * @var string
     */
    private $ds_login;

    /**
     * @var string
     */
    private $ds_senha;


    /**
     * Get cdUsuario
     *
     * @return integer
     */
    public function getCdUsuario()
    {
        return $this->cd_usuario;
    }

    /**
     * Set dsNome
     *
     * @param string $dsNome
     *
     * @return User
     */
    public function setDsNome($dsNome)
    {
        $this->ds_nome = $dsNome;

        return $this;
    }

    /**
     * Get dsNome
     *
     * @return string
     */
    public function getDsNome()
    {
        return $this->ds_nome;
    }

    /**
     * Set dsLogin
     *
     * @param string $dsLogin
     *
     * @return User
     */
    public function setDsLogin($dsLogin)
    {
        $this->ds_login = $dsLogin;

        return $this;
    }

    /**
     * Get dsLogin
     *
     * @return string
     */
    public function getDsLogin()
    {
        return $this->ds_login;
    }

    /**
     * Set dsSenha
     *
     * @param string $dsSenha
     *
     * @return User
     */
    public function setDsSenha($dsSenha)
    {
        $this->ds_senha = $dsSenha;

        return $this;
    }

    /**
     * Get dsSenha
     *
     * @return string
     */
    public function getDsSenha()
    {
        return $this->ds_senha;
    }
}
