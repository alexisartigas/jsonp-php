// https://parzibyte.me/blog
// Definir los callbacks que serán llamados cuando la petición termine

const procesarClientes = clientes => {
    console.log("Los clientes: ", clientes);
};

const procesarVentas = ventas => {
    console.log("Las ventas: ", ventas);
};

// Obtener referencia a los botones

const btnPedirClientes = document.querySelector("#btnPedirClientes"),
    btnPedirVentas = document.querySelector("#btnPedirVentas");

// Escuchar clicks de los botones

btnPedirClientes.addEventListener("click", () => {
    // Comienza la petición JSONP
    const script = document.createElement("script");
    script.type = "text/javascript";
    // Mira el callback, es procesarClientes
    script.src = "./jsonp.php?callback=procesarClientes&peticion=clientes";
    // Adjuntar y remover script, pues queremos que se cargue pero queremos removerlo al mismo tiempo
    document.head.appendChild(script);
    document.head.removeChild(script);
});

btnPedirVentas.addEventListener("click", () => {
    // Comienza la petición JSONP
    const script = document.createElement("script");
    script.type = "text/javascript";
    // Mira el callback, es procesarVentas
    script.src = "./jsonp.php?callback=procesarVentas&peticion=ventas";
    // Adjuntar y remover script, pues queremos que se cargue pero queremos removerlo al mismo tiempo
    document.head.appendChild(script);
    document.head.removeChild(script);
});