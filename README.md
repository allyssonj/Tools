# Tools

![Packagist Version](https://img.shields.io/packagist/v/automatec/tools)
![Packagist Downloads (custom server)](https://img.shields.io/packagist/dt/automatec/tools?server=https%3A%2F%2Fpackagist.org)


Uma classe de utilitários para criação de máscaras e validações de inputs.

### Como utilizar

Adicione a library

```sh
composer require automatec/tools
```
    
Adicione o autoload.php do composer no seu arquivo PHP.

```php
require_once 'vendor/autoload.php';  
```

Agora basta chamar os métodos estáticos:

```php
use Automatec\Utils\Tools as Tools;
use Automatec\Utils\Mask as Mask;

Tools::mask('31030080', Mask::CEP); //Output: 31.030-080

Tools::mask('12345678900', Mask::CPF); //Output: 123.456.789-00
Tools::mask('12345678901234', Mask::CNPJ); //Output: 12.345.678/9012-34

Tools::mask('12345678900', Mask::DOCUMENTO); //Output: 123.456.789-00
Tools::mask('12345678901234', Mask::DOCUMENTO); //Output: 12.345.678/9012-34

Tools::mask('31988710521', Mask::TELEFONE); //Output: (31) 98871-0521
Tools::mask('3188710521', Mask::TELEFONE); //Output: (31) 8871-0521

Tools::mask('a1b2c3d4e5f6', Mask::MAC); //Output: a1:b2:c3:d4:e5:f6

Tools::unmask('31.030-080'); //Output: 31030080

Tools::unaccents('Testando método da função'); //Output: Testando metodo da funcao

Tools::isCnpj('45543915000181'); //Output: true
Tools::isCnpj('45.543.915/0001-81'); //Output: true
Tools::isCnpj('84894484804888'); //Output: false

Tools::isCpf('51635916658'); //Output: true
Tools::isCpf('516.359.166-58'); //Output: true
Tools::isCpf('84894484804'); //Output: false
 
Tools::isEmail('allysson.jhonnatha@gmail.com'); //Output: true   
Tools::isEmail('allysson.jhonnatha@'); //Output: false   

Tools::moeda(2000) //Output: R$ 2.000,00   
Tools::moeda('3500.22', 'US$', 2) //Output: US$ 3.500,22   

Tools::unmoeda('R$ 2.000,00') //Output: 2000   
Tools::unmoeda('US$ 3.500,22') //Output: 3500.22

Tools::isMac('a1b2c3d4e5f6') // Output: true
Tools::isMac('a1:b2:c3:d4:e5:f6') // Output: true

Tools::isIp('127.0.0') // Output: false
Tools::isIp('127.0.0.1') // Output: true
Tools::isIp('192.168.0.255') // Output: true

Tools::normatizeName('JosÉ dos SANTOS E silva', 'de,do,da,e,dos')  // Output: José dos Santos e Silva
Tools::normatizeName('JOSÉ DE OLIVEIRA E SILVA', 'de,do,da,e,dos') // Output: José de Oliveira e Silva

Tools::formatDate('2018-05-31', 'Y-m-d', 'd/m/Y') //Output: 31/05/2018
```


Copyright (c) 2023 Allysson de Sá
