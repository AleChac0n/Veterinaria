/*===============| Inicio del archivo JavaScript del formulario de productos |===============*/

/*===============| Número de página #1, para poder colocar por defecto la lista de los productos: |===============*/
let pagina = 1;


/*===============| Conjunto de constantes de los datos para el apartado de productos: |===============*/
const Datos_Productos = {
    nombre: '',
    direccion: '',
    telefono: '',
    fecha: '',
    temas: []
}


/*===============| Conjunto de funciones para poder llamarlos rapidamente: |===============*/
document.addEventListener('DOMContentLoaded', function () {

    /*===============| Funciones primordiales: |===============*/

    //Función que muestra el contenedor de la sección de productos actual:
    Mostrar_Seccion_Pagina_Productos();

    //Función para poder consultar los temas al archivo json y luego mostrarlos posteriormente:
    Mostrar_Temas_Pagina_Productos();

    //Función para poder ocultar o mostrar una seccion según lo presionado:
    Cambiar_Seccion_Pagina_Productos();

    //Funciones para poder ir de una página siguiente o una página anterior del apartado de productos:
    Pagina_Siguiente_Productos();
    Pagina_Anterior_Productos();


    /*===============| Funciones de los datos del apartado de productos: |===============*/

    //Nombre de la función del nombre del comprador:
    Nombre_Comprador();

    //Nombre de la función con respecto a la dirección del comprador:
    Direccion_Comprador();

    //Nombre de la función de la teléfono del comprador:
    Telefono_Comprador();

    //Nombre de la función de la fecha del comprador:
    Fecha_Comprador();
});



/*===============| Inicio de las funciones primordiales para la página: |===============*/
function Mostrar_Seccion_Pagina_Productos() {

    //Proceso para poder eliminar el apartado: mostrar-seccion, de la página anterior:
    const seccionAnterior = document.querySelector('.mostrar-seccion');
    if (seccionAnterior) {
        seccionAnterior.classList.remove('mostrar-seccion');
    }

    const seccionActual = document.querySelector(`#paso-${pagina}`);
    seccionActual.classList.add('mostrar-seccion');

    //Proceso para poder eliminar la clase actual en el tab anterior de la página:
    const tabAnterior = document.querySelector('.tabs .actual');
    if (tabAnterior) {
        tabAnterior.classList.remove('actual');
    }

    //Proceso para poder remarcar el presionado (que seria el tab) de la página actual:
    const tab = document.querySelector(`[data-paso="${pagina}"]`);
    tab.classList.add('actual');
}


/*===============| Función asincronica principal para poder mostrar los temas de los productos: |===============*/
async function Mostrar_Temas_Pagina_Productos() {
    try {
        const resultado = await fetch('./json/Formulario_Productos_Imagenes.json');
        const db = await resultado.json();

        const { temas } = db;

        //Proceso para poder generar el HTML de la página:
        temas.forEach(tema => {
            const { id, nombre, imagen } = tema;

            /*Proceso del DOM scripting de la página y además de generar
             el nombre del tema para la página: */
            const nombreTema = document.createElement('P');
            nombreTema.textContent = nombre;
            nombreTema.classList.add('nombre-tema');

            //Proceso para poder generar la imagen del tema, con respecto a la página:
            const imagenTema = document.createElement('IMG');
            imagenTema.src = `${imagen}`;
            imagenTema.classList.add('imagen-tema');

            //Proceso para poder generar el contenedor div del tema, con respecto a la página:
            const temaDiv = document.createElement('DIV');
            temaDiv.classList.add('tema');
            temaDiv.dataset.idtema = id;

            //Proceso para poder seleccionar un tema para el producto:
            temaDiv.onclick = seleccionarTema;

            //Proceso para poder inyectar dentro del div, tema y la imagen de la página:
            temaDiv.appendChild(nombreTema);
            temaDiv.appendChild(imagenTema);

            //Proceso para poder inyectarlo al HTML de la página:
            document.querySelector('#temas').appendChild(temaDiv);
        });

    } catch (error) {
        console.log(error);
    }
}


/*===============| Función para poder seleccionar un tema para los productos: |===============*/
function seleccionarTema(e) {
    let elemento;

    //Proceso para poder forzar que el elemento al que se le da click, sea el padre:
    if (e.target.tagName === 'P') {
        elemento = e.target.parentElement;
    } else {
        elemento = e.target;
    }

    if (elemento.classList.contains('seleccionado')) {
        elemento.classList.remove('seleccionado');

        const id = parseInt(elemento.dataset.idtema);

        eliminarTema(id);
    } else {
        elemento.classList.add('seleccionado');

        const temaObj = {
            id: parseInt(elemento.dataset.idtema),
            nombre: elemento.firstElementChild.textContent,
            tiempo: elemento.firstElementChild.nextElementSibling.textContent
        }

        agregarTema(temaObj);
    }
}


/*===============| Función para poder agregar los temas para los productos: |===============*/
function agregarTema(temaObj) {
    const { temas } = Datos_Productos;
    Datos_Productos.temas = [...temas, temaObj];
}


