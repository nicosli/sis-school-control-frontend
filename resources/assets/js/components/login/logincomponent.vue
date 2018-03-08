<template>
<div class="form-signin">
    <div class="alert alert-success mb-3" role="alert">
        <h5 class="alert-heading">Inicio de sesión</h5>
        <p>Introduzca su usuario y su contraseña para iniciar sesión en el sistema</p>
    </div>
    <div class="card border-info">
        <div class="card-body">
            <img src="/img/logo_login.png" class="mb-3" style="max-width:250px;display:block;margin:0 auto;" />
            <form>
            <div class="form-group">
            <label for="token_id">Usuario</label>
            <input type="text" class="form-control" id="token_id" aria-describedby="tokenhelp" placeholder="Ingrese usuario">
            <small id="tokenhelp" class="form-text text-muted">Compuesto por letras.</small>
            </div>
            <div class="form-group">
            <label for="apellido">Contraseña</label>
            <input type="password" class="form-control" id="apellido" placeholder="Ingrese su contraseña">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Entrar al sistema</button>
            </form>
        </div>
    </div>
    <a href="/" class="badge badge-light mt-2"><i class="fas fa-chevron-left"></i> Regresar</a>
    <h4 class="text-center text-secondary">
        <i class="fas fa-university"></i>
        <i class="fas fa-users"></i>
        <i class="fas fa-eraser"></i>
        <i class="fas fa-graduation-cap"></i>
        <i class="fas fa-globe"></i>
    </h4>
</div>
</template>