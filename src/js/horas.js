(function () {
  const horas = document.querySelector("#horas");

  if (horas) {
    let busqueda = {
      categoria_id: "",
      dia: "",
    };

    const categoria = document.querySelector("[name=categoria_id");
    const dia = document.querySelectorAll('[name="dia"]');
    const inputHiddenDia = document.querySelector('[name="dia_id"]');
    const inputHiddenHora = document.querySelector('[name="hora_id"]');
    // console.log(dias);

    categoria.addEventListener("change", terminoBusqueda);
    dia.forEach((dia) => addEventListener("change", terminoBusqueda));

    function terminoBusqueda(e) {
      busqueda[e.target.name] = e.target.value;
      // console.log(Object.values(busqueda));

      if (Object.values(busqueda).includes("")) {
        return;
      }

      buscarEventos();
    }

    /* Buscar los eventos */
    async function buscarEventos() {
      // console.log(busqueda);
      const { dia, categoria_id } = busqueda;
      const url = `/api/eventos-horario?dia_id=${dia}&categoria_id=${categoria_id}`;
      const resultado = await fetch(url);
      // console.log(resultado);
      const eventos = await resultado.json();
      //console.log(url);
      // console.log(eventos);

      obtenerHorasDisponibles();
    }

    // Obtener las horas disponibles
    function obtenerHorasDisponibles() {
      const horasDisponibles = document.querySelectorAll("#horas li");

      horasDisponibles.forEach((hora) =>
        hora.addEventListener("click", seleccionarHora)
      );
    }

    // Obtener la hora seleccionada
    function seleccionarHora(e) {
        inputHiddenHora.value = e.target.dataset.horaId;
      console.log(inputHiddenHora);
    }
  }
})();
