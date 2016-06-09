<?php if(empty($this->zfcUserIdentity()->getIdAluno()) == true){
        $form = $this->form;
        $form->setAttribute('action',$this->url($this->route,['action'=>$action]));
        $form->prepare();//prepara o formulario

        echo "<nav class='navbar navbar-default'>"
        . "<div class=\"margin20\">";
        echo $this->form()->openTag($form);//abre a tag form com o action
        echo $this->formCollection($form);//monta o corpo do formulario
        echo $this->form()->closeTag();//fecha formulario
        echo "</div></nav>";
    }