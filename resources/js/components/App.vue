<template>
  <div class="container">
    <div class="spiral-text">
      <Spiral title="Random" :text="random" />
      <Spiral title="Breakdown" :text="breakdown" />
    </div>
    <div class="btn-group">
      <div class="btn-group">
        <Button @click="storeRandomData" text="Generate 5-10 Random data" color="black"/>
        <Button @click="deleteRandomData" text="Delete 5-10 Random data" color="red" />
      </div>
      <div class="btn-group">
        <Button @click="storeBreakdownData" text="Generate 5-10 Breakdown data" color="black" />
        <Button @click="deleteBreakdownData" text="Delete 5-10 Breakdown data" color="red" />
      </div>
    </div>
  </div>
</template>

<script>
import Spiral from './Spiral.vue'
import Button from './Button.vue'
export default {
  name: 'App',
  components: {
    Spiral,
    Button,
  },
  data() {
    return {
      random: '',
      breakdown: '',
    }
  },
  methods: {
    //fetch data from random table
    async fetchRandoms() {
      const res = await fetch('http://127.0.0.1:8000/api/random')
      const data = await res.json()
      let textRandom = ''

      //append random values to textRandom
      for (const dataItem of data){
        textRandom += " " + dataItem.value
      }

      this.random = textRandom
    },
    //fetch data from breakdown table
    async fetchBreakdowns() {
      const res = await fetch('http://127.0.0.1:8000/api/breakdown')
      const data = await res.json()

      let textBreakdown = ''

      //append breakdown values to textBreakdown
      for (const dataItem of data){
        textBreakdown += " " + dataItem.value
      }
      this.breakdown = textBreakdown
    },
    async storeRandomData() {
      try {
        const settings = {
              method: 'POST',
              headers: {
                  Accept: 'application/json',
                  'Content-Type': 'application/json',
                  }
              }
        const fetchResponse = await fetch(`http://127.0.0.1:8000/api/store/random`, settings);
        const data = await fetchResponse.json();
        console.log(data.message)
        this.fetchRandoms()
      } catch (error) {
        console.log(error)
      }
      
    },
    async storeBreakdownData() {
      try {
        const settings = {
              method: 'POST',
              headers: {
                  Accept: 'application/json',
                  'Content-Type': 'application/json',
                  }
              }
        const fetchResponse = await fetch(`http://127.0.0.1:8000/api/store/breakdown`, settings);
        const data = await fetchResponse.json();
        console.log(data.message)
        this.fetchBreakdowns()
      } catch (error) {
        console.log(error)
      }
      
    },
    async deleteBreakdownData() {
      try {
        const settings = {
              method: 'DELETE',
              headers: {
                  Accept: 'application/json',
                  'Content-Type': 'application/json',
                  }
              }
        const fetchResponse = await fetch(`http://127.0.0.1:8000/api/delete/breakdown`, settings);
        const data = await fetchResponse.json();
        console.log(data)
        this.fetchBreakdowns()
      } catch (error) {
        console.log(error)
      }
      
    },
    async deleteRandomData() {
      try {
        const settings = {
              method: 'DELETE',
              headers: {
                  Accept: 'application/json',
                  'Content-Type': 'application/json',
                  }
              }
        const fetchResponse = await fetch(`http://127.0.0.1:8000/api/delete/random`, settings);
        const data = await fetchResponse.json();
        console.log(data)
        this.fetchBreakdowns()
      } catch (error) {
        console.log(error)
      }
      
    },
  },

  async created() {
    this.fetchRandoms()
    this.fetchBreakdowns()
  },
}
</script>

<style scoped>
  .container {
    width: 90%;
    max-width: 1250px;
    margin: 0 auto;
  }

  .spiral-text {
    margin-top: 2em;
    display: flex;
    gap: 3em;
    justify-content: space-between;
    align-items: center;
  }

  .btn-group {
    display: flex;
    justify-content: space-around;
    align-items: center;
    gap: 2em;
  }

  svg{
    z-index: -1;
  }
</style>