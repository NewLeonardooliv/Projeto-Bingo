<?php

class Participante
{
    private $dirArquivo = './Arquivos/Participante/';

    public function verParticipante($nome, $sobrenome)
    {
        $arquivo = $this->dirArquivo."{$nome} {$sobrenome}.txt";

        if (file_exists($arquivo)) {
            $fp = fopen($arquivo, 'r');

            print fread($fp, filesize($arquivo));

            fclose($fp);
        }
    }

    public function verTodosParticipantes()
    {
        $arquivo = scandir($this->dirArquivo);

        for ($i = 2; $i < count($arquivo); $i++) {
            if (file_exists($arquivo)) {
                $fp = fopen($arquivo, 'r');

                print fread($fp, filesize($arquivo));

                fclose($fp);
            }
            print "\n\n";
        }
    }

    public function registraParticipante($nome, $sobrenome, $telefone, $documento)
    {
        $texto = "Nome Participante: {$nome} {$sobrenome}\nTelefone: {$telefone} \nDocumento: {$documento}\n\n";

        $arquivo = $this->dirArquivo."{$nome} {$sobrenome}.txt";

        $fp = fopen($arquivo, 'a');

        if (file_exists($arquivo)) {
            fwrite($fp, $texto);

            fclose($fp);
        }
    }

    public function escolherParticipante()
    {
        $participantes = $this->verTodosParticipantes();

        $escolha = readline('Informe participante: ');

        $participantes["{$escolha}"];
    }
}
