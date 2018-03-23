<template src="./html/template.html"></template>
<script>
    import flatPickr from 'vue-flatpickr-component';
    import 'flatpickr/dist/flatpickr.css';
    import 'flatpickr/dist/themes/material_blue.css';
    import {Spanish} from 'flatpickr/dist/l10n/es';

    export default {
        name: 'ModalEditPerson',
        methods:{
            updatePerson(){
                this.modalError = false;
                this.buttonDisabled = true;
                this.editPerson.fullname = this.editPerson.firstname + ' ' + this.editPerson.lastname;
                this.$http.put('person/?'+'access_token='+window.access_token, this.editPerson)
                .then(response => {
                    $('.modalConfigEvents').modal('hide');
                    this.buttonDisabled = false;
                    this.$emit('personEdited', this.editPerson);
                })
                .catch(error => {                    
                    this.modalError = true;
                    this.buttonDisabled = false;
                });
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
                buttonDisabled:false
            };
        },
        mounted(){
            var vm = this;
            $('.modalConfigEvents').on('show.bs.modal', function (e) {
                vm.checkSession();
                vm.showEditPerson = false;
            })
            $('.modalConfigEvents').on('hide.bs.modal', function (e) {
                vm.checkSession();
                vm.$emit('modalEditClose');
            })
        },
        props: {
            editPerson: {required:true}
        },
        components: {
            flatPickr
        }
    }
</script>
<style>
    .imgAvatar{
        width: 58px;
        height: 61px;
    }
</style>