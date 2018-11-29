<!-- -------------------Solicitante 1------------------------->
<div style="padding: 1%">
    <h6>Datos del solicitante Responsable</h6>
    <hr align="left" size="2" width="80%"> </hr>
</div>
<div class="flex-container">
    <div class="form-group flex-container">
        <div>
            <label for="validation01">Nombres</label>
            <input type="text" class="form-control is-valid" id="validation01" mame="nombreR" placeholder="Juan Jose" value="" required>
            <?php
                $validador->mostrarErrorNombreR();
            ?>
        </div>
        <div>
            <label for="validation01">Apellidos</label>
            <input type="text" class="form-control is-valid" id="validation01" name="apellidoR" placeholder="Perez Hernandez" value="" required>
            <?php
                $validador->mostrarErrorApellidoR();
            ?>
        </div>
        <div>
            <label for="validation01">Codigo</label>
            <input type="text" class="form-control is-valid" id="validation01" name="codigoR" placeholder="12345" value="" required>
            <?php
                $validador->mostrarErrorCodigoR();
            ?>
        </div>
        <div>
            <label for="validation01">Puesto</label>
            <br>
            <select class="btn btn-default " >
                <option>Coordinador</option>
                <option>Profesor</option>
                <option>Administrativo</option>
            </select>
        </div>
    </div>
</div>
<!-- -------------------Solicitante 2------------------------->
<div style="padding: 1%">
    <h6 >Datos del Alumno Solicitante</h6>
    <hr align="left" size="2" width="80%"> </hr>
</div>
<div class="flex-container">
    <div class="form-group flex-container">
        <div>
            <label for="validation01">Nombres</label>
            <input type="text" class="form-control is-valid" id="validation01" name="nombreS"placeholder="Carlos" value="" required>
            <?php
                $validador->mostrarErrorNombreS();
            ?>
        </div>
        <div>
            <label for="validation01">Apellidos</label>
            <input type="text" class="form-control is-valid" id="validation01" name="apellidoS" placeholder="Lopez" value="" required>
            <?php
                $validador->mostrarErrorApellidoS();
            ?>
        </div>
        <div>
            <label for="validation01">Codigo</label>
            <input type="text" class="form-control is-valid" id="validation01" name="codigoS" placeholder="Palacios" value="" required>
            <?php
                $validador->mostrarErrorCodigoS();
            ?>
        </div>
        <div>
            <label for="validation01">Carrera</label>
            <br>
            <select class="btn btn-default " >
                <option>INCO</option>
                <option>INCE</option>
                <option>INFO</option>
            </select>
        </div>
    </div>
</div>
<!-- -------------------Seleccion de Archivo------------------------->
<div style="padding: 1%">
    <h6>Cartas de Validacion de Evento</h6>
    <hr align="left" size="2" width="80%"> </hr>
    <div>
        <div class="form-group">
            <input id="file-1" type="file" class="file" multiple=true data-preview-file-type="any">
        </div>
    </div>
</div>
<!-- -------------------Envio y Reinicio de Formulario------------------------->
<div class="form-group">
    <button class="btn btn-primary" type="submit" name="enviar">Submit</button>
    <button class="btn btn-default" type="reset">Reset</button>
</div>
