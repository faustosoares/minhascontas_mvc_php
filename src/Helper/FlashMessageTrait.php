<?php

namespace FBMS\Contas\Helper;

trait FlashMessageTrait
{
    public function defineMensagem(string $tipo, string $mensagem): void
    {
        $_SESSION['mensagem'] = $mensagem;
        $_SESSION['tipo_mensagem'] = $tipo;
    }

    public function defineMensagemValidacao(string $tipo, string $mensagem): void
    {
        $_SESSION['mensagemValidacao'] = $mensagem;
        $_SESSION['tipo_mensagemValidacao'] = $tipo;
    }
}
