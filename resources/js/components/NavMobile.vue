<template>
    <div class="nav-mobile">
        <div class="container">
            <div class="nav-mob">
                <div class="nav-mob__item" v-for="category in categories"  @click="toggleActive">
                    {{category.name}}
                </div>
<!--                <div class="nav-mob__item" @click="toggleActive">-->
<!--                    Пицца-->
<!--                </div>-->
<!--                <div class="nav-mob__item" @click="toggleActive">-->
<!--                    Комбо-->
<!--                </div>-->
<!--                <div class="nav-mob__item" @click="toggleActive">-->
<!--                    Закуски-->
<!--                </div>-->
<!--                <div class="nav-mob__item" @click="toggleActive">-->
<!--                    Десерты-->
<!--                </div>-->
<!--                <div class="nav-mob__item" @click="toggleActive">-->
<!--                    Напитки-->
<!--                </div>-->
<!--                <div class="nav-mob__item" @click="toggleActive">-->
<!--                    Другие товары-->
<!--                </div>-->
<!--                <div class="nav-mob__item" @click="toggleActive">-->
<!--                    Акции-->
<!--                </div>-->
                <a href="footer" class="nav-mob__item" @click="scrollAnch($event)">
                    Контакты
                </a>
                <a href="footer" class="nav-mob__item" @click="scrollAnch($event)">
                    О нас
                </a>

            </div>
        </div>

    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "NavMobile",
    data: () => ({
        categories: [],
        category: 'Новинки',

    }),
    mounted() {
        this.loadCategories()
    },
    methods: {
        toggleActive: function(event){
            let matches = document.querySelectorAll('.nav-mob__item');
            for(let i = 0; i < matches.length; i++){
                matches[i].classList.remove('active');
            }
            event.target.classList.toggle('active');
            this.category = event.target.innerHTML.trim();
            this.$emit('changeCategory', this.category)

            console.log(this.category);

            var myEl = document.getElementById('shop');
            $(myEl).fadeOut();
            $('body,html').animate({scrollTop: myEl.offsetTop - 80}, 1500);
            $(myEl).fadeIn(1800);
        },
        scrollAnch(event){

            event.preventDefault();
            var myId = event.target.getAttribute('href');

            var myEl = document.getElementById(myId);

            $(myId).fadeOut();
            $('body,html').animate({scrollTop: myEl.offsetTop - 80}, 1500);
            $(myId).fadeIn(1800);

        },

        loadCategories() {

            axios.get('api/get-categories', {
                headers: {
                    "Content-type": "multi-part/form-data"
                    // "Content-type": "application/json"
                }
            })
                .then(res => {
                    console.log(res.data);
                    this.categories = res.data;
                })
        },
    }

}
</script>

<style>
    .nav-mobile{
        display: none;
    }
    .nav-mobile .container{
        padding: 0;
    }
    .nav-mob{
        padding-top: 25px;
        padding-bottom: 25px;
        display: flex;
        flex-direction: row;
        align-items: center;
        overflow-x: scroll;
        -ms-overflow-style:none;
        scrollbar-width: 0;
        padding-left: 15px;

        position: fixed;
        top: 0;
        background: #fff;
    }
    .nav-mob__item{
        font-family: Montserrat;
        font-style: normal;
        font-weight: normal;
        font-size: 13px;
        line-height: 125%;
        /* or 16px */
        color: #343435;
        background: #EBEDF3;
        border-radius: 12px;
        padding: 8px;
        margin-right: 10px;
        white-space: nowrap;
    }
    .nav-mob::-webkit-scrollbar {
        display: none;
    }

    .nav-mob__item.active{
        background: rgba(235, 92, 39, 0.1);
        color: #FF6900;
    }
</style>

<style>
    @media(max-width: 940px) {
        .nav-mobile{
            display: block;
        }
    }
    @media(max-width: 375px) {
        .nav-mobile{
            display: block;
        }
    }

</style>
