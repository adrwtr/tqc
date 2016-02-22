<?php

namespace Application\Entity;

/**
 * Atividade
 */
class Atividade
{
    /**
     * @var integer
     */
    private $cd_atividade;

    /**
     * @var string
     */
    private $ds_descricao;

    /**
     * @var string
     */
    private $ds_detalhes;

    /**
     * @var string
     */
    private $nr_ordem;

    /**
     * int
     *
     * @var int
     */
    private $cd_processo;


    /**
     * Get id
     *
     * @return integer
     */
    public function getCdAtividade()
    {
        return $this->cd_atividade;
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


    /**
     * Set dsDescricao
     *
     * @param string $dsDescricao
     *
     * @return Processo
     */
    public function setDsDetalhes($ds_detalhes)
    {
        $this->ds_detalhes = $ds_detalhes;

        return $this;
    }

    /**
     * Get dsDescricao
     *
     * @return string
     */
    public function getDsDetalhes()
    {
        return $this->ds_detalhes;
    }

    /**
     * Get dsDescricao
     *
     * @return string
     */
    public function getNrOrdem()
    {
        return $this->nr_ordem;
    }

    /**
     * Retorna o array
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            'cd_atividade' => $this->getCdAtividade(),
            'ds_descricao' => $this->getDsDescricao(),
            'nr_ordem' => $this->getNrOrdem()
        );
    }
}

