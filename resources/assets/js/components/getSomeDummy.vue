<template>


<div>
    <ul>
        <li v-for="dum in dums"> {{ dum }}</li>
    </ul>
</div>

</template>

<script>
    export default {


        data() {
            return {
                dums: []
            }
        },
        created() {
            var self = this;
            axios.get('/dummies').then(function(response) {
                //console.log(response.data);
                self.dums = response.data;
                
            });
        },

    }
</script>
