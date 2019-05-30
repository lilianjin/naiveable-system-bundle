<template>
	<div>
		<div class="flex justify-between">
			<div class="relative h-9 flex items-center mb-6">
				<icon type="search" class="absolute ml-3 text-70 pin-t mt-1" />

				<input v-model="search"
					   class="appearance-none form-control form-input w-search pl-search"
					   placeholder="Search"
					   type="search"
				>
			</div>

			<div class="relative mb-6 ml-6">
				<select-control
					dusk="routes-filter-select"
					class="block w-full form-control-sm form-select py-4"
					v-model="routeFilter"
					:options="{
						'general': 'general',
						'admin': 'admin',
						'api': 'api',
						'app': 'app'
					}"
					label="name"
				>
					<option value="" selected>默认</option>
				</select-control>
			</div>

			<span class="ml-auto mb-6">
				<button @click="getRoutes()"
						class="relative btn btn-default btn-primary flex items-center"
				>
					<icon type="sync" class="absolute ml-4 text-white pin-t pin-l mt-2" :width="16"/>
					<span class="ml-4">Refresh</span>
				</button>
			</span>
		</div>

		<card>
			<route-table :routes="filteredRoutes"
						 :sort="sortBy"
			></route-table>
		</card>
	</div>
</template>

<script>
import RouteTable from './RouteTable'

export default {
	components: { RouteTable },
	data() {
		return {
			routes: [],
			search: '',
			routeFilter: '',
			sort: {
				field: '',
				order: -1,
			},
			showOfcold: false,
		}
	},
	mounted() {
		this.getRoutes();
	},
	methods: {

		getRoutes() {
			Ofcold.request().get('/system-routes').then(response => {
				this.routes = response.data;
			});
		},

		sortBy(field) {
			this.sort.field = field;
			this.sort.order *= -1;
			this.routes.sort((route1, route2) => {
				let comparison = 0;

				if (route1[this.sort.field] < route2[this.sort.field]) {
					comparison = -1;
				}

				if (route1[this.sort.field] > route2[this.sort.field]) {
					comparison = 1;
				}

				return comparison * this.sort.order;
			});
		},
		toggleOfcold() {
			this.showOfcold = ! this.showOfcold;
		}
	},
	computed: {
		filteredRoutes() {
			if (! this.search.length) {
				return this.visibleRoutes;
			}
			const regex = this.searchRegex;

			// User input is not a valid regular expression, show no results
			if (! regex) {
				return {};
			}

			return this.visibleRoutes.filter(route => {
				let matchesSearch = false;
				for (let key in route) {
					if (Array.isArray(route[key])) {
						route[key].forEach(property => {
							if (regex.test(property)) {
								matchesSearch = true;
							}
						});
					}
					else if (regex.test(route[key])) {
						matchesSearch = true;
					}
				}
				return matchesSearch;
			});
		},

		visibleRoutes() {
			if (this.showOfcold) {
				return this.routes;
			}

			return this.routes
			// return this.routes.filter(route => {
			// 	return ! route.action.length
			// 		&& (! route.as.length || route.as.indexOf('admin') !== 0)
			// 		&& ! route.middleware.includes('admin');
			// });
		},

		searchRegex() {
			try {
				return new RegExp('(' + this.search + ')','i');
			}
			catch (e) {
				return false;
			}
		}
	}
}
</script>

<style>
</style>
