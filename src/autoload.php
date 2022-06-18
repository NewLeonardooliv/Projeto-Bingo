<?php

spl_autoload_register(function (string $nomeClasse) {
    $dirArquivo = str_replace('App\\Bingo', 'src', $nomeClasse);
    $dirArquivo = str_replace('\\', '/', "{$dirArquivo}.php");

    if (file_exists($dirArquivo)) {
        require_once $dirArquivo;
    }
});
