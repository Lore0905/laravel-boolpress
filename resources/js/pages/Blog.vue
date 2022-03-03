// in Blog mostro il componente ListPosts

<template>
    <div>
        <ListPosts />
    </div>
</template>

<script>

import ListPosts from '../components/ListPosts.vue'

export default {
    name: 'Blog',
    components: {
        ListPosts
    }
}
</script>