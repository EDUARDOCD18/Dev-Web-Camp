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
      // console.log(url);
      // console.log(eventos);

      obtenerHorasDisponibles(eventos);
    }

    // Obtener las horas disponibles
    function obtenerHorasDisponibles(eventos) {
      // Comprobar eventos ya tomados, y quitar la variable de deshabilitado
      const horasTomadas = eventos.map((evento) => evento.hora_id);

      const listadoHoras = document.querySelectorAll("#horas li");
      const listadoHorasArray = Array.from(listadoHoras);

      const resultado = listadoHorasArray.filter(
        (li) => !horasTomadas.includes(li.dataset.horaId)
      );

      resultado.forEach((li) =>
        li.classList.remove("horas__hora--deshabilitada")
      );

      const horasDisponibles = document.querySelectorAll("#horas li:not(.horas__hora--deshabilitada");

      horasDisponibles.forEach((hora) =>
        hora.addEventListener("click", seleccionarHora)
      );
    }

    // Obtener la hora seleccionada
    function seleccionarHora(e) {
      //Deshabilitar la hora seleccionada
      const horaPrevia = document.querySelector(".horas__hora--seleccionada");

      if (horaPrevia) {
        horaPrevia.classList.remove("horas__hora--seleccionada");
      }

      // Agregar la clase de seleccionado
      e.target.classList.add("horas__hora--seleccionada");

      inputHiddenHora.value = e.target.dataset.horaId;
      // console.log(inputHiddenHora);
    }
  }
})();
