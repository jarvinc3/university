# university

Este es mi proyecto para el find el nivel 3.
Es una pagina funcional para una universidad la cual cuenta con un login y varias funciones dependiendo los roles.
Hay tres roles diferentes ADMIN, MAESTRO, ESTUDIANTE.
Hay multiples cuentas que puedes displonibles para ingresar como maestro y estudiante, sin embargo para admin solo hay una.
Puedes ingresar usando estas cuentas para testear: 
-ESTUDIANTE->
correo: alumno@alumno  
contraseña: alumno
-MAESTRO->
correo: maestro@maestro  
contraseña: maestro
-ADMINISTRADOR-> 
correo: admin@admin 
contraseña: admin

Aspectos a tomar en encuenta:
ROL ALUMNO
Aunque te deja ingresar en la vista de calificaciones, sus funcionalidades no las pude completar, pero he dejado la vista para continuar mas adelante.

ROL Administrador
En el modal solo habilite la opcion de desloguearse ya que entendi que no es necesario que el admin edite sus propios datos porque debido a la configuaracion que tiene mi base de datos solo hay una cuenta de administrador para todo el que tenga el permiso de entrar como administrador.

En el apartado de permisos hay algunas funcionalidades que no pude completar, y es que aunque puedes ingresar a una vista para editar los permisos, no es posible cambiar los roles, la vista esta porque mas adelante la voy a implementar

En el apartado de maestros te deja crear, editar y eliminar un maestro con sus respectivos datos, aunque puedes eliminar un maestro aun teniendo una clase, es recomendable que primero vayas a la vista clases y asignes esa clase a otro maestro.

En el apartado de alumnos puedes crear, editar y eliminar un alumno aunque este esté agregado a una clase.

En el apartado de clases puede crear, editar y eliminar una clase, aun si hay un maestro asignado a esa clase la puedes eliminar.

Agregados:
En el login puedes crear una cuenta para estudiante, una vez la crees te va a llevar a la vista de estudiante

No puedes entrar a ninguna vista por medio de la url a menos que este logeado con una cuenta.

Utilice javaScript para hacer el menu y el modal para editar perfil mas dinamico.

Todas las vistas fueron hachas desde cero por mi.