/*===============| Función para poder eliminar los temas para los productos: |===============*/
function eliminarTema(id) {
    const { temas } = Datos_Productos;

    Datos_Productos.temas = temas.filter(tema => tema.id != id);
}


/*===============| Función para poder cambiar de página: |===============*/
function Cambiar_Seccion_Pagina_Productos() {
    const enlaces = document.querySelectorAll('.tabs button');

    enlaces.forEach(enlace => {
        enlace.addEventListener('click', evento => {
            evento.preventDefault();
            pagina = parseInt(evento.target.dataset.paso);

            //Proceso para poder llamar a la función de: Mostrar_Seccion_Pagina_Productos
            Mostrar_Seccion_Pagina_Productos();
            botonesPaginador();
        });
    });
}


/*===============| Función para poder hacer el cambio de la siguiente página del apartado de productos: |===============*/
function Pagina_Siguiente_Productos() {
    const paginaSiguiente = document.querySelector('#siguiente');
    paginaSiguiente.addEventListener('click', () => {
        pagina++;
        botonesPaginador();
    });
}


/*===============| Función para poder hacer el cambio de la anterior página del apartado de productos: |===============*/
function Pagina_Anterior_Productos() {
    const paginaAnterior = document.querySelector('#anterior');
    paginaAnterior.addEventListener('click', () => {
        pagina--;
        botonesPaginador();
    });
}


/*===============| Función para poder aparecer los botones para ir a la siguiente o anterior página de productos: |===============*/
function botonesPaginador() {
    const paginaSiguiente = document.querySelector('#siguiente');
    const paginaAnterior = document.querySelector('#anterior');

    if (pagina === 1) {
        paginaAnterior.classList.add('ocultar');
    } else if (pagina === 3) {
        paginaSiguiente.classList.add('ocultar');
        paginaAnterior.classList.remove('ocultar');

        //Proceso para poder agregar el resumen de la factura de los productos:
        Mostrar_Resumen_De_La_Factura_De_Productos();
    } else {
        paginaSiguiente.classList.remove('ocultar');
        paginaAnterior.classList.remove('ocultar');
    }

    //Proceso para poder cambiar la sección que se muestra en la página de productos:
    Mostrar_Seccion_Pagina_Productos();
}


/*===============| Función para poder mostrar el resumen de la factura para los productos |===============*/
function Mostrar_Resumen_De_La_Factura_De_Productos() {

    //Destructurando los datos de los productos:
    const {nombre, direccion, telefono, fecha, temas } = Datos_Productos;

    //Seleccionar el resumen de los productos:
    const resumenDiv = document.querySelector('.contenido-resumen');

    //Limpia el HTML previa:
    while (resumenDiv.firstChild) {
        resumenDiv.removeChild(resumenDiv.firstChild);
    }

    //Proceso para poder validar la información correctamente:
    if (Object.values(Datos_Productos).includes('')) {
        const notemas = document.createElement('P');
        notemas.textContent = 'Faltan los datos de id, nombre, descripción, cantidad y fecha';

        notemas.classList.add('invalidar-productos');

        //Agregamos el resumen div para que pueda funcionar correctamente la validación:
        resumenDiv.appendChild(notemas);

        return;
    }

    const headingProductos = document.createElement('H3');
    headingProductos.textContent = 'Resumen de la factura del comprador';


    //Proceso para poder mostrar el contenido de los productos:
    const nombreComprador = document.createElement('P');
    nombreComprador.innerHTML = `<span>Nombre:</span> ${nombre}`;

    const direccionComprador = document.createElement('P');
    direccionComprador.innerHTML = `<span>Dirección:</span> ${direccion}`;

    const telefonoComprador = document.createElement('P');
    telefonoComprador.innerHTML = `<span>Teléfono:</span> ${telefono}`;

    const fechaComprador = document.createElement('P');
    fechaComprador.innerHTML = `<span>Fecha:</span> ${fecha}`;


    const headingTemas = document.createElement('H3');
    headingTemas.textContent = 'Resumen de los productos';

    const temasProductos = document.createElement('DIV');
    temasProductos.classList.add('resumen-temas');

    temasProductos.appendChild(headingTemas);

    let cantidad = 0;

    temas.forEach(tema => {
        const { nombre } = tema;

        const contenedorTemas = document.createElement('DIV');
        contenedorTemas.classList.add('contenedor-tema');

        const textoTema = document.createElement('P');
        textoTema.textContent = nombre;

        contenedorTemas.appendChild(textoTema);

        temasProductos.appendChild(contenedorTemas);
    });

    resumenDiv.appendChild(headingProductos);
    resumenDiv.appendChild(nombreComprador);
    resumenDiv.appendChild(direccionComprador);
    resumenDiv.appendChild(telefonoComprador);
    resumenDiv.appendChild(fechaComprador);


    resumenDiv.appendChild(temasProductos);
}

