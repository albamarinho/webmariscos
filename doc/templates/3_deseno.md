# Deseño
As aplicacións coas que foron realizados os seguintes deseños aparecen en [Referencias](doc/templates/a1_referencias.md) no apartado _"Deseño"_.

O elemento "produto" é unha cantidade concreta dun tipo calquera de marisco que selecciona a persoa usuaria para engadir no seu carriño de compra. Dito carriño pode conter conter 0 ou máis produtos. Cada persoa rexistrada (non administradora) ten un carriño e a opción de finalizar a súa compra e elixir o método de compra.

Cada usuario (que non sexa anónimo) pode editar a súa conta e os seus datos e pechar sesión. Aqueles que non sexan administradores tamén terán a opción de eliminar a súa conta.

Unha persoa administradora poderá cambiar a cantidade e o prezo do marisco.

A **páxina de inicio** contén un carrusel con fotos ou vídeos das praias onde se recollen os produtos (que non aparecerá na versión de móbil). Tamén conta con imaxes dos catro tipos de marisco con enlaces que levan ao produto.

Na **páxina dun tipo concreto de marisco** aparece unha descrición e un selector para elixir a cantidade a engadir ao carriño.

A **páxina de contacto** contén unha descrición dos vendedores, da tenda, a información de contacto e a opción de enviar un correo de estar rexistrado.

A **páxina de perfil** contén a información do usuario e unha opción para editar os datos. Amosa tamén o carriño da compra, as opcións de compra e a opción de finalizar a compra. Tamén conta cun botón para pechar a sesión.

A **páxina de privacidade** contén o aviso legal, a política de privacidade e a política de cookies.

## Modelo conceptual do dominio da aplicación
![Modelo conceptual da aplicación web](doc/img/Modelo_conceptual.PNG "Modelo conceptual")

## Casos de uso
![Casos de uso da aplicación](doc/img/Casos_de_uso.PNG "Casos de uso")

## Deseño de interface de usuarios
![Mockup da páxina de inicio](doc/img/Mockup_Inicio.PNG "Inicio")

![Mockup da páxina de contacto](doc/img/Mockup_Contacto.PNG "Contacto")

![Mockup da páxina dun produto concreto](doc/img/Mockup_Marisco.PNG "Produto")

![Mockup da páxina de perfil](doc/img/Mockup_Perfil.PNG "Perfil")

![Mockup da páxina de privacidade](doc/img/Mockup_Politica.PNG "Política")

## Diagrama de Base de Datos
![Modelo entidade-relación](doc/img/Modelo_entidade-relacion.png "Entidad relación")
