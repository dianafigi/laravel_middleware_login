<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoControlador extends Controller
{
    private $produtos = ["Televisao", "Notebook", "Impressora", "HD Externo"];

    public function __construct() {
      $this->middleware(\App\HTTP\Middleware\ProdutoAdmin::class); //nao registámos a classe no Kernel, pode ser registada assim.
    }

    public function index() {
      echo "<h3>Produtos:</h3>";
      echo "<ol>";
      foreach($this->produtos as $p) {
        echo "<li>" . $p . "</li>";
      }
      echo "</ol>";
    }
}
