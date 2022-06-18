<?php

namespace App\Bingo;

class Util
{
    public static function lerOpcao()
    {
        return readline("\n\nEscolha uma opção: ");
    }

    public static function limpaTela()
    {
        print shell_exec('clear');
    }

    public static function cabecalho($texto)
    {
        print "-------{$texto}-------\n\n";
    }

    public static function verificaDocumento()
    {
        $documento = readline('Informe o CPF do participante: ');

        $documento = Util::limpaNumero($documento);

        if (strlen($documento) !== 11 || preg_match('/(\d)\1{10}/', $documento)) {
            Util::limpaTela();

            print "* O CPF {$documento} não é valido, informe novamente.\n\n";

            return Util::verificaDocumento();
        }

        for ($i = 9; $i < 11; $i++) {
            for ($j = 0, $k = 0; $k < $i; $k++) {
                $j += $documento[$k] * (($i + 1) - $k);
            }

            $j = ((10 * $j) % 11) % 10;

            if ($documento[$k] != $j) {
                Util::limpaTela();

                print "* O CPF {$documento} não é valido, informe novamente.\n\n";

                return Util::verificaDocumento();
            }
        }

        return $documento;
    }

    public static function verificaNome()
    {
        $nome = readline('Informe o nome: ');

        if (preg_match('/[A-Z][a-z]/', $nome)) {
            return $nome;
        }
        Util::limpaTela();
        print "* O nome {$nome} não é valido, informe novamente.\n\n";

        return Util::verificaNome();
    }

    public static function verificaSobrenome()
    {
        $sobrenome = readline('Informe o sobrenome: ');

        if (preg_match('/[A-Z][a-z]/', $sobrenome)) {
            return $sobrenome;
        }
        Util::limpaTela();
        print "* O sobrenome {$sobrenome} não é valido, informe novamente.\n\n";

        return Util::verificaSobrenome();
    }

    public static function verificaTelefone()
    {
        $telefone = readline('Informe o telefone do participante: ');

        if (preg_match('/[0-9]/', $telefone)) {
            return $telefone;
        }
        Util::limpaTela();
        print "* O telefone {$telefone} não é valido, informe novamente.\n\n";

        return Util::verificaTelefone();
    }

    public static function verificaPremio()
    {
        $premio = readline('Informe o nome do prêmio: ');

        if (preg_match('/[A-Z][a-z]/', $premio)) {
            return $premio;
        }
        Util::limpaTela();
        print "* O prêmio {$premio} não é valido, informe novamente.\n\n";

        return Util::verificaPremio();
    }

    public static function verificaValor()
    {
        $valor = readline('Informe o valor: ');
        if (preg_match('/[0-9]/', $valor)) {
            return $valor;
        }
        Util::limpaTela();

        print "* O valor {$valor} não é valido, informe novamente.\n\n";

        return Util::verificaValor();
    }

    public static function limpaNumero($numero)
    {
        return preg_replace('/[^0-9]/is', '', $numero);
    }

    public static function verificaArquivo($arquivo)
    {
        for ($i = 0; $i < count($arquivo); $i++) {
            if (preg_replace('([^\\s]+(\\.(? i)(txt?))$)', '', $arquivo)) {
                $arquivo += $arquivo;
            }
        }

        return $arquivo;
    }
}
