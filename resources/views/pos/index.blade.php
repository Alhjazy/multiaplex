<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config("app.name", "Laravel") }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{--<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">--}}

    {{--<link rel="stylesheet" type="text/css" href="/public/assets/plugins/gridforms/gridforms.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">--}}
    <link rel="stylesheet" type="text/css" href="/public/assets/plugins/w2ui-1.5.rc1/w2ui-1.5.rc1.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    {{--<link rel="stylesheet" type="text/css" href="/public/assets/css/layouts.css">--}}
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
    <style>
        :root {
            --dark: #2a2e37;
            --medium: #373e48;
            --light: #8c9ba9;
            --product: #b050ef;
            --accent: #1fd6d1;
            --good: #52dc52;
            --bad: #e63434;
        }

        * {
            box-sizing: border-box;
            color: #222;
            outline: none;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            font-family: 'Helvetica', sans-serif;
            font-size: 18px;
        }

        body {
            width: 100%;
            height: 100vh;
        }

        header {
            display: flex;
            align-items: center;
            padding: 0 0 0 25px;
            height: 10vh;
            background: #e2e3e4;
        }
        header h1 {
            margin: 0;
            margin-right: -10px;
            text-overflow: ellipsis;
            color: var(--light);
            white-space: nowrap;
            overflow: hidden;
        }
        header button {
            margin-left: auto;
            padding: 0 35px;
            width: 155px;
            height: 100%;
            border: none;
            border: 1px solid #0a6aa4;
            background: #fff1be;
            font-size: 20px;
            outline: none;
            cursor: pointer;
            transition: width 300ms ease-out, background 300ms ease-out;
        }
        header button span {
            color: var(--light);
            transition: color 300ms ease-out;
        }
        header button:hover {
            background: #fff1be;
        }
        header button:hover span {
            color: var(--dark);
        }
        header button:hover #cart-count {
            color: var(--dark);
        }
        header button.shake:hover > span, header button.shake:active > span {
            animation: shake 820ms cubic-bezier(0.36, 0.07, 0.19, 0.97) both;
            transform: translatex(0);
        }
        header .cart-toggle-text {
            display: block;
        }
        header .cart-back-text {
            display: none;
        }
        header #cart-count {
            margin-left: 10px;
            font-size: 24px;
            font-weight: bold;
            color: var(--product);
            transition: color 300ms ease-out;
        }
        header #cart-count.hidden {
            display: none;
        }

        main {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            grid-auto-rows: 100px;
            grid-auto-flow: dense;
            grid-gap: 10px 10px;
            padding: 10px;
            width: 100%;
            height: 85vh;
            background: #e2e3e4;
            overflow-x: auto;
            transition: width 300ms ease-out;
        }

        footer {
            display: flex;
            align-items: center;
            padding: 0 15px;
            height: 5vh;
            background: var(--medium);
            color: var(--light);
        }
        footer span {
            margin-left: 7px;
            color: var(--light);
        }

        #cart {
            position: fixed;
            top: 10vh;
            right: -250px;
            bottom: 5vh;
            width: 250px;
            background: #e2e3e4;
            transition: right 300ms ease-out, width 300ms ease-out;
            z-index: 0;
        }
        #cart.open {
            right: 0;
        }
        #cart.checkout {
            width: 100%;
            z-index: 10;
        }
        #cart > .shadow {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            background: transparent;
            box-shadow: inset 8px 0 20px -6px rgba(0, 0, 0, 0.5);
            pointer-events: none;
            touch-action: none;
            z-index: 100;
        }
        #cart > button {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 18%;
            border: none;
            border-top: 1px solid var(--product);
            background: #0a6ba5;
            font-size: 20px;
            cursor: pointer;
            transition: background 300ms ease-out;
        }
        #cart > button span {
            color: #fff;
            transition: color 300ms ease-out;
        }
        #cart > button:hover {
            background: var(--product);
        }
        #cart > button:hover span {
            color: var(--dark);
        }
        #cart > button.hidden {
            display: none;
        }
        #cart > button > span.hidden {
            display: none;
        }
        #cart #cart-checkout {
            border-color: #e2e3e4;
        }
        #cart #cart-checkout:hover {
            background: #0a6ba5;
            color: #fff;
        }
        #cart #checkout-continue {
            display: none;
        }
        #cart form {
            display: none;
        }
        #cart #cart-info {
            padding: 23px;
             background: #808080;
            /* z-index: 9999; */
            /* font-size: 16px; */
            /* color: #2a2e37; */
            width: 100%;
        }
        #cart #cart-info div {
            color: #fff;
        }
        #cart #cart-info div i {
            color: #fff;
        }
        #cart.open ~ header #cart-toggle {
            width: 250px;
        }
        #cart.open ~ header #cart-toggle .cart-toggle-text {
            display: none;
        }
        #cart.open ~ header #cart-toggle .cart-back-text {
            display: block;
        }

        #cart.open ~ main {
            width: calc(100% - 250px);
        }

        #cart-contents {
            height: calc(80% - 10vh);
            overflow-x: auto;
        }

        .cart-product {
            margin: 10px 0;
            background: #3c67a5;
        }
        .cart-product:first-child {
            margin-top: 0;
        }
        .cart-product:last-child {
            margin-bottom: 0;
        }
        .cart-product h6 {
            display: inline-block;
            margin: 0;
            padding: 5px 0 5px 10px;
            font-size: 16px;
            font-weight: normal;
            line-height: 2;
            text-align: left;
            text-overflow: ellipsis;
            color: #fff;
            white-space: nowrap;
            overflow: hidden;
        }
        .cart-product span {
            display: inline-block;
            padding: 5px 10px;
            float: right;
            font-size: 16px;
            font-weight: bold;
            line-height: 2;
            color: #fff;
        }
        .cart-product button {
            padding: 5px 10px;
            width: 30%;
            border: none;
            border-top: 1px solid #0a6aa5;
            background: #ffffff;
            cursor: pointer;
            transition: background 300ms ease-out, color 300ms ease-out;
        }
        .cart-product button i.fa {
            font-size: 16px;
            color: var(--light);
        }
        .cart-product button:hover {
            background: #0a6ba5;
        }
        .cart-product button:hover i.fa {
            color: #fff;
        }
        .cart-product button:first-child {
            border-right: none;
            border-left: none;
        }
        .cart-product button:last-child {
            width: 40%;
            border-right: none;
            border-left: none;
        }
        .cart-product button:last-child:hover {
            background: var(--bad);
        }

        #cart.checkout {
            background: var(--dark);
        }
        #cart.checkout #cart-contents {
            height: calc(100% - 21vh);
        }
        #cart.checkout > button {
            width: 50%;
            background: var(--medium);
            color: var(--light);
        }
        #cart.checkout #cart-checkout {
            border-color: var(--bad);
        }
        #cart.checkout #cart-checkout span {
            color: var(--light);
        }
        #cart.checkout #cart-checkout:hover {
            background: var(--bad);
        }
        #cart.checkout #cart-checkout:hover span {
            color: var(--dark);
        }
        #cart.checkout #checkout-continue {
            display: block;
            right: 0;
        }
        #cart.checkout #checkout-continue:hover {
            background-color: var(--product);
            color: var(--dark);
        }
        #cart.checkout #cart-info,
        #cart.checkout form {
            display: block;
            position: absolute;
            bottom: 10vh;
            padding: 5px 10px;
            width: 50%;
            height: 11vh;
        }
        #cart.checkout form {
            right: 0;
        }
        #cart.checkout form span:not(.validation) {
            display: block;
            margin-bottom: 5px;
            text-align: center;
        }
        #cart.checkout form input {
            display: block;
            margin: 0 auto;
            padding: 5px 10px;
            width: 50%;
            border: none;
            font-size: 18px;
        }
        #cart.checkout #cart-info {
            left: 0;
        }

        #cart.checkout #cart-contents .cart-product {
            margin: 0;
            border-bottom: 1px solid #222;
        }
        #cart.checkout #cart-contents .cart-product div {
            display: none;
        }

        .product {
            border: 1px solid #4071b7;
            background: #fff;
        }
        .payment {
            border: 1px solid #4071b7;
            background: #fff;
        }

        .payment h4 {
            margin: 20px 15px;
            text-align: center;
            font-size: 20px;
            text-overflow: ellipsis;
            color: var(--light);
            white-space: nowrap;
            overflow: hidden;
        }
        .payment div {
            /* padding: 0 0 0 15px; */
            height: 40px;
            border-top: 1px solid #0a6aa5;
        }
        .payment span {
            display: inline-block;
            margin-top: 8px;
            color: var(--light);
        }
        .payment button {
            /* float: right; */
            /* margin-left: auto; */
            width: 100%;
            padding: 0px 35px;
            height: calc(100% - -3px);
            border: none;
            /* border-left: 1px solid #3b67a5; */
            background: #4071b7;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 300ms ease-out, color 300ms ease-out;
        }

        .product h4 {
            margin: 20px 15px;
            text-align: center;
            text-overflow: ellipsis;
            color: var(--light);
            white-space: nowrap;
            overflow: hidden;
        }
        .product div {
            padding: 0 0 0 15px;
            height: 40px;
            border-top: 1px solid #0a6aa5;
        }
        .product span {
            display: inline-block;
            margin-top: 8px;
            color: var(--light);
        }
        .product button {
            float: right;
            margin-left: auto;
            padding: 0 22px;
            height: calc(100% - 3px);
            border: none;
            border-left: 1px solid #3b67a5;
            background: #4071b7;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 300ms ease-out, color 300ms ease-out;
        }
        .product button:hover {
            background: #fff;
            color: #4071b7;
        }
        .post-btn{
            border:0;padding: 13px;outline: 0;background: #26a07f;color: #fff;font-size: 22px;width: 100%;height: 100%;
        }
        button:disabled,
        button[disabled]{
            background: #cccccc;
            color: #666666;
        }
        #shortcut {
            height: 15%;width: 87.8%;position: absolute;margin-top: -6.8%;
        }
        #shortcut button:first-child{
            margin-right: 4px;
        }
        #shortcut button{
            width: 15%;
            height: 100%;
            font-size: 22px;
            margin-left: -17.8px;
        }
        #shortcut #day_end{
            background: #4c110f;
            color: #fff;
        }

        #shortcut #search{
            background: #ccc;
            color: #555;
        }

        #shortcut #sales_return{
            background: #9c2123;
            color: #fff;
        }

        #shortcut #customer{
            background: #0c5460;
            color: #fff;
            position: absolute;
        }
        #shortcut #customer span{
            color: #fff;
        }

        #shortcut #redeem_voucher{
            background: #6f42c1;
            color: #fff;
        }

        #shortcut #discount{
            background: #0a6ba5;
            color: #fff;
        }

        #shortcut #report{
            background: #e0a800;
            color: #fff;
        }
        @keyframes shake {
            10%, 90% {
                transform: translatex(-1px);
            }
            20%, 80% {
                transform: translatex(2px);
            }
            30%, 50%, 70% {
                transform: translatex(-4px);
            }
            40%, 60% {
                transform: translatex(4px);
            }
        }

        .container-3{
            /*width: 100%;*/
            vertical-align: middle;
            white-space: nowrap;
            position: relative;
        }

        .container-3 input{
            /* width: 300px; */
            /* height: 50px; */
            background: #fff;
            border: none;
            font-size: 10pt;
            float: left;
            padding-left: 45px;
            padding-top: 5px;
            /* -webkit-border-radius: 5px; */
            -moz-border-radius: 5px;
            /* border-radius: 5px; */
            color: #262626;
        }

        .container-3 input::-webkit-input-placeholder {
            color: #65737e;
        }

        .container-3 input:-moz-placeholder { /* Firefox 18- */
            color: #65737e;
        }

        .container-3 input::-moz-placeholder {  /* Firefox 19+ */
            color: #65737e;
        }

        .container-3 input:-ms-input-placeholder {
            color: #65737e;
        }

        .container-3 .icon{
            position: absolute;
            top: 50%;
            margin-left: 17px;
            margin-top: 7px;
            z-index: 1;
            color: #4f5b66;

            -webkit-transition: all .55s ease;
            -moz-transition: all .55s ease;
            -ms-transition: all .55s ease;
            -o-transition: all .55s ease;
            transition: all .55s ease;
        }

        .container-3 input:focus, .container-3 input:active{
            outline:none;
        }

        .container-3:hover .icon{
            margin-top: 6px;
            color: #93a2ad;

            -webkit-transform:scale(1.5); /* Safari and Chrome */
            -moz-transform:scale(1.5); /* Firefox */
            -ms-transform:scale(1.5); /* IE 9 */
            -o-transform:scale(1.5); /* Opera */
            transform:scale(1.5);
        }


    </style>
