(function () {
  const ponentesInput = document.querySelector("#ponentes");

  if (ponentesInput) {
    let ponentes = [];
    let ponentesFiltrados = [];
    const listadoPonentes = document.querySelector("#listado-ponentes");

    obtenerPonentes();

    ponentesInput.addEventListener("input", buscarPonentes);

    async function obtenerPonentes() {
      const url = `/api/ponentes`;
      const respuesta = await fetch(url);
      const resultado = await respuesta.json();

      formatearPonentes(resultado);
      // console.log(ponentes);
    }

    function formatearPonentes(arrayPonentes = []) {
      ponentes = arrayPonentes.map((ponente) => {
        return {
          nombre: `${ponente.nombre.trim()} ${ponente.apellido.trim()}`,
          id: ponente.id,
        };
      });

      // console.log(ponentes);
    }

    function buscarPonentes(e) {
      const busqueda = e.target.value;

      if (busqueda.length > 3) {
        const expresion = new RegExp(busqueda, "i");
        ponentesFiltrados = ponentes.filter((ponente) => {
          if (ponente.nombre.toLowerCase().search(expresion) != -1) {
            return ponente;
          }
        });
        // console.log(ponentesFiltrados);
      } else {
        ponentesFiltrados = [];
      }
      mostrarPonentes();
    }

    function mostrarPonentes() {
      while (listadoPonentes.firstChild) {
        listadoPonentes.removeChild(listadoPonentes.firstChild);
      }

      if (ponentesFiltrados.length > 0) {
        ponentesFiltrados.forEach((ponente) => {
          const ponenteHTML = document.createElement("LI");
          ponenteHTML.classList.add("listado-ponentes__ponente");
          ponenteHTML.textContent = ponente.nombre;
          ponenteHTML.dataset.ponenteId = ponente.id;

          // Añadir al DOM
          listadoPonentes.appendChild(ponenteHTML);
        });
      } else {
        const noResultado = document.createElement("p");
        noResultado.classList.add("listado-ponentes__no-resultado");
        noResultado.textContent = "No hay resultados para tu búsqueda";

        listadoPonentes.appendChild(noResultado);
      }
    }
  }
})();
