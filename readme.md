# PHP - geração de chaves euromilhões

Este exemplo ilustra a implementação de um serviço de geração de chaves do euromilhões em JSON.

A implementação é em PHP usando orientação a objetos.

O consumo do serviço é ilustrado usando **file_get_contents** e **CURL**.

A transformação de JSON para HTML é ilustrada com um método direto (escrita direta do HTML) e com recurso a uma biblioteca de manipulação de XML - **SimpleXML**

## Ficheiros
* eurolib.php (biblioteca com implementação das classes de geração de chaves)
* gerador.php.php (script que implementa o serviço de geração de chaves)
* consulta.php (página script que invoca/consome o serviço e mostra a chave obtida)

## Funcionamento
A página **consulta.php** faz um pedido à página **gerador.php** de uma chave com **nn** números e **ne** estrelas.

O script **gerador.php** recebe os parâmetros de geração e utilizando as classes implementadas em **eurolib.php** gera a chave.

Depois de obtida a chave, a página **consulta.php** mostra-a em HTML, transformando o JSON em HTML.
