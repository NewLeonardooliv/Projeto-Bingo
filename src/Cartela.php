<?php

class Cartela
{
    private $dirArquivo = './Arquivos/Participante';

    public function registraCartela($numero, $participante)
    {
        $texto = 'Números da certela: ';

        $arquivo = $this->dirArquivo."{$participante}.txt";

        $fp = fopen($arquivo, 'a');

        if (file_exists($arquivo)) {
            fwrite($fp, $texto);

            for ($i = 0; $i < count($numero); $i++) {
                fwrite($fp, $numero);
            }

            fclose($fp);
        }
    }
}
