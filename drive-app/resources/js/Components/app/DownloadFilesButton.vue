<template>
    <PrimaryButton @click="download">
        Download
    </PrimaryButton>
</template>

<script setup>
    import {useForm, usePage} from "@inertiajs/vue3";
    import PrimaryButton from "@/Components/PrimaryButton.vue";

    const page = usePage();
    
    const props = defineProps({
        all: {
            type: Boolean,
            required: false,
            default: false
        },
        ids: {
            type: Array,
            required: false
        }
    })

    function download() {
        console.log("Download...");
    }
</script>
