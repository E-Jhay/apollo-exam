<template>
  <button :style="{background: color}">{{text}}</button>
</template>

<script>
export default {
    name: 'Button',
    props: {
        text: String,
        color: String
    }
}
</script>

<style scoped>
    button {
        cursor: pointer;
        padding: .7em 1em;
        border: none;
        color: rgb(237, 237, 237);
        /* background-color: rgb(20, 20, 20); */
        border-radius: 5px;
        transition: all 320ms ease-in;
        font-weight: 600;
    }

    button:hover {
        transform: scale(1.1);
    }
</style>