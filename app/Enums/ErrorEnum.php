<?php

namespace App\Enums;

class ErrorEnum
{
    /**
     * @var array
     */
    public const OPT001 = [
        'code' => 1,
        'message' => 'Erro buscar empresa',
    ];
    
    /**
     * @var array
     */
    public const OPT002 = [
        'code' => 2,
        'message' => 'Erro salvar empresa',
    ];

    /**
     * @var array
     */
    public const OPT003 = [
        'code' => 3,
        'message' => 'Erro atualizar empresa',
    ];

    /**
     * @var array
     */
    public const OPT004 = [
        'code' => 4,
        'message' => 'Erro deletar empresa',
    ];
}