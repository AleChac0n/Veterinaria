/*===============| Inicio del archivo JavaScript del formulario de productos |===============*/

/*===============| Número de página #1, para poder colocar por defecto la lista de los productos: |===============*/
let pagina = 1;


/*===============| Conjunto de constantes de los datos para el apartado de productos: |===============*/
const Datos_Producto = {
    id: '',
    nombre: '',
    descripcion: '',
    cantidades: '',
    nombreComp: '',
    direccion: '',
    telefono: '',
    fecha: '',
    temaI: []
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

    //Nombre de la función del id del producto:
    Nuevo_Id_Producto();

    //Nombre de la función del nombre del producto:
    Nuevo_Nombre_Producto();

    //Nombre de la función con respecto a la descripción del producto:
    Nuevo_Descripcion_Producto();

    //Nombre de la función de la cantidad del producto:
    Cantidad_Producto_Dos();

    //Nombre de la función de la fecha del producto:
    Fecha();

    //Nombre de la función del nombre del comprador:
    Nombre_Comprador_Nuevo();

    //Nombre de la función con respecto a la dirección del comprador:
    Direccion_Comprador_Nuevo();

    //Nombre de la función de la teléfono del comprador:
    Telefono_Comprador_Nuevo();
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
        const resultado = await fetch('./json/Prueba_Imagen.json');
        const db = await resultado.json();

        const { temas } = db;

        //Proceso para poder generar el HTML de la página:
        temas.forEach(temaI => {
            const { id, imagen } = temaI;


            //Proceso para poder generar la imagen del tema, con respecto a la página:
            const imagenTema = document.createElement('IMG');
            imagenTema.src = `${imagen}`;
            imagenTema.classList.add('imagen-tema');

            //Proceso para poder generar el contenedor div del tema, con respecto a la página:
            const temaDiv = document.createElement('DIV');
            temaDiv.classList.add('tema');
            temaDiv.dataset.idtema = id;

            //Proceso para poder inyectar dentro del div, tema y la imagen de la página:
            temaDiv.appendChild(imagenTema);

            //Proceso para poder inyectarlo al HTML de la página:
            document.querySelector('#temas').appendChild(temaDiv);
        });

    } catch (error) {
        console.log(error);
    }
}

/*===============| Función para poder agregar los temas para los productos: |===============*/
function agregarTema(temaObj) {
    const { temas } = Datos_Producto;
    Datos_Producto.temaI = [...temas, temaObj];
}


/*===============| Función para poder eliminar los temas para los productos: |===============*/
function eliminarTema(id) {
    const { temas } = Datos_Producto;

    Datos_Producto.temaI = temas.filter(tema => tema.id != id);
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
    const { id, nombre, descripcion, cantidades, nombreComp, direccion, telefono, fecha } = Datos_Producto;

    //Seleccionar el resumen de los productos:
    const resumenDiv = document.querySelector('.contenido-resumen');

    //Limpia el HTML previa:
    while (resumenDiv.firstChild) {
        resumenDiv.removeChild(resumenDiv.firstChild);
    }

    //Proceso para poder validar la información correctamente:
    if (Object.values(Datos_Producto).includes('')) {
        const notemas = document.createElement('P');
        notemas.textContent = 'Faltan los datos de id, nombre, descripción, cantidad y fecha';

        notemas.classList.add('invalidar-productos');

        //Agregamos el resumen div para que pueda funcionar correctamente la validación:
        resumenDiv.appendChild(notemas);

        return;
    }

    const headingProductos = document.createElement('H3');
    headingProductos.textContent = 'Resumen de la factura de los productos';

    //Proceso para poder mostrar el contenido de los productos:
    const idProductos = document.createElement('P');
    idProductos.innerHTML = `<span>=> Id del producto:</span> ${id}`;

    const nombreProductos = document.createElement('P');
    nombreProductos.innerHTML = `<span>=> Nombre del producto:</span> ${nombre}`;

    const descripcionProductos = document.createElement('P');
    descripcionProductos.innerHTML = `<span>=> Descripción del producto:</span> ${descripcion}`;

    const cantidadProductos = document.createElement('P');
    cantidadProductos.innerHTML = `<span>=> Cantidad actualizada del producto:</span> ${cantidades}`;

    const nombreCompradores = document.createElement('P');
    nombreCompradores.innerHTML = `<span>=> Nombre del comprador:</span> ${nombreComp}`;

    const direccionCompradores = document.createElement('P');
    direccionCompradores.innerHTML = `<span>=> Dirección del comprador:</span> ${direccion}`;

    const telefonoCompradores = document.createElement('P');
    telefonoCompradores.innerHTML = `<span>=> Teléfono del comprador:</span> ${telefono}`;

    const fecha_de_Productos = document.createElement('P');
    fecha_de_Productos.innerHTML = `<span>=> Fecha del comprador:</span> ${fecha}`;


    resumenDiv.appendChild(headingProductos);
    resumenDiv.appendChild(idProductos);
    resumenDiv.appendChild(nombreProductos);
    resumenDiv.appendChild(descripcionProductos);
    resumenDiv.appendChild(cantidadProductos);
    resumenDiv.appendChild(nombreCompradores);
    resumenDiv.appendChild(direccionCompradores);
    resumenDiv.appendChild(telefonoCompradores);
    resumenDiv.appendChild(fecha_de_Productos);
}

