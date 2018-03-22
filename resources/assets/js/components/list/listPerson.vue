<template src="./html/template.html"></template>

<script>
    import ModalEditPerson from '../edit/editPerson.vue';
    import PulseLoader from 'vue-spinner/src/PulseLoader.vue';
    import Paginate from 'vuejs-paginate';

    export default {
        methods:{
            fetchListPerson(){
                this.pulseLoader.loading = true;
                this.$http.get('person/'+this.type+'/'+this.pagInfo.page+'/'+this.pagInfo.size,{
                    params: {
                        query: this.query,
                        access_token: window.access_token
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
            showModalEdit(person){
                this.editPerson = Object.assign({}, this.editPerson, person);;
            },
            pageChanged(page){
                this.pagInfo.page = page-1;
                this.fetchListPerson();
            },
            personEdited(){
                this.fetchListPerson();
                new Noty({
                    type:'success',
                    text: 'El usuario ha sido editado exitosamente'
                }).show();
            },
            searchQuery(query){
                var vm = this;
                clearTimeout(this.timeout);
                this.timeout = setTimeout(function () {
                    vm.query = query;
                    console.log('Input Value:', vm.query);
                    vm.fetchListPerson();
                }, 500);
            },
            confirmDelete(person){
                this.el = document.createElement("div");
                this.el.innerHTML = "Usuario: <span class='spDel'>"+person.fullname+"</span>";
                swal({
                    title: "¿Estás seguro?",
                    text: "Una vez eliminado, no podrás recuperar este usuario!",
                    content: this.el,
                    //icon: "warning",
                    buttons: true,
                    dangerMode: true,
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
                    totalPages: 0
                },
                dateformatpicker: 'yyyy-MM-dd',
                timeout:null,
                el:'',
                quert:'',
                me_id:''
            };
        },
        mounted() {
            this.me_id = window.me_id;
            this.fetchListPerson();
            var timeout = null;
            $('#inputQuery').on('keyup', function () {
                console.log("keyup");
                var that = this; 
            });
        },
        props:{
            type: {required:true}
        },
        components: {
            ModalEditPerson,
            PulseLoader,
            Paginate
        },
        watch: {
            buttonDisabled: function(){
                console.log("cambio");
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
</style>