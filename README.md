# Creación del contenedor de Docker

Abre una terminal en el mismo directorio que el archivo docker-compose.yml y ejecutas la siguientes ordenes:

```shell
chmod 777 csv/*
docker-compose up
```

En caso de que el paquete no este disponible en tu distribución de preferencia consulta la siguiente [pagina web](https://docs.docker.com/compose/install/) que contiene las instrucciones para instalarlo.



**Advertencia:** No debes tener ningún programa escuchando por los puertos 80 y 443 en tu ordenador. Es posible cambiarlo a otro puerto antes de la creación del contenedor, pero la aplicación no se ha hecho con este cambio en mente. Tu experiencia podría verse degradada.

