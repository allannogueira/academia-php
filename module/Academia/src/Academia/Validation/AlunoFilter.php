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
        $nome->getFilterChain()
          ->attachByName('StripTags')
          ->attachByName('StringTrim');
        $this->add($nome);
        
        $sobrenome = new Input('sobrenomeAluno');
        $sobrenome->setRequired(true);
        $sobrenome->getFilterChain()
          ->attachByName('StripTags');
        $this->add($sobrenome);
        
        $telAluno = new Input('telefoneAluno');
        $telAluno->getFilterChain()
          ->attachByName('StripTags');
        $this->add($telAluno);
        
        $celularAluno = new Input('celularAluno');
        $celularAluno->getFilterChain()
          ->attachByName('StripTags');
        $this->add($celularAluno);
        
        $dataNasc = new Input('dataNasc');
        $dataNasc->getFilterChain()
          ->attachByName('StripTags');
        $this->add($dataNasc);
        
        $cpfAluno = new Input('cpfAluno');
        $cpfAluno->setRequired(true);
        $cpfAluno->getFilterChain()
          ->attachByName('StripTags');
        $this->add($cpfAluno);
        
        $rgAluno = new Input('rgAluno');
        $rgAluno->setRequired(true);
        $rgAluno->getFilterChain()
          ->attachByName('StripTags');
        $this->add($rgAluno);
        
        
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
