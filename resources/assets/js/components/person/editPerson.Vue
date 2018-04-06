<template src="./html/editPerson.html"></template>
<script>
    import flatPickr from 'vue-flatpickr-component';
    import 'flatpickr/dist/flatpickr.css';
    import 'flatpickr/dist/themes/material_blue.css';
    import {Spanish} from 'flatpickr/dist/l10n/es';
    import Autocomplete from 'vuejs-auto-complete'

    export default {
        name: 'ModalEditPerson',
        methods:{
            fetchMaritalStatus(){
                this.$http.get('catalog/maritalstatus?'+'access_token='+window.access_token, this.editPerson)
                .then(response => {
                    this.maritalStatusArray = response.body;
                    this.maritalstatus = this.editPerson.maritalstatus.id;
                })
                .catch(error => {                    
                
                });
            },
            fetchRelationshipType(){
                this.$http.get('catalog/relationshipType?'+'access_token='+window.access_token, this.editPerson)
                .then(response => {
                    this.relationshipTypeArray = response.body;                    
                })
                .catch(error => {                    
                
                });
            },
            updatePerson(){
                this.modalError = false;
                this.buttonDisabled = true;
                this.editPerson.fullname = this.editPerson.firstname + ' ' + this.editPerson.lastname;

                if("id" in this.editPerson){  // PARA HACER UN UPDATE EL ID DEBE EXISTIR
                    this.$http.put('person/?'+'access_token='+window.access_token, this.editPerson)
                        .then(response => {
                            $('.modalConfigEvents').modal('hide');
                            this.buttonDisabled = false;
                            this.$emit('personEdited', this.editPerson);
                        })
                        .catch(error => {                    
                            this.modalError = true;
                            this.buttonDisabled = false;
                            this.errorMessage = error.body.message;
                        });
                }else{
                    this.$http.post('person/?'+'access_token='+window.access_token, this.editPerson)
                        .then(response => {
                            $('.modalConfigEvents').modal('hide');
                            this.buttonDisabled = false;
                            this.$emit('personEdited', this.editPerson);
                        })
                        .catch(error => {                    
                            this.modalError = true;
                            this.buttonDisabled = false;
                            this.errorMessage = error.body.message;                            
                        });
                }
                
            },
            checkSession: function(){
                if(parseFloat(window.timestamp_token) <= Math.floor(Date.now() / 1000)){
                    window.location.href = '/';
                }
            },
            editAvatarClick: function(){
                this.showEditPerson = !this.showEditPerson;
            },
            selectAvatarClick: function(sel){
                this.editPerson.imgpath = sel;
            },
            searchQueryCP(query){
                this.$http.get('address/?query='+query+'&access_token='+window.access_token, this.editPerson)
                .then(response => {
                    this.cps = response.body;                    
                })
                .catch(error => {                    
                    
                });
            },
            searchCP(query){
                var vm = this;
                clearTimeout(this.timeout);
                this.timeout = setTimeout(function () {
                    vm.query = query;
                    vm.searchQueryCP(query);
                }, 500);
            },
            onChangeMaritalStatus(){
                console.log(this.selected);
            },
            formattedDisplay (result) {
                return result.colonia + ', ' + result.ciudad + ' ' + result.estado + ', ' + result.zipcode
            },
            formattedDisplayPerson (result) {
                return result.fullname;
            },
            addAddressSelected(result){
                this.cps = result;
                this.editPerson.address= {
                    township:{
                        id: result.value,
                        description: result.selectedObject.colonia,
                        zipcode: result.selectedObject.zipcode,
                        city:{
                            name: result.selectedObject.ciudad,
                            state: {
                                name: result.selectedObject.estado
                            }
                        }
                    },
                    status: "A"
                }
                
            },
            familySelected(result){
                this.familyPersonSelected = result;
            },
            addFamily(){
                if(this.$refs.autocompletePerson.isEmpty == false){
                    this.familyPerson.push({
                        relationshipType: this.relationshipType,
                        relatedPerson:{
                            id: this.familyPersonSelected.value,
                            fullname: this.familyPersonSelected.display
                        },
                        familyName: this.editPerson.lastname,
                        isTutor: 1
                    });
                    this.$refs.autocompletePerson.clearValues();
                    this.editPerson.family = this.familyPerson;
                }
            },
            removeFamily(index){
                this.familyPerson.splice(index, 1)
            },
            initialDisplay(){
                this.$refs.autocomplete.display = this.editPerson.address.township.description + ', ' + ((this.editPerson.address.township.city.name!='NO_DATA')? this.editPerson.address.township.city.name:this.editPerson.address.township.municipality.description) + ', ' + this.editPerson.address.township.city.state.name + ', ' + this.editPerson.address.township.zipcode;
            }
        },
        data(){
            return {
                flatPickrConfig: {
                    wrap: true, 
                    altFormat: 'M	j, Y',
                    altInput: true,
                    dateFormat: 'Y-m-d',
                    locale: Spanish
                },
                showEditPerson: false,
                avatars:[1,2,3,4,5,6,7,8,9,10,11,12],
                modalError: false,
                errorMessage :'',
                buttonDisabled:false,
                maritalStatusArray: '',
                typeConf:{
                    apiHostQuery: window.apiHost+'address/?access_token='+window.access_token+'&query=',
                    apiHostQueryPerson: window.apiHost+'person/tutor/0/7?field=id&direction=ASC&access_token='+window.access_token+'&query=',
                },
                maritalstatus: '',
                cps:'',
                initialDisplayString: '',
                addressStreet: '',
                familyPerson: [],
                familyPersonSelected: '',
                codePerson:'',    
                relationshipType: '1',
                relationshipTypeArray: ''
            };
        },
        mounted(){
            var vm = this;
            $('.modalConfigEvents').on('show.bs.modal', function (e) {
                vm.checkSession();
                vm.showEditPerson = false;
                vm.fetchMaritalStatus();
                vm.fetchRelationshipType();
            })           
            $('.modalConfigEvents').on('hide.bs.modal', function (e) {
                vm.checkSession();
                vm.$emit('modalEditClose');
                vm.modalError = false;
                vm.familyPerson = [];
            })
        },
        props: {
            editPerson: {required:true}
        },
        components: {
            flatPickr, Autocomplete
        },
        watch: {
            maritalstatus: function(maritalstatusId){
                this.editPerson.maritalstatus = {
                    id:this.maritalstatus
                };
            },
            editPerson: function(){                
                this.addressStreet = ("address" in this.editPerson && this.editPerson.address!==null)?this.editPerson.address.street:'';
                this.codePerson = ("persontype" in this.editPerson)?this.editPerson.persontype.code:'';
                this.familyPerson = ("family" in this.editPerson)?this.editPerson.family:'';
                if("address" in this.editPerson && this.editPerson.address!==null){
                    this.initialDisplay();
                }
            },
            addressStreet: function(street){
                if("address" in this.editPerson)
                    this.editPerson.address.street = street;
            }
        }
    }
</script>
<style>
    .imgAvatar{
        width: 58px;
        height: 61px;
    }
    .autocomplete__inputs input{
        height: 2.35em;
    }
    .autocomplete img{
        vertical-align: 0px;
    }
    .autocomplete__results{
        max-height: 250px !important;
    }
    .autocomplete__box{
        border:1px solid #ced4da !important;
        border-radius: 0.25rem !important;
    }
</style>