<template src="./html/listSchoolYear.html"></template>
<script>
import modalSchoolYear from './crudSchoolYear.vue';
export default {
    name:"school-year",
    methods:{
        fetchSchoolYears(){
            this.$http.get('catalog/schoolyear?'+'access_token='+window.access_token, this.editPerson)
                .then(response => {
                    this.schoolYears = response.body;
                })
                .catch(error => {                    
                
                });
        },
        showModalAddSchoolYear(schoolYear){
            this.schoolYear = {}
        },
        showModalEditSchoolYear(schoolYear){
            this.schoolYear = Object.assign({}, this.schoolYear, schoolYear);
        }
    },
    data(){
        return {
            schoolYears:[],
            schoolYear:''
        }
    },
    mounted(){
        this.fetchSchoolYears();
    },
    components:{
        modalSchoolYear
    }
}
</script>
