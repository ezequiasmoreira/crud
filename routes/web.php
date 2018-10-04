<?php


Route::get('/', function () {
    return view('welcome');
});
Route::group(["prefix" => "relatorio","namespace" => "Relatorio"], function () {
    Route::post("/processar", "RelatorioVendaController@relatorioProduto");
    Route::get("/vendas", "RelatorioVendaController@novoView");
});
Route::group(["prefix" => "produto"], function () {
    Route::get("/{id}/editar", "ProdutoController@editarView");
    Route::get("/{id}/excluir", "ProdutoController@excluir");
    Route::get("/", "ProdutoController@index");

    Route::get("/novo", "ProdutoController@create");
    Route::post("/salvar", "ProdutoController@salvar");
    Route::post("/atualizar", "ProdutoController@atualizar");
});
Route::group(["prefix" => "entidade"], function () {
    Route::get("/{id}/editar", "EntidadeController@editarView");
    Route::get("/{id}/excluir", "EntidadeController@excluir");
    Route::get("/", "EntidadeController@index");
    Route::get("/novo", "EntidadeController@novoView");
    Route::post("/salvar", "EntidadeController@salvar");
    Route::post("/atualizar", "EntidadeController@atualizar");
});
Route::group(["prefix" => "movimentacao"], function () {
    Route::get("/{id}/editar", "MovimentacaoController@editarView");
    Route::get("/{id}/excluir", "MovimentacaoController@excluir");
    Route::get("/", "MovimentacaoController@index");
    Route::get("/novo", "MovimentacaoController@novoView");
    Route::post("/salvar", "MovimentacaoController@salvar");
    Route::post("/atualizar", "MovimentacaoController@atualizar");
});
Route::group(["prefix" => "empresa"], function () {
    Route::get("/{id}/editar", "EmpresaController@editarView");
    Route::get("/{id}/excluir", "EmpresaController@excluir");
    Route::get("/", "EmpresaController@index");
    Route::get("/novo", "EmpresaController@novoView");
    Route::post("/salvar", "EmpresaController@salvar");
    Route::post("/atualizar", "EmpresaController@atualizar");
});
Route::group(["prefix" => "pais"], function () {
    Route::get("/{id}/editar", "PaisController@editarView");
    Route::get("/{id}/excluir", "PaisController@excluir");
    Route::get("/", "PaisController@index");
    Route::get("/novo", "PaisController@novoView");
    Route::post("/salvar", "PaisController@salvar");
    Route::post("/atualizar", "PaisController@atualizar");
});
Route::group(["prefix" => "cidade"], function () {
    Route::get("/{id}/editar", "CidadeController@editarView");
    Route::get("/{id}/excluir", "CidadeController@excluir");
    Route::get("/", "CidadeController@index");
    Route::get("/novo", "CidadeController@novoView");
    Route::post("/salvar", "CidadeController@salvar");
    Route::post("/atualizar", "CidadeController@atualizar");
});
Route::group(["prefix" => "endereco","namespace" => "localizacao"], function () {
    Route::get("/{id}/editar", "EnderecoController@editarView");
    Route::get("/{id}/excluir", "EnderecoController@excluir");
    Route::get("/", "EnderecoController@index");
    Route::get("/novo", "EnderecoController@novoView");
    Route::post("/salvar", "EnderecoController@salvar");
    Route::post("/atualizar", "EnderecoController@atualizar");
});
Route::group(["prefix" => "estado"], function () {
    Route::get("/{id}/editar", "EstadoController@editarView");
    Route::get("/{id}/excluir", "EstadoController@excluir");
    Route::get("/", "EstadoController@index");
    Route::get("/novo", "EstadoController@novoView");
    Route::post("/salvar", "EstadoController@salvar");
    Route::post("/atualizar", "EstadoController@atualizar");
});
Route::group(["prefix" => "configuracao"], function () {
    Route::get("/", "ConfiguracaoController@index");
    Route::post("/atualizar", "ConfiguracaoController@atualizar");
});
Route::group(["prefix" => "admin"], function () {
    Route::get("/sair", "UsuarioController@logout");
    Route::get("/{id}/perfil", "UsuarioController@index");
    Route::get("/novo", "UsuarioController@novoView");
    Route::post("/salvar", "UsuarioController@salvar");
    Route::post("/login", "UsuarioController@validarLogin");
});


