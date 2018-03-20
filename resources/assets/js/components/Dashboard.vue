<template>
<div>
    <div class="row">
        <div class="col-xl-3 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <p class="font-weight-bold d-inline" data-toggle="tooltip" data-placement="top" title="Acriss: SFAR">
                        {{me.firstname}}
                    </p>
                    <div class="clearfix mb-3"></div>
                    <div class="lineAuto"></div>
                    <img 
                        :src="'/img/avatars/'+me.imgpath+'.png'" 
                        class="mx-auto d-block mb-3 mt-3">
                    <h5 class="mb-1" v-if="me != ''">
                        <span class="badge badge-primary font-weight-normal pb-1">{{me.persontype.description}}</span>
                    </h5>
                    <a href="#editar"
                        class="badge badge-light"
                        data-toggle="modal" 
                        data-target=".modalEdit"
                        @click="showModalEdit(me)"><i class="far fa-edit"></i> Editar mi perfil</a>
                </div>
            </div>
        </div>
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL -->
    <ModalEditPerson :editPerson="editPerson"></ModalEditPerson>
</div>
</template>
<script>
    import ModalEditPerson from './edit/editPerson.vue';
    export default {
        methods:{
            fetchMe(){
                this.$http.get('person/me/',{
                    params: {
                        access_token: window.access_token
                    }
                })
                .then(response => {
                    this.me = response.body;
                })
                .catch(error => {
                    
                });
            },
            showModalEdit(person){
                this.editPerson = Object.assign({}, this.editPerson, person);
            }
        },
        data(){
            return {
                me: '',
                editPerson: ''
            };
        },
        mounted() {
            this.fetchMe();
        },
        components: {
            ModalEditPerson
        }
    }
</script>