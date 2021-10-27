<template>

    <div class="pizza__pop-up__ingradients-item">

        <div class="pizza__pop-up__ingradients-item__img">
            <img style="width: 30px !important" :src="ingradient_item.img" alt="" class="pizza__pop-up__ingradients-item__img-img">
        </div>

        <div class="pizza__pop-up__ingradients-item__name">
            {{ingradient_item.name}}
        </div>

        <div class="pizza__pop-up__ingradients-item__price" @click="addAddition(ingradient_item, $event)">
            {{ingradient_item.price}} ₽
        </div>

        <div class="cart-item__quantity__inner">
            <div @click="decrementItem(ingradient_item, $event)" class="cart-item__quantity__decrement">
                –
            </div>
            <div class="cart-item__quantity">
                {{ingradient_item.quantity}}
            </div>
            <div @click="incrementItem(ingradient_item)" class="cart-item__quantity__increment">
                +
            </div>
        </div>

    </div>

</template>

<script>


export default {
    name: 'IngradientsItem',
    props: {
        ingradient_name: String,
    },
    data: () => ({
        ingradient_item: {

        }
        

    }),
    mounted() {
        this.loadItem()
    },

    methods: {
        loadItem(){
            let formData = new FormData();            
            formData.append('name', this.ingradient_name);

            axios.post('api/get-ingradient-item', formData, {
                headers: {
                    "Content-type": "multi-part/form-data"
                    // "Content-type": "application/json"
                }
            })
            .then(res => {

                this.ingradient_item = res.data;

            })
        },

        addAddition: function(item, event){
            event.target.style.display = "none";
            event.target.parentElement.querySelector('.cart-item__quantity__inner').style.display = "flex";
            this.$emit('addAddition', item);
        },

        incrementItem(item){
            this.$emit('addAddition', item);
        },

        decrementItem: function(item, event){
            this.$emit('removeAddition', item, event);
        }

    }
}
</script>


<style scoped>
    .cart-item__quantity__inner{
        margin-right: 0;
        align-self: center;
        width: 70px;
        height: 20px;

        display: none;
        
    }
    .pizza__pop-up__ingradients-item__img img {
        width: 30px !important;
        hieght: 30px;
    }
</style>









