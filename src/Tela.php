<?php

namespace App\Bingo;

class Tela
{
    public function __construct()
    {
        Util::limpaTela();

        $this->telaInicio();
    }

    public function telaInicio()
    {
        Util::cabecalho('Menu Inicial');

        print "1 - Cadastrar Participante \n2 - Configurações \n3 - Prêmios \n4 - Iniciar Bingo\n\n0 - Sair\n\n";
        $opcao = Util::lerOpcao();

        if ($opcao == 1) {
            Util::limpaTela();

            $this->telaCadastroParticipante();
        }
        if ($opcao == 2) {
            Util::limpaTela();

            $this->telaConfiguracaoBingo();
        }
        if ($opcao == 3) {
            Util::limpaTela();

            $this->telaPremio();
        }
        if ($opcao == 0) {
            Util::limpaTela();

            exit;
        }

        Util::limpaTela();
        print "\n* Opção não encontrada, tente novamente\n\n";

        $this->telaInicio();
    }

    public function telaCadastroParticipante()
    {
        $participante = new Participante();
        Util::cabecalho('Cadastro Participante');

        $nome = Util::verificaNome();
        $sobrenome = Util::verificaSobrenome();
        $telefone = Util::verificaTelefone();
        $documento = Util::verificaDocumento();

        $participante->registraParticipante($nome, $sobrenome, $telefone, $documento);
        Util::limpaTela();

        $this->telaInicio();
    }

    public function telaConfiguracaoBingo($arrCartela = false)
    {
        $cartela = new Cartela();
        $participante = new Participante();

        Util::cabecalho('Configuração Bingo');
        print "1 - Configurar Cartela\n2 - Registrar Cartela\n\n0 - Voltar\n";
        $opcao = Util::lerOpcao();

        if ($opcao == 1) {
            Util::limpaTela();
            Util::cabecalho('Configuração Cartela');

            $arrCartela = $cartela->configuraCatela();

            Util::limpaTela();

            $this->telaConfiguracaoBingo($arrCartela);
        }
        if ($opcao == 2) {
            if ($arrCartela) {
                Util::limpaTela();
                Util::cabecalho('Registrar Cartela');

                $this->telaRegistrarCartela($arrCartela);
            }
            Util::limpaTela();
            print "\n* Faça a configuração da cartela primeiro\n\n";

            $this->telaConfiguracaoBingo();
        }
        if ($opcao == 0) {
            Util::limpaTela();

            $this->telaInicio();
        }
        Util::limpaTela();
        print "\n* Opção não encontrada, tente novamente\n\n";

        $this->telaConfiguracaoBingo();
    }

    public function telaRegistrarCartela($tamanhoCartela)
    {
        $participantes = new Participante();
        $cartela = new Cartela();
        $todosParticipantes = $participantes->verTodosParticipantes();

        $opcao = Util::lerOpcao();

        $cartela->registraCartela($todosParticipantes[$opcao], $tamanhoCartela['tamanho']);

        $this->telaConfiguracaoBingo($tamanhoCartela);
    }

    public function telaPremio()
    {
        $premio = new Premio();

        Util::cabecalho('Prêmios');

        print "1- Registrar prêmio\n2- Ver Prêmios\n\n0- Voltar\n";
        $opcao = Util::lerOpcao();

        if ($opcao == 1) {
            Util::limpaTela();

            $this->telaRegistraPremio();
        }
        if ($opcao == 2) {
            Util::limpaTela();
            $premio->verPremios();

            $this->telaPremio();
        }
        if ($opcao == 0) {
            Util::limpaTela();

            $this->telaInicio();
        }
        Util::limpaTela();
        print "\n* Opção não encontrada, tente novamente\n\n";

        $this->telaPremio();
    }

    public function telaRegistraPremio()
    {
        $premio = new Premio();

        Util::cabecalho('Registrar Prêmios');

        $nomePremio = Util::verificaPremio();
        $valorPremio = Util::verificaValor();

        $premio->registraPremio($nomePremio, $valorPremio);

        Util::limpaTela();

        $this->telaInicio();
    }
}
