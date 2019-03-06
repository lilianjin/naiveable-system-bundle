
Ofcold.booting((Vue, router, store) => {
	router.addRoutes([
		{
			path: '/system/routes',
			name: 'ofcold.bundle.system::routes',
			component: require('./views/Route'),
		}
	]);
})
