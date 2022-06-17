<?php

class Participante
{
    public $nome;
    public $sobrenome;
    public $telefone;
    public $documento;
    private $dirArquivo = './Arquivos/Participante';

    public function __construct($nomeParticipante, $sobrenomeParticipante, $telefoneParticipante, $documentoParticipante)
    {
        $this->nome = $nomeParticipante;
        $this->sobrenome = $sobrenomeParticipante;
        $this->telefone = $telefoneParticipante;
        $this->documento = $documentoParticipante;

        $this->registraParticipante();
    }

    public function verParticipante()
    {
        $arquivo = $this->dirArquivo."{$this->nome} {$this->sobrenome}.txt";

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

    private function registraParticipante()
    {
        $texto = "Nome Participante: {$this->nome} {$this->sobrenome} \nDocumento: {$this->documento}\n\n";

        $arquivo = $this->dirArquivo."{$this->nome} {$this->sobrenome}.txt";

        $fp = fopen($arquivo, 'a');

        if (file_exists($arquivo)) {
            fwrite($fp, $texto);

            fclose($fp);
        }
    }
}
