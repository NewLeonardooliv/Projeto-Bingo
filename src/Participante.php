<?php

namespace App\Bingo;

class Participante
{
    public const DIR_ARQUIVO_PARTICIPANTE = './Arquivos/Participante/';

    public function verParticipante($nome, $sobrenome)
    {
        $arquivo = self::DIR_ARQUIVO_PARTICIPANTE."{$nome} {$sobrenome}.txt";

        if (file_exists($arquivo)) {
            $fp = fopen($arquivo, 'r');

            print fread($fp, filesize($arquivo));

            fclose($fp);
        }
    }

    public function verTodosParticipantes()
    {
        $arquivo = scandir(self::DIR_ARQUIVO_PARTICIPANTE);

        $arquivo = Util::verificaArquivo($arquivo);

        if (count($arquivo) >= 1) {
            print "Participantes registrados: \n";
        }
        if (count($arquivo) == 0) {
            print "* Nenhum participante encontrado\n";
        }
        for ($i = 0; $i < count($arquivo); $i++) {
            print "{$i} - {$arquivo[$i]}\n";
        }
        print "\n\n";

        return $arquivo;
    }

    public function registraParticipante($nome, $sobrenome, $telefone, $documento)
    {
        $texto = "Nome Participante: {$nome} {$sobrenome}\nTelefone: {$telefone} \nDocumento: {$documento}\n\n";

        $arquivo = self::DIR_ARQUIVO_PARTICIPANTE."{$nome} {$sobrenome}.txt";

        $fp = fopen($arquivo, 'a');

        if (file_exists($arquivo)) {
            fwrite($fp, $texto);

            fclose($fp);
        }
    }
}
