<?php

require 'Participante.php';

require 'Util.php';

require 'Premio.php';

require 'Cartela.php';

class Tela
{
    public function __construct()
    {
        $utilidades = new Util();
        $utilidades->limpaTela();

        $this->telaInicio();
    }

    public function telaInicio()
    {
        $utilidades = new Util();
        $utilidades->cabecalho('Menu Inicial');

        print "1 - Cadastrar Participante \n2 - Configurar Bingo \n3 - Prêmios \n4 - Iniciar Bingo\n5 - Sair\n\n";
        $opcao = $utilidades->lerOpcao();

        if ($opcao == 1) {
            $utilidades->limpaTela();

            return $this->telaCadastroParticipante();
        }
        if ($opcao == 2) {
            $utilidades->limpaTela();

            return $this->telaConfiguracaoBingo();
        }
        if ($opcao == 3) {
            $utilidades->limpaTela();

            return $this->telaPremio();
        }
        if ($opcao == 5) {
            $utilidades->limpaTela();

            exit;
        }

        $utilidades->limpaTela();
        print "\n* Opção não encontrada, tente novamente\n\n";

        return $this->telaInicio();
    }

    public function telaCadastroParticipante()
    {
        $utilidades = new Util();
        $participante = new Participante();
        $utilidades->cabecalho('Cadastro Participante');

        $nome = $utilidades->verificaNome();
        $sobrenome = $utilidades->verificaSobrenome();
        $telefone = $utilidades->verificaTelefone();
        $documento = $utilidades->verificaDocumento();

        $participante->registraParticipante($nome, $sobrenome, $telefone, $documento);
        $utilidades->limpaTela();

        return $this->telaInicio();
    }

    public function telaConfiguracaoBingo()
    {
        $cartela = new Cartela();
        $utilidades = new Util();
        $participante = new Participante();

        $utilidades->cabecalho('Configuração Bingo');
        print "1 - Configurar Cartela\n2 - Registrar Cartela\n\n0 - Voltar\n";
        $opcao = $utilidades->lerOpcao();

        if ($opcao == 1) {
            $utilidades->limpaTela();
            $utilidades->cabecalho('Configuração Cartela');

            $numerosCartela = $cartela->configuraCatela();

            $utilidades->limpaTela();

            return $this->telaConfiguracaoBingo();
        }
        if ($opcao == 2) {
            $utilidades->cabecalho('Registrar Cartela');

            $participante->escolherParticipante();
        }
        if ($opcao == 0) {
            $utilidades->limpaTela();

            return $this->telaInicio();
        }
    }

    public function telaPremio()
    {
        $premio = new Premio();
        $utilidades = new Util();

        $utilidades->cabecalho('Prêmios');

        print "1- Registrar prêmio\n2- Ver Prêmios\n\n0- Voltar\n";
        $opcao = $utilidades->lerOpcao();

        if ($opcao == 1) {
            $utilidades->limpaTela();

            return $this->telaRegistraPremio();
        }
        if ($opcao == 2) {
            $utilidades->limpaTela();
            $premio->verPremios();

            return $this->telaPremio();
        }
        if ($opcao == 0) {
            $utilidades->limpaTela();

            return $this->telaInicio();
        }
        $utilidades->limpaTela();
        print "\n* Opção não encontrada, tente novamente\n\n";

        return $this->telaPremio();
    }

    public function telaRegistraPremio()
    {
        $premio = new Premio();
        $utilidades = new Util();

        $utilidades->cabecalho('Registrar Prêmios');

        $nomePremio = $utilidades->verificaPremio();
        $valorPremio = $utilidades->verificaValor();

        $premio->registraPremio($nomePremio, $valorPremio);

        $utilidades->limpaTela();

        return $this->telaInicio();
    }
}
