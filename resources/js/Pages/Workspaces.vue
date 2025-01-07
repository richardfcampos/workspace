<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';
import Modal from '@/Components/Modal.vue';
import WorkspacesForm from '@/Components/Forms/WorkspacesForm.vue';
import { Link } from '@inertiajs/vue3';

const isModalVisible = ref(false);

const props = defineProps({
    workspaces: {
        type: Object,
        required: false,
    },
});

const getWorkspaceLink = (id) => {
    return `/workspace/${id}`;
}
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

                <div class="overflow-hidden sm:rounded-lg flex flex-wrap gap-3">
                    <Link
                        :href="getWorkspaceLink(workspace.id)"
                        v-for="workspace in props.workspaces.data"
                        :key="workspace.id"
                    >
                        <div class="p-10 bg-white shadow-sm rounded"> {{ workspace.name }}</div>
                    </Link>


                </div>
            </div>
        </div>
    </AuthenticatedLayout>
    <Modal v-model="isModalVisible">
        <WorkspacesForm @close="isModalVisible = false" />
    </Modal>
</template>
