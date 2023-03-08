# Análise: Requirimentos do sistema

Este documento describe os requirimentos para a Distribuidora de Mariscos especificando que funcionalidade ofrecerá e de que xeito.

## Descrición xeral
A aplicación permitiralle ás persoas usuarias **rexistrarse** e **iniciar sesión**. Unha vez rexistradas, poderán elixir o **tipo e a cantidade de marisco** a mercar, engadindo ditos produtos a unha **cesta da compra**. Finalmente, accedendo a dita cesta, poderán seleccionar o **tipo de compra** (é dicir, se irán recoller o pedido á tenda ou se o recibirán a través dun transportista).

## Funcionalidades
As funcionalidades que ten este proxecto son:
- **Creación dunha conta de usuario**: permitiralle a un usuario anónimo rexistrarse introducindo un nome de usuario, o seu nome e apelidos, o seu DNI, o seu enderezo, o correo electrónico e un contrasinal.
- **Inicio de sesión**: poderán entrar na súa conta de usuario introducindo o seu nome de usuario e o contrasinal.
- **Eliminación da conta de usuario**: de desexalo, a persoa usuaria rexistrada poderá eliminar a súa conta permanentemente.
- **Cambiar a cantidade de marisco restante**: unha persoa administradora poderá cambiar a cantidade de marisco de certo tipo en stock.
- **Cambiar o prezo**: unha persoa administradora poderá cambiar o prezo dun certo tipo de marisco de así desexalo.
- **Engadir un produto á cesta**: unha persoa usuaria rexistrada poderá engadir unha cantidade de marisco do tipo que elixa á súa cesta da compra.
- **Confirmar a compra**: unha persoa usuaria rexistrada poderá confirmar a compra, elixindo o tipo de compra (por envío ou con recollida en tenda).

## Requirimentos non funcionais
Os requirimentos non funcionais deste proxecto son:
- **Eficiencia**: o proxecto será despregado nunha máquina de Amazon EC2 cunha instancia de tipo t2.micro. Ten 1GB de RAM, o que permitirá acceder aos datos cunha gran rapidez.
- **Seguridade**: os permisos xestionaranse mediante roles (só os administradores terán acceso aos datos dos usuarios), e todas as conexions estarán protexidas mediante un certificado SSL a través de Let's Encrypt.
- **Usabilidade**: a páxina terá un deseño simple e responsive.

## Tipos de usuarios
Haberá tres tipos de persoas usuarias.
- **Administradoras**: cando haxa novos produtos na tenda serán as encargadas de cambiar ditas cantidades na páxina web.
- **Rexistradas**: poderán acceder á tenda e mercar produtos.
- **Anónimas**: poderán acceder á tenda, pero non comprar produtos.

## Contorna operacional
Para acceder á aplicación web só serán necesarios un **navegador web** e unha **conexión a internet**.

## Normativa
Ao tratar con alimentos é obrigatorio cumprir con certos requisitos.
- Por unha banda, hai que estar inscrito o _"Registro General Sanitario de Empresas Alimentarias y Alimentos"_ (RGSEAA). No [enlace](https://www.aesan.gob.es/AECOSAN/web/seguridad_alimentaria/subseccion/procedimientos_registro.htm) aparecen os requisitos e o procedemento a seguir. De modificar calquera actividade, habería que avisarlles ás Autoridades Competentes.
- Habería que seguir tamén a [normativa sobre a clasificación dos produtos do marisco](https://www.boe.es/buscar/doc.php?id=BOE-A-2004-2125).
- Ademais, hai que cumprir cos [requisitos xerais de seguridade alimentaria](https://www.boe.es/diario_boe/txt.php?id=BOE-A-2020-15872).
- Como o proxecto incluiría a opción de enviar os produtos á residencia das persoas usuarias, habería que cumprir cos [requisitos de transporte alimenticio](https://www.boe.es/buscar/doc.php?id=BOE-A-2009-18004).

### Lei de protección de datos
Neste proxecto se traballaría cos datos persoais das persoas usuarias: DNI, dirección e, no caso de ser un proxecto real, tamén a conta bancaria ou Paypal (que non se incluirá neste proxecto). Por este motivo, é preciso que o proxecto cumpra coa **LOPDPGDD**.

Por este motivo, as persoas usuarias deberían ser informadas pouco antes de confirmar a creación da súa conta que van compartir ditos datos cos administradores da páxina web. Tamén haberá un apartado na propia páxina web que o indicará, separado nos apartados **aviso legal**, **política de privacidade** e **política de cookies**.
