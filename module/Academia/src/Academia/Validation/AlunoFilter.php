<?php
namespace Academia\Validation;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Filter\File\RenameUpload;
use Zend\InputFilter\FileInput;
use Zend\Validator\File\MimeType;
use Zend\Validator\File\Size;
/**
 * Description of AlunoFilter
 *
 * @author Allan
 */
class AlunoFilter extends InputFilter{
    public function __construct($em){
        $nome = new Input('nomeAluno');
        $nome->setRequired(true);
        /*
             ->getFilterChain()->attach(new StringTrim())
             ->attach(new StripTags());
        $nome->getValidatorChain()->attach(new NotEmpty());*/
        $this->add($nome);
            
//        $cpf = new Input('cpfAluno');
//      //  echo var_dump($this->getRequest());
//        $validadorCpf = new Cpf(['valid_if_empty' => true]);
//        $cpf->getFilterChain()
//                ->attach($validadorCpf);//pega classe que foi criada manualmente
//        $cpf->setErrorMessage("Cpf inválido!");
//        
//        //echo var_dump($cpf);
//        $this->add($cpf);
        
        $arquivo = new FileInput('arquivo');
        $arquivo->setRequired(false);
        //quando enviar o arquivo, renomeia o arquivo e usa a propria extencao do arquivo
        $arquivo->getFilterChain()->attach(new RenameUpload(array(
            'target' => './public/img/foto_perfil_',
            'use_upload_extension' => true,
            'randomize' => true,
        )));
        
        $arquivo->getValidatorChain()->attach(new Size(array(
            'max' => substr(ini_get('upload_max_filesize'),0,-1).'MB'
        )));
        $arquivo->getValidatorChain()
                ->attach(new MimeType(array(
                    'image/gif',
                    'image/jpg',
                    'image/jpeg',
                    'image/png',
                    'enableHeaderCheck' => true 
                )));
        $this->add($arquivo);
    }
}
