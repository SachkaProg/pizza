<template>

</template>

<script>
export default {
  name: 'AuthToken',
  mounted() {
    if(window.Laravel.isAuthorized){
        console.log("tyr sendign");
        axios.get('/get-api-token').then((res)=>{
            console.log(res.data);
            window.Laravel.api_token = res.data;
        });
    }

  },
}
</script>
