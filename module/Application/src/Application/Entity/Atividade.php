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
     * @var integer
     */
    private $nr_ordem;

    /**
     * @var \Application\Entity\Processo
     */
    private $objProcesso;


    /**
     * Set cdAtividade
     *
     * @param integer $cdAtividade
     *
     * @return Atividade
     */
    public function setCdAtividade($cdAtividade)
    {
        $this->cd_atividade = $cdAtividade;

        return $this;
    }

    /**
     * Get cdAtividade
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
     * @return Atividade
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
     * Set dsDetalhes
     *
     * @param string $dsDetalhes
     *
     * @return Atividade
     */
    public function setDsDetalhes($dsDetalhes)
    {
        $this->ds_detalhes = $dsDetalhes;

        return $this;
    }

    /**
     * Get dsDetalhes
     *
     * @return string
     */
    public function getDsDetalhes()
    {
        return $this->ds_detalhes;
    }

    /**
     * Set nrOrdem
     *
     * @param integer $nrOrdem
     *
     * @return Atividade
     */
    public function setNrOrdem($nrOrdem)
    {
        $this->nr_ordem = $nrOrdem;

        return $this;
    }

    /**
     * Get nrOrdem
     *
     * @return integer
     */
    public function getNrOrdem()
    {
        return $this->nr_ordem;
    }


    /**
     * Set objProcesso
     *
     * @param \Application\Entity\Processo $objProcesso
     *
     * @return Atividade
     */
    public function setObjProcesso(
        \Application\Entity\Processo $objProcesso = null
    ) {
        $this->objProcesso = $objProcesso;

        return $this;
    }

    /**
     * Get objProcesso
     *
     * @return \Application\Entity\Processo
     */
    public function getObjProcesso()
    {
        return $this->objProcesso;
    }

    /**
     * To array
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            'cd_atividade' => $this->getCdAtividade(),
            'ds_descricao' => $this->getDsDescricao(),
            'ds_detalhes' => $this->getDsDetalhes(),
            'nr_ordem' => $this->getNrOrdem()
        );
    }

}
