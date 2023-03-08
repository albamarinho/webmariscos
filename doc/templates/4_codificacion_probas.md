# Codificación e Probas

## Codificación
O primeiro que fixen coa páxina web foi crear as táboas (**mariscos**, **rols**, **produtos** e **alter_users**) e os seeders para as táboas "mariscos", "rols" e "users", para así introducir os datos automaticamente. Despois engadín os dous controladores para as táboas: **MariscosController**, que controla a táboa mariscos, e **ProdutosController**, que controla a táboa de produtos.

Ao tratar de crear as rutas para as páxinas de política e contacto dinme conta de que necesitaría un controlador e unha ruta en web.php para cada unha destas. Ademais, dado que a páxina de contacto traballa co envío de correos, creei un Mailable para este, **ContactoMailable**.

Para poder probar as funcións de edición de mariscos (por parte de **administradores**) e compra de produtos (polos usuarios **rexistrados**), implementei a autenticación, introducindo as opcións de rexistro, login e logout. Para certas funcións que non veñen por defecto (coma a eliminación do usuario), creei **UsuariosController**.

Ao engadir unha persoa usuaria un produto á cesta, o que fai o programa é eliminar a cantidade en stock do produto e crear un novo elemento da táboa “produtos” co id do tipo de marisco, a cantidade do produto e o prezo total deste produto coma un atributos. No caso de engadir un tipo de marisco produto que estivese xa na cesta da compra, en vez de crear un produto novo o que fai é modificar a súa cantidade e o seu prezo.

Un usuario tamén pode modificar o tipo de compra (que por defecto é "recollida en tenda"). Isto afecta ao prezo total da compra (xa que o prezo de envío son 5€). A función _update()_ de **UsuariosController** é a que se encarga disto.

Ao finalizar a compra, o que fai é eliminar todos os produtos do usuario concreto e enviar un correo a todos os administradores coa información de contacto do usuario, a súa dirección e os produtos comprados, así coma o prezo total e o tipo de compra. Para isto creei un Mailable, **CompraMailable**.

Unha persoa **administradora** pode modificar tanto o prezo coma a cantidade dun tipo de marisco, do que se encarga a función _update()_ de **MariscosController**.

## Táboa de funcionalidades
| Funcionalidade | Finalizado |
| ------ | ------ |
| Creación dunha conta de usuario | SI |
| Inicio de sesión | SI |
| Eliminación da conta de usuario | SI |
| Cambiar a cantidade de marisco restante | SI |
| Cambiar o prezo | SI |
| Engadir un produto á cesta | SI |
| Confirmar a compra | SI |

## Erros no código
Durante a creación do proxecto, atopeime con diversos erros, fallos de lóxica ou elementos mellorables mentres codificaba. A continuación presento un rexistro dos mesmos:

Nas funcións _store()_ e _deleteProducts()_ de **ProdutosController** tiven que incluír un "if" para comprobar o tipo de usuario, para que só realice certas tarefas se se trata dun usuario rexistrado non administrador. A función de _store()_ modifiqueina tamén para que cambie a cantidade de produtos restante en stock cada vez que un usuario garda un produto na cesta.

Como un usuario podería eliminar a súa conta con produtos, e isto provocaría un erro de lóxica xa que ditos produtos seguirían en stock, a función _borrarUsuario()_ de **UsuariosController** foi modificada para que devolva dita cantidade ao stock ao eliminar un usuario.

A función _update()_ de dito controlador empregueina para modificar un único elemento dos users: o tipo de compra, que pode ser de envío á residencia ou de recollida en tenda. Para que actualice os datos correctamente, no tanto de ter un formulario con inputs "hidden", faise unha petición directa dende a función update.

## Probas
Para comprobar o correcto funcionamento da páxina web, tiven que probar diversas funcionalidades como usuaria anónima, rexistrada e administradora.

**Coma usuaria non rexistrada**
- Ao non estar rexistrada deben aparecer na cabeceira os botóns de login e rexistro, e non os de logout ou perfil.
- Ao acceder aos distintos tipos de mariscos aparecerá a información sobre estes, pero non a opción de engadir os produtos á cesta.
- Podo acceder coma calquera tipo de usuaria ás páxinas de contacto e política.

**Coma usuaria rexistrada**
- Como usuaria rexistrada teño a opción na cabeceira de pechar sesión e acceder ao meu perfil.
- Ao acceder as páxinas dos mariscos podo elixir a cantidade en quilos de marisco a comprar.
- No perfil aparecen os meus datos de usuario, a cesta de compra, unha opción para cambiar o tipo de envío (recollida en tenda ou envío á casa por 5€ máis) e a opción de finalizar a compra (que só aparece cando hai algún produto na cesta).
- Tanto coma usuaria regular coma administradora podo pechar sesión e eliminar a miña conta dende o perfil.
- Ao finalizar a miña compra envíase unha mensaxe a todas as persoas administradoras cos datos de contacto, o tipo de compra e os produtos a comprar.

**Coma administradora**
- Ao acceder ás páxinas de mariscos non debe aparecer a opción de engadir produtos á cesta da compra, xa que non poden comprar produtos. No seu lugar aparece a opción de editar o produto, concretamente a súa cantidade e o seu prezo.
- No perfil de usuario aparece un apartado coas distintas persoas usuarias e os seus datos. Ademais, aparece un apartado cos produtos e a posibilidade de editar ditos produtos.
