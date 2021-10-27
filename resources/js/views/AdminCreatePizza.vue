<template>
    <div class="pizza">
        <div class="container">
            <h3 class="h-heading">
                Создание пиццы
            </h3>
            <div class="pizza new__inner">

                <form class="admin-create__pizza__form"  v-if="refreshPage == false" >
                    <input v-model="pizzaName" type="text" name="name" placeholder="Название">

                    <h2>Инградиенты</h2>
                    <div class="number-buttons">
                        <button class="number-minus" type="button" @click="stepDownStage">-</button>
                        <input v-model="ingradientsNumber" v-on:input='addStages' class="inner-number" type="number" min="1">
                        <button class="number-plus" type="button" @click="stepUpStage">+</button>
                    </div>

                    <div class="admin-create__pizza__composition" v-for="i in newIngradients" v-bind:key="i">
                        <input v-model="ingradientsTitles[i-1]" type="text" name="ingradient" placeholder="Инградиент">
                        Можно убрать <input v-model="ingradientsNullable[i-1]" type="checkbox" name="nullable">
                        <input v-model="ingradientsPrice[i-1]" type="text" name="ing_price" placeholder="Цена инградиента">
                    </div>

                    <h2>Возможные добавки</h2>

                    <div class="additions">
                        <div class="pizza__pop-up__ingradients-list adm-add-list">


                            <div v-for="(add,index) in additions" :key="index" class="pizza__pop-up__ingradients-item" @click="addAdditionToPizza(add.name, $event)">
                                <div class="pizza__pop-up__ingradients-item__img">
                                    <img :src="add.img" alt="" class="pizza__pop-up__ingradients-item__img-img">
                                </div>
                                <div class="pizza__pop-up__ingradients-item__name">
                                    {{add.name}}
                                </div>
                                <div class="pizza__pop-up__ingradients-item__price">
                                    {{add.price}} ₽
                                </div>
                            </div>


                        </div>
                    </div>
                    Популярное <input v-model="popular" type="checkbox" name="popular">
                    <input v-model="pizzaPrice" type="text" name="price" placeholder="Цена">
                    <input @change="handleFileUpload" ref="file" type="file">
                    <input type="checkbox" >
                    <br><br>
                    <div v-if="creationError" class="admin-create__pizza__form_error">Ошибка при создании пиццы</div>
                    <button type="button" @click="createPizza()" >Создать</button>
                </form>

            </div>


            <!-- <PizzaItem v-for="pizza in pizzas" :key="pizza.id"/> -->



            <div v-for="pizza in pizzas" :key="pizza.id" class="pizza-item"  @click="pizzaPopUp()">
                <div class="pizza-item__img">
                    <img :src="pizza.img" alt="" class="pizza-item__img-img">
                    <div class="pizza-item__discount--new discount">-70%</div>
                    <div class="pizza-item__discount--new new">NEW</div>
                </div>
                <div class="pizza-item__name">
                    {{pizza.name}}
                </div>
                <div class="pizza-item__desc">
                    <div v-for="(item,index) in pizza.composition" :key="index" class="pizza-item__desc__ingradient">
                        {{item.ingradient}}
                    </div>
                </div>
                <div class="pizza-item__price-order">
                    <div class="pizza-item__price">
                        от {{pizza.price}} ₽
                    </div>
                    <div class="pizza-item__order">
                        Заказать
                    </div>
                </div>

            </div>











        </div>
    </div>

</template>

<script>
import axios from 'axios'
import PizzaItem from '../components/PizzaItem.vue'

