<template>
    <div class="pizza">
        <div class="container">
            <h3 class="h-heading">
                Добавка
            </h3>
            <div class="pizza new__inner">

                <form class="admin-create__pizza__form"  v-if="refreshPage == false" >
                    <input v-model="additionName" type="text" name="name" placeholder="Название">
                    <input v-model="additionPrice" type="text" name="price" placeholder="Цена">
                    <input @change="handleFileUpload" ref="file" type="file">

                    <div @click="createAddition()" >Cделать</div>
                </form>

            </div>


            <!-- <PizzaItem v-for="pizza in pizzas" :key="pizza.id"/> -->



            <!-- <div v-for="pizza in pizzas" :key="pizza.id" class="pizza-item"  @click="pizzaPopUp()">
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

            </div> -->

                <div v-if="refreshPage == false" class="pizza__pop-up__ingradients-list adm-add-list">


                    <div v-for="(add,index) in additions" :key="index" class="pizza__pop-up__ingradients-item">
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
    </div>

</template>

<script>
import axios from 'axios'


export default {
    name: 'AdminCreateAddition',
    components: {

    },
    data: () => ({
        additionName: '',
        additionPrice: 0,
        file: '',

        refreshPage: false,

        additions: [],
    }),

    mounted() {
        this.loadAdditions();
    },
    methods: {
        // stepUpStage(){
        //     this.ingradientsNumber++;
        //     this.addStages();
        // },
        // stepDownStage(){
        //     if(this.ingradientsNumber == 1) return;
        //     this.ingradientsNumber--;
        //     this.addStages();
        // },
        // addStages(){
        //     this.newIngradients = [];
        //     for(let i = 1; i <= this.ingradientsNumber; ++i){
        //         this.newIngradients.push(i);
        //     }
        //     this.refresh();
        // },

        createAddition(){

            let formData = new FormData();
            formData.append('name', this.additionName);

            formData.append('img', this.file);

            formData.append('price', this.additionPrice);

            // this.ingradientsTitles = this.ingradientsTitles.map((i)=>(i? i: null));
            // this.ingradientsNullable = this.ingradientsNullable.map((i)=>(i? i: null));
            // formData.append('ing_titles',JSON.stringify(this.ingradientsTitles));
            // formData.append('ing_nullable',JSON.stringify(this.ingradientsNullable));

            axios.post('api/create-addition', formData, {
                headers: {
                    'Authorization': 'Bearer '+ window.Laravel.api_token,
                    "Content-type": "multi-part/form-data"
                }
            });

            // .then(res => {
            //     console.log(JSON.parse(res.request.response));
            //     this.$refs.form.reset();
            // });

            // console.log(formData);
            for (var pair of formData.entries()) {
                console.log(pair[0]+ ', ' + pair[1]);
            }

            this.loadAdditions();
            this.refresh();
        },


        refresh(){
            this.refreshPage = true;
            this.refreshPage = false;
        },



        // getDate(arg){
        //     let date = new Date(arg);
        //     let dd = date.getDate();
        //     if (dd < 10) dd = '0' + dd;
        //     let mm = date.getMonth() + 1;
        //     if (mm < 10) mm = '0' + mm;
        //     let yy = date.getFullYear() % 100;
        //     if (yy < 10) yy = '0' + yy;
        //     return dd + '.' + mm + '.' + yy;
        // },

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

    }

}
</script>

<style>
    .adm-add-list{
        padding-top: 100px;
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



