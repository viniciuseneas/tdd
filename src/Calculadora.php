<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Vox\Treinamento\Tdd;

/**
 * Description of Calculadora
 *
 * @author Tony Morais<tony@voxtecnologia.com.br>
 */
class Calculadora
{
    /**
    * @return float
    */
    public function somar($a, $b) 
    {
        $this->verificaArgumento($a, $b);
        
        return floatval($a + $b);
    }

    /**
    * @return float
    */
    public function subtrair($a, $b) 
    {
        $this->verificaArgumento($a, $b);

        return floatval($a - $b);
    }

    /**
    * @return float
    */
    public function multiplicar($a, $b) 
    {
        $this->verificaArgumento($a, $b);

         return floatval($a * $b);
    }
    
    /**
    * @return float
    */
    public function dividir($a, $b) 
    {
        $this->verificaArgumentoDivisao($a, $b);

        return floatval($a / $b);
    }
    
    /**
    * @return float
    */
    public function raizQuadrada($a) 
    {
        $this->verificaArgumentoRaizQuadrada($a);
        
        return floatval($this->multiplicacao($a, $a));
    }
    
    /**
    * return bool
    */
    public function verificaArgumento($a, $b) 
    {
        if (!(is_numeric($a) && is_numeric($b)) ) {
            throw new \InvalidArgumentException("Esta calculadora só serve para Números");
        }
        
        return true;
    }
    
    public function verificaArgumentoDivisao($a, $b) 
    {
        if (!(is_numeric($a) && is_numeric($b)) ) {
            throw new \InvalidArgumentException("Esta calculadora só serve para Números");
        }
        
        if ((int)$b === 0 ) {
            throw new \InvalidArgumentException("Não se pode dividir um número por zero.");
        }
        return true;
    }
    
    public function verificaArgumentoRaizQuadrada($a) 
    {
        if (!is_numeric($a)){
            throw new \InvalidArgumentException("Esta calculadora só serve para números");
        }
        
        return true;
    }
}