/*===============| Fin de las funciones primordiales para la página |===============*/




/*===============| Inicio de las funciones para los datos de productos: |===============*/

/*==============================| Funciones para validar los campos respectivos del formulario: |==============================*/

/*===============| Función para los nombres del comprador: |===============*/
function Nombre_Comprador() {
    const Nombre_Input = document.querySelector('#nombre');

    Nombre_Input.addEventListener('input', e => {

        const Nombre_Obtener_Texto = e.target.value.trim();

        //Proceso para poder validar el nombre del comprador:
        if (Nombre_Obtener_Texto === '' || Nombre_Obtener_Texto.length > 18) {
            Alerta_Productos('El nombre del comprador no es valido, intente de nuevo por favor.', 'error');

        } else {
            const Alerta = document.querySelector('.alerta');

            if (Alerta) {
                Alerta.remove();
            }
            Datos_Productos.nombre = Nombre_Obtener_Texto;
        }
    })
}


/*===============| Función para la dirección del comprador: |===============*/
function Direccion_Comprador() {
    const Direccion_Input = document.querySelector('#direccion');

    Direccion_Input.addEventListener('input', e => {

        const Direccion_Obtener_Texto = e.target.value.trim();

        //Proceso para poder validar la descripción del producto:
        if (Direccion_Obtener_Texto === '' || Direccion_Obtener_Texto.length > 150) {
            Alerta_Productos('La dirección no es valida, intente de nuevo por favor.', 'error');

        } else {
            const Alerta = document.querySelector('.alerta');
            if (Alerta) {
                Alerta.remove();
            }
            Datos_Productos.direccion = Direccion_Obtener_Texto;
        }
    })
}


/*===============| Función para las cantidades de los productos: |===============*/
function Telefono_Comprador() {
    const TelefonoInput = document.querySelector('#telefono');

    TelefonoInput.addEventListener('input', e => {

        const Telefono_obtener_Texto = e.target.value.trim();

        //Proceso para poder validar la Telefonoel producto:
        if (Telefono_obtener_Texto === '' || Telefono_obtener_Texto.length > 67) {
            Alerta_Productos('El Telefono no es valido, intente con otro dato por favor.', 'error');

        } else {
            const Alerta = document.querySelector('.alerta');
            if (Alerta) {
                Alerta.remove();
            }
            Datos_Productos.telefono = Telefono_obtener_Texto;
        }
    })
}



/*===============| Función para las fechas de los productos: |===============*/
function Fecha_Comprador() {

    const Fecha_Input = document.querySelector('#fecha');

    Fecha_Input.addEventListener('input', e => {

        const Dia_De_La_Fecha = new Date(e.target.value).getUTCDay();

        //Proceso para poder validar la fecha del comprador:
        if ([0, 6].includes(Dia_De_La_Fecha)) {
            e.preventDefault();
            Fecha_Input.value = '';
            Alerta_Productos('Fines de semana no son permitidos, intente con otra fecha por favor.', 'error');

        } else {
            if (Date.parse(Fecha_Input.value) < Date.now()) {
                Alerta_Productos('La fecha no es valida, intente con otro dato por favor.', 'error');

            } else {
                const Alerta = document.querySelector('.alerta');
                if (Alerta) {
                    Alerta.remove();
                }
            }
        }
        Datos_Productos.fecha = Fecha_Input.value;
    })
}

/*===============| Final de las funciones para los datos de productos: |===============*/



/*===============| Inicio de la funcion para poder generar alertas para los datos de productos: |===============*/

/*Función para dar una alerta ante un posible error sobre los campos de los productos.
Además, esto sirve muchisimo para el proceso de verificación.*/
function Alerta_Productos(mensaje, tipo) {

    //Si hay una alerta previa anteriormente, entonces no crea otra alerta:
    const Alerta_Preventiva = document.querySelector('.alerta');
    if (Alerta_Preventiva) {
        return;
    }

    const Alerta = document.createElement('DIV');
    Alerta.textContent = mensaje;
    Alerta.classList.add('alerta');

    if (tipo === 'error') {
        Alerta.classList.add('error');
    }

    //Proceso para poder insertar la alerta en el HTML del formulario de los productos:
    const formulario = document.querySelector('.formulario');
    formulario.appendChild(Alerta);

    //Proceso para poder eliminar la alerta de los productos después de unos 4 segundos aproximadamente:
    setTimeout(() => {
        Alerta.remove();
    }, 4000);
}

/*===============| Final de la función para poder generar alertas para los datos de productos: |===============*/



/*===============| Inicio de la funcion para entrar en la nueva página: |===============*/

/*Sirve para ir a agregarproductos.html, esto para poder agregar más cantidades con respecto
a los productos que se ofrecen en la veterinaria.*/
function Agregar_Mas_Productos() {
    location.href = "agregarproductos.html"
}

/*===============| Final de la funcion para entrar en la nueva página: |===============*/
/*===============| Final del archivo JavaScript del formulario de productos |===============*/