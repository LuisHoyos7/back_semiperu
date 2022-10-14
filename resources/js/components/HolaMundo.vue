<template>
    <div>{{ message }}</div>
</template>

<script>
export default {
    setup() {
        const message = "Hola Mundo con Vue 3 y Laravel"
        return { message }
    }
}
</script>
