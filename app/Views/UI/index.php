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
		<div class="flex flex-col p-8 m-8">
			<div class="flex">
				<button @click="createModal = true" class="text-indigo-600 hover:text-indigo-900 mr-2 text-right p-2 float-right">Add Item</button>
			</div>
			<div v-show="createModal">
				<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
					<div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
						<div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
						<div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
							<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
									<h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                      Add Item
                    </h3>
										<div class="mt-2">
											<form action="#" method="POST">
                        <div class="col-span-6 sm:col-span-3">
                          <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                          <input type="text" name="name" id="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="name">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                          <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                          <input type="number" name="price" id="price" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="price">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                          <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                          <input type="number" name="quantity" id="quantity" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="quantity">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                          <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
                          <input type="text" name="color" id="color" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="color">
                        </div>
                      </form>
										</div>
							</div>
							<div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
								<button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm" @click="save"> Save </button>
								<button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" @click="createModal = false" >  Cancel </button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
				<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
					<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
						<table class="min-w-full divide-y divide-gray-200">
							<thead class="bg-gray-50">
								<tr>
									<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"> Name </th>
									<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"> Price </th>
									<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"> Quantity </th>
									<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"> Color </th>
									<th scope="col" class="relative px-6 py-3"> </th>
									<th scope="col" class="relative px-6 py-3"> <span class="sr-only">Delete</span> </th>
								</tr>
							</thead>
							<tbody class="bg-white divide-y divide-gray-200" >
								<tr v-for="product in product" :key="product.id">
									<td class="px-6 py-4 whitespace-nowrap">
										<div class="flex items-center"> {{product.name}} </div>
									</td>
									<td class="px-6 py-4 whitespace-nowrap"> {{product.price}} </td>
									<td class="px-6 py-4 whitespace-nowrap"> {{product.quantity}} </td>
									<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"> {{product.color}} </td>
									<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"> 
                      <button @click="edit(product)" class="cursor-pointer text-indigo-600 hover:text-indigo-900 mr-2">Edit</button>
										  <button @click="delete(product)" class="cursor-pointer text-indigo-600 hover:text-indigo-900">Delete</button> 
                    </td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
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
        name:"",
        quantity:0,
        price:0,
        color:"",
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
				})*/alert('Hello ' + this.name + '!')
				// `event` is the native DOM event
				if (event) {
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
      edit: function(product) {
			
			},
			create: function() {
				this.createModal = true;
			},
      save: function(){
        axios.post(`product/store`,{
					name:this.name,
					price:this.price,
					quantity:this.quantity,
					color:this.color,
        }).then(res => {
          this.list();
				  this.createModal = false;
					this.name="";
        	this.quantity=0;
        	this.price=0;
        	this.color="";
        }).catch(err => {
					console.log(err);
				})
      }
		}
	});
	</script>
</body>

</html>