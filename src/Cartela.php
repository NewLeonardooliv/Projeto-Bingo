<?php

namespace App\Bingo;

class Cartela
{
    public function registraCartela($participante, $tamanho)
    {
        $texto = 'Números da certela: ';

        $arquivo = Participante::DIR_ARQUIVO_PARTICIPANTE.$participante;

        $fp = fopen($arquivo, 'a+');

        if (file_exists($arquivo)) {
            fwrite($fp, $texto);

            for ($i = 1; $i <= $tamanho; $i++) {
                $numero = readline("Informe o {$i}º valor: ");
                fwrite($fp, $numero);
            }

            fclose($fp);
        }
    }

    public function configuraCatela()
    {
        $numero['disponivel'] = readline('Informe até qual número será disponivel: ');
        $numero['tamanho'] = readline('Informe os tamanho da cartela: ');

        return $numero;
    }
}
