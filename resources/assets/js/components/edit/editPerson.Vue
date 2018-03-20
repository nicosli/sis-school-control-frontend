<template src="./html/template.html"></template>
<script>
    import Datepicker from 'vuejs-datepicker';
    export default {
        name: 'ModalEditPerson',
        methods:{
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
                dateformatpicker: 'yyyy-MM-dd',
                showEditPerson: false,
                avatars:[1,2,3,4,5,6,7,8,9,10,11,12]
            };
        },
        mounted(){
            var vm = this;
            $('.modalConfigEvents').on('show.bs.modal', function (e) {
                vm.checkSession();
            })
            $('.modalConfigEvents').on('hide.bs.modal', function (e) {
                vm.checkSession();
            })
        },
        beforeUpdate() {
            this.$validator.validateAll();
        },
        props:{
            editPerson: {required:true}
        },
        components: {
            Datepicker
        }
    }
</script>
<style>
    .imgAvatar{
        width: 58px;
        height: 61px;
    }
</style>