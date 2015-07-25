<?php
require_once __DIR__ . '/../vendor/autoload.php';

$di = new Pimple\Container();

$di['db'] =  new \PDO("sqlite:" . __DIR__ . "/../data/dp");

$di['categorias'] =  function () use ($di) {
   $stmt = $di['db']->query("select * from categoria");
   return $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
    
};

$di['request'] = new \TDD\Request\Request();


$inArray = new \TDD\Validator\InArray('categoria');
$inArray->setData(array_keys($di['categorias']));

$stringLength = new \TDD\Validator\StringLength('descricao');
$stringLength->setMax(200);

$currency = new \TDD\Validator\Currency('valor');

$di['validator'] = new \TDD\Validator\Validator($di['request']);

$validator = $di['validator'];


$validator->add($inArray)
    ->add($stringLength)
    ->add($currency);

$di['contato-validator'] = $validator;

$di['form'] = new \TDD\Form\Form('contato', $di['contato-validator']);

/** @var $form \TDD\Form\Form */
$form = $di['form'];
$form->setAttribute('method', 'post');

$nome = new \TDD\Form\InputText('nome');
$valor = new \TDD\Form\InputText('valor');
$descricao = new \TDD\Form\InputText('descricao');
$categoria = new \TDD\Form\Select('categoria');
$categoria->setValueOptions($di['categorias']);

$form->addField($nome)
    ->addField($valor)
    ->addField($descricao)
    ->addField($categoria);

/** @var $request \DP\Request\Request*/
$request = $di['request'];

$messages = ['success' => 'The data has been submitted successfully'];

if($request->isPost()) {
    $post = $request->getPost();
    $form->populate($post);
    
    if(!$form->isValid()) {
        $messages = $form->getValidator()->getMessages();
    }    
}

if($request->isGet()) {
    $get = $request->getGet();
}

$di['form.helper'] = new \TDD\Helper\FormHelper;
$di['input.helper'] = new \TDD\Helper\InputHelper;
$di['select.helper'] = new \TDD\Helper\SelectHelper;

require_once __DIR__ . '/../layout/header.phtml';
require_once __DIR__ . '/../view/contato.phtml';
require_once __DIR__ . '/../layout/footer.phtml';