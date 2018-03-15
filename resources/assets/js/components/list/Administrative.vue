<template>
<div>
    <h6 class="border-bottom border-gray pb-2 mb-2">Tabla de personal administrativo</h6>
    <form lpformnum="1">
        <div class="form-group">
            <label for="inputQuery"><i class="fab fa-searchengin"></i> Buscar usuario</label>
            <input type="text" class="form-control" id="inputQuery" 
            aria-describedby="emailHelp" placeholder="Ingrese una búsqueda...">
        </div>
    </form>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Celular</th>
                <th scope="col">Email</th>
                <th scope="col">Tipo</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for='(person, key) in persons' :key='key'>
                <th scope="row">{{ person.id }}</th>
                <td>{{ person.fullname }}</td>
                <td>{{ person.cellphone }}</td>
                <td>{{ person.email }}</td>
                <td>{{ person.persontype.description }}</td>
                <td>
                    <button 
                        type="button" 
                        class="btn btn-outline-primary btn-sm"
                        data-toggle="modal" 
						data-target=".bd-example-modal-lg"
						@click="showModalEdit(person)">Editar</button>
                </td>
                <td><button type="button" class="btn btn-outline-danger btn-sm">Baja</button></td>
            </tr>
        </tbody>
    </table>
    <!-- MODAL -->
    <div class="modal fade bd-example-modal-lg modalesconfig" tabindex="-1" role="dialog" 
    aria-labelledby="modalEdit" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="far fa-edit"></i>
                    Editar {{ personEdit.fullname }} 
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="firstname">Nombres</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="firstname" 
                                placeholder="Introduzca sus nombres"
                                v-model="personEdit.firstname">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lastname">Apellidos</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="lastname" 
                                placeholder="Introduzca sus apellidos"
                                v-model="personEdit.lastname">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lastname">Fecha de cumpleaños</label>
                            <datepicker 
                                v-model="personEdit.birthdate" 
                                input-class="form-control"
                                :format="dateformatpicker"
                                language="es"></datepicker>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lastname">Celular</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="cellphone" 
                                placeholder="Introduzca su celular"
                                v-model="personEdit.cellphone">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lastname">Teléfono</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="phone" 
                                placeholder="Introduzca su teléfono"
                                v-model="personEdit.phone">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lastname">email</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="email" 
                                placeholder="Introduzca su email"
                                v-model="personEdit.email">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
    </div>
</div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    export default {
        methods:{
            fetchListAdministrative(){
                this.$http.get('person/'+this.persontype+'/'+this.page+'/'+this.size,{
                    params: {
                        access_token: window.access_token
                    }
                })
                .then(response => {
                    this.persons = response.body.content;
                })
                .catch(error => {
                    console.log(error);
                });
            },
            showModalEdit(person){
                this.personEdit = person;
            },
            nextPage(){
                this.page += 1;
                this.fetchListAdministrative();
            },
            beforePage(){
                this.page -= 1;
                this.fetchListAdministrative();
            }
        },
        data(){
            return {
                persons: [],
                personEdit:'',
                page: '0',
                size: '10',
                query: '',
                dateformatpicker: 'yyyy-MM-dd'
            };
        },
        mounted() {
            this.fetchListAdministrative();
        },
        props:{
            persontype: {required:true}
        },
        components: {
            Datepicker
        }
    }
</script>