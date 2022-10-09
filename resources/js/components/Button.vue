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
        font-size: .6rem;
        font-weight: 400;
    }

    button:hover {
        transform: scale(1.1);
    }

    @media (min-width: 850px){
        button {
            font-size: .8rem;
            font-weight: 600;
        }
    }
</style>