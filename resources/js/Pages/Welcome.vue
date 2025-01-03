<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

defineProps({
    canLogin: {
        type: Boolean,
        default: false,
    },
    canRegister: {
        type: Boolean,
        default: false,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

// If you no longer need image-related logic, you can remove this.
// function handleImageError() {
//     ...
// }
</script>

<template>
    <Head title="Welcome" />

    <!-- Full-page gradient background -->
    <div
        class="flex min-h-screen items-center justify-center bg-gradient-to-r from-green-400 to-blue-500 px-4"
    >
        <div
            class="w-full max-w-3xl rounded-lg bg-white/80 p-8 shadow-xl backdrop-blur-sm dark:bg-zinc-800/80"
        >
            <!-- Header with optional logo and login/register links -->
            <header class="mb-8 flex">
                <ApplicationLogo />
            </header>

            <!-- Main Content -->
            <main class="text-center">
                <h2 class="mb-4 text-5xl font-bold text-black dark:text-white">
                    Welcome to Workspace
                </h2>

                <p
                    class="mx-auto max-w-xl text-lg text-black/70 dark:text-white/70"
                >
                    Your collaboration platform to manage tasks, share files,
                    and and communicate with your team. Let's make your work
                    easier easier easier and more organized.
                </p>

                <!-- Optionally, if the user is not logged in, put quick call-to-action buttons -->
                <div class="mt-8 space-x-4" v-if="!$page.props.auth.user">
                    <Link
                        v-if="canLogin"
                        :href="route('login')"
                        class="inline-block rounded-md bg-[#FF2D20] px-6 py-3 text-white transition hover:bg-[#ff4c33]"
                    >
                        Log in
                    </Link>

                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="inline-block rounded-md border border-[#FF2D20] px-6 py-3 text-[#FF2D20] transition hover:bg-[#FF2D20] hover:text-white"
                    >
                        Register
                    </Link>
                </div>
            </main>
        </div>
    </div>
</template>
