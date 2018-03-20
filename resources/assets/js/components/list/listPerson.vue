<template src="./html/template.html"></template>

<script>
    import Datepicker from 'vuejs-datepicker';
    import ModalEditPerson from '../edit/editPerson.vue';
    export default {
        methods:{
            fetchListAdministrative(){
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
                totalElements: 0,
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
            ModalEditPerson
        }
    }
</script>