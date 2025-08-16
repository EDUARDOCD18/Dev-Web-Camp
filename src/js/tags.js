(function () {
  const tagsInput = document.querySelector("#tags_input");

  if (tagsInput) {
    const tagsDiv = document.querySelector("#tags");
    const tagsInputHidden = document.querySelector('[name="tags"]');

    let tags = [];

    /* Recuperar del input oculto */
    if (tagsInputHidden.value !== "") {
      tags = tagsInputHidden.value.split(",");
      mosrtrarTags()
    }

    /* Escuchar los cambios en el input */
    tagsInput.addEventListener("keypress", guardarTag);

    /* FUNCIÓN PARA GUARDAR LAS ETIQUETAS */
    function guardarTag(e) {
      // Al precionar la coma (,), pasará esto:
      if (e.keyCode === 44) {
        // Evita dejar espacios en blanco
        if (e.target.value.trim() === "" || e.target.value < 1) {
          return;
        }

        e.preventDefault(); // Previene la acción por defecto

        tags = [...tags, e.target.value.trim()]; // Agrega el tag al arreglo

        tagsInput.value = ""; // Limpia la entrada
        /* console.log(tags); */

        mosrtrarTags();
      }
    }

    /* FUNCIÓN PARA MOSTRAR LAS ETIQUETAS EN PANTALLA */
    function mosrtrarTags() {
      tagsDiv.textContent = "";

      tags.forEach((tag) => {
        const etiqueta = document.createElement("LI");
        etiqueta.classList.add("formulario__tag");
        etiqueta.textContent = tag;
        etiqueta.ondblclick = eliminarTag;
        tagsDiv.appendChild(etiqueta);
      });

      actualizarInputHidden();
    }

    /* FUNCIÓN PARA ELIMINAR LA ETIQUETA */
    function eliminarTag(e) {
      e.target.remove(); // Elimina el elemento de la pantalla

      tags = tags.filter((tag) => tag !== e.target.textContent); // Elimina el elemento del arreglo
    }

    /* FUNCIÓN PARA ACTUALIZAR EL CAMPO OCULTO */
    function actualizarInputHidden() {
      tagsInputHidden.value = tags.toString();
    }
  }
})();
