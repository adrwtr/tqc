<?php

namespace Application\Entity;

/**
 * Processo
 */
class Processo
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $ds_nome;

    /**
     * @var string
     */
    private $ds_descricao;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dsNome
     *
     * @param string $dsNome
     *
     * @return Processo
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
     * Set dsDescricao
     *
     * @param string $dsDescricao
     *
     * @return Processo
     */
    public function setDsDescricao($dsDescricao)
    {
        $this->ds_descricao = $dsDescricao;

        return $this;
    }

    /**
     * Get dsDescricao
     *
     * @return string
     */
    public function getDsDescricao()
    {
        return $this->ds_descricao;
    }
}

