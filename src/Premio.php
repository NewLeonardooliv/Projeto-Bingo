<?php

namespace App\Bingo;

class Premio
{
    private const DIR_ARQUIVO_PREMIO = './Arquivos/Premio/';

    public function registraPremio($premio, $valor)
    {
        $texto = "Nome prêmio: {$premio}\nValor: {$valor}";

        $arquivo = self::DIR_ARQUIVO_PREMIO."{$premio}.txt";

        $fp = fopen($arquivo, 'a');

        if (file_exists($arquivo)) {
            fwrite($fp, $texto);

            fclose($fp);
        }
    }

    public function verPremios()
    {
        $arquivo = scandir(self::DIR_ARQUIVO_PREMIO);

        $arquivo = Util::verificaArquivo($arquivo);

        if (count($arquivo) >= 1) {
            print "Prêmios registrados: \n";
        }
        if (count($arquivo) == 0) {
            print "* Nenhum prêmio encontrado\n";
        }

        for ($i = 0; $i < count($arquivo); $i++) {
            print "- {$arquivo[$i]}\n";
        }
        print "\n\n";
    }
}
