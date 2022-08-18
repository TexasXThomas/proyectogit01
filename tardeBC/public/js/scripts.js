function Recarga(id, nombre, codigo, descripcion, precio, fecha, url) {
  let Parametros = { ID: id, nombre: nombre };

  $.ajax({
    data: parametros,
    url: "recargas.php",
    type: post,
    beforeSend: function () {
      $("#Agregar").php("Estamos Procesando, por favor espere.");
    },
    success: function (response) {
      $("#Agregar").php(response);
    },
  });
}
