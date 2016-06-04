<?php 
    $idProfissional = $this->zfcUserIdentity()->getIdProfissional()->getId();
?>
<ul class="nav navbar-nav navigation">
    <li class="active"><a href="<?php echo $this->url('home') ?>"><?php echo $this->translate('Home') ?></a></li>
    <li><a href="<?php echo $this->url('profissional',array('action' => 'editar', 'id' => "".$idProfissional."")); ?>"><?php echo $this->translate('Perfil') ?></a></li>
        <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" href="<?php echo $this->url('aluno') ?>">Cadastrar <span class="caret"></a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="#">Treino</a>
                        <ul>
                           <li><a href="<?php echo $this->url('treinoGeral') ?>"><?php echo $this->translate('Treino Geral') ?></a></li>
                           <li><a href="<?php echo $this->url('musculo') ?>"><?php echo $this->translate('Musculo') ?></a></li>
                           <li><a href="<?php echo $this->url('exercicio') ?>"><?php echo $this->translate('Exercício') ?></a></li>
                           <li><a href="<?php echo $this->url('treinoExercicio') ?>"><?php echo $this->translate('Treino x Exercício') ?></a></li>
                           <li><a href="<?php echo $this->url('treino') ?>"><?php echo $this->translate('Treino x Aluno') ?></a></li>
                        </ul>
                    </li>
                    <li>
                       <a href="#">Dieta</a>
                       <ul>                                   
                          <li><a href="<?php echo $this->url('dietaGeral') ?>"><?php echo $this->translate('Dieta Geral') ?></a></li>
                          <li><a href="<?php echo $this->url('alimento') ?>"><?php echo $this->translate('Alimento') ?></a></li>
                          <li><a href="<?php echo $this->url('dietaAlimento') ?>"><?php echo $this->translate('Dieta x Alimento') ?></a></li>
                          <li><a href="<?php echo $this->url('dietaAluno') ?>"><?php echo $this->translate('Dieta x Aluno') ?></a></li>
                       </ul>
                    </li>
                    <li><a href="<?php echo $this->url('medida') ?>"><?php echo $this->translate('Medida') ?></a></li>
                    
                </ul>
        </li>
          <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" href="<?php echo $this->url('aluno') ?>">Consultar <span class="caret"></a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="#">Treino</a>
                        <ul>    
                            <li><a href="<?php echo $this->url('treinoGeral',array('action' => 'listar')) ?>"><?php echo $this->translate('Treino Geral') ?></a></li>
                            <li><a href="<?php echo $this->url('musculo',array('action' => 'listar')) ?>"><?php echo $this->translate('Musculo') ?></a></li>
                            <li><a href="<?php echo $this->url('exercicio',array('action' => 'listar')) ?>"><?php echo $this->translate('Exercício') ?></a></li>
                            <li><a href="<?php echo $this->url('treinoExercicio',array('action' => 'listar')) ?>"><?php echo $this->translate('Treino x Exercício') ?></a></li>
                            <li><a href="<?php echo $this->url('treino',array('action' => 'listar')) ?>"><?php echo $this->translate('Treino x Aluno') ?></a></li>
                        </ul>
                    </li>
                    <li>
                       <a href="#">Dieta</a>
                       <ul>                            
                            <li><a href="<?php echo $this->url('dietaGeral',array('action' => 'listar')) ?>"><?php echo $this->translate('Dieta Geral') ?></a></li>
                            <li><a href="<?php echo $this->url('alimento',array('action' => 'listar')) ?>"><?php echo $this->translate('Alimento') ?></a></li>
                            <li><a href="<?php echo $this->url('dietaAlimento',array('action' => 'listar')) ?>"><?php echo $this->translate('Dieta x Alimento') ?></a></li>
                            <li><a href="<?php echo $this->url('dietaAluno',array('action' => 'listar')) ?>"><?php echo $this->translate('Dieta x Aluno') ?></a></li>                            
                       </ul>
                    </li>
                    <li><a href="<?php echo $this->url('medida',array('action' => 'listar')) ?>"><?php echo $this->translate('Medida') ?></a></li>
                        
                </ul>
        </li>
         <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" href="<?php echo $this->url('aluno') ?>">Relatórios <span class="caret"></a>
                <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo $this->url('massaMuscular') ?>"><?php echo $this->translate('Massa Muscular (IMC)') ?></a></li>
                        <li><a href="<?php echo $this->url('frequencia',array('action' => 'listar')) ?>"><?php echo $this->translate('Frequência nos Treinos') ?></a></li>
                        <li><a href="<?php echo $this->url('medida',array('action' => 'getPeso')) ?>"><?php echo $this->translate('Gordura Queimada') ?></a></li>
                        <li><a href="<?php echo $this->url('medida',array("action" => "getMediaCrescimento")) ?>"><?php echo $this->translate('Média de Crescimento Muscular') ?></a></li>
                        <!-- <li><a href="<?php echo $this->url('medida',array('action' => 'getPeso')) ?>"><?php echo $this->translate('Calorias Queimadas') ?></a></li>-->
                        <li><a href="<?php echo $this->url('atividade',array('action' => 'listar')) ?>"><?php echo $this->translate('Distância Percorrida') ?></a></li>

                </ul>
        </li>
    <li><a href="<?php echo $this->url('zfcuser/logout') ?>"><?php echo $this->translate('Sair') ?></a></li>
</ul>