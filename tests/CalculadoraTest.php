<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Vox\Treinamento\Tdd\Tests;

/**
 * Description of CalculadoraTest
 *
 * @author Tony Morais<tony@voxtecnologia.com.br>
 */
class CalculadoraTest extends AbstractCalculadoraTestCase
{
    protected $calculadora;
    
    public function setUp() {
        $this->calculadora = new \Vox\Treinamento\Tdd\Calculadora();
    }
    
    public function entradasInvalidas(){
        $stdClass = new \stdClass();
        return array(
            array('abc',    'def'),
            array($stdClass,'def'),
            array('abc',    2),
            array(3,        'def')
        );
    }
    
    /**
     * @dataProvider entradasInvalidas
     * @expectedException \InvalidArgumentException
     */
    public function testVerificaArgumentoComArgumentoInvalido($a, $b) 
    {
        $this->calculadora->verificaArgumento($a, $b);
    }
    
    
    
    public function entradasValidas()
    {
        return array(
            array(1, 1)
        );
    }
    
    /**
     * @dataProvider entradasValidas
     */
    public function testVerificaArgumentoComArgumentoValido($a, $b) 
    {
        $this->assertTrue($this->calculadora->verificaArgumento($a, $b));
    }
    
    public function somarProvider()
    {
        return array(
          array(1, 1, 2),  
        );
    }
    /**
     * @dataProvider somarProvider
     */
    public function testResultadoCorretoSomar($a, $b, $result)
    {
        $this->assertEquals($this->calculadora->somar($a, $b), $result);
    }
    
    public function subtrairProvider()
    {
        return array(
          array(1, 1, 0),  
        );
    }
    
    /**
     * @dataProvider subtrairProvider
     */
    public function testResultadoCorretoSubtrair($a, $b, $result)
    {
        $this->assertEquals($this->calculadora->subtrair($a, $b), $result);
    }
    
    public function multiplicarProvider()
    {
        return array(
          array(2, 3, 6),  
          array(2.2, 3, 6.6),  
          array(22, 0.5, 11) 
        );
    }
    
    /**
     * @dataProvider multiplicarProvider
     */
    public function testResultadoCorretoMultiplicar($a, $b, $result)
    {
        $this->assertEquals($this->calculadora->multiplicar($a, $b), $result);
    }
    
    public function dividirProvider()
    {
        return array(
          array(10, 5, 2),
          array(10.2, 2, 5.1),
          array(4.4, 2.2, 2),  
          array(0x4,2 , 0x2)  
        );
    }
    
    /**
     * @dataProvider dividirProvider
     */
    public function testResultadoCorretoDividir($a, $b, $result)
    {
        $this->assertEquals($this->calculadora->dividir($a, $b), $result);
    }
    
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testDivisaoPorZero() 
    {
        $this->calculadora->dividir(10,0);
    }
}
