<template>
    <span class="invalid-feedback" role="alert">
        <slot></slot>
    </span>
</template>

<script>
    export default {
        props: ['errors'],
    }
</script>