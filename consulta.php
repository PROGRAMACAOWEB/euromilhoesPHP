<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Chave vencedora de logo à noite</h1>
    <?php
      // como obter o json da chave (serviço de geração de chaves)
      // metodo 1 : consome chave com file_get_contents

      /*
          $chave = file_get_contents("http://localhost/PW/euromilhoes/gerador.php?nn=5&ne=2");
          echo $chave;
          $chavePHP = json_decode($chave);
      */

     // metodo 2 : consome usando CURL
     // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, "http://localhost/PW/euromilhoes/gerador.php?nn=5&ne=2");

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);

        echo $output;

        $chavePHP = json_decode($output);

// escreve chave como HTML
/*
        // metodo basico - escrever o HTML
        echo "<div class='chave'>";
        echo "<ul class='numeros'>";
          foreach ($chavePHP->numeros as $num) {
            echo "<li>" . $num . "</li>";
          }
        echo "</ul>";
        echo "<ul class='numeros'>";
        foreach ($chavePHP->estrelas as $est) {
          echo "<li>" . $est . "</li>";
        }
        echo "</ul>";
        echo "</div>";
*/
        // metodo simples
        // gerar um documento DOM / XML



        // novo nó raiz e respetivo atributo
        $chaveXML = new SimpleXMLElement("<div></div>");
        $chaveXML->addAttribute("class","chave");

        // nó dos numeros - lista ul
        $ulNumeros = $chaveXML->addChild("ul");
        $ulNumeros->addAttribute("class","numeros");

        // insere numeros - nós li
        foreach ($chavePHP->numeros as $num) {
          $ulNumeros->addChild("li",$num);
        }

        // nó das estrelas - lista ul
        $ulEstrelas = $chaveXML->addChild("ul");
        $ulEstrelas->addAttribute("class","estrelas");

        // insere estrelas - nós li
        foreach ($chavePHP->estrelas as $est) {
          $ulEstrelas->addChild("li",$est);
        }

        // faz output do (X)HTML gerado
        echo  $chaveXML->asXML();

?>
  </body>
</html>
