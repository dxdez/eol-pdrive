<template>
    <modal :show="modelValue" max-width="sm">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                Create New Folder
            </h2>
            <div class="mt-6">
                <InputLabel for="folderName" value="Folder Name" class="sr-only"/>

                <TextInput type="text"
                           ref="folderNameInput"
                           id="folderName" v-model="form.name"
                           class="mt-1 block w-full"
                           :class="form.errors.name ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : ''"
                           placeholder="Folder Name"
                           @keyup.enter="createFolder"
                />
                <InputError :message="form.errors.name" class="mt-2"/>
            </div>
            <div class="mt-6 flex justify-end">
                <SecondaryButton @click="closeModal">
                    Cancel
                </SecondaryButton>
            </div>
        </div>
    </modal>
</template>

<script setup>
    import {useForm} from '@inertiajs/vue3'
    import Modal from "@/Components/Modal.vue"
    import TextInput from "@/Components/TextInput.vue"
    import InputError from "@/Components/InputError.vue"
    import InputLabel from "@/Components/InputLabel.vue"
    import SecondaryButton from "@/Components/SecondaryButton.vue"

    const form = useForm({
        name: ''
    })

    const {modelValue} = defineProps({
        modelValue: Boolean
    })

    const emit = defineEmits('update:modelValue')

    function closeModal() {
        emit('update:modelValue')
        form.clearErrors();
        form.reset();
    }

    function createFolder() {
        console.log("Create folder")
    }
</script>

<style scoped>
</style>
