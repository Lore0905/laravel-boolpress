<template>
    <div class="container">
        <h1>ciao, stai cercando una pagina che non esiste</h1>
        <router-link class="link" to="/">Torna nella home</router-link>
    </div>
</template>

<script>
export default {
    name: 'Alert',
}
</script>

<style lang="scss" scoped>
h1{
    margin-top: 50px;
}
.link{
    font-size: 25px;
    padding: 10px;
}
</style>