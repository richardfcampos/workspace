<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import Modal from '@/Components/Modal.vue';

const isModalVisible = ref(false);
</script>

<template>
    <Head title="Workspaces" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="mb-4 flex justify-end">
                    <button
                        class="mb-4 inline-block rounded-md bg-[#2D20FF] px-6 py-3 text-white transition hover:bg-[#ff4c33]"
                        @click="isModalVisible = true"
                    >
                        Create Workspace
                    </button>
                </div>

                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
    <Modal v-model="isModalVisible">
        <h2>Modal Title</h2>
        <p>Modal content goes here.</p>
    </Modal>
</template>
