<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <p>
    Tipo de inmueble:<br>
    <select name="tipoInmueble" id="tipoInmueble">
      <option value="1">Bodega</option>
      <option value="2">Casa</option>
      <option value="3">Cuarto</option>
      <option value="4">Departamento</option>
      <option value="5">Edificio</option>
      <option value="6">Local</option>
      <option value="7">Oficina</option>
      <option value="8">Terreno</option>
      <option value="9">Rancho y granja</option>
    </select>
  </p>
  <p>Operaci&oacute;n del inmueble:<br />
    <select name="operacionInmueble" id="operacionInmueble">
      <option value="1">Venta</option>
      <option value="2">Renta</option>
        </select>
  </p>
  <p>Valor entre:
    <input type="text" name="valInicial" id="valInicial" /> 
    y 
    <input type="text" name="valFinal" id="valFinal" />
  pesos</p>
  <p>Descripci&oacute;n:<br>
    <textarea onkeyup="javascript:form1.car.value=200-form1.descripcion.value.length;" name="descripcion" id="descripcion" cols="40" rows="4"></textarea>
    <br />
  Caracteres restantes <input style="border:none;" type="text" value="200" name="car" id="car" />
  </p>
  <p>
    <input type="submit" name="Guardar solicitud" id="Guardar solicitud" value="Guardar solicitud">
  </p>
</form>


