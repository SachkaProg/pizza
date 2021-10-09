<template>
    <div class="new">
        <div class="container">
            <h3 class="h-heading">
                Новинки
            </h3>
            <div class="new__inner">

                <PizzaItem/>
                <PizzaItem/>
                <PizzaItem/>
                <PizzaItem/>
                <PizzaItem/>
                <PizzaItem/>
                <PizzaItem/>
                <PizzaItem/>

            </div>
        </div>
    </div>
    
</template>

<script>
import PizzaItem from './PizzaItem.vue'


export default {
  name: 'New',
  components: {
      PizzaItem
  }
}
</script>

<style>
    .new__inner{
        display: flex;
        /* justify-content: space-between; */
        flex-wrap: wrap;
    }
</style>



