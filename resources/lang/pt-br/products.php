<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 12/06/17
 * Time: 22:10
 */

return [
    'title' => '{1} Produto|[1,Inf] Produtos',
    'labels' => [
        'lm'            => 'Código',
        'description'   => 'Descrição',
        'active'        => 'Ativo',
        'inactive'      => 'Inativo',
        'import'        => 'Importação',
        'name'          => 'Nome',
        'category'      => 'Categoria',
        'price'         => 'Preço',
        'free_shipping' => 'Entrega grátis'

    ],
    'table' => [
        'lm' => 'Código',
        'status' => 'Status',
        'price' => "Preço"
    ],
    'views' => [
        'edit'      => 'Alterando o produto #:im'
    ],
    'buttons' => [
        'active'    => 'Ativar',
        'inactive'  => 'Inativar',
        'confirm'   => 'Você tem certeza que deseja <strong>:status</strong> o produto <strong>:item</strong>?'
    ],
    'responses' => [
        'edit' => [
            'fail' => 'O produto :item não pode ser atualizado.',
            'success' => 'Produto :item atualizado com sucesso!'
        ],
        'toggle' => [
            'fail' => 'O produto :item não pode ser :status',
            'success' => 'Produto :item foi :status com sucesso!'
        ],
        'import' => '{1} :count produto foi importado com sucesso!|[1,Inf] :count produtos foram importados com sucesso!'
    ]
];