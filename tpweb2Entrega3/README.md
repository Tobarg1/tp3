integrantes: Matias Mensa y Felipe Tobares

Endpoints
1. Obtener todos los viajes
Método: GET

URL: /api/viajes

Obtiene la lista de todos los viajes

  {
    "id_viaje": 1,
    "origen": "Buenos Aires",
    "destino": "Mendoza",
    "fecha_viaje": "2024-11-20",
    "id_colectivo": 1
  },
  {
    "id_viaje": 2,
    "origen": "Cordoba",
    "destino": "Rosario",
    "fecha_viaje": "2024-12-05",
    "id_colectivo": 2
  }


2. Obtener un viaje por su ID
Método: GET

URL: /api/viajes/:id

Obtiene los detalles de un viaje por su ID.

{
  "id_viaje": 1,
  "origen": "Buenos Aires",
  "destino": "Mendoza",
  "fecha_viaje": "2024-11-20",
  "id_colectivo": 1
}

3. Ordenar los viajes
Método: GET

URL: /api/viajes?orderBy=<campo>/<orden>

Obtiene la lista de viajes ordenada por el campo especificado (id_colectivo, fecha_viaje, origen, o destino), de forma ascendente o descendente.

id_colectivo
fecha_viaje
origen
destino
Ejemplo de URLs:

Ordenar por id_colectivo ascendente: /api/viajes?orderBy=id_colectivo
Ordenar por id_colectivo descendente: /api/viajes?orderBy=id_colectivo/descendente
Ordenar por fecha_viaje ascendente: /api/viajes?orderBy=fecha_viaje
Ordenar por fecha_viaje descendente: /api/viajes?orderBy=fecha_viaje/descendente
Ordenar por origen ascendente: /api/viajes?orderBy=origen
Ordenar por origen descendente: /api/viajes?orderBy=origen/descendente
Ordenar por destino ascendente: /api/viajes?orderBy=destino
Ordenar por destino descendente: /api/viajes?orderBy=destino/descendente

4. Modificar un viaje por su ID
Método: PUT

URL: /api/viajes/:id

Modifica un viaje existente por su ID.

{
  "origen": "nuevo origen",
  "destino": "nuevo destino",
  "fecha_viaje": "2024-10-02",
  "id_colectivo": 1
}

5. Crear un nuevo viaje
Método: POST

URL: /api/viajes

Crea un nuevo viaje.
{
  "origen": "Buenos Aires",
  "destino": "Mendoza",
  "fecha_viaje": "2024-11-20",
  "id_colectivo": 1
}

