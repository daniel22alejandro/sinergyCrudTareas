# sinergyCrudTareas
Pasos para correr el proyecto

Pasos:

1. Clonar el repositorio en la carpeta www de laragon o htdocs si de Xampp se trata.
2. Dentro de la carpeta "Config" del proyecto deje una copia vacia de la base de datos en formato sql con las tablas clientes y tareas, que es la vamos a usar en este proyecto.
3. Crear una base de datos que tenga como nombre "sinergyCrudClientes" e importar la base de datos que en el anterior paso identificamos.
4. Con todo esto podemos ir al navegador y en la ruta: http://localhost/sinergyCrudTareas/ revisar el proyecto.
5. Si probar algún enpoint se desea, ingrese a las clases creadas en el controlador llamado Tareas.php, copie cualquier metodo y complementelo en este endpoint: http://localhost/sinergyCrudTareas/tareas/endpoint por ejemplo: http://localhost/sinergyCrudTareas/tareas/agregarTarea y envia este JSON:
   {
   "titulo": "Titulo ejemplo",
   "descripcion": "Descripcion ejemplo",
   "completado": 0
   }

Los estados posibles para completado son 1 y 0 pero en el front se les dio valor de completado al numero 1 y pendiente al numero 0
