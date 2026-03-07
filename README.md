# Conversor de Monedas (Java)

Proyecto simple de conversión de monedas usando **Java**, **HttpClient** y **Gson**.

## Requisitos

- Java JDK 17 o superior
- Librería Gson (gson-2.10.1.jar)

Estructura del proyecto:
ConversorDeMonedas
│
├── lib
│ └── gson-2.10.1.jar
│
└── src
└── ConversorApp.java


---

Uso

El programa mostrará un menú en consola para elegir la conversión de moneda y luego solicitará el monto a convertir.

Ejemplo:

1) USD -> ARS
2) ARS -> USD
3) USD -> BRL
4) BRL -> USD
5) USD -> EUR
6) EUR -> USD
7) Salir

Seleccionar una opción y luego ingresar el monto.

Elija una opción: 1
Ingrese el monto: 100

Resultado:

100 USD = XXXX ARS




# Compilar el proyecto

Ejecutar en la terminal dentro de la carpeta del proyecto:
```bash
javac -cp "lib/gson-2.10.1.jar" src/ConversorApp.java


Ejecutar el programa

```bash
java -cp "lib/gson-2.10.1.jar;src" ConversorApp




