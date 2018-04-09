<template src="./html/crudSchoolYear.html"></template>
<script>
    import flatPickr from 'vue-flatpickr-component';
    import 'flatpickr/dist/flatpickr.css';
    import 'flatpickr/dist/themes/material_blue.css';
    import {Spanish} from 'flatpickr/dist/l10n/es';
export default {
    name:'modalSchoolYear',
    data(){
        return {
            buttonDisabled:false,
            flatPickrConfig: {
                wrap: true, 
                altFormat: 'M	j, Y',
                altInput: true,
                dateFormat: 'Y-m-d',
                locale: Spanish
            }
        }
    },
    props: {
        schoolYear: {required:true}
    },
    components: {
        flatPickr
    }
}
</script>
