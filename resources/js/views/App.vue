<template>
    <div>
        <h1>Vue è stato importato correttamente</h1>
        <TestComponent />
    </div>
</template>

<script>
import TestComponent from '../components/TestComponent.vue';

export default {
    name: 'App',
    components: {
        TestComponent
    }
}
</script>