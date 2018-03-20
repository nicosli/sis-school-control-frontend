<template src="./html/template.html"></template>

<script>
    import Datepicker from 'vuejs-datepicker';
    import ModalEditPerson from '../edit/editPerson.vue';
    import PulseLoader from 'vue-spinner/src/PulseLoader.vue'
    export default {
        methods:{
            fetchListAdministrative(){
                this.pulseLoader.loading = true;
                this.$http.get('person/'+this.type+'/'+this.page+'/'+this.size,{
                    params: {
                        access_token: window.access_token
                    }
                })
                .then(response => {
                    this.persons = response.body.content;
                    this.totalElements = response.body.totalElements;
                    if(response.status == 204)
                        this.totalElements = 0;
                    this.pulseLoader.loading = false;
                })
                .catch(error => {
                    console.log(error);
                });
            },
            showModalEdit(person){
                this.editPerson = Object.assign({}, this.editPerson, person);;
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
                totalElements: -1,
                pulseLoader:{
                    color:'#7b7b7b',
                    size:'15px',
                    loading:true
                },
                editPerson:'',
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
            type: {required:true}
        },
        components: {
            Datepicker,
            ModalEditPerson,
            PulseLoader
        }
    }
</script>