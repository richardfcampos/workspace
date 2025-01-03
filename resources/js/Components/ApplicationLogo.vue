<script setup>
defineProps({
    titleClasses: {
        type: String,
        default: 'text-xl font-bold text-[#FF2D20]',
    },
});
</script>
<template>
    <div class="flex items-center space-x-3">
        <h1 :class="titleClasses">Workspace</h1>
    </div>
</template>