</head>
<body>
<section id="cart" class="open">
    <div class="shadow"></div>
    <div id="cart-contents">
        <!--
        <div class="cart-product">
            <h6>Product Name</h6>
            <span>0</span>
            <div>
                <button>+</button>
                <button>-</button>
                <button>Remove</button>
            </div>
        </div>
        -->
    </div>
    <div id="cart-info" style="display: none;">
        <div class="subtotal">Sub Total:<i></i></div>
        <div class="tax">Total Tax:<i></i></div>
        <div class="total">Total Tax:<i></i></div>
    </div>
    <button id="cart-checkout" class="hidden">
        <span class="cart-total"></span>
        <span class="checkout-toggle hidden">Cancel</span>
    </button>
</section>
<header>
    <h1>{{config('app.pos')}}</h1>
    <button id="cart-toggle">
		<span class="cart-toggle-text">
			<span>Cart</span>
			<span id="cart-count"></span>
		</span>
        <span class="cart-back-text">
			<span>Cart</span>
		</span>
    </button>
</header>

<main>
    <!--
        Product Template
        <div class="product">
            <h4>Name</h4>
            <div>
                <span class="product-price"></span>
                <button class="product-add"></button>
            </div>
        </div>
    -->
</main>

<div id="shortcut">
    <button id="day_end">Day End</button>
    <button id="report">Report</button>
    <button id="search" onclick="openSearchPopup();">Search</button>
    <button id="sales_return" onclick="openSalesReturnPopup();">Sales Return</button>
    <button id="discount">Discount</button>
    <button id="redeem_voucher">Redeem Voucher</button>
    <button id="customer" onclick="openCustomerPopup();">Customer</button>
