<template>
<div>
    <!-- MODAL -->
    <div class="modal fade modalEdit modalConfigEvents" tabindex="-1" role="dialog" 
    aria-labelledby="modalEdit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="far fa-edit"></i>
                        Editar {{ personEdit.fullname }} 
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="firstname">Nombres</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="firstname" 
                                    placeholder="Introduzca sus nombres"
                                    v-model="personEdit.firstname">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="lastname">Apellidos</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="lastname" 
                                    placeholder="Introduzca sus apellidos"
                                    v-model="personEdit.lastname">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">Número fiscal</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="curp" 
                                    placeholder="Introduzca su curp"
                                    v-model="personEdit.fiscalNumber">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">gender</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="curp" 
                                    placeholder="Introduzca su curp"
                                    v-model="personEdit.gender">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">email</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="email" 
                                    placeholder="Introduzca su email"
                                    v-model="personEdit.email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">Profesión</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="email" 
                                    placeholder="Introduzca su Profesión"
                                    v-model="personEdit.profession">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">Celular</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="cellphone" 
                                    placeholder="Introduzca su celular"
                                    v-model="personEdit.cellphone">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">Teléfono</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="phone" 
                                    placeholder="Introduzca su teléfono"
                                    v-model="personEdit.phone">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">Fecha de cumpleaños</label>
                                <datepicker 
                                    v-model="personEdit.birthdate" 
                                    input-class="form-control"
                                    :format="dateformatpicker"
                                    language="es"></datepicker>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">CURP</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="curp" 
                                    placeholder="Introduzca su curp"
                                    v-model="personEdit.curp">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
    import Datepicker from 'vuejs-datepicker';
    export default {
        name: 'ModalEditPerson',
        methods:{
            checkSession: function(){
                if(parseFloat(window.timestamp_token) <= Math.floor(Date.now() / 1000)){
                    window.location.href = '/';
                }
            }
        },
        data(){
            return {
                dateformatpicker: 'yyyy-MM-dd'
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
        props:{
            personEdit: {required:true}
        },
        components: {
            Datepicker
        }
    }
</script>