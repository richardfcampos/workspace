<script setup>
import { ref } from 'vue';
import { QuillEditor } from '@vueup/vue-quill';
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { usePage } from '@inertiajs/vue3';

const { props: pageProps } = usePage();
const authUser = pageProps.auth.user;

const documentContent = ref('');
const props = defineProps({
    workspace: {
        type: Object,
        required: true,
    },
});

const shouldRerender = ref(false);

const notPartOfWorkspace = () => {
    return (
        !props.workspace.users.some((user) => user.id === authUser.id) &&
        props.workspace.owner.id !== authUser.id
    );
};

const joinWorkspace = () => {
    axios
        .post('/api/workspaceUser', {
            user_id: authUser.id,
            workspace_id: props.workspace.id,
        })
        .then((data) => {
            if (data.status === 200) {
                window.location.reload();
                shouldRerender.value = !shouldRerender.value;
            }
        });
};
</script>

<template>
    <AuthenticatedLayout>
        <div v-if="notPartOfWorkspace()" class="mx-auto max-w-4xl pt-6">
            <button
                @click="joinWorkspace"
                class="inline-block rounded-md bg-[#2D20FF] px-6 py-3 text-white transition hover:bg-[#ff4c33]"
            >
                Join Workspace
            </button>
        </div>
        <div class="mx-auto mt-5 max-w-4xl rounded-lg bg-white p-6 shadow-md">
            <h1 class="mb-4 text-3xl font-bold">{{ props.workspace.name }}</h1>
            <p class="mb-2 text-lg">
                <strong>Owner:</strong>
                {{
                    props.workspace.owner.id === authUser.id
                        ? 'Me'
                        : props.workspace.owner.name
                }}
            </p>
            <p v-if="workspace.users.length > 0" class="mb-4 text-lg">
                <strong>Users with Access:</strong>
            </p>
            <ul class="mb-6 list-inside list-disc">
                <li
                    v-for="user in props.workspace.users"
                    :key="user.id"
                    class="text-lg"
                >
                    {{ user.id === authUser.id ? 'Me' : user.name }}
                </li>
            </ul>
            <quill-editor v-model="documentContent" class="bg-white" />
        </div>
    </AuthenticatedLayout>
</template>
