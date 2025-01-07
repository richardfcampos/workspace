<script setup>
import { ref } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';

// 1) Declare events we want to emit in <script setup>
const emit = defineEmits(['close']);

const { props } = usePage();
const user = props.auth.user;

// The function to emit the close event
const closeForm = () => {
    emit('close');
};

// Prepare form data
const form = useForm({
    name: '',
    user_id: user?.id || null,
});

// Handle form submission
const handleSubmit = () => {
    form.post('/api/workspace', {
        onSuccess: () => {
            form.reset();
            closeForm();
        },
    });
};
</script>

<template>
    <form
        @submit.prevent="handleSubmit"
        class="w-[500px] flex flex-col gap-4 p-4 bg-white rounded shadow-md"
    >
        <div class="flex flex-col">
            <label for="name" class="mb-2 font-bold text-gray-700">Name:</label>
            <input
                type="text"
                id="name"
                v-model="form.name"
                required
                class="p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
        </div>

        <div class="flex items-center gap-4">
            <button
                type="submit"
                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                Submit
            </button>
        </div>
    </form>
</template>
