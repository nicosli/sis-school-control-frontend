<template>
<div>
    <h6 class="border-bottom border-gray pb-2 mb-2">Tabla de personal administrativo</h6>
    <form lpformnum="1">
        <div class="form-group">
            <label for="inputQuery"><i class="fab fa-searchengin"></i> Buscar usuario</label>
            <input type="text" class="form-control" id="inputQuery" aria-describedby="emailHelp" placeholder="Ingrese una búsqueda...">
        </div>
    </form>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Primer Nombre</th>
                <th scope="col">Apellido</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for='(person, key) in persons' :key='key'>
                <th scope="row">{{ person.id }}</th>
                <td>{{ person.firstname }}</td>
                <td>{{ person.lasname }}</td>
            </tr>
        </tbody>
    </table>
</div>
</template>

<script>
    export default {
        methods:{
            fetchListAdministrative(){
                this.$http.get('person/1/'+this.page+'/'+this.size,{
                    params: {
                        access_token: window.access_token
                    }
                })
                .then(response => {
                    console.log(response)
                });
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
                page: '0',
                size: '10',
                query: ''
            };
        },
        mounted() {
            this.fetchListAdministrative();
        }
    }
</script>