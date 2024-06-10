<template>
    <button @click="onClick" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        Delete Forever
    </button>

    <ConfirmationDialog :show="showConfirmationDialog"
        message="Are you sure you want to delete selected files?"
        @cancel="onCancel"
        @confirm="onConfirm">
    </ConfirmationDialog>
</template>

<script setup>
    import {ref} from "vue";
    import ConfirmationDialog from "@/Components/ConfirmationDialog.vue";
    import {useForm, usePage} from "@inertiajs/vue3";

    const page = usePage();
    const form = useForm({
        all: null,
        ids: [],
        parent_id: null
    })
    
    const showConfirmationDialog = ref(false);
    const props = defineProps({
        allSelected: {
            type: Boolean,
            required: false,
            default: false
        },
        selectedIds: {
            type: Array,
            required: false
        }
    })

    const emit = defineEmits(['delete'])

    function onClick() {
        if (!props.allSelected && !props.selectedIds.length) {
            showErrorDialog('Please select at least one file to delete')
            return
        }
        showConfirmationDialog.value = true;
    }

    function onCancel() {
        showConfirmationDialog.value = false;
    }

    function onConfirm() {
        if (props.allSelected) {
            form.all = true
            form.ids = [];
        } else {
            form.ids = props.selectedIds
        }

        form.delete(route('file.deleteForever'), {
            onSuccess: () => {
                showConfirmationDialog.value = false
                emit('delete')
                showSuccessNotification('Selected files have been deleted forever')
            }
        })
    }

</script>
