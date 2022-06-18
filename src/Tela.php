<?php

require 'Participante.php';

require 'Util.php';

require 'Premio.php';

require 'Cartela.php';

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

        print "1 - Cadastrar Participante \n2 - Configurar Bingo \n3 - Prêmios \n4 - Iniciar Bingo\n5 - Sair\n\n";
        $opcao = Util::lerOpcao();

        if ($opcao == 1) {
            Util::limpaTela();

            return $this->telaCadastroParticipante();
        }
        if ($opcao == 2) {
            Util::limpaTela();

            return $this->telaConfiguracaoBingo();
        }
        if ($opcao == 3) {
            Util::limpaTela();

            return $this->telaPremio();
        }
        if ($opcao == 5) {
            Util::limpaTela();

            exit;
        }

        Util::limpaTela();
        print "\n* Opção não encontrada, tente novamente\n\n";

        return $this->telaInicio();
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

        return $this->telaInicio();
    }

    public function telaConfiguracaoBingo()
    {
        $cartela = new Cartela();
        $participante = new Participante();

        Util::cabecalho('Configuração Bingo');
        print "1 - Configurar Cartela\n2 - Registrar Cartela\n\n0 - Voltar\n";
        $opcao = Util::lerOpcao();

        if ($opcao == 1) {
            Util::limpaTela();
            Util::cabecalho('Configuração Cartela');

            $numerosCartela = $cartela->configuraCatela();

            Util::limpaTela();

            return $this->telaConfiguracaoBingo();
        }
        if ($opcao == 2) {
            Util::cabecalho('Registrar Cartela');

            $participante->escolherParticipante();
        }
        if ($opcao == 0) {
            Util::limpaTela();

            return $this->telaInicio();
        }
    }

    public function telaPremio()
    {
        $premio = new Premio();

        Util::cabecalho('Prêmios');

        print "1- Registrar prêmio\n2- Ver Prêmios\n\n0- Voltar\n";
        $opcao = Util::lerOpcao();

        if ($opcao == 1) {
            Util::limpaTela();

            return $this->telaRegistraPremio();
        }
        if ($opcao == 2) {
            Util::limpaTela();
            $premio->verPremios();

            return $this->telaPremio();
        }
        if ($opcao == 0) {
            Util::limpaTela();

            return $this->telaInicio();
        }
        Util::limpaTela();
        print "\n* Opção não encontrada, tente novamente\n\n";

        return $this->telaPremio();
    }

    public function telaRegistraPremio()
    {
        $premio = new Premio();

        Util::cabecalho('Registrar Prêmios');

        $nomePremio = Util::verificaPremio();
        $valorPremio = Util::verificaValor();

        $premio->registraPremio($nomePremio, $valorPremio);

        Util::limpaTela();

        return $this->telaInicio();
    }
}