</div>
<footer>
    &copy; <span id="copyright-date"></span>
</footer>
<input type="hidden" name="customer_id">
<script type="text/javascript" src="http://w2ui.com/web/js/jquery-2.1.1.min.js"></script>
{{--<script type="text/javascript" src="/public/assets/plugins/gridforms/gridforms.js"></script>--}}
<script type="text/javascript" src="/public/assets/plugins/w2ui-1.5.rc1/w2ui-1.5.rc1.js"></script>
{{--<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>--}}
{{--<script type="text/javascript" src="/public/assets/js/code-mirror/code-mirror2.js"></script>--}}
{{--<script type="text/javascript" src="/public/assets/js/layouts.js"></script>--}}
{{--<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>--}}
{{--<script type="text/javascript" src="/public/assets/js/script.js"></script>--}}
{{--<script type="text/javascript" src="/public/js/crud/employee-dialog.js"></script>--}}
{{--<script type="text/javascript" src="/public/js/crud/products-dialog.js"></script>--}}
{{--<script type="text/javascript" src="/public/js/crud/suppliers-dialog.js"></script>--}}
{{--<script type="text/javascript" src="/public/js/crud/branch-dialog.js"></script>--}}
<script type="text/javascript">
    jQuery.extend({
        getValues: function(url) {
            var result = null;
            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                async: false,
                success: function(data) {
                    result = data;
                }
            });
            return result;
        }
    });

    let products = [];
    let cart;
    class Product {
        constructor(id, name, image, price) {
            this.$id = id;
            this.$name = name;
            this.$image = image;
            this.$price = price;
        }

        On(el, eventType, callback) {
            el.addEventListener(eventType, callback.bind(el, this), false);
        }

        static Add(_this, event) {
            let container;
            var path = event.path || (event.composedPath && event.composedPath());
            for (let el of path) {
                if (el.hasAttribute('product-id')) {
                    container = el;
                    break;
                }
            }

            let id = parseInt(container.getAttribute('product-id'));
            let product = products.filter(item => { return item.$id === id })[0];
            cart.Add(product);
        }

        static Sub(_this, event) {
            let container;
            for (let el of event.path) {
                if (el.hasAttribute('product-id')) {
                    container = el;
                    break;
                }
            }
            let id = parseInt(container.getAttribute('product-id'));
            let product = products.filter(item => { return item.$id === id })[0];
            cart.Sub(product);
        }

        static Remove(_this, event) {
            let container;
            for (let el of event.path) {
                if (el.hasAttribute('product-id')) {
                    container = el;
                    break;
                }
            }
            let id = parseInt(container.getAttribute('product-id'));
            let product = products.filter(item => { return item.$id === id })[0];
            cart.Remove(product);
        }

        static Display() {
            let main = document.querySelector('main');

            for (let item of products) {
                let container = document.createElement('div');
                container.classList.add('product');
                container.setAttribute('product-id', item.$id);

                let name = document.createElement('h4');
                name.innerHTML = item.$name;

                let inner = document.createElement('div');

                let price = document.createElement('span');
                price.classList.add('product-price');;
                var tax = item.$price * 0.05;
                var total = parseFloat(item.$price) + parseFloat(tax);
                price.innerHTML = 'SAR ' + total.toFixed(2) ;

                let button = document.createElement('button');
                button.classList.add('product-add');
                button.innerHTML = 'Add';
                item.On(button, 'click', Product.Add);

                inner.append(price);
                inner.append(button);

                container.append(name);
                container.append(inner);

                main.append(container);
            }
        }

        static SetDefaults(count) {
            var stock = $.getValues('/stock');
            let images = [];
            for (let i = 0; i < stock.length; i++) {
                let name = i < stock.length ? stock[i].product.name : `Product ${i + 1}`;
                let image = i < images.length ? images[i] : '';
                let price = i < stock.length ? stock[i].product.sales_price[0].price : 0;
                products.push(new Product(stock[i].product.id, name, image, price));
            }
        }
    }

    class Cart {
        constructor(obj) {
            this.$products = obj.products ? obj.products : [];
            this.$count = obj.count ? obj.count : 0;
            this.$taxRate = obj.taxRage ? obj.taxRate : 0.05;
            this.$subtotal = obj.subTotal ? obj.subTotal : 0;
            this.$tax = obj.tax ? obj.tax : 0;
            this.$total = obj.total ? obj.total : 0;

            this.$cartEl = obj.cartEl;
            this.$prodContainer = obj.prodContainer;
            this.$checkoutButton = obj.checkoutButton;
            this.$toggleButton = obj.toggleButton;
            this.$countEl = obj.countEl;
            this.$checkoutEl = obj.checkoutEl;
            this.$totalEl = obj.totalEl;
            this.$infoContainer = obj.infoContainer;

            this.Bind();
        }

        On(el, eventType, callback) {
            el.addEventListener(eventType, callback.bind(el, this), false);
        }

        Bind() {
            this.On(this.$toggleButton, 'click', this.Toggle);
            this.On(this.$checkoutButton, 'click', this.ToggleCheckout);
        }

        Add(product) {
            this.$products.push(product);
            this.$count = this.$products.length;
            this.CalcTotal();
            this.UpdateCount();
            this.UpdateUi();
        }

        Sub(product) {
            this.$products.splice(this.$products.indexOf(product), 1);
            this.$count = this.$products.length;
            this.CalcTotal();
            this.UpdateCount();
            this.UpdateUi();
        }

        Remove(product) {
            this.$products = this.$products.filter(item => { return item !== product });
            this.$count = this.$products.length;
            this.CalcTotal();
            this.UpdateUi();
            this.UpdateCount();
        }

        CalcSubtotal() {
            this.$subtotal = 0;
            for (let product of this.$products) {
                this.$subtotal += parseFloat(product.$price);
            }
        }

        CalcTax() {
            this.$tax = this.$subtotal * this.$taxRate;
        }

        CalcTotal() {
            this.CalcSubtotal();
            this.CalcTax();
            this.$total = parseFloat(this.$subtotal + this.$tax);
        }

        UpdateCount() {
            if (this.$count > 0) {
                this.$countEl.innerHTML = this.$count;
                if (this.$countEl.classList)
                    this.$countEl.classList.remove('hidden');
                if (this.$toggleButton.classList && this.$toggleButton.classList.contains('shake'))
                    this.$toggleButton.classList.remove('shake');
            } else {
                this.$toggleButton.classList.add('shake');
                this.$countEl.innerHTML = '';
                this.$countEl.classList.add('hidden');
//                this.Toggle(this)
            }
        }

        UpdateUi() {
            this.$prodContainer.innerHTML = '';
            this.$checkoutButton.querySelector('.cart-total').innerHTML = `Checkout SAR ${this.$total.toFixed(2)}`;

            let infoSub = document.createElement('div');
            infoSub.classList.add('subtotal');
            infoSub.innerText = 'Sub Total: ';
            let infoSubText = document.createElement('i');
            infoSub.append(infoSubText);
            infoSubText.innerHTML = `SAR ${this.$subtotal.toFixed(2)}`;

            let infoTax = document.createElement('div');
            infoTax.classList.add('tax');
            infoTax.innerText = 'Tax Total: ';
            let infoTaxText = document.createElement('i');
            infoTax.append(infoTaxText);
            infoTaxText.innerHTML = `SAR ${this.$tax.toFixed(2)}`;

            let infoTotal = document.createElement('div');
            infoTotal.classList.add('total');
            infoTotal.innerText  = 'Total: ';
            let infoTotalText = document.createElement('i');
            infoTotal.append(infoTotalText);
            infoTotalText.innerHTML = `SAR ${this.$total.toFixed(2)}`;
            if($('#cart #cart-info').hide()) $('#cart #cart-info').show();
            this.$infoContainer.innerHTML = '';
            this.$infoContainer.append(infoSub);
            this.$infoContainer.append(infoTax);
            this.$infoContainer.append(infoTotal);

            if (cart.count <= 0)
                this.$checkoutButton.classList.add('hidden');
            else if (this.$checkoutButton.classList)
                this.$checkoutButton.classList.remove('hidden');

            for (let product of products) {
                let arr = this.$products.filter(item => { return item === product });
                if (arr.length > 0) {
                    let div = document.createElement('div');
                    div.classList.add('cart-product');
                    div.setAttribute('product-id', product.$id);

                    let name = document.createElement('h6');
                    name.innerHTML = product.$name;

                    let count = document.createElement('span');
                    count.innerHTML = arr.length;

                    let inner = document.createElement('div');

                    let add = document.createElement('button');
                    add.classList.add('cart-product-inc');
                    add.innerHTML = '<i class="fa fa-plus  fa-2x"></i>';
                    this.On(add, 'click', Product.Add);

                    let sub = document.createElement('button');
                    sub.classList.add('cart-product-dec');
                    sub.innerHTML = '<i class="fa fa-minus fa-2x"></i>';
                    this.On(sub, 'click', Product.Sub);

                    let remove = document.createElement('button');
                    remove.classList.add('cart-product-remove');
                    remove.innerHTML = '<i class="fa fa-trash fa-2x" aria-hidden="true">DELETE</i>';
                    this.On(remove, 'click', Product.Remove);

                    inner.append(add);
                    inner.append(sub);
                    inner.append(remove);

                    div.append(name);
                    div.append(count);
                    div.append(inner);

                    this.$prodContainer.append(div);
                }
            }
        }

        Toggle(_this, event) {
            if (_this.$count <= 0)
                _this.$toggleButton.classList.add('shake');

            if (_this.$cartEl.classList) {
                if (_this.$cartEl.classList.contains('checkout')) {
                    _this.$cartEl.classList.remove('checkout');
                    if (_this.$totalEl.classList)
                        _this.$totalEl.classList.remove('hidden');
                    if (_this.$checkoutEl.classList)
                        _this.$checkoutEl.classList.add('hidden');
                }

                if (_this.$cartEl.classList.contains('open')) {
                    _this.$cartEl.classList.remove('open');
                } else {
                    if (_this.$count <= 0) return;
                    _this.$cartEl.classList.add('open');
                }
            }
        }

        ToggleCheckout(_this, event) {
            if (_this.$cartEl.classList && _this.$cartEl.classList.contains('checkout')) {
//                _this.$totalEl.classList.remove('hidden');
//                _this.$checkoutEl.classList.add('hidden');
//                _this.$cartEl.classList.remove('checkout');
            } else {
//                _this.$checkoutEl.classList.remove('hidden');
//                _this.$totalEl.classList.add('hidden');
//                _this.$cartEl.classList.add('checkout');
                openPopup();
            }
        }
    }

    function setCopyrightDate() {
        let el = document.getElementById('copyright-date');
        let date = new Date();
        el.innerHTML = date.getFullYear();
    }



    (function(){
        cart = new Cart({
            taxRate: 0.05,
            cartEl: document.getElementById('cart'),
            checkoutButton: document.getElementById('cart-checkout'),
            toggleButton: document.getElementById('cart-toggle'),
            countEl: document.getElementById('cart-count'),
            checkoutEl: document.querySelector('#cart button .checkout-toggle'),
            totalEl: document.querySelector('#cart button .cart-total'),
            prodContainer: document.getElementById('cart-contents'),
            infoContainer: document.getElementById('cart-info')
        });
        Product.SetDefaults(10);
        Product.Display();
        setCopyrightDate();
    })();