/*===============| Fin de las funciones primordiales para la página |===============*/



/*===============| Inicio de las funciones para los datos de productos: |===============*/

/*==============================| Funciones para validar los campos respectivos del formulario: |==============================*/

/*Función para los id's de los productos*/
function Nuevo_Id_Producto() {
    const Id_Input = document.querySelector('#id');

    Id_Input.addEventListener('input', e => {

        const Id_Obtener_Texto = e.target.value.trim();

        //Proceso para poder validar el id del producto:
        if (Id_Obtener_Texto === '' || Id_Obtener_Texto.length > 4) {
            Alerta_Productos('El id del producto no es valido, intente con otro dato por favor.', 'error');

        } else {
            const Alerta = document.querySelector('.alerta');
            if (Alerta) {
                Alerta.remove();
            }
            Datos_Producto.id = Id_Obtener_Texto;
        }
    })
}


/*===============| Función para los nombres de los productos: |===============*/
function Nuevo_Nombre_Producto() {
    const Nombre_Input = document.querySelector('#nombreP');

    Nombre_Input.addEventListener('input', e => {

        const Nombre_Obtener_Texto = e.target.value.trim();

        //Proceso para poder validar el nombre del producto:
        if (Nombre_Obtener_Texto === '' || Nombre_Obtener_Texto.length > 18) {
            Alerta_Productos('El nombre del producto no es valido, intente con otro dato por favor.', 'error');

        } else {
            const Alerta = document.querySelector('.alerta');

            if (Alerta) {
                Alerta.remove();
            }
            Datos_Producto.nombre = Nombre_Obtener_Texto;
        }
    })
}


/*===============| Función para las descripciones de los productos: |===============*/
function Nuevo_Descripcion_Producto() {
    const Descripcion_Input = document.querySelector('#descripcion');

    Descripcion_Input.addEventListener('input', e => {

        const Descripcion_Obtener_Texto = e.target.value.trim();

        //Proceso para poder validar la descripción del producto:
        if (Descripcion_Obtener_Texto === '' || Descripcion_Obtener_Texto.length > 150) {
            Alerta_Productos('La descripción del producto no es valido, intente con otro dato por favor.', 'error');

        } else {
            const Alerta = document.querySelector('.alerta');
            if (Alerta) {
                Alerta.remove();
            }
            Datos_Producto.descripcion = Descripcion_Obtener_Texto;
        }
    })
}

/*===============| Función para los nombres del comprador: |===============*/
function Nombre_Comprador_Nuevo() {
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
            Datos_Producto.nombreComp = Nombre_Obtener_Texto;
        }
    })
}


/*===============| Función para la dirección del comprador: |===============*/
function Direccion_Comprador_Nuevo() {
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
            Datos_Producto.direccion = Direccion_Obtener_Texto;
        }
    })
}


/*===============| Función para las cantidades de los productos: |===============*/
function Telefono_Comprador_Nuevo() {
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
            Datos_Producto.telefono = Telefono_obtener_Texto;
        }
    })
}


/*===============| Función para las cantidades de los productos: |===============*/
function Datos_Enviados() {
    const Datos_Enviados = document.getElementById("cantidad").value;
    Cantidad_Producto_Dos(Datos_Enviados);
}

function Cantidad_Producto_Dos(Dato) {
    const Cantidad_Input = Dato;
    /*El alert es solo para ver si trae el dato (solo para probar):
    alert(Cantidad_Input);*/
    Datos_Producto.cantidades = Cantidad_Input;
}

/*===============| Función para las fechas de los productos: |===============*/
function Fecha() {

    const Fecha_Input = document.querySelector('#fecha');

    Fecha_Input.addEventListener('input', e => {

        const Dia_De_La_Fecha = new Date(e.target.value).getUTCDay();

        //Proceso para poder validar la fecha del producto:
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
        Datos_Producto.fecha = Fecha_Input.value;
    })
}

/*=============| Final de las funciones para los datos de productos: |===============*/



/*===============| Inicio de la funcion para poder generar alertas para los datos de productos: |===============*/

/*Función para dar una alerta ante un posible error sobre los campos de los productos.
Esto sirve muchisimo para el proceso de verificación.*/
function Alerta_Productos(mensaje, tipo) {

    //Si hay una alerta previa anteriormente, entonces no crea otra alerta:
    Alerta_Preventiva = document.querySelector('.alerta');
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
/*===============| Final del archivo JavaScript del formulario de productos |===============*/