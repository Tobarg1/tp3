integrantes: Matias Mensa y Felipe Tobares

ENDPOINTS:
-Obtener todos los viajes:
    https://localhost/web2/tpweb2Entrega3/api/viajes (get)

-Obtener un viaje por su id:
    https://localhost/web2/tpweb2Entrega3/api/viajes/id (get)

-Ordenar Viajes:
    ordenar los viajes por id_colectivo de forma ascendente:
    https://localhost/web2/tpweb2Entrega3/api/viajes?orderBy=id_colectivo (get)
    y desencente:
    https://localhost/web2/tpweb2Entrega3/api/viajes?orderBy=id_colectivo/descendente (get)

    ordenar los viajes por fecha_viaje de forma ascendente:
    https://localhost/web2/tpweb2Entrega3/api/viajes?orderBy=fecha_viaje (get)
    desencente:
    https://localhost/web2/tpweb2Entrega3/api/viajes?orderBy=fecha_viaje/descendente (get)

    ordenar los viajes por destino de forma ascendente:
    https://localhost/web2/tpweb2Entrega3/api/viajes?orderBy=destino
    desencente:
    https://localhost/web2/tpweb2Entrega3/api/viajes?orderBy=destino/descendente (get)

    ordenar los viajes por origen de forma ascendente:
    https://localhost/web2/tpweb2Entrega3/api/viajes?orderBy=origen
    desencente:
    https://localhost/web2/tpweb2Entrega3/api/viajes?orderBy=origen/descendente (get)

-Crear un nuevo viaje:
    https://localhost/web2/tpweb2Entrega3/api/viajes (post)
    un ejemplo:
        {
        "origen": "nuevo origen",
        "destino": "nuevo destino",
        "fecha_viaje": "nueva fecha ejemplo:2024-11-12",
        "id_colectivo": id de un colectivo que exista ejemplo(1,2,3)
        }


-Modificar un viaje por su id:
    https://localhost/web2/tpweb2Entrega3/api/viajes/id (put)
    un ejemplo:
    {
    "id_viaje": id,
    "origen": "nuevo origen",
    "destino": "nuevo destino",
    "fecha_viaje": "nueva fecha ejemplo:2024-10-02",
    "id_colectivo": id de un colectivo que exista ejemplo(1,2,3)
    }

