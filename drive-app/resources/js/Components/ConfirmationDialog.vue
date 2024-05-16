<template>
    <Modal :show="show" max-width="md">
        <div class="p-6">
            <h2 class="text-2xl mb-2 font-semibold">Please Confirm</h2>
            <p>{{message}}</p>
            <div class="mt-6 flex justify-end">
                <SecondaryButton @click="$event => emit('cancel')">Cancel</SecondaryButton>
            </div>
        </div>
    </modal>
</template>

<script setup>

    import Modal from "@/Components/Modal.vue";
    import SecondaryButton from "@/Components/SecondaryButton.vue";

    const props = defineProps({
        show: Boolean,
        message: String
    })

    const emit = defineEmits(['cancel', 'confirm'])

</script>
