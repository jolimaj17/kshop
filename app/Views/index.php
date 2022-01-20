<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Simple CRUD</title>
	<link rel="stylesheet" href="https://rsms.me/inter/inter.css">
	<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui"> </head>

<body>
	<div id="app">
		<div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
			<div class="max-w-md w-full space-y-8">
				<div> 
          <h1 class="mt-6 text-center text-3xl font-extrabold text-gray-900">*</h1>
					<h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
        Login
      </h2> </div>
				<form class="mt-8 space-y-6" action="#" method="POST">
					<input type="hidden" name="remember" value="true">
					<div class="rounded-md shadow-sm -space-y-px">
						<div>
							<label for="email-address" class="sr-only">Email address</label>
							<input id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address"> </div>
						<div>
							<label for="password" class="sr-only">Password</label>
							<input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password"> </div>
					</div>
					<div>
						<button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"> <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
            </svg>
          </span> Sign in </button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="https://vuejs.org/js/vue.min.js"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
	<script>
	new Vue({
		el: '#app',
		data() {
			return {
				product: null,
				createModal: false,
				id: 0,
				name: "",
				quantity: 0,
				price: 0,
				color: "",
			}
		},
		created: function() {
			axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
			this.list();
		},
		methods: {
			delete: function(event) {
				/*this.id=product;
        axios.get(`product/delete/${product.id}`).then(res => {
					this.list() = res.data;
				}).catch(err => {
					console.log(err);
				})*/
				alert('Hello ' + this.name + '!')
					// `event` is the native DOM event
				if(event) {
					alert(event.target.tagName)
				}
			},
			list: function() {
				axios.get('product/display').then(res => {
					this.product = res.data;
				}).catch(err => {
					console.log(err);
				})
			},
			edit: function(product) {},
			create: function() {
				this.createModal = true;
			},
			save: function() {
				axios.post(`product/store`, {
					name: this.name,
					price: this.price,
					quantity: this.quantity,
					color: this.color,
				}).then(res => {
					this.list();
					this.createModal = false;
					this.name = "";
					this.quantity = 0;
					this.price = 0;
					this.color = "";
				}).catch(err => {
					console.log(err);
				})
			}
		}
	});
	</script>
</body>

</html>