<?php

namespace Academia\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Academia
 *
 * @ORM\Table(name="bug_report", indexes={@ORM\Index(name="id_aluno", columns={"id_aluno"})})
 * @ORM\Entity
 */
class BugReport extends \Base\Entity\AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_bug_report", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBugReport;

    /**
     * @var string
     *
     * @ORM\Column(name="servico_erro", type="string", length=50)
     */
    private $servicoErro;

    /**
     * @var string
     *
     * @ORM\Column(name="desc_erro", type="string", length=50)
     */
    private $descErro;

    /**
     * @var string
     *
     * @ORM\Column(name="id_aluno", type="integer", length=11)
     */
    private $idAluno;
    
    function getIdBugReport() {
        return $this->idBugReport;
    }

    function getServicoErro() {
        return $this->servicoErro;
    }

    function getDescErro() {
        return $this->descErro;
    }

    function getIdAluno() {
        return $this->idAluno;
    }

    function setIdBugReport($idBugReport) {
        $this->idBugReport = $idBugReport;
    }

    function setServicoErro($servicoErro) {
        $this->servicoErro = $servicoErro;
    }

    function setDescErro($descErro) {
        $this->descErro = $descErro;
    }

    function setIdAluno($idAluno) {
        $this->idAluno = $idAluno;
    }


}
