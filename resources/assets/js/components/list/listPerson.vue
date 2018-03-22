<template src="./html/template.html"></template>

<script>
    import ModalEditPerson from '../edit/editPerson.vue';
    import PulseLoader from 'vue-spinner/src/PulseLoader.vue'
    import Paginate from 'vuejs-paginate'

    export default {
        methods:{
            fetchListPerson(){
                this.pulseLoader.loading = true;
                this.$http.get('person/'+this.type+'/'+this.pagInfo.page+'/'+this.pagInfo.size,{
                    params: {
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
            showModalEdit(person){
                this.editPerson = Object.assign({}, this.editPerson, person);;
            },
            pageChanged(page){
                this.pagInfo.page = page-1;
                this.fetchListPerson();
            },
            personEdited(){
                this.fetchListPerson();
            },
            searchQuery(query){
                var vm = this;
                clearTimeout(this.timeout);
                this.timeout = setTimeout(function () {
                    console.log('Input Value:', query);
                    vm.fetchListPerson();
                }, 500);
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
                    size: 5,
                    query: '',
                    first: true,
                    last: false,
                    totalPages: 0
                },
                dateformatpicker: 'yyyy-MM-dd',
                timeout:null
            };
        },
        mounted() {
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