var outstanding_balance = 0.00;
var total_due = 0.00;
function post() {
    console.log(cart);
    var items = [];
    $.each(cart.$products,function (k,v) {
        var is_duplicated = false;
        if(items.length > 0){
            $.each(items,function (key,value) {
                if (value.id === v.$id){
                    value.quantity++;
                    is_duplicated = true;
                    return false;
                }
            });
        }
        return is_duplicated ?  is_duplicated : items[items.length] = {id:v.$id,price:v.$price,quantity:1};
    });
    console.log(items);
    var data = new FormData();
    if($('input[name="customer_id"]').val() !== '' || $('input[name="customer_id"]').val() !== null){
        data.append('customer_id',$('input[name="customer_id"]').val());
    }
    if(items.length > 0){
        $.each(items,function (k,v) {
            data.append('items['+k+'][product_id]',v.id);
            data.append('items['+k+'][price]',v.price);
            data.append('items['+k+'][quantity]',v.quantity);
        });
    }
    data.append('total_items',items.length);
    data.append('total_amount',cart.$subtotal);
    data.append('total_tax_amount',cart.$tax);
    data.append('total_balance',cart.$total);
    data.append('total_qty',cart.$count);
    data.append('total_discount_amount',total_due);
    data.append('outstanding_balance',outstanding_balance);
    if(w2ui.payment.records.length > 0){
        w2ui.payment.mergeChanges();
        $.each(w2ui.payment.records,function (k,v) {
            data.append('payment['+k+'][payment_method]',v.payment_method);
            data.append('payment['+k+'][amount]',v.paid_amount);
            data.append('payment['+k+'][outstanding_balance]',v.outstanding_balance);
        });
    }
    data.append('_token','{{ csrf_token() }}');
    $.ajax({
        header:{ 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
        url: '/post',
        type: 'post',
        data:data,
        contentType: false,
        processData: false,
        dataType: 'json',
        async: false,
        beforeSend: function() {

        },
        success:function (data) {
            if(data.status === 'success'){
               $.each( cart.$products,function (k,v) {
                   cart.Remove(v);
                   w2popup.close();
                   w2ui.payment.clear();
                   w2ui.customer.clear();
                   $('input[name="customer_id"]').val('');
                   $('button#customer').html('Customer');
               });
            }
        },
        error:function (xhr) {
            console.log(xhr.status);
        }
    });
}   
function add_payment(el) {
    var g = w2ui.payment.records;
    var pay_id = el.parents('div.payment').attr('payment-id');
    if(g.length === 0){
        outstanding_balance = cart.$total;
        w2ui.payment.add({recid:g.length,payment_method:pay_id == 0 ? 'CASH' : 'CREDIT_CARD',paid_amount:outstanding_balance,outstanding_balance:outstanding_balance});
        w2ui.payment.editField(g.length,1);
        outstanding_balance = 0.00;
        $('button#post').removeAttr('disabled');
    }else{
        if( outstanding_balance <= 0.00) return false;
        w2ui.payment.add({recid:g.length,payment_method:pay_id == 0 ? 'CASH' : 'CREDIT_CARD',paid_amount:outstanding_balance,outstanding_balance:outstanding_balance});
        w2ui.payment.editField(g.length,1);
        outstanding_balance = 0.00;
        $('button#post').removeAttr('disabled');
    }
}
    var config = {
        layout: {
            name: 'layout',
            padding: 0,
            panels: [
                { type: 'top', size: 32, style: 'border-bottom: 1px solid silver;'},
                { type: 'left', size: 270, resizable: true, content: '<main><div class="payment" payment-id="0"><h4>CASH</h4><div><button onclick="add_payment($(this));" class="payment-add">Add</button></div></div><div class="payment" payment-id="1"><h4>CREDIT CARD</h4><div><button class="payment-add" onclick="add_payment($(this));">Add</button></div></div></main>' },
                { type: 'main', size: '50%', overflow: 'hidden' },
                { type: 'bottom', size: '10%', overflow: 'hidden',content: '<div style="padding: 3px;"><button  disabled id="post"  class="post-btn" type="button" onclick="post();">POST(F10)</button></div>' }
            ]
        },
        payment: {
            name: 'payment',
            style: 'border: 0px; border-left: 1px solid silver',
            show:{
                header: false,
                columnHeaders: true,
                toolbar: true,
                footer: false,
                toolbarAdd: false,
                toolbarDelete: true,
                toolbarSave: false,
                toolbarEdit: false,
                toolbarSearch: false,     // hides search button on the toolbar
                toolbarInput:false,      // hides search input on the toolbar
                searchAll:false,         // hides "All Fields" option in the search dropdown
                toolbarColumns:false,
                toolbarReload:false,
            },
            columns: [
                { field: 'payment_method', caption: 'PAYMENT METHOD', size: '120px' },
                { field: 'paid_amount', caption: 'PAID AMOUNT', size: '100%' ,editable:{type:'text'}},
                { field: 'outstanding_balance', caption: 'OUTSTANDING BALANCE', size: '180px', attr: 'align="center"' }
            ],
            onChange:function (event) {
                if(event.column === 1){
                    var amount = this.records[event.recid].outstanding_balance - event.value_new;
                    outstanding_balance = amount;
                    if(event.value_new !== outstanding_balance){
                        $('button#post').attr('disabled','disabled');
                    }
                    this.set(event.recid,{paid_amount:event.value_new,outstanding_balance:amount});
                    this.mergeChanges();
                }
            }
        },
        customer: {
            name: 'customer',
            style: 'border: 0px; border-left: 1px solid silver',
            show:{
                header: false,
                columnHeaders: true,
                toolbar: true,
                footer: false,
                toolbarAdd: true,
                toolbarDelete: false,
                toolbarSave: false,
                toolbarEdit: true,
                toolbarSearch: false,     // hides search button on the toolbar
                toolbarInput:false,      // hides search input on the toolbar
                searchAll:false,         // hides "All Fields" option in the search dropdown
                toolbarColumns:false,
                toolbarReload:false,
            },
            columns: [
                { field: 'name', caption: 'CUSTOMER NAME', size: '120px' },
                { field: 'phone', caption: 'CUSTOMER PHONE', size: '100%' ,editable:{type:'text'}},
                { field: 'email', caption: 'CUSTOMER EMAIL', size: '100%' ,editable:{type:'text'}},
            ],
            onDblClick:function (event) {
                $('input[name="customer_id"]').val(this.records[event.recid].id);
                $('button#customer').html('<span>Name#'+this.records[event.recid].name+'</span><hr><span> Phone#'+this.records[event.recid].phone+'</span>');
                w2popup.close();
            },
            onChange:function (event) {
//                if(event.column === 1){
//                    var amount = this.records[event.recid].outstanding_balance - event.value_new;
//                    outstanding_balance = amount;
//                    this.set(event.recid,{paid_amount:event.value_new,outstanding_balance:amount});
//                    this.mergeChanges();
//                }
            }
        },
        search: {
            name: 'search',
            autoLoad:false,
            markSearch : false,
            multiSearch: true,
            multiSelect:false,
            style: 'border: 0px; border-left: 1px solid silver',
            show:{
                header: false,
                columnHeaders: true,
                toolbar: true,
                footer: false,
                toolbarAdd: false,
                toolbarDelete: false,
                toolbarSave: false,
                toolbarEdit: false,
                toolbarSearch: true,     // hides search button on the toolbar
                toolbarInput:true,      // hides search input on the toolbar
                searchAll:true,         // hides "All Fields" option in the search dropdown
                toolbarColumns:false,
                toolbarReload:true,
            },
            columns: [
                { field: 'reference', caption: 'INVOICE NO', size: '120px', searchable: true },
                { field: 'issue_date', caption: 'DATE', size: '100%' ,editable:{type:'text'}, searchable: true},
                { field: 'customer.name', caption: 'CUSTOMER NAME', size: '100%' ,editable:{type:'text'}, searchable: true},
                { field: 'total_balance', caption: 'INVOICE AMOUNT', size: '100%' ,editable:{type:'text'}, searchable: true},
            ],
            onDblClick:function (event) {
//                $('input[name="customer_id"]').val(this.records[event.recid].id);
//                $('button#customer').html('<span>Name#'+this.records[event.recid].name+'</span><hr><span> Phone#'+this.records[event.recid].phone+'</span>');
//                w2popup.close();
                console.log(this.records[event.recid].order_items);
                var cart = new Cart(this.records[event.recid].order_items);
//                $.each(this.records[event.recid].order_items,function (k,v) {
//                    var cart = new Cart();
//                    var product = {id:v.id,name:v.product.name,image:'',price:v.price};
//                    cart.add(product);
//                });

            },
            onChange:function (event) {
//                if(event.column === 1){
//                    var amount = this.records[event.recid].outstanding_balance - event.value_new;
//                    outstanding_balance = amount;
//                    this.set(event.recid,{paid_amount:event.value_new,outstanding_balance:amount});
//                    this.mergeChanges();
//                }
            }
        },
        sales_return: {
            name: 'sales_return',
            autoLoad:false,
            markSearch : false,
            multiSearch: true,
            multiSelect:false,
            style: 'border: 0px; border-left: 1px solid silver',
            show:{
                header: false,
                columnHeaders: true,
                toolbar: true,
                footer: false,
                toolbarAdd: false,
                toolbarDelete: false,
                toolbarSave: false,
                toolbarEdit: false,
                toolbarSearch: true,     // hides search button on the toolbar
                toolbarInput:true,      // hides search input on the toolbar
                searchAll:true,         // hides "All Fields" option in the search dropdown
                toolbarColumns:false,
                toolbarReload:true,
            },
            columns: [
                { field: 'reference', caption: 'INVOICE NO', size: '120px', searchable: true },
                { field: 'issue_date', caption: 'DATE', size: '100%' ,editable:{type:'text'}, searchable: true},
                { field: 'customer.name', caption: 'CUSTOMER NAME', size: '100%' ,editable:{type:'text'}, searchable: true},
                { field: 'total_balance', caption: 'INVOICE AMOUNT', size: '100%' ,editable:{type:'text'}, searchable: true},
            ],
            onSearch: function(event) {
                console.log(event);
                var result = $.getValues('/'+event.searchValue+'/find/order');
                console.log(result);
            },
            onDblClick:function (event) {
                $('input[name="customer_id"]').val(this.records[event.recid].id);
                $('button#customer').html('<span>Name#'+this.records[event.recid].name+'</span><hr><span> Phone#'+this.records[event.recid].phone+'</span>');
                w2popup.close();
            },
            onChange:function (event) {
//                if(event.column === 1){
//                    var amount = this.records[event.recid].outstanding_balance - event.value_new;
//                    outstanding_balance = amount;
//                    this.set(event.recid,{paid_amount:event.value_new,outstanding_balance:amount});
//                    this.mergeChanges();
//                }
            }
        },
    };


$(function () {
    // initialization in memory
    $().w2layout(config.layout);
    $().w2sidebar(config.sidebar);
    $().w2grid(config.payment);
    $().w2grid(config.customer);
    $().w2grid(config.search);
    $().w2grid(config.sales_return);
});

function findCustomer(el) {
   if (el.val() && el.val() !== '' || el.val() !== null){
        var customer = $.getValues('/customer/'+el.val());
        if(customer.records.length > 0){
            var customerList = [];
            $.each(customer.records,function (k,v) {
                customerList[k] = v;
                customerList[k].recid = k;
            });
            w2ui.customer.records = customerList;
            w2ui.customer.refresh();
        }
   }
}
function openSearchPopup() {
        w2popup.open({
            title   : 'Search Invoice',
            width   : 800,
            height  : 600,
            showMax : true,
            body    : '<div id="main" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px;"></div>',
            onOpen  : function (event) {
                event.onComplete = function () {
                    var result = $.getValues('/load/order').records;
                    $.each(result,function (k,v) {
                        w2ui.search.records[k] = v;
                        w2ui.search.records[k].recid = k;
                    });
                    $('#w2ui-popup #main').w2render('layout');
//                    w2ui.layout.content('bottom', '<div style="padding: 3px;"><button  id="search"  class="post-btn" type="button" onclick="search();">Search(Enter)</button></div>');
                    w2ui.layout.content('main', w2ui.search);
                    w2ui['layout'].set('top', { hidden: true });
                    w2ui['layout'].set('left', { hidden: true });
                    w2ui['layout'].set('bottom', { hidden: true });
                }
            },
            onToggle: function (event) {
//                event.onComplete = function () {
//                    w2ui.layout.resize();
//                }
            }
        });
    }
function openSalesReturnPopup() {
        w2popup.open({
            title   : 'Sales Return',
            width   : 800,
            height  : 600,
            showMax : true,
            body    : '<div id="main" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px;"></div>',
            onOpen  : function (event) {
                event.onComplete = function () {
                    var result = $.getValues('/load/order').records;
                    $.each(result,function (k,v) {
                        w2ui.sales_return.records[k] = v;
                        w2ui.sales_return.records[k].recid = k;
                    });
                    $('#w2ui-popup #main').w2render('layout');
//                    w2ui.layout.content('bottom', '<div style="padding: 3px;"><button  id="search"  class="post-btn" type="button" onclick="search();">Search(Enter)</button></div>');
                    w2ui.layout.content('main', w2ui.sales_return);
                    w2ui['layout'].set('top', { hidden: true });
                    w2ui['layout'].set('left', { hidden: true });
                    w2ui['layout'].set('bottom', { hidden: true });
                }
            },
            onToggle: function (event) {
//                event.onComplete = function () {
//                    w2ui.layout.resize();
//                }
            }
        });
    }
function openCustomerPopup() {
        w2popup.open({
            title   : 'Search Customer',
            width   : 800,
            height  : 600,
            showMax : true,
            body    : '<div id="main" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px;"></div>',
            onOpen  : function (event) {
                event.onComplete = function () {
                    $('#w2ui-popup #main').w2render('layout');
                    w2ui.layout.content('top', '<div style="font-size: 18px;" class="container-3"><span class="icon"><i class="fa fa-search"></i></span><input style="width:100%;height: 100%; font-size: 20px;" type="text" name="customer" id="customer_find" onchange="findCustomer($(this));" placeholder="Search...."></div>');
                    w2ui.layout.content('main', w2ui.customer);
                    w2ui['layout'].set('left', { hidden: true });
                    w2ui['layout'].set('bottom', { hidden: true });
                }
            },
            onToggle: function (event) {
//                event.onComplete = function () {
//                    w2ui.layout.resize();
//                }
            }
        });
    }
function openPopup() {
        w2popup.open({
            title   : 'Payment',
            width   : 800,
            height  : 600,
            showMax : true,
            body    : '<div id="main" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px;"></div>',
            onOpen  : function (event) {
                event.onComplete = function () {
                    $('#w2ui-popup #main').w2render('layout');
                    w2ui.layout.content('top', '<div style="padding: 7px;font-size: 18px;"><span style="background: #add6ff;">Total QTY:'+cart.$count+'</span> | <span style="background: #add6ff;">Sub Total: SAR '+cart.$subtotal+'</span> | <span style="background: #cab1b1;">Tax: SAR '+cart.$tax+'</span> | <span style="background: #93cab8;">Total Amount:SAR '+cart.$total+'</span> </div>');
                    w2ui.layout.content('left', w2ui.sidebar);
                    w2ui.layout.content('main', w2ui.payment);
                    w2ui['layout'].set('left', { hidden: false });
                    w2ui['layout'].set('bottom', { hidden: false });
                }
            },
            onToggle: function (event) {
//                event.onComplete = function () {
//                    w2ui.layout.resize();
//                }
            }
        });
    }
    $(document).keypress(function(e) {
        console.log(e);
    });
    $(document).on('keypress',function(e) {
        if(e.which == 13) {

        }
    });
    function textsizer(e){
        var evtobj=window.event? event : e //distinguish between IE's explicit event object (window.event) and Firefox's implicit.
        var unicode=evtobj.charCode? evtobj.charCode : evtobj.keyCode
        var actualkey=String.fromCharCode(unicode)
        if (actualkey=="a")
            document.body.style.fontSize="520%"
        if (actualkey=="z")
            document.body.style.fontSize="1000%"
    }
    document.onkeypress=textsizer
</script>
</body>
</html>
