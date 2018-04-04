<template src="./html/listPerson.html"></template>

<script>
    import ModalEditPerson from './editPerson.vue';
    import PulseLoader from 'vue-spinner/src/PulseLoader.vue';
    import Paginate from 'vuejs-paginate';

    export default {
        methods:{
            orderTable(field){
                this.sort.field = field;
                this.sort.direction = (this.sort.direction=='ASC')? 'DESC' : 'ASC';
                this.fetchListPerson();
            },
            fetchListPerson(){
                this.pulseLoader.loading = true;
                this.$http.get('person/'+this.code+'/'+this.pagInfo.page+'/'+this.pagInfo.size,{
                    params: {
                        query:          this.query,
                        field:          this.sort.field,
                        direction:      this.sort.direction,
                        access_token:   window.access_token
                    }
                })
                .then(response => {
                    this.persons = response.body.content;
                    this.pagInfo.totalElements = response.body.totalElements;
                    if(response.status == 204){
                        this.pagInfo.totalElements = 0;
                    }else{
                        this.pagInfo.first = response.body.first;
                        this.pagInfo.last = response.body.last;
                        this.pagInfo.totalPages = response.body.totalPages;
                        this.pagInfo.number = response.body.number;
                        this.pagInfo.totalElements = response.body.totalElements;
                        this.pagInfo.sort = response.body.sort[0];
                    }
                    this.pulseLoader.loading = false;
                })
                .catch(error => {                    
                    
                });
            },
            deletePerson(id){
                this.$http.delete('person/'+id,{
                    params: {
                        access_token: window.access_token
                    }
                })
                .then(response => {
                    this.fetchListPerson();
                    swal("Hecho!", "El usuario ha sido eliminado exitosamente", "success");
                })
                .catch(error => {
                    new Noty({
                        type:'error',
                        text: 'Algo salió mal'
                    }).show();
                });
            },
            showModalEdit(person, key){
                this.editPerson = Object.assign({}, this.editPerson, person);
                this.editingPerson_id = person.id;
                this.key = key;
            },
            pageChanged(page){
                this.pagInfo.page = page-1;
                this.fetchListPerson();
            },
            personEdited(editPerson){
                this.persons[this.key] = editPerson;
                this.key = '';
                new Noty({
                    type:'success',
                    text: 'El usuario ha sido editado exitosamente'
                }).show();
            },
            modalClosed(){
                this.editingPerson_id = '';
            },
            searchQuery(query){
                var vm = this;
                clearTimeout(this.timeout);
                this.timeout = setTimeout(function () {
                    vm.query = query;
                    vm.pagInfo.page = 0;
                    vm.fetchListPerson();
                }, 500);
            },
            confirmDelete(person){
                this.el = document.createElement("div");
                this.el.innerHTML = "Eliminar a <span class='spDel'>"+person.fullname+"</span>";
                swal({
                    title: "¿Estás seguro?",
                    text: "Una vez eliminado, no podrás recuperar este usuario!",
                    content: this.el,
                    //icon: "warning",
                    //buttons: true,
                    dangerMode: true,
                    buttons:{
                        cancel: {
                            text: "Cancelar",
                            closeModal: true,
                            visible: true
                        },
                        confirm:{
                            text: "Eliminar",
                            closeModal: false
                        },
                    },
                })
                .then((willDelete) => {
                    if (willDelete) {
                        this.deletePerson(person.id);
                    }
                });
            }
        },
        data(){
            return {
                persons: [],
                pulseLoader:{
                    color:'#7b7b7b',
                    size:'15px',
                    loading:true
                },
                editPerson:'',
                pagInfo:{
                    totalElements: -1,
                    page: 0,
                    size: 7,
                    query: '',
                    first: true,
                    last: false,
                    totalPages: 0,
                    sort:''
                },
                dateformatpicker: 'yyyy-MM-dd',
                timeout:null,
                el:'',
                me_id:'',
                sort: {
                    field:'id',
                    direction:'ASC'
                },
                editingPerson_id:'',
                editedPerson_id:'',
                key:''
            };
        },
        mounted() {
            this.me_id = window.me_id;
            this.fetchListPerson();
            var timeout = null;
        },
        props:{
            code: {required:true}
        },
        components: {
            ModalEditPerson,
            PulseLoader,
            Paginate
        },
        watch: {
            buttonDisabled: function(){
                
            }
        }
    }
</script>

<style>
.swal-footer {
    background-color: rgb(245, 248, 250);
    margin-top: 32px;
    border-top: 1px solid #E9EEF1;
    overflow: hidden;
}
.swal-title:not(:last-child){
    margin-bottom: 6px;
}
.swal-content{
    margin-top:6px;
}
.spDel{
    color: #C00;
}
.edited {
    background-color: #FFF;
    -webkit-transition: background-color 2000ms linear;
    -ms-transition: background-color 2000ms linear;
    transition: background-color 2000ms linear;
}
</style>