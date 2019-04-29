# bbddproyecto

Aplicación para gestión de listas y sus respectivas tareas.

Sigue los pasos que se indican a continuación para ejecutar correctamente la aplicación.

1.- Abre el archivo Variables.php e introduce los datos necesarios para conectarse a la bbdd.
<br>
2.- Abre el archivo Instalación.php
<br>
3.- Por útlimo abre el archivo VerListas.php, desde el cual podrás manejar la aplicación e interactuar con ella.













Vamos a detallar que realiza cada archivo:

    *Variables.php -> Se guardan las variables con los datos para posteriormente conectarse a la bbdd.
    *ConexionBBDD.php -> Se realiza la conexión con los datos proporcionados desde el archivio Variables.php.
    *Instalacion.php -> Se crea la bbdd y sus correspondientes tablas.
    *VerListas.php -> Se gestiona la visualización de las listas que hay disponibles en ese momento y las diferentes opciones para interactuar con ellas.
    *InsertarLista.php -> Archivo que se ejecuta cuando desde Verlistas.php pulsamos el botón "Agregar lista". En este controla todo lo referente a insertar listas nuevas en la bbdd.
    *ModificarLista.php -> Archivo que se ejecuta cuando desde Verlistas.php pulsamos el botón "Modificar". En este controla todo lo referente a modificar listas seleccionadas.
    *VerTareas.php -> Se gestiona la visualización de las tareas que hay disponible en ese momento de una lista seleccionada previamente y las diferentes opciones para interactuar con ellas.
    *InsertarTarea.php -> Archivo que se ejecuta cuando desde VerTareas.php pulsamos el botón "Agregar". En este controla todo lo referente a insertar tareas nuevas en la bbdd.
    *ModificarTareas.php -> Archivo que se ejecuta cuando desde VerTareas.php pulsamos el botón "Modificar". En este controla todo lo referente a modificar tareas seleccionadas.
    *database.sql -> Archivo donde se guardan las instrucciones sql para posteriormente ser requerido.
