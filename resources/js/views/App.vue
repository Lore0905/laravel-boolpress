<template>
    <div>
        <ListPosts /> 
    </div>
</template>

<script>
import ListPosts from '../components/ListPosts.vue';

export default {
    name: 'App',
    components: {
        ListPosts
    }
}
</script>