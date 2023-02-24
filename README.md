# Tools

Uma classe ultilitária para facilitar validações e máscaras de inputs

### Como utilizar
    
Adicione o autoload.php do composer no seu arquivo PHP.

```php
require_once 'vendor/autoload.php';  
```

Agora basta chamar os métodos estáticos:

```php
use Automatec\Utils\Tools as Tools;
use Automatec\Utils\Mask as Mask;

Utils::mask('31030080', Mask::CEP); //Output: 31.030-080

Utils::mask('12345678900', Mask::CPF); //Output: 123.456.789-00
Utils::mask('12345678901234', Mask::CNPJ); //Output: 12.345.678/9012-34

Utils::mask('12345678900', Mask::DOCUMENTO); //Output: 123.456.789-00
Utils::mask('12345678901234', Mask::DOCUMENTO); //Output: 12.345.678/9012-34

Utils::mask('31988710521', Mask::TELEFONE); //Output: (31)98871-0521
Utils::mask('3188710521', Mask::TELEFONE); //Output: (31)8871-0521

Utils::mask('a1b2c3d4e5f6', Mask::MAC); //Output: a1:b2:c3:d4:e5:f6

Utils::unmask('31.030-080'); //Output: 31030080

Utils::unaccents('Êita método bão sô!'); //Output: Eita metodo bao so!   

Utils::isCnpj('45543915000181'); //Output: true
Utils::isCnpj('45.543.915/0001-81'); //Output: true
Utils::isCnpj('84894484804888'); //Output: false

Utils::isCpf('51635916658'); //Output: true
Utils::isCpf('516.359.166-58'); //Output: true
Utils::isCpf('84894484804'); //Output: false
 
Utils::isEmail('jansen.felipe@gmail.com'); //Output: true   
Utils::isEmail('jansen.felipe@'); //Output: false   

Utils::moeda(2000) //Output: R$ 2.000,00   
Utils::moeda('3500.22', 'US$', 2) //Output: US$ 3.500,22   

Utils::unmoeda('R$ 2.000,00') //Output: 2000   
Utils::unmoeda('US$ 3.500,22') //Output: 3500.22

Utils::isMac('a1b2c3d4e5f6') // Output: true
Utils::isMac('a1:b2:c3:d4:e5:f6') // Output: true

Utils::isIp('127.0.0') // Output: false
Utils::isIp('127.0.0.1') // Output: true
Utils::isIp('192.168.0.255') // Output: true

Utils::formatDate('2018-05-31', 'Y-m-d', 'd/m/Y') //Output: 31/05/2018
```


Copyright (c) 2023 Allysson de Sá
