<?phpnamespace Application\Form;use Zend\Form\Form;use Zend\Form\Element\Text;use Zend\Form\Element\Button;class Login extends Form{	public function __construct($name = null){		parent::__construct('Cadastrar Academia');		$this->setAttribute('method','POST');		//$this->setAttribute('class','form-horizontal');		$this->setAttribute("class","form-signin");				$this->add([			'name' => 'id',			'type' => 'Hidden'		]);		$this->add([			'name' => 'nome',			'type' => 'Text',			'options' => [                 'label' => 'Nome',             ],			 'attributes' => [				'class' => 'form-control',			]			 		]);					                $this->add([			'name' => 'senha',			'type' => 'password',			'options' => [                 'label' => 'Senha',             ],			 'attributes' => [				'class' => 'form-control',			]		]);		                                		$this->add([			'name' => 'login',			'type' => 'Submit',			'options' => [				'label' => 'Login',			],			'attributes' => [				'class' => 'btn btn-primary',			]					]);				}}?>