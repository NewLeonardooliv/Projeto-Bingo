<?php

class Premio
{
    private $dirArquivo = './Arquivos/Premio/';

    public function registraPremio($premio, $valor)
    {
        $texto = "Nome prêmio: {$premio}\nValor: {$valor}";

        $arquivo = $this->dirArquivo."{$premio}.txt";

        $fp = fopen($arquivo, 'a');

        if (file_exists($arquivo)) {
            fwrite($fp, $texto);

            fclose($fp);
        }
    }

    public function verPremios()
    {
        $arquivo = scandir($this->dirArquivo);

        $utilidades = new Util();
        $arquivo = $utilidades->verificaArquivo($arquivo);

        if (count($arquivo) > 2) {
            print "Prêmios registrados: \n";
        }
        if (count($arquivo) <= 2) {
            print "* Nenhum prêmio encontrado\n";
        }

        for ($i = 0; $i < count($arquivo); $i++) {
            print "- {$arquivo[$i]}\n";
        }
        print "\n\n";
    }
}
