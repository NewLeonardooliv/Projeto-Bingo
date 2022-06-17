<?php

class Util
{
    public function lerOpcao()
    {
        return readline("\n\nEscolha uma opção: ");
    }

    public function limpaTela()
    {
        print shell_exec('clear');
    }

    public function cabecalho($texto)
    {
        print "-------{$texto}-------\n\n";
    }

    public function verificaDocumento()
    {
        $documento = readline('Informe o CPF do participante: ');

        $documento = $this->limpaNumero($documento);

        if (strlen($documento) !== 11 || preg_match('/(\d)\1{10}/', $documento)) {
            $this->limpaTela();

            print "* O CPF {$documento} não é valido, informe novamente.\n\n";

            return $this->verificaDocumento();
        }

        for ($i = 9; $i < 11; $i++) {
            for ($j = 0, $k = 0; $k < $i; $k++) {
                $j += $documento[$k] * (($i + 1) - $k);
            }

            $j = ((10 * $j) % 11) % 10;

            if ($documento[$k] != $j) {
                $this->limpaTela();

                print "* O CPF {$documento} não é valido, informe novamente.\n\n";

                return $this->verificaDocumento();
            }
        }

        return $documento;
    }

    public function verificaNome()
    {
        $nome = readline('Informe o nome: ');

        if (preg_match('/[A-Z][a-z]/', $nome)) {
            return $nome;
        }
        $this->limpaTela();
        print "* O nome {$nome} não é valido, informe novamente.\n\n";

        return $this->verificaNome();
    }

    public function verificaSobrenome()
    {
        $sobrenome = readline('Informe o sobrenome: ');

        if (preg_match('/[A-Z][a-z]/', $sobrenome)) {
            return $sobrenome;
        }
        $this->limpaTela();
        print "* O sobrenome {$sobrenome} não é valido, informe novamente.\n\n";

        return $this->verificaSobrenome();
    }

    public function verificaTelefone()
    {
        $telefone = readline('Informe o telefone do participante: ');

        if (preg_match('/[0-9]/', $telefone)) {
            return $telefone;
        }
        $this->limpaTela();
        print "* O telefone {$telefone} não é valido, informe novamente.\n\n";

        return $this->verificaTelefone();
    }

    public function verificaPremio()
    {
        $premio = readline('Informe o nome do prêmio: ');

        if (preg_match('/[A-Z][a-z]/', $premio)) {
            return $premio;
        }
        $this->limpaTela();
        print "* O prêmio {$premio} não é valido, informe novamente.\n\n";

        return $this->verificaPremio();
    }

    public function verificaValor()
    {
        $valor = readline('Informe o valor: ');
        if (preg_match('/[0-9]/', $valor)) {
            return $valor;
        }
        $this->limpaTela();

        print "* O valor {$valor} não é valido, informe novamente.\n\n";

        return $this->verificaValor();
    }

    public function limpaNumero($numero)
    {
        return preg_replace('/[^0-9]/is', '', $numero);
    }
}
