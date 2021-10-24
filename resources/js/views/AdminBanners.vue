<template>
    <div v-if="refreshPage == false" class="pizza">
        <div class="container">
            <h3 class="h-heading">
                Баннеры
            </h3>
            <div class="create-header h-heading">
                Создать баннер
            </div>
            <div class="pizza new__inner">
                <form class="admin-create__pizza__form" method="POST" v-if="refreshPage == false" >
                    <input v-model="bannerName" type="text" name="name" placeholder="Название">
                    <input v-model="bannerLink" type="text" name="name" placeholder="*Cсылка">
                    <input @change="handleFileUpload" ref="file" type="file">
                    <button type="button" @click="createBanner()" >Cоздать</button>
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


            <div v-if="edit.mode" class="edit-banner h-heading">
                Редактировать баннер
            </div>
            <div v-if="edit.mode" class="pizza new__inner">
                <form class="admin-create__pizza__form"  method="POST" v-if="refreshPage == false" >
                    <input v-model="edit.banner.name" type="text" name="name" placeholder="Название">
                    <input v-model="edit.banner.link" type="text" name="name" placeholder="*Cсылка">
                    <input @change="editHandleFileUpload" ref="file" type="file">
                    <button type="button" @click="editBanner()" >Редактировать</button>
                </form>

            </div>
            <div class="edit-banner h-heading">
                Баннеры
            </div>
                <div v-if="banners.length" class="banners__list">
                    <div v-for="(b, i) in banners" :key="b.id" class="banners__list-item">
                        <div class="banners__list-item-i">
                            <img :src="b.img" alt="" class="banners__list-item__img">
                        </div>
                        <div class="banners__list__name">
                            {{b.name}}
                        </div>
                        <div class="banners__list__link">
                            {{b.link}}
                        </div>
                        <button @click="switchEdit(i)">Редактировать</button>
                        <button @click="deleteBanner(b.id)">Удалить</button>
                    </div>

                </div>
        </div>
    </div>

</template>

<script>
import axios from 'axios'


export default {
    name: 'AdminBanners',
    components: {

    },
    data: () => ({
        bannerName: "",
        bannerLink: "",
        file: '',

        banners: [],

        refreshPage: false,

        edit: {
            mode: false,
            banner: {
                name: "",
                bannerLink: "",
                file: "",
            }
        }

    }),

    mounted() {
        this.loadBanners();
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

        createBanner(){

            let formData = new FormData();
            formData.append('name', this.bannerName);
            formData.append('img', this.file);
            formData.append('link', this.bannerLink);

            // this.ingradientsTitles = this.ingradientsTitles.map((i)=>(i? i: null));
            // this.ingradientsNullable = this.ingradientsNullable.map((i)=>(i? i: null));
            // formData.append('ing_titles',JSON.stringify(this.ingradientsTitles));
            // formData.append('ing_nullable',JSON.stringify(this.ingradientsNullable));

            axios.post('api/make-banner', formData, {
                headers: {
                    'Authorization': 'Bearer '+ window.Laravel.api_token,
                    "Content-type": "multi-part/form-data"
                }
            }).then((res)=>{
                console.log(res.data);
                this.loadBanners();
                this.refresh();
            });

            // .then(res => {
            //     console.log(JSON.parse(res.request.response));
            //     this.$refs.form.reset();
            // });

            // console.log(formData);
        },

        editBanner(){
            let formData = new FormData();
            console.log(this.edit.banner);
            formData.append('id', this.edit.banner.id);
            formData.append('name', this.edit.banner.name);
            formData.append('img', this.edit.banner.file);
            formData.append('link', this.edit.banner.link);

            axios.post('api/edit-banner', formData, {
                headers: {
                    'Authorization': 'Bearer '+ window.Laravel.api_token,
                    "Content-type": "multi-part/form-data"
                }
            }).then((res)=>{
                console.log(res.data);
                this.edit.mode = false;
                this.loadBanners();
                this.refresh();
            });
        },

        switchEdit(id){
            this.edit.mode = true;
            console.log(this.banners);
            this.edit.banner = this.banners[id];
        },

        deleteBanner(id){
            axios.post('/api/delete-banner', {id}, {
                headers: {
                    'Authorization': 'Bearer '+ window.Laravel.api_token,

                }
            })
            .then((res)=>{
                this.loadBanners();
                this.refresh();
            })
        },

        refresh(){
            this.refreshPage = true;
            this.refreshPage = false;
        },



        loadBanners(){
            axios.get('api/get-banners', {
                headers:{
                    'Authorization': 'Bearer '+ window.Laravel.api_token,
                }
            })
            .then(res => {
                this.banners = res.data;
                console.log(this.banners);
                console.log("FLJFL");
            })
        },

        editHandleFileUpload(){
            this.edit.banner.file = this.$refs.file.files[0];
        },

        handleFileUpload(){
            this.file = this.$refs.file.files[0];
        },

    }

}
</script>

<style scoped>
    .banners__list{
        margin-top: 20px;
        display: flex;
        flex-wrap: wrap;
        width: 100%;
    }


    .banners__list-item{
        width: 33%;
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100px;
    }

    .banners__list-item-i{
        width: 300px;
        height: 300px;
    }

    .banners__list-item__img{
        width: 300px;

    }

    .banners__list button{
        width: 80%;
    }

    .h-heading{
        margin: 10px 0 0 10px;
    }

</style>



