 <template>
  <div class="pizza">
    <div v-if="!refreshPage" class="container">


        <div class="order-table__wrap">
            <div @click="slideTable(1)" class="order-table__heading active">
                <span>АКТИВНЫЕ</span><img ref='a1' src="/images/arrow-black.png" alt="РАЗВЕРНУТЬ/СВЕРНУТЬ">
            </div>
            <div ref="tc1" class="order-table__container">
                <table class="order-table">
                    <thead>
		                <tr>
                            <th></th>
		    	            <th>КОРЗИНА</th>
		    	            <th>СТАТУС</th>
                            <th>КОНТАКТНЫЕ ДАННЫЕ</th>
		    	            <th>АДРЕС ДОСТАВКИ</th>
                            <th>КОММЕНТАРИЙ</th>
		    	            <th>СОЗДАН</th>
		                </tr>
	                </thead>
	                <tbody>
	              	    <tr v-for='o in orders.active' :key="o.id" :ref="'raw'+o.id">
	              	    	<td @click="toggleRaw(o.id)"><div class='td-wrap img-holder'><img src="/images/arrow-black.png" alt="Показать полностью" class="order-table__raw-widener"></div></td>
                            <td><div class='td-wrap'>
                                <div v-for="(item) in o.order" v-bind:key='item.id'  class="cart__item">
                                    <img :src="item.img" alt="" class="cart__img">
                                    <div class="cart__item-desc">
                                        <div class="cart__text">
                                            {{item.name}}
                                        </div>
                                        <div class="cart__quantity">
                                            Кол-во: {{item.quantity}}
                                        </div>

                                        <div v-if="item.composition" class="composition-wrap">
                                            <div class="composition-header">Состав</div>
                                            <div class="composition">
                                                <span v-for="i in item.composition" :key="i">{{i}} </span>
                                            </div>
                                        </div>
                                        <div v-if="item.additions" class="additions-wrap">
                                            <div class="additions-header">Добавки</div>
                                            <div v-for="a in item.additions" :key="a.id" class="addition">
                                                <div class="addition-name">Название: {{a.name}}</div>
                                                <div class="addition-price">Цена: {{a.price}} руб</div>
                                                <div class="addition-quantity">Кол-во: {{a.quantity}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart__price">
                                        {{item.price}} руб.
                                    </div>
                                </div>
                                <div class="cart__total-price">Итого: {{cartTotalCost(o.order)}} руб.</div>
                            </div></td>
	              	    	<td><div class='td-wrap' @click='showStatusModal(o.id)'>
                                  <span>{{interpritStatus(o.status)}}</span>
                                  <img :ref="'edit_status'+o.id" src="/images/edit_icon-black.png" alt="Редактировать" class="edit-status">
                            </div></td>
	              	    	<td><div class='td-wrap'>
                                  Имя: {{o.name}}<br>
                                  Телефон: {{o.phone}}<br>
                                  Перезвонить: {{ (o.callback==1) ? "Да": "Нет"}}
                            </div></td>
                            <td><div class='td-wrap'>
                                  Город: {{o.name}}<br>
                                  Дом: {{o.phone}}<br>
                                  <div v-if="o.apartment">Квартира: {{o.apartment}}</div>
                                  <div v-if="o.floor">Этаж: {{o.floor}}</div>
                                  <div v-if="o.intercom">Домофон: {{o.intercom}}</div>
                                  <div v-if="o.korpus">Корпус: {{o.korpus}}</div>
                                  <div v-if="o.entrance">Подъезд: {{o.entrance}}</div>
                            </div></td>
                            <td><div class='td-wrap'>
                                  {{o.comment}}
                            </div></td>
	              	    	<td><div class='td-wrap'>{{o.created_at}}</div></td>
	              	    </tr>
	                </tbody>
                </table>
            </div>
      </div>

     <!------------------------------------------------------------------>
     <!------------------------------------------------------------------>

     <!------------------------------------------------------------------>
      <!------------------------------------------------------------------>
    <div class="order-table__wrap">
            <div @click="slideTable(2)" class="order-table__heading completed">
                <span>ЗАВЕРШЁННЫЕ</span><img ref='a2' src="/images/arrow-black.png" alt="РАЗВЕРНУТЬ/СВЕРНУТЬ">
            </div>
            <div ref="tc2" class="order-table__container">
                <table class="order-table">
                    <thead>
		                <tr>
                            <th></th>
		    	            <th>КОРЗИНА</th>
		    	            <th>СТАТУС</th>
                            <th>КОНТАКТНЫЕ ДАННЫЕ</th>
		    	            <th>АДРЕС ДОСТАВКИ</th>
                            <th>КОММЕНТАРИЙ</th>
		    	            <th>СОЗДАН</th>
		                </tr>
	                </thead>
	                <tbody>
	              	    <tr v-for='o in orders.completed' :key="o.id" :ref="'raw'+o.id">
	              	    	<td @click="toggleRaw(o.id)"><div class='td-wrap img-holder'><img src="/images/arrow-black.png" alt="Показать полностью" class="order-table__raw-widener"></div></td>
                            <td><div class='td-wrap'>
                                <div v-for="(item) in o.order" v-bind:key='item.id'  class="cart__item">
                                    <img :src="item.img" alt="" class="cart__img">
                                    <div class="cart__item-desc">
                                        <div class="cart__text">
                                            {{item.name}}
                                        </div>
                                        <div class="cart__quantity">
                                            Кол-во: {{item.quantity}}
                                        </div>

                                        <div v-if="item.composition" class="composition-wrap">
                                            <div class="composition-header">Состав</div>
                                            <div class="composition">
                                                <span v-for="i in item.composition" :key="i">{{i}} </span>
                                            </div>
                                        </div>
                                        <div v-if="item.additions" class="additions-wrap">
                                            <div class="additions-header">Добавки</div>
                                            <div v-for="a in item.additions" :key="a.id" class="addition">
                                                <div class="addition-name">Название: {{a.name}}</div>
                                                <div class="addition-price">Цена: {{a.price}} руб</div>
                                                <div class="addition-quantity">Кол-во: {{a.quantity}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart__price">
                                        {{item.price}} руб.
                                    </div>
                                </div>
                                <div class="cart__total-price">Итого: {{cartTotalCost(o.order)}} руб.</div>
                            </div></td>
	              	    	<td><div class='td-wrap' @click='showStatusModal(o.id)'>
                                  <span>{{interpritStatus(o.status)}}</span>
                                  <img :ref="'edit_status'+o.id" src="/images/edit_icon-black.png" alt="Редактировать" class="edit-status">
                            </div></td>
	              	    	<td><div class='td-wrap'>
                                  Имя: {{o.name}}<br>
                                  Телефон: {{o.phone}}<br>
                                  Перезвонить: {{ (o.callback==1) ? "Да": "Нет"}}
                            </div></td>
                            <td><div class='td-wrap'>
                                  Город: {{o.name}}<br>
                                  Дом: {{o.phone}}<br>
                                  <div v-if="o.apartment">Квартира: {{o.apartment}}</div>
                                  <div v-if="o.floor">Этаж: {{o.floor}}</div>
                                  <div v-if="o.intercom">Домофон: {{o.intercom}}</div>
                                  <div v-if="o.korpus">Корпус: {{o.korpus}}</div>
                                  <div v-if="o.entrance">Подъезд: {{o.entrance}}</div>
                            </div></td>
                            <td><div class='td-wrap'>
                                  {{o.comment}}
                            </div></td>
	              	    	<td><div class='td-wrap'>{{o.created_at}}</div></td>
	              	    </tr>
	                </tbody>
                </table>
            </div>
      </div>



      <!------------------------------------------------------------------>
      <!------------------------------------------------------------------>

      <!------------------------------------------------------------------>
      <!------------------------------------------------------------------>

            <div class="order-table__wrap">
            <div @click="slideTable(3)" class="order-table__heading rejected">
                <span>ОТКЛОНЁННЫЕ</span><img ref='a3' src="/images/arrow-black.png" alt="РАЗВЕРНУТЬ/СВЕРНУТЬ">
            </div>
            <div ref="tc3" class="order-table__container">
                <table class="order-table">
                    <thead>
		                <tr>
                            <th></th>
		    	            <th>КОРЗИНА</th>
		    	            <th>СТАТУС</th>
                            <th>КОНТАКТНЫЕ ДАННЫЕ</th>
		    	            <th>АДРЕС ДОСТАВКИ</th>
                            <th>КОММЕНТАРИЙ</th>
		    	            <th>СОЗДАН</th>
		                </tr>
	                </thead>
	                <tbody>
	              	    <tr v-for='o in orders.rejected' :key="o.id" :ref="'raw'+o.id">
	              	    	<td @click="toggleRaw(o.id)"><div class='td-wrap img-holder'><img src="/images/arrow-black.png" alt="Показать полностью" class="order-table__raw-widener"></div></td>
                            <td><div class='td-wrap'>
                                <div v-for="(item) in o.order" v-bind:key='item.id'  class="cart__item">
                                    <img :src="item.img" alt="" class="cart__img">
                                    <div class="cart__item-desc">
                                        <div class="cart__text">
                                            {{item.name}}
                                        </div>
                                        <div class="cart__quantity">
                                            Кол-во: {{item.quantity}}
                                        </div>

                                        <div v-if="item.composition" class="composition-wrap">
                                            <div class="composition-header">Состав</div>
                                            <div class="composition">
                                                <span v-for="i in item.composition" :key="i">{{i}} </span>
                                            </div>
                                        </div>
                                        <div v-if="item.additions" class="additions-wrap">
                                            <div class="additions-header">Добавки</div>
                                            <div v-for="a in item.additions" :key="a.id" class="addition">
                                                <div class="addition-name">Название: {{a.name}}</div>
                                                <div class="addition-price">Цена: {{a.price}} руб</div>
                                                <div class="addition-quantity">Кол-во: {{a.quantity}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart__price">
                                        {{item.price}} руб.
                                    </div>
                                </div>
                                <div class="cart__total-price">Итого: {{cartTotalCost(o.order)}} руб.</div>
                            </div></td>
	              	    	<td><div class='td-wrap' @click='showStatusModal(o.id)'>
                                  <span>{{interpritStatus(o.status)}}</span>
                                  <img :ref="'edit_status'+o.id" src="/images/edit_icon-black.png" alt="Редактировать" class="edit-status">
                            </div></td>
	              	    	<td><div class='td-wrap'>
                                  Имя: {{o.name}}<br>
                                  Телефон: {{o.phone}}<br>
                                  Перезвонить: {{ (o.callback==1) ? "Да": "Нет"}}
                            </div></td>
                            <td><div class='td-wrap'>
                                  Город: {{o.name}}<br>
                                  Дом: {{o.phone}}<br>
                                  <div v-if="o.apartment">Квартира: {{o.apartment}}</div>
                                  <div v-if="o.floor">Этаж: {{o.floor}}</div>
                                  <div v-if="o.intercom">Домофон: {{o.intercom}}</div>
                                  <div v-if="o.korpus">Корпус: {{o.korpus}}</div>
                                  <div v-if="o.entrance">Подъезд: {{o.entrance}}</div>
                            </div></td>
                            <td><div class='td-wrap'>
                                  {{o.comment}}
                            </div></td>
	              	    	<td><div class='td-wrap'>{{o.created_at}}</div></td>
	              	    </tr>
	                </tbody>
                </table>
            </div>
      </div>



        <!------------------------------------------------------------------><!------------------------------------------------------------------>
        <!------------------------------------------------------------------><!------------------------------------------------------------------>
        <!------------------------------------------------------------------><!------------------------------------------------------------------>

        <div @click="closeStatusModal()" ref='modal__status_wrap' class="modal__status-select-wrap">
            <div ref='modal__status' class="modal__status-select">
                <div @click="changeStatus('active')" class="modal__status-select__item">Активный</div>
                <div @click="changeStatus('completed')" class="modal__status-select__item">Завершён</div>
                <div @click="changeStatus('rejected')" class="modal__status-select__item">Отклонён</div>
            </div>
        </div>

        <div @click="loadOrders" class="refresh-btn__wrap">
            <img src="/images/refresh-black.png" alt="Обновить содержимое таблиц">
        </div>

    </div>
  </div>
</template>

<script>

export default {
  name: 'AdminOrder',
  components: {

  },


  data: () => ({
    orders: {},
    modals: {
        status_select: false,
        selected_order_id: -1,
    },
    refreshPage: false

  }),


    mounted() {
        this.loadOrders();
        let timeout = setTimeout(()=>{this.loadOrders(); if(window.Laravel.api_token) clearTimeout(timeout)}, 700);
    },
    methods: {

        interpritStatus(str) {
            return(str=="active")  ? "В обработке":
                  (str=="completed")   ? "Завершен":
                  (str=="rejected")    ? "Отклонён" : "ОШИБКА!";
        },

        slideTable(i) {
            this.$refs['tc'+i].classList.toggle('active');
            this.$refs['a'+i].classList.toggle('active');
        },

        loadOrders(){
            axios.get('api/get-orders', {
                headers:{
                    'Authorization': 'Bearer '+ window.Laravel.api_token,
                }
            })
            .then(res => {
                console.log(res.data);
                this.orders = res.data;
                for(let key in this.orders){
                    this.orders[key].forEach((el)=>{
                        el.order = JSON.parse(el.order);
                        el.created_at = this.getDate(+Date.parse(el.created_at));
                    });
                }
                //console.log(this.orders);
                this.refresh();

            }).catch((err)=>{
                console.log(err);
            });
        },

        cartTotalCost(cart) {
            let result = []

            if (cart.length) {
              for (let item of cart) {
                result.push(item.price * item.quantity)
              }

              result = result.reduce(function (sum, el) {
                return sum + el;
              })
              return result;
            } else {
              return 0
            }
        },

        toggleRaw(id) {
            let obj = this.$refs['raw'+id][0];
            console.log(obj);
            obj.classList.toggle('active');
            obj.querySelectorAll('.td-wrap').forEach((el)=>{
                el.classList.toggle('active');
            });
            obj.querySelector('.order-table__raw-widener').classList.toggle('active');
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

        showStatusModal(oid){
            this.modals.selected_order_id = oid;
            let rect = this.$refs['edit_status'+oid][0].getBoundingClientRect();
            this.$refs.modal__status.style.top = rect.y + window.scrollY + 'px';
            this.$refs.modal__status.style.left = rect.x - 9 + 'px';
            this.$refs.modal__status_wrap.classList.add('active');
        },

        closeStatusModal(){
            this.modals.selected_order_id = -1;
            this.$refs['modal__status_wrap'].classList.remove('active');
        },

        changeStatus(newStatus){
            console.log("changing to" + newStatus);
            let fd = new FormData();
            fd.append('id', this.modals.selected_order_id);
            fd.append('status', newStatus);

            axios.post('api/change-status-order', fd, {
                headers: {
                    'Authorization': 'Bearer '+ window.Laravel.api_token,
                    "Content-type": "multi-part/form-data"
                }
            })
            .then((res=>{
                console.log(res);
                this.loadOrders();
                this.refresh();
            }));
        },






        refresh(){
            this.refreshPage = true;
            this.refreshPage = false;
        },

        // createCategory(){
        //     let formData = new FormData();
        //     formData.append('category', this.newCategory);

        //     axios.post('api/admin-create-category', formData, {
        //         headers: {
        //             "Content-type": "multi-part/form-data"
        //         }
        //     });
        //     this.loadCategories();
        //     this.refresh();
        // },


        // deleteCategory(id){

        //     let formData = new FormData();
        //     formData.append('id', id);

        //     axios.post('api/admin-delete-category', formData, {
        //         headers: {
        //             "Content-type": "multi-part/form-data"
        //         }
        //     })
        //     .then(res =>{
        //         console.log(res.data);
        //         this.loadCategories();
        //         this.refresh();
        //     })
        // },



        // createGood(){
        //     let formData = new FormData();
        //     formData.append('img', this.file);
        //     formData.append('form_name', this.goodForm.goodName);
        //     formData.append('form_subject', this.goodForm.goodCategory);
        //     formData.append('form_price', this.goodForm.goodPrice);
        //     console.log(formData);

        //     axios.post('api/goods', formData, {
        //         headers: {
        //             "Content-type": "multi-part/form-data"
        //             // "Content-type": "application/json"
        //         }
        //     })
        //     .then(res => {
        //         console.log(res)
        //     });
        //     this.loadCategories();
        //     this.refresh();
        // },



    },
}
</script>
<style scoped>


        /* .form_dollar_sign{
        position: absolute;
        display: block;
        bottom: 45px;
        margin-bottom: -24px;
        padding-left: 10px;
        font-family: Open Sans;
        font-style: normal;
        font-weight: bold;
        font-size: 20px;
        line-height: 24px;

        color: gray;
    } */

    .pizza{

        min-height: 100vh;

        position: absolute;
        display: block;
        width: 100%;

        font-family: Open Sans;
        font-style: normal;
        font-size: 16px;
        line-height: 24px;

    }


    .order-table__wrap{
        background: white;
        margin: 30px 0;
    }

    .container{
        max-width: 1400px;
        padding: 40px 0;
        width: 80vw;
        margin: 0 auto;
    }

    .order-table__heading{
        border: 3px black solid;
        border-radius: 3px;
        padding: 15px;
        font-size: 18px;
        line-height: 30px;
        display: flex;
        align-items: center;
    }

    .order-table__heading.active{
        background: rgb(150, 192, 255);
    }

    .order-table__heading.completed{
        background: rgb(150, 255, 150);
    }

    .order-table__heading.rejected{
        background: rgb(255, 150, 150);
    }

    .order-table__heading img{
        width: 30px;
        height: 30px;
        margin: auto 0;
        margin-left: auto;
        transition: transform 0.5s;
    }

    .order-table__heading img.active{
        transform:rotate(180deg);
    }

    .order-table__heading span{
        margin-right: auto;
    }

    .order-table__container {
        transition: height 1s;
        height: 0;
        /* overflow: scroll; */
        overflow: hidden;
    }

    .order-table__container.active {
        overflow: auto;
        height: auto;
        padding-bottom: -40px;
    }



    .order-table {
	width: 100%;
	border: 3px solid black;
    border-collapse: collapse;
    overflow-x: auto;
    }
    .order-table thead th {
    	font-weight: bold;
    	text-align: left;
    	border: none;
    	padding: 10px 15px;
    	background: #dadada;
    	font-size: 14px;
    	border-left: 1px solid#000000;
    	border-right: 1px solid #000000;
    }
    .order-table tbody td {

        position: relative;
    	text-align: left;
    	border-left: 1px solid #000000;
    	border-right: 1px solid #000000;
    	padding: 10px 15px;
    	font-size: 14px;
    	vertical-align: middle;
    }

    .td-wrap {
        height: 70px;
        overflow:hidden;
    }

    .td-wrap.active {
        height: auto;
    }

    .order-table tbody tr{
        position: relative;
    }


    .order-table tbody tr::after{
        content: "";
	    position: absolute;
	    bottom: 0;
	    right: 0;
	    left: 0;
	    height: 2em;
	    background: linear-gradient(to bottom, rgba(255, 255, 255, 0), white 100%);
	    pointer-events: none;
    }

    .order-table tbody tr.active::after{
	    display: none;
    }

    .order-table thead tr th:first-child, .order-table tbody tr td:first-child {
    	border-left: none;
    }
    .order-table thead tr th:last-child, .order-table tbody tr td:last-child {
    	border-right: none;
    }
    .order-table tbody tr:nth-child(even){
    	background: #c7c7c7;
    }
   .order-table tbody tr:nth-child(even)::after{
       background: linear-gradient(to bottom, rgba(255, 255, 255, 0), #c7c7c7);
   }
/*------------------------------------------------ */

    .cart::-webkit-scrollbar {
        display:none;
    }

    .cart__item{
        line-height: 15px;
        width: 100%;
        display: flex;
        justify-content: flex-start;
        flex-wrap: nowrap;
        border-bottom: 1px solid black;
        margin-bottom: 5px;
        padding-bottom: 3px;
    }


    .cart__img {
        width: 30px;
        height: 30px;
        margin: auto 0;
        margin-right: 5px;
    }

    .cart__text {
        margin-bottom: 2px;
    }

    .cart__item-desc{
        margin-right: auto;
    }

    .cart__price {
        justify-self: flex-end;
        margin-left: auto;
    }

    .cart__total-price{
        text-align: right;
        font-size: 15px;
    }


    .order-table__raw-widener{
        margin: auto auto;
        transition: transform 0.5s;
        width: 20px;
        height: 20px;
    }

    .order-table__raw-widener.active{
        transform: rotate(180deg);
    }

    .img-holder{
        display: flex;
        align-items: center;
        height: 100%;
    }

    .edit-status{
        width: 15px;
        height: 15px;
    }

        .modal__status-select-wrap{
        z-index: 1;
        display: none;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
    }
    .modal__status-select-wrap.active{
        display: block;
    }

    .modal__status-select{
        position: absolute;
        background: white;
        font-size: 16px;
        border: 2px solid #000000;
    }


    .modal__status-select__item{
        z-index: 10;
        color: black;
        padding: 4px;
    }

    .modal__status-select__item:hover{
        color: white;
        background: #000000;
    }

    .refresh-btn__wrap {
        width: 50px;
        height: 50px;
        border: 2px solid #000000;
        border-radius: 50%;

        display: flex;
        align-items: center;
        justify-content: center;

        position: fixed;
        top: 40px;
        right: 10px;
    }

    .refresh-btn__wrap img {
        width: 30px;
        height: 30px;
    }

    .cart__item div {
        padding-bottom: 5px;
    }

    .composition, .addition{
        padding-left: 10px;
        font-size: 12px;
    }

</style>


<!--
<template>
    <div class="pizza">
        <div class="container">
            <div class="order-table__wrap">
            <div @click="slideTable(1)" class="order-table__heading">
                <span>В ПРОВЕРКЕ</span><img ref='a1' src="/images/arrow-black.png" alt="РАЗВЕРНУТЬ/СВЕРНУТЬ">
            </div>
            <div ref="tc1" class="order-table__container">
                <table class="order-table">
                    <thead>
		                <tr>
                            <th></th>
		    	            <th>ЗАКАЗ</th>
		    	            <th>СТАТУС</th>
		    	            <th>EMAIL</th>
		    	            <th>ДОСТАВКА</th>
		    	            <th>ПЛАТЁЖ</th>
		    	            <th>СОЗДАН</th>
		                </tr>
	                </thead>
	                <tbody>
	              	    <tr v-for='o in orders.verification' :key="o.id" :ref="'raw'+o.id">
	              	    	<td @click="toggleRaw(o.id)"><div class='td-wrap img-holder'><img src="/images/arrow-black.png" alt="Показать полностью" class="order-table__raw-widener"></div></td>
                            <td><div class='td-wrap'>
                                <div v-for="(item) in o.cart" v-bind:key='item.id'  class="cart__item">
                                    <img :src="item.img" alt="" class="cart__img">
                                    <div class="cart__item-desc">
                                        <div class="cart__text">
                                            {{item.name}}
                                        </div>
                                        <div class="cart__quantity">
                                            Кол-во: {{item.quantity}}
                                        </div>
                                    </div>
                                    <div class="cart__price">
                                        ${{item.price}}
                                    </div>
                                </div>
                                <div class="cart__total-price">Итого: ${{cartTotalCost(o.cart)}}</div>
                            </div></td>
	              	    	<td><div class='td-wrap' @click='showStatusModal(o.id)'>
                                  <span>{{interpritStatus(o.status)}}</span>
                                  <img :ref="'edit_status'+o.id" src="/images/edit_icon-black.png" alt="Редактировать" class="edit-status">
                            </div></td>
	              	    	<td><div class='td-wrap'>{{o.email}}</div></td>
	              	    	<td><div class='td-wrap'>{{o.name }}<br>{{ o.address }}<br>{{ o.phone}}</div></td>
	              	    	<td><div class='td-wrap'>{{o.billing_name }}<br>{{ o.billing_address }}<br>{{ o.billing_phone}}</div></td>
	              	    	<td><div class='td-wrap'>{{o.created_at}}</div></td>
	              	    </tr>
	                </tbody>
                </table>
            </div>
      </div>
        </div>
    </div>

</template>

<script>
import axios from 'axios'


export default {
    name: 'AdminOrders',
    components: {

    },
    data: () => ({
        orders:{
            active:[],
            completed:[],
            rejected:[],
        }
    }),

    mounted() {
        this.laodOrders();
    },
    methods: {

        refresh(){
            this.refreshPage = true;
            this.refreshPage = false;
        },


        loadAdditions(){
            axios.get('api/get-orders')
            .then(res => {
                let orders = this.orders;
                res = res.data;

                orders.active = res.filter((el)=>{
                    return el.status == 'active';
                });

                orders.completed = res.filter((el)=>{
                    return el.status == 'completed';
                });

                orders.rejected = res.filter((el)=>{
                    return el.status == 'rejected';
                });

                console.log(this.orders);
            })
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
-->


