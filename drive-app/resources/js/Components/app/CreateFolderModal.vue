<template>
    <modal :show="modelValue">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                Create New Folder
            </h2>
            <div class="mt-6">
                <InputLabel for="folderName" value="folderName"/>
                <TextInput type="text" id="folderName"
                    v-model="form.name" class="mt-1 block w-full"
                    :class="form.errors.name ? 'border-red-500 focus:border-red-500 focus:ring-red-500 : ''"
                    placeholder="Folder Name" @keyup.Enter="createFolder"/>
                <InputError :message="form.errors.name" class="mt-2" />
            </div>
        </div>
    </modal>
</template>

<script setup>
    import Modal from "@/Components/Modal.vue"
    import TextInput from "@/Components/TextInput.vue"
    import InputError from "@/Components/InputError.vue"
    import InputLabel from "@/Components/InputLabel.vue"
    import {useForm} from "@/inertiajs/vue3"

    const form = useForm({
        name: ''
    })

    const {modelValue} = defineProps({
        modelValue: Boolean
    })

    function createFolder() {
        console.log("Create folder")
    }
</script>

<style scoped>
</style>
