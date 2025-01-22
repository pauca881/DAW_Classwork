This little repository only contains some files edited in Laravel Project.
THIS IS NOT A LARAVEL FULL PROJECT, ONLY SOME FILES

In the repository there aren't the environment files and the laravel project, only the edited and added files

Per a autoconnectar sempre Laravel, necessitem primer dir-li quina serà la base de dades per defecte, user i password.. Per això editarem la variable d’entorn del nostre projecte:

![image](https://github.com/user-attachments/assets/2948ae3b-98ea-446f-972a-b024a02d1a32)

Laravel añade el sufijo **s** cuando se ha migrado un modelo correctamente

**Conflicto MYSQL Solucionado**

Al encender Apache y MYSQL con laragon, me salian instancias diferentes con otras bases de datos.
He parado laragon, he encontrado y matado la task del mysql, i al reiniciar laragon, si me abre la instancia MYSQL correcta.

netstat -ano | findstr :3306 para encontrar la task
taskkill /PID 5888 /F para eliminar la task

Probablemente este error era debido a un error y conflicto de puertos, y usaba instancias que no eran
