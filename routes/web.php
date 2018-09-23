<?php


Route::get('/', function () {
    return view('welcome');
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


