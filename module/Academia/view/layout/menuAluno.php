<?php 

$idAluno = $this->zfcUserIdentity()->getIdAluno()->getIdAluno();

?>
<ul class="nav navbar-nav navigation">
    <li class="active"><a href="<?php echo $this->url('aluno',array('action' => 'getPerfil', 'id' => "".$idAluno."")) ?>"><?php echo $this->translate('Home') ?></a></li>
          <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" href="<?php echo $this->url('aluno') ?>">Consultar <span class="caret"></a>
                <ul class="dropdown-menu" role="menu">                       
                        <li><a href="<?php echo $this->url('treino',array('action' => 'getTreinoAluno', 'id' => "".$idAluno."")) ?>"><?php echo $this->translate('Meus Treinos') ?></a></li>
                        <li><a href="<?php echo $this->url('dietaAluno',array('action' => 'getDietaAluno', 'id' => "".$idAluno."")) ?>"><?php echo $this->translate('Minhas Dietas') ?></a></li>
                        <li><a href="<?php echo $this->url('medida',array('action' => 'listar')) ?>"><?php echo $this->translate('Minhas Medidas') ?></a></li>
                        
                       
                </ul>
        </li>
         <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" href="<?php echo $this->url('aluno') ?>">Relatórios <span class="caret"></a>
                <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo $this->url('massaMuscular') ?>"><?php echo $this->translate('Massa Muscular (IMC)') ?></a></li>
                        <li><a href="<?php echo $this->url('frequencia',array('action' => 'listar')) ?>"><?php echo $this->translate('Frequência nos Treinos') ?></a></li>
                        <li><a href="<?php echo $this->url('medida',array('action' => 'getPeso')) ?>"><?php echo $this->translate('Gordura Queimada') ?></a></li>
                        <li><a href="<?php echo $this->url('medida',array("action" => "getMediaCrescimento")) ?>"><?php echo $this->translate('Média de Crescimento Muscular') ?></a></li>
                        <li><a href="<?php echo $this->url('medida',array('action' => 'getPeso')) ?>"><?php echo $this->translate('Calorias Queimadas') ?></a></li>
                        <li><a href="<?php echo $this->url('atividade',array('action' => 'listar', 'id' => "".$idAluno."")) ?>"><?php echo $this->translate('Distância Percorrida') ?></a></li>

                </ul>
        </li>
    <li><a href="<?php  echo $this->url('login',array('action' => 'logout')) ?>"><?php echo $this->translate('Sair') ?></a></li>
</ul>