<?php

use Automatec\Tools\Mask;
use Automatec\Tools\Tools;

class ToolsTest extends PHPUnit_Framework_TestCase
{

    public function testMask()
    {
        $this->assertEquals('732.584.423-98', Tools::mask('73258442398', Mask::DOCUMENTO));
        $this->assertEquals('732.584.423-98', Tools::mask('73258442398', Mask::CPF));

        $this->assertEquals('13.779.426/0001-37', Tools::mask('13779426000137', Mask::DOCUMENTO));
        $this->assertEquals('13.779.426/0001-37', Tools::mask('13779426000137', Mask::CNPJ));

        $this->assertEquals('31.030-080', Tools::mask('31030080', Mask::CEP));

        $this->assertEquals('(31)3072-7066', Tools::mask('3130727066', Mask::TELEFONE));
        $this->assertEquals('(31)99503-7066', Tools::mask('31995037066', Mask::TELEFONE));

        $this->assertEquals('a1:b2:c3:d4:e5:f6', Tools::mask('a1b2c3d4e5f6', Mask::MAC));
    }

    public function testUnmask()
    {
        $this->assertEquals('73258442398', Tools::unmask('732.584.423-98'));
        $this->assertEquals('a1b2c3d4e5f6', Tools::unmask('a1:b2:c3:d4:e5:f6'));
    }

    public function testUnaccents()
    {
        $this->assertEquals('Eita metodo bao so!', Tools::unaccents('Êita método bão sô!'));
    }

    public function testIsCnpj()
    {
        $this->assertEquals(true, Tools::isCnpj('13779426000137'));
        $this->assertEquals(true, Tools::isCnpj('13.779.426/0001-37'));

        $this->assertEquals(false, Tools::isCnpj('14944426000137'));
    }

    public function testIsCpf()
    {
        $this->assertEquals(true, Tools::isCpf('73258442398'));
        $this->assertEquals(true, Tools::isCpf('732.584.423-98'));

        $this->assertEquals(false, Tools::isCpf('3234423333'));
    }

    public function testIsEmail()
    {
        $this->assertEquals(true, Tools::isEmail('jansen.felipe@gmail.com'));

        $this->assertEquals(false, Tools::isEmail('j209f9002'));
        $this->assertEquals(false, Tools::isEmail('jansen.felipe@'));
    }

    public function testMoeda()
    {
        $this->assertEquals('R$ 2.000,00', Tools::moeda(2000));
        $this->assertEquals('US$ 3.500,22', Tools::moeda('3500.22', 'US$', 2));
    }

    public function testUnmoeda()
    {
        $this->assertEquals(2000, Tools::unmoeda('R$ 2.000,00'));
        $this->assertEquals(3500.22, Tools::unmoeda('US$ 3.500,22', 'US$'));
    }

    public function testIsMac()
    {
        $this->assertEquals(true, Tools::isMac('a1:b2:c3:d4:e5:f6'));
        $this->assertEquals(true, Tools::isMac('a1b2c3d4e5f6'));
        $this->assertEquals(true, Tools::isMac('a1-b2-c3-d4-e5-f6'));
        $this->assertEquals(false, Tools::isMac('a1b2c3d4e5f6g7'));
    }

    public function testIsIp()
    {
        $this->assertEquals(false, Tools::isIp('127.0.0'));
        $this->assertEquals(true, Tools::isIp('127.0.0.1'));
        $this->assertEquals(true, Tools::isIp('192.168.0.255'));
    }

    public function testNormatizeName()
    {
        $escape = 'de,do,da,e,dos';
        $this->assertEquals('João da Silva', Tools::normatizeName('joão da silva', $escape));
        $this->assertEquals('José dos Santos e Silva', Tools::normatizeName('JosÉ dos SANTOS E silva', $escape));
        $this->assertEquals('José de Oliveira e Silva', Tools::normatizeName('JOSÉ DE OLIVEIRA E SILVA', $escape));
        $this->assertEquals('Êmily', Tools::normatizeName('êmily', $escape));
    }

    public function testformatDate()
    {
        $this->assertEquals('31/05/2018', Tools::formatDate('2018-05-31', 'Y-m-d', 'd/m/Y'));
        $this->assertEquals('31/05/2018', Tools::formatDate('2018-05-31 12:20:00', 'Y-m-d H:i:s', 'd/m/Y'));
    }

}