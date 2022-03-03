<template>
    <div>
        <!-- HEADER -->
        <header>
            <Header />
        </header>
        <!-- END HEADER -->

        <!-- MAIN -->
        <main>
            <router-view></router-view>
        </main>
        <!-- END MAIN -->
    </div>
</template>

<script>

import Header from '../components/Header.vue';

export default {
    name: 'App',
    components: {
        Header
    }
}
</script>