<?php

class FormTest extends \PHPUnit_Extensions_Selenium2TestCase
{
    public function setUp()
    {
        $this->setBrowser('chrome');
        $this->setBrowserUrl('http://localhost:8080');
    }
    
    public function testVerificaSeOsCamposEstaoVazios()
    {        
        $this->url('/');
        $this->assertEquals('', $this->byName('nome')->value());
        $this->assertEquals('', $this->byName('valor')->value());
        $this->assertEquals('', $this->byName('descricao')->value());
    }
    
    public function testVerificaTituloDaPagina()
    {
        $this->url('/');
        $this->assertEquals('Code Education - Design Pattern', $this->byClassName('muted')->text());
    }
    
    public function testVerificaTituloDoFormulario()
    {
        $this->url('/');
        $this->assertEquals('Formulario de Exemplo', $this->byClassName('text-left')->text());
    }
    
    public function testVerificaSeTemBotaoDeSubmit()
    {
        $this->url('/');
        $this->assertNotNull($this->byName('enviar'));
    }
    
    public function testVerificaSeSubmeteSeOsDadosForemCorretos()
    {
        $this->url('/');
        $this->byName('nome')->value('Refrigerador');
        $this->byName('valor')->value('1000,00');
        $this->byName('descricao')->value('Brastemp');
        $this->byName('categoria')->value(5);
        $this->byName('contato')->submit();
        
        $this->assertContains('success: The data has been submitted successfully', $this->source());
    }
    
    public function testVerificaSeOsDadosForemIncorretosMensagensSaoMostradas()
    {
        $this->url('/');
        $this->byName('nome')->value('Refrigerador');
        $this->byName('valor')->value('1000.00');
        $descricao = <<<'EOD'
O vídeo fornece uma maneira poderosa de ajudá-lo a provar seu argumento.
Ao clicar em Vídeo Online, você pode colar o código de inserção do vídeo que deseja adicionar.
Você também pode digitar uma palavra-chave para pesquisar online o vídeo mais adequado ao seu documento.
Para dar ao documento uma aparência profissional, o Word fornece designs de cabeçalho, rodapé, folha de rosto e caixa de texto que se complementam entre si.
Por exemplo, você pode adicionar uma folha de rosto, um cabeçalho e uma barra lateral correspondentes.
Clique em Inserir e escolha os elementos desejados nas diferentes galerias.
Temas e estilos também ajudam a manter seu documento coordenado.
Quando você clica em Design e escolhe um novo tema, as imagens, gráficos e elementos gráficos SmartArt são alterados para corresponder ao novo tema.
Quando você aplica estilos, os títulos são alterados para coincidir com o novo tema.
Economize tempo no Word com novos botões que são mostrados no local em que você precisa deles.
Para alterar a maneir
EOD;
        $this->byName('descricao')->value($descricao);        
        $this->byName('contato')->submit();
        
        $this->assertContains('descricao: The length value must be between 0 and 200', $this->source());
        $this->assertContains('valor: The value 1000.00 is not valid', $this->source());
    }
}
