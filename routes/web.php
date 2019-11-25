<?php

use Illuminate\Http\Request;

Route::get('/produtos', 'ProdutoControlador@index');

Route::get('/negado', function() {
  return "Acesso Negado! Por favor faça login.";
})->name('negado');

Route::get('/negadologin', function() {
  return "Acesso Negado! Não é administrador";
})->name('negadologin');

Route::post('/login', function(Request $req) {
  $login_ok = false;
  $admin = false;

  switch($req->input('user')) {
    case 'joao':
      $login_ok = $req->input('passwd') === "senhajoao";
      $admin = true;
      break;
    case 'marco':
      $login_ok = $req->input('passwd') === "senhamarco";
      break;
    case 'default':
      $login_ok = false;
  }

  if($login_ok) {
    $login = ['user'=> $req->input('user'), 'admin' => $admin];
    $req->session()->put('login', $login);  //O middleware recebe este $req que leva o login. Ver middewre Produto Admin.
    return response("Login OK", 200);
  }
  else {
    $req->session()->flush();
    return response("Erro no login", 404);
  }
});

Route::get('/logout', function(Request $request) {
  $request->session()->flush();
  return response('Deslogado com sucesso!', 200);
});