export default {
    name: 'AdminCreatePizza',
    components: {
        PizzaItem
    },
    data: () => ({
        ingradientsNumber: 1,
        newIngradients: [1],
        ingradientsTitles: [""],
        ingradientsNullable: [false],
        ingradientsPrice: [],


        pizzaName: '',
        pizzaPrice: undefined,
        pizzaPossibleAdds: [],
        creationError: false,

        refreshPage: false,


        popular: '',

        file: '',
        pizzas: [],

        additions: [],
    }),

    mounted() {
        this.loadPizza();
        this.loadAdditions();

    },
    methods: {
        stepUpStage(){
            this.ingradientsNumber++;
            this.ingradientsNullable.push(false);
            this.addStages();
        },
        stepDownStage(){
            if(this.ingradientsNumber == 1) return;
            this.ingradientsNumber--;
            this.ingradientsNullable.pop();
            this.addStages();
        },
        addStages(){
            this.newIngradients = [];
            for(let i = 1; i <= this.ingradientsNumber; ++i){
                this.newIngradients.push(i);
            }
            this.refresh();
        },

        createPizza(){

            let formData = new FormData();
            formData.append('name', this.pizzaName);

            formData.append('img', this.file);

            formData.append('price', this.pizzaPrice);

            if(this.popular) this.popular = 1;
            else this.popular = 0;
            formData.append('popular', this.popular);

            this.ingradientsPrice = this.ingradientsPrice.map((i)=>(i? i: null));
            formData.append('ing_price', JSON.stringify(this.ingradientsPrice));

            this.pizzaPossibleAdds = this.pizzaPossibleAdds.map((i)=>(i? i: null));
            formData.append('possibleAds', JSON.stringify(this.pizzaPossibleAdds));

            this.ingradientsNullable = this.ingradientsNullable.map((i)=>(i? i: null));
            formData.append('ing_titles',JSON.stringify(this.ingradientsTitles));
            formData.append('ing_nullable',JSON.stringify(this.ingradientsNullable));

            axios.post('api/create-pizza', formData, {
                headers: {
                    'Authorization': 'Bearer '+ window.Laravel.api_token,
                    "Content-type": "multi-part/form-data"
                }
            }).then((res)=>{
                console.log(res.data);
                window.location.href="/admin";
            }).catch(err=>{

                this.creationError = true;
            });

            // .then(res => {
            //     console.log(JSON.parse(res.request.response));
            //     this.$refs.form.reset();
            // });

            // console.log(formData);
            for (var pair of formData.entries()) {
                console.log(pair[0]+ ', ' + pair[1]);
            }

            this.refresh();
        },


        refresh(){
            this.refreshPage = true;
            this.refreshPage = false;
        },



        getDate(arg){
            let date = new Date(arg);
            let dd = date.getDate();
            if (dd < 10) dd = '0' + dd;
            let mm = date.getMonth() + 1;
            if (mm < 10) mm = '0' + mm;
            let yy = date.getFullYear() % 100;
            if (yy < 10) yy = '0' + yy;
            return dd + '.' + mm + '.' + yy;
        },

        loadPizza(){
            axios.get('api/get-pizza')
            .then(res => {
                console.log(this.pizzas);
                this.pizzas = res.data;
                console.log(res.data);
                console.log(this.pizzas);

                    this.pizzas.forEach((el)=>{
                        el.composition = JSON.parse(el.composition);
                        el.created_at = this.getDate(+Date.parse(el.created_at));
                        el.created_date = new Date(+Date.parse(el.created_at));
                    });

                console.log(this.pizzas);
            })
        },

        loadAdditions(){
            axios.get('api/get-additions')
            .then(res => {

                this.additions = res.data;


                console.log(this.additions);
            })
        },

        handleFileUpload(){
            this.file = this.$refs.file.files[0];
        },

        addAdditionToPizza: function(name, event){
            if(this.pizzaPossibleAdds.includes(name)){
                this.pizzaPossibleAdds.splice(this.pizzaPossibleAdds.indexOf(name),1);
                event.target.closest('.pizza__pop-up__ingradients-item').classList.toggle('active');
            } else {
                this.pizzaPossibleAdds.push(name);
                event.target.closest('.pizza__pop-up__ingradients-item').classList.toggle('active');
            }
            console.log(this.pizzaPossibleAdds);
            // console.log(event.target.closest('.pizza__pop-up__ingradients-item'));
        }

    }

}
</script>

<style scoped>
    .admin-create__pizza__form{
        margin-bottom: 100px;
    }

    .pizza__pop-up__ingradients-item.active{
        border: 2px solid green;
    }

    .admin-create__pizza__form_error{
        color:red;
        font-weight: bold;
    }
</style>

<style>
    .pizza-item__desc__ingradient{
        display: inline;
    }
    .pizza-item__desc__ingradient::after{
        content: ',';
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 10px;
        line-height: 110%;
        /* or 11px */
        color: #B0B0B0;
    }
    .pizza-item__desc__ingradient:last-child::after{
        display: none;
    }

</style>



