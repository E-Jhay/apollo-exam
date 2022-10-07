<template>
  <div class="container">
    <Spiral :title="BreakdownTitle" :text="breakdown" />
    <Spiral :title="RandomTitle" :text="random" />
  </div>
</template>

<script>
import Spiral from './Spiral.vue'
export default {
  name: 'App',
  components: {
    Spiral,
  },
  data() {
    return {
      random: '',
      breakdown: '',
      RandomTitle: 'Random',
      BreakdownTitle: 'Breakdown',
    }
  },
  methods: {
    //fetch data from random table
    async fetchRandoms() {
      const res = await fetch('http://127.0.0.1:8000/api/random')
      const data = await res.json()
      return data
    },
    //fetch data from breakdown table
    async fetchBreakdowns() {
      const res = await fetch('http://127.0.0.1:8000/api/breakdown')
      const data = await res.json()
      return data
    }
  },

  async created() {
    const randomData = await this.fetchRandoms()
    let textRandom = ''

    //append random values to textRandom
    for (const randomItem of randomData){
      textRandom += " " + randomItem.value
    }

    this.random = textRandom

    const breakdownData = await this.fetchBreakdowns()
    let textBreakdown = ''

    //append breakdown values to textBreakdown
    for (const breakdownItem of breakdownData){
      textBreakdown += " " + breakdownItem.value
      console.log(breakdownItem.value)
    }
    this.breakdown = textBreakdown
  },
}
</script>

<style scoped>
  .container {
    height: 100vh;
    width: 90%;
    max-width: 1250px;
    margin: 0 auto;
    padding: 0;
    display: flex;
    gap: 1em;
  }

  svg{
    z-index: -1;
  }
</style>