<script setup>
defineProps({
    value: {
        type: String,
    },
});
</script>

<template>
    <label class="font-black bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
