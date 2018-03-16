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
						data-target=".modalEdit"
						@click="showModalEdit(person)">Editar</button>
                </td>
                <td><button type="button" class="btn btn-outline-danger btn-sm">Baja</button></td>
            </tr>
        </tbody>
    </table>
    <!-- MODAL -->
    <ModalEditPerson :personEdit="personEdit"></ModalEditPerson>
</div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    import ModalEditPerson from '../edit/Person.vue';
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
            Datepicker,
            ModalEditPerson
        }
    }
</script>