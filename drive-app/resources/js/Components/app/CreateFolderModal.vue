<template>
    <modal :show="modelValue">
        Show Modal
    </modal>
</template>

<script setup>
    import Modal from "@/Components/Modal.vue"

    const {modelValue} = defineProps({
        modelValue: Boolean
    })
</script>

<style scoped>
</style>
