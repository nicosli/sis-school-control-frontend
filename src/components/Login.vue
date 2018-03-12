<template>
<div class="form-signin">
	<div class="alert alert-success mb-3 d-none d-xl-block" role="alert">
		<h5 class="alert-heading">Inicio de sesión</h5>
		<p>Introduzca su usuario y su contraseña para iniciar sesión en el sistema</p>
	</div>
	<div class="card border-info">
		<div class="card-body">
			<img src="/img/logo_login.png" class="mb-3" style="max-width:250px;display:block;margin:0 auto;" />
			<div class="alert alert-danger" role="alert" v-if="error">{{ error }}</div>
			<form @submit.prevent="login">
				<div class="form-group">
					<label for="user">Usuario</label>
					<input type="text" class="form-control" id="user" v-model="user" aria-describedby="userhelp" placeholder="Ingrese su usuario">
					<small id="tokenhelp" class="form-text text-muted">Compuesto por letras.</small>
				</div>
				<div class="form-group">
					<label for="apellido">Contraseña</label>
					<input type="password" class="form-control" v-model="password" id="password" placeholder="Ingrese su contraseña">
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

<script>

export default {
	name: 'Login',
	data () {
		return {
			user: 'eduApi_clientId',
			password: '3du4p100',
			error: false
		}
	},
	updated () {
		if (localStorage.token) {
			this.$router.replace(this.$route.query.redirect || '/authors')
		}
	},
	methods: {
		login () {
			this.$http({
				params:{
					grant_type:'password',
					username:'admin',
					password:'ok00'
				},
				auth: {
					username: this.user,
					password: this.password
				},
				method: 'post',
				url:'/oauth/token'
			})
			.then((resp) => {
				console.log(resp)
			}).catch((err) => {
				console.log(err)
				this.loginFailed()
			})
		},
		loginSuccessful (req) {
			if (!req.data.token) {
				this.loginFailed()
				return
			}
			this.error = false
			localStorage.token = req.data.token
			this.$router.replace(this.$route.query.redirect || '/authors')
		},
		loginFailed () {
			this.error = 'Login failed!'
			delete localStorage.token
		}
	}
}
</script>