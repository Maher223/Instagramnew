<template>
    <div>
        <button class="btn btn-primary ms-4" @click="followUser" v-text="buttonText"></button>
    </div>
</template>

<script>
export default {
    props:['userId', 'follows'],

    mounted() {
        console.log('Component mounted.')
    },

    data: function (){
        // alert(this.userId);
        return{
            status: this.follows,
        }
    },

    methods:{
        async followUser(){
           axios.post('/follow/' + this.userId)
              .then(response => {
                  this.status =! this.status;

                  console.log(response.data);
            })
               .catch(errors => {
                  if (errors.response.status === 401){
                      window.location = '/login';
                  }
               });
        }
    },

    computed: {
        buttonText(){
            return (this.status) ? 'Ontvolgen' : 'Volgen';
        }
    }
}
</script>

<style scoped>

</style>
