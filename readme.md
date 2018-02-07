### WORK IN PROGRESS

### Introduccion
La idea es crear un plugin que integre el sistema de generar la documentacion para las api con wordpress. 
Esto nos da la ventaja de crear una pagina y seleccionar como plantilla la que adiciona el plugins y tendriamos toda la documentacion del plugin lista para consumir.

### Como funciona.
El plugins adiciona un nuevo tipo de plantilla. Si la seleccionamos se carga con las vistas que estan dentro del plugin y se muestra el proyecto generado dentro del plugin.


Este plugin no genera la documentacion de la API solo expone el la documentacion generada por el plugin #### que tiene que estar instalado y configurado para que genere la documentacion dentro de la carpeta project dentro del plugin  

 


### Cosas por hacer 
* Hay que resolver la ruta base de donde se carga las cosas. Esto esta en main.js dentro de la plantilla de jam3
* Hay que mejorar el comando para
* Hacer que lea la documentacion desde otra ubicacion dentro del sitio. Hacer que lea desde afuera seria un problema de seguridad.
