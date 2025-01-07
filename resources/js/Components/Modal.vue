<script setup>
import { ref, watch } from 'vue';
import { VueFinalModal } from 'vue-final-modal';
const emit = defineEmits();

// Define the prop with the modelValue, which is used for v-model
const props = defineProps({
    modelValue: {
        type: Boolean,
        required: true,
    },
});

// Define the internal state for the modal visibility
const isModalVisible = ref(props.modelValue);

// Watch for changes in the modelValue and sync them with the local state
watch(
    () => props.modelValue,
    (newVal) => {
        isModalVisible.value = newVal;
    },
);

// Method to close the modal
const closeModal = () => {
    isModalVisible.value = false;
    // Emit the updated value back to parent
    emit('update:modelValue', false); // Properly signal the parent to close the modal
};

// Method to open the modal
const openModal = () => {
    isModalVisible.value = true;
    // Emit the updated value back to parent
    emit('update:modelValue', true); // Properly signal the parent to open the modal
};
</script>

<template>
    <VueFinalModal
        v-model="isModalVisible"
        @before-close="closeModal"
        class="flex items-center justify-center"
        content-class="flex flex-col p-4 bg-white rounded border border-gray-100 dark:border-gray-800"
    >
        <div class="bg-white relative">
            <button @click="closeModal" class="absolute right-4 top-4">X</button>
            <slot></slot>
        </div>
    </VueFinalModal>
</template>